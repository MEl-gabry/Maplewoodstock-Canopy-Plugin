<?php

    function entry_form()
    {
        $content = <<<EOD
            <script>
                function set(key, element) {
                    localStorage.setItem(key, element.value);
                }
            </script>
            <form method="post" id="entry_form">
                <div class="form-group m-1" id="nameGroup">
                    <label for="applicant-name"><p style="color:red;" class="m-0">* <span style="color:black;font-weight:bold;">Name:</span> </p></label>
                    <input type="text" id="name" name="applicant-name" onchange="set('name', this)" class="form-control border-dark" placeholder="Enter name" required>
                </div>
                <div class="form-group m-1" id="addressGroup">
                    <label for="address"><p style="color:red;" class="m-0">* <span style="color:black;font-weight:bold;">Street Address:</span> </p></label>
                    <input type="text" id="address" name="address" onchange="set('address', this)" class="form-control border-dark" placeholder="Enter address" required>
                    <input type="text" id="address_2" name="address_2" onchange="set('address2', this)" class="form-control border-dark mt-1" placeholder="Enter additional information">
                    <small class="form-text">Apartment, suite, unit, building, floor, etc. (Make sure to add the corresponding prefix)</small>
                </div>
                <div class="form-group m-1" id="townGroup">
                    <label for="town"><p style="color:red;" class="m-0">* <span style="color:black;font-weight:bold;">Town:</span> </p></label>
                    <select class="form-select border-dark" id="town" name="town" onchange="set('town', this)" required>
                        <option value="" selected disabled hidden>Select Town</option>   
                        <option value="Maplewood">Maplewood</option>
                        <option value="South Orange">South Orange</option>
                    </select>
                </div>
                <div class="form-group m-1" id="phoneGroup">
                    <label for="phone"><p style="color:red;" class="m-0">* <span style="color:black;font-weight:bold;">Mobile Phone Number:</span> </p></label>
                    <input type="text" id="phone" name="phone" onchange="set('phone', this)" class="form-control border-dark" placeholder="Enter phone number" required maxlength="10" pattern="[0-9]{10}">
                </div>
                <div class="form-group m-1" id="emailGroup">
                    <label for="applicant-email"><p style="color:red;" class="m-0">* <span style="color:black;font-weight:bold;">Email Address:</span> </p></label>
                    <input type="email" id="email" name="applicant-email" onchange="set('email', this)" class="form-control border-dark" placeholder="Enter email address" required>
                </div>
                <div class="form-group m-1" id="dateGroup">
                    <label for="date"><p style="color:red;" class="m-0">* <span style="color:black;font-weight:bold;">I want to enter for:</span> </p></label>
                    <select class="form-select border-dark" id="date" name="date" onchange="set('date', this)" required>
                        <option value="" selected disabled hidden>Select Date</option>    
                        <option value="saturday">ONLY Sat, 7/8/23</option>
                        <option value="sunday">ONLY Sun, 7/9/23</option>
                        <option value="both">BOTH Saturday 7/8/23 and Sunday 7/9/23</option>
                    </select>
                </div>
                <div class="form-check">
                    <input class="form-check-input" name="bypass" type="checkbox" value="on" id="bypass">
                    <label class="form-check-label" for="bypass">
                        Click to bypass email and phone verification (do this only if you've tried submitting the form and failed)
                    </label>
                </div>
                <div class="row">
                    <div class="col text-center">
                        <button type="submit" class="btn btn-primary bg-warning font-weight-bold m-1 btn-lg" name="submit_entry_form">Submit</button>
                    </div>
                </div>
            </form>
            <script>
                document.getElementById("name").value = localStorage.getItem('name') ? localStorage.getItem('name') : "";
                document.getElementById("address").value = localStorage.getItem('address') ? localStorage.getItem('address') : "";
                document.getElementById("address_2").value = localStorage.getItem('address2') ? localStorage.getItem('address2') : "";
                document.getElementById("town").value = localStorage.getItem('town') ? localStorage.getItem('town') : "";
                document.getElementById("phone").value = localStorage.getItem('phone') ? localStorage.getItem('phone') : "";
                document.getElementById("email").value = localStorage.getItem('email') ? localStorage.getItem('email') : "";
                document.getElementById("date").value = localStorage.getItem('date') ? localStorage.getItem('date') : "";
            </script>
        EOD;
        return $content;
    }

    function entry_form_capture()
    {
        global $wpdb;

        if (!array_key_exists('submit_entry_form', $_POST))
        {
            return;
        }
        
        $site_url = get_site_url();
        $script = '';
        $error = false;
        $phone = filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT);
        $email = filter_var($_POST['applicant-email'], FILTER_SANITIZE_EMAIL);

        if (!array_key_exists('bypass', $_POST))
        {

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, 'https://emailvalidation.abstractapi.com/v1/?api_key=17ee9f0fed3f4283932931e3a2145982&email='.$email);

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

            $res = curl_exec($ch);
            if (!$res) {
                echo form_error();
            }
            $emailCheck = json_decode($res);

            curl_setopt($ch, CURLOPT_URL, 'https://phonevalidation.abstractapi.com/v1/?api_key=ca26231eea8242eca9e0447d48a64fe2&phone=+1'.$phone);

            $res = curl_exec($ch);
            if (!$res) {
                echo form_error();
            }
            $phoneCheck = json_decode($res);

            curl_close($ch);

            if ($emailCheck->deliverability !== "DELIVERABLE")
            {
                $script .= '
                    const emailError = document.createElement("p");
                    emailError.classList.add("text-danger");
                    emailError.innerText = "There was a problem in validating your email";
                    document.getElementById("emailGroup").appendChild(emailError);
                ';
                $error = true;
            }

            if (!$phoneCheck->valid)
            {
                $script .= '
                    const phoneError = document.createElement("p");
                    phoneError.classList.add("text-danger");
                    phoneError.innerText = "There was a problem in validating your phone number";
                    document.getElementById("phoneGroup").appendChild(phoneError);
                ';
                $error = true;
            }

            if ($error)
            {
                echo '
                    <script>
                        document.addEventListener("DOMContentLoaded", () => {'
                            .$script.
                        '});
                    </script>
                ';
                return;
            }
        }

        $check_email = $wpdb->prepare(
            "SELECT id FROM ".$wpdb->prefix."canopy_applicants WHERE email=%s",
            $email
        );

        $check_phone = $wpdb->prepare(
            "SELECT id FROM ".$wpdb->prefix."canopy_applicants WHERE phone=%s",
            $phone
        );

        $check_both = $wpdb->prepare(
            "SELECT id FROM ".$wpdb->prefix."canopy_applicants WHERE phone=%s AND email=%s",
            array($phone, $email)
        );

        $name = filter_var($_POST['applicant-name'], FILTER_SANITIZE_STRING);

        if (!$wpdb->get_results($check_email) && !$wpdb->get_results($check_phone))
        {
            $address = filter_var($_POST['address'].$_POST['address_2'], FILTER_SANITIZE_STRING);
            $town = filter_var($_POST['town'], FILTER_SANITIZE_STRING);

            $insert_app = $wpdb->prepare(
                "INSERT INTO ".$wpdb->prefix."canopy_applicants (name, address, email, town, phone) VALUES (%s, %s, %s, %s, %s)",
                array($name, $address, $email, $town, $phone)
            );

            $wpdb->get_results($insert_app);
        }
        else if (!$wpdb->get_results($check_both))
        {
            $existsScript = '';
            
            if ($wpdb->get_results($check_email))
            {
                $existsScript .= '
                const pEError = document.createElement("p");
                pEError.classList.add("text-danger");
                pEError.innerText = "There is an applicant with that email already!";
                document.getElementById("emailGroup").appendChild(pEError);
                ';
            }

            if ($wpdb->get_results($check_phone))
            {
                $existsScript .= '
                const eEError = document.createElement("p");
                eEError.classList.add("text-danger");
                eEError.innerText = "There is an applicant with that phone number already!";
                document.getElementById("phoneGroup").appendChild(eEError);
                ';
            }

            echo '
                <script>
                    document.addEventListener("DOMContentLoaded", () => {'
                        .$existsScript.
                    '});
                </script>
            ';
            return;
        }

        $appDataQuery = $wpdb->prepare(
            "SELECT id FROM ".$wpdb->prefix."canopy_applicants WHERE phone=%s AND email=%s",
            array($phone, $email)
        );

        $applicantData = $wpdb->get_results($appDataQuery);

        if (!$applicantData) 
        {
            echo '<script>
                document.addEventListener("DOMContentLoaded", () => {
                    const errorDiv = document.createElement("div");
                    errorDiv.innerHTML = "There was an error in processing your form";
                    errorDiv.classList.add("alert");
                    errorDiv.classList.add("h4");
                    errorDiv.classList.add("bg-danger");
                    errorDiv.classList.add("text-light");
                    document.getElementById("entry_form").appendChild(errorDiv);
                });
            </script>';
            return;
        }

        $applicantID = intval($applicantData[0]->id);

        $dates = '';
        $tableName = '';
        switch ($_POST['date']) {
            case 'saturday':
                $tableName = 'canopy_saturday';
                $dates = 'Saturday 7/8/2023';
                break;
            case 'sunday':
                $tableName = 'canopy_sunday';
                $dates = 'Sunday 7/9/2023';
                break;
            case 'both':
                $tableName = 'canopy_saturday';
                if (!$wpdb->get_results("SELECT id FROM ".$wpdb->prefix."canopy_sunday WHERE applicant_id=$applicantID"))
                {
                    $wpdb->insert(
                        $wpdb->prefix.'canopy_sunday',
                        array(
                            'applicant_id' => $applicantID
                        )
                    );
                }
                $dates = 'Saturday 7/8/2023 and Sunday 7/9/2023';
                break;
            default:
                break;
        }
        if (!$wpdb->get_results("SELECT id FROM ".$wpdb->prefix.$tableName." WHERE applicant_id=$applicantID")) 
        {
            $wpdb->insert(
                $wpdb->prefix.$tableName,
                array(
                    'applicant_id' => $applicantID
                )
            );
        }

        $emailMessage = 
        'Dear '.$name.',

You have successfully entered the Maplewoodstock Canopy Lottery for '.$dates.'.  Lottery results will be announced no later than July 2, 2023.  If you have not received notification of your lottery result by July 3, 2023, please visit '.$site_url.'/canopy-entrance-search to check your results status.
        

Visit maplewoodstock.com/canopy for more information.  If you have further questions, please email us at maplewoodstockcanopies@gmail.com.
        

Thanks! We can’t wait to see you at Maplewoodstock 2023!';

        wp_mail($email, 'Maplewoodstock Canopy Entry Received', $emailMessage);

        wp_redirect(get_site_url()."/form-received");
        exit;
    }
?>