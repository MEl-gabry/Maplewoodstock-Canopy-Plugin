<?php
    function confirmation_form()
    {
        global $wpdb;

        $site_url = get_site_url();
        
        if (!array_key_exists('a_id', $_GET) || !array_key_exists('e_id', $_GET) || !array_key_exists('day', $_GET))
        {   
            wp_redirect($site_url);
            exit;
        }

        $app_id = openssl_decrypt($_GET['a_id'], CIPHER, KEY);
        $e_id = openssl_decrypt($_GET['e_id'], CIPHER, KEY);
        $day = filter_var($_GET['day'], FILTER_SANITIZE_STRING);

        $applicant = $wpdb->get_results('SELECT * FROM '.$wpdb->prefix.'canopy_applicants WHERE id='.$app_id)[0];

        $entry_query = $wpdb->prepare(
            "SELECT * FROM ".$wpdb->prefix."canopy_%1s WHERE id=%d",
            array($day, $e_id)
        );

        $entry = $wpdb->get_results($entry_query)[0];
        $day_str = $day === 'saturday' ? 'Saturday, July 8' : 'Sunday, July 9';
        $win_status = $entry->win_status;

        if ($win_status !== 'Win' && $win_status !== 'Waitlisted')
        {
            if (array_key_exists('ls', $_GET))
            {
                return <<<EOD
                    <div class="alert h4 bg-danger text-light">
                        We're sorry to hear you won't be able to accept your canopy opportunity and hope to see you at the festival.  If you've received this message in error, please immediately email maplewoodstockcanopies@gmail.com and we'll contact you to resolve the issue.
                    </div>
                EOD;
            }
            wp_redirect($site_url);
            exit;
        }
        else if ($entry->confirmation_status == 1)
        {
            $thanks = $win_status === 'Win' ? "Thank you for successfully confirming you will attend on $day_str." : "Thank you for successfully confirming your waitlist participation for $day_str.";
            return <<<EOD
                <div class="alert h4 bg-success text-light">
                <svg width="30" height="30" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M23 0C10.317 0 0 10.317 0 23C0 35.683 10.317 46 23 46C35.683 46 46 35.683 46 23C46 18.44 44.6603 14.1893 42.3633 10.6113L40.9941 12.2285C42.8891 15.3825 44 19.06 44 23C44 34.579 34.579 44 23 44C11.421 44 2 34.579 2 23C2 11.421 11.421 2 23 2C28.443 2 33.3939 4.09977 37.1289 7.50977L38.4375 5.96484C34.3525 2.25984 28.935 0 23 0ZM41.2363 5.75391L21.9141 28.5547L13.7812 20.9688L12.418 22.4316L22.084 31.4473L42.7637 7.04688L41.2363 5.75391Z" fill="white"/>
                </svg>
            
                $thanks
                </div>
            EOD;
        }

        $date = $day === 'saturday' ? 'Saturday 7/8/2023' : 'Sunday 7/9/2023';
        $in_data = array_key_exists('ind', $_GET) ? '
            <div class="alert h4 bg-danger text-light">
                It seems we have incorrect data for your entry. Contact Maplewoodstock to resolve this issue.
            </div>
        ' : '';
        $fA = array_key_exists('fa', $_GET) ? '
        <div class="alert h4 bg-danger text-light">
            Please refill  out the form.
        </div>
    ' : '';

        $arrival = $win_status === 'Win' ? "Do you agree to arrive at the Maplewoodstock festival site at $entry->arrival_time on $date and that failure to arrive on time may result in forfeiture of your canopy location?" : "As a wait list member, you should plan to arrive at the festival site at $entry->arrival_time on $date at which time we will notify you of whether a canopy location has become available.  Do you agree to arrive at the Maplewoodstock festival site at the assigned day/time and agree that failure to arrive on time will result in forfeiture of your potential canopy location?";
        $remove = $win_status === 'Win' ? "Do you agree that you will remove your canopy at the end of the day?" : "Do you agree that your waitlist opportunity is only for a single day of the festival and that if you are awarded a canopy location you will remove your canopy at the end of the day?";
        $rules = $win_status === 'Win' ? "Are you familiar with the rules and procedures for the day of the event and setting up / taking down your canopy (including the fact that you will not be able to choose your exact canopy location)?" : "Are you familiar with the rules and procedures for the day of the event and setting up / taking down your canopy (including the fact that you will not be able to choose your exact canopy location should you receive a canopy location off the wait list)?";
        $accept = $win_status === 'Win'  ? "Do you plan to accept your lottery win position and attend the festival on $date?" : "Do you plan to accept your lottery waitlist position and attend the festival on $date?";

        return <<<EOD
            <p>Please complete the following questions to confirm your attendance and canopy location for Maplewoodstock 2023 - <b>$day_str</b>. Failure to complete this form in its entirety may result in loss of your canopy space.</p>
            <form method="post">
                <div class="form-group m-1" id="nameGroup" id="confirmation_form">
                    <label for="name"><p style="color:red;" class="m-0">* <span style="color:black;font-weight:bold;">Are you $applicant->name?</span></p></label>
                    <select class="form-select border-dark" name="name" required>
                        <option value="" selected disabled hidden>Select Value</option>    
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
                <div class="form-group m-1" id="addressGroup">
                    <label for="address"><p style="color:red;" class="m-0">* <span style="color:black;font-weight:bold;">Is this your address: $applicant->address?</span></p></label>
                    <select class="form-select border-dark" name="address" required>
                        <option value="" selected disabled hidden>Select Value</option>    
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
                <div class="form-group m-1" id="acceptGroup">
                    <label for="accept"><p style="color:red;" class="m-0">* <span style="color:black;font-weight:bold;">$accept</span></p></label>
                    <select class="form-select border-dark" name="accept" required>
                        <option value="" selected disabled hidden>Select Value</option>    
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
                <div class="form-group m-1" id="arrivalGroup">
                    <label for="arrival"><p style="color:red;" class="m-0">* <span style="color:black;font-weight:bold;">$arrival</span></p></label>
                    <select class="form-select border-dark" name="arrival" required>
                        <option value="" selected disabled hidden>Select Value</option>    
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
                <div class="form-group m-1" id="proofGroup">
                    <label for="proof"><p style="color:red;" class="m-0">* <span style="color:black;font-weight:bold;">Do you agree to bring proof of residency on the morning of the festival confirming a residential address in $applicant->town that matches the address on your winning lottery entry?</span></p></label>
                    <select class="form-select border-dark" name="proof" required>
                        <option value="" selected disabled hidden>Select Value</option>    
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
                <div class="form-group m-1" id="removeGroup">
                    <label for="remove"><p style="color:red;" class="m-0">* <span style="color:black;font-weight:bold;">$remove</span></p></label>
                    <select class="form-select border-dark" name="remove" required>
                        <option value="" selected disabled hidden>Select Value</option>    
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
                <div class="form-group m-1" id="rulesGroup">
                    <label for="rules"><p style="color:red;" class="m-0">* <span style="color:black;font-weight:bold;">$rules</span></p></label>
                    <select class="form-select border-dark" name="rules" required>
                        <option value="" selected disabled hidden>Select Value</option>    
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
                <div class="form-group m-1" id="cGroup">
                    <label for="newC"><p style="color:red;" class="m-0">* <span style="color:black;font-weight:bold;">Setting up a newly purchased canopy for the first time can be time consuming and slow down the process of assigning site locations on the festival grounds. Do you agree to open your canopy at home (removing all packing material) and become familiar with the setup process before arriving at the festival site?</span></p></label>
                    <select class="form-select border-dark" name="newC" required>
                        <option value="" selected disabled hidden>Select Value</option>    
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
                <div class="row">
                    <div class="col text-center">
                        <button type="submit" class="btn btn-primary bg-warning font-weight-bold m-1 btn-lg" name="submit_confirmation_form">Submit</button>
                    </div>
                </div>
                $in_data
                $fA
            </form>
        EOD;
    }

    function confirmation_form_capture()
    {
        global $wpdb;
        
        if (!array_key_exists('submit_confirmation_form', $_POST))
        {
            return;
        }

        $day = filter_var($_GET['day'], FILTER_SANITIZE_STRING);
        $a_id = openssl_decrypt($_GET['a_id'], CIPHER, KEY);
        $e_id = openssl_decrypt($_GET['e_id'], CIPHER, KEY);
        $current_url = getCurrentUrl();

        if (in_array('no', [$_POST['name'], $_POST['address']]))
        {
            wp_redirect($current_url.'&ind=b');
            exit;
        }
        else if ($_POST['accept'] === 'no')
        {
            $lose_query = $wpdb->prepare(
                "UPDATE ".$wpdb->prefix."canopy_%1s SET win_status='Declined' WHERE id=%d",
                array($day, $e_id)
            );
            $wpdb->get_results($lose_query);
            wp_redirect($current_url.'&ls=b');
            exit;
        }
        else if (in_array('no', [$_POST['arrival'], $_POST['proof'], $_POST['remove'], $_POST['rules'], $_POST['newC']]))
        {
            wp_redirect($current_url.'&fa=b');
            exit;
        }

        $confirmed_query = $wpdb->prepare(
            "UPDATE ".$wpdb->prefix."canopy_%1s SET confirmation_status=1 WHERE id=%d",
            array($day, $e_id)
        );

        $wpdb->get_results($confirmed_query);

        $applicant = $wpdb->get_results('SELECT name, email, phone FROM '.$wpdb->prefix.'canopy_applicants WHERE id='.$a_id)[0];

        $entry_query = $wpdb->prepare(
            "SELECT arrival_time FROM ".$wpdb->prefix."canopy_%1s WHERE id=%d",
            array($day, $e_id)
        );

        $entry = $wpdb->get_results($entry_query)[0];

        $date = $day === 'saturday' ? 'Saturday, July 8, 2023' : 'Sunday, July 9, 2023';

        $message = "Dear $applicant->name,  
        
You have confirmed your Maplewoodstock attendance on $date.  Please arrive promptly at $entry->arrival_time.  Please visit maplewoodstock.com/canopy for Official Lottery Rules and FAQs.";

        wp_mail($applicant->email, 'Confirmed for Maplewoodstock on '.$date, $message);

        wp_redirect($current_url);
        exit;
    }
?>