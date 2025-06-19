<?php
    function user_search()
    {
        return <<<EOD
            <form method="post" id="user_search_form">
                <div class="form-group m-1" id="emailGroup">
                    <label for="applicant-email"><p class="font-weight-bold m-0">Email Address:</p></label>
                    <input type="email" name="applicant-email" class="form-control border-dark" placeholder="Enter email address">
                </div>
                <div class="form-group m-1" id="phoneGroup">
                    <label for="phone"><p class="font-weight-bold m-0">Phone Number:</p></label>
                    <input type="text" name="phone" class="form-control border-dark" placeholder="Enter phone number" maxlength="10" pattern="[0-9]{10}">
                </div>
                <div class="row">
                    <div class="col text-center">
                        <button type="submit" class="btn btn-primary bg-warning font-weight-bold m-1 btn-lg" name="search_users">
                            <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.5784 0C6.07159 0 0 6.07159 0 13.5784C0 21.0852 6.07159 27.1568 13.5784 27.1568C16.2585 27.1568 18.7389 26.3706 20.8418 25.0352L30.6512 34.8446L34.0458 31.45L24.3612 21.7903C26.1022 19.5065 27.1568 16.6766 27.1568 13.5784C27.1568 6.07159 21.0852 0 13.5784 0ZM13.5784 3.19492C19.3286 3.19492 23.9619 7.82817 23.9619 13.5784C23.9619 19.3286 19.3286 23.9619 13.5784 23.9619C7.82817 23.9619 3.19492 19.3286 3.19492 13.5784C3.19492 7.82817 7.82817 3.19492 13.5784 3.19492Z" fill="white"/>
                            </svg>
                            Search
                        </button>
                    </div>
                </div>
            </form>
        EOD;
    }

    function user_search_capture()
    {
        global $wpdb;

        if (!array_key_exists('search_users', $_POST))
        {
            return;
        }

        $phone = filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT);
        $email = filter_var($_POST['applicant-email'], FILTER_SANITIZE_EMAIL);

        $phoneNull = $phone === '' ? true : false;
        $emailNull = $email === '' ? true : false;

        $email_query = $wpdb->prepare(
            "SELECT id FROM ".$wpdb->prefix."canopy_applicants WHERE email=%s",
            $email
        );

        $phone_query = $wpdb->prepare(
            "SELECT id FROM ".$wpdb->prefix."canopy_applicants WHERE phone=%s",
            $phone
        );

        $emailApp = $wpdb->get_results($email_query);
        $phoneApp = $wpdb->get_results($phone_query);
        $script = '';
        $error = false;

        if (!$emailApp && !$phoneApp)
        {
            $script .= '
                const errorDiv = document.createElement("div");
                errorDiv.innerHTML = "It seems we dont have an entry with either that email or phone number!";
                errorDiv.classList.add("alert");
                errorDiv.classList.add("h4");
                errorDiv.classList.add("bg-danger");
                errorDiv.classList.add("text-light");
                document.getElementById("user_search_form").appendChild(errorDiv);
            ';
            $error = true;
        }
        else if (!$emailApp && $phoneApp && !$emailNull)
        {
            $script .= '
                const errorDiv = document.createElement("div");
                errorDiv.innerHTML = "It seems we have an entry with that phone number but not email!";
                errorDiv.classList.add("alert");
                errorDiv.classList.add("h4");
                errorDiv.classList.add("bg-danger");
                errorDiv.classList.add("text-light");
                document.getElementById("user_search_form").appendChild(errorDiv);
            ';
            $error = true;
        }
        else if ($emailApp && !$phoneApp && !$phoneNull)
        {
            $script .= '
                const errorDiv = document.createElement("div");
                errorDiv.innerHTML = "It seems we have an entry with that email but not phone number!";
                errorDiv.classList.add("alert");
                errorDiv.classList.add("h4");
                errorDiv.classList.add("bg-danger");
                errorDiv.classList.add("text-light");
                document.getElementById("user_search_form").appendChild(errorDiv);
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

        $phoneId;
        $emailId;

        if ($phoneNull)
        {
            $emailId = $emailApp[0]->id;
            $phoneId = $emailId;
        }
        else if ($emailNull)
        {
            $phoneId = $phoneApp[0]->id;
            $emailId = $phoneId;
        }
        else 
        {
            $phoneId = $phoneApp[0]->id;
            $emailId = $emailApp[0]->id;
        }


        if ($phoneId != $emailId)
        {
            echo '
                <script>
                    document.addEventListener("DOMContentLoaded", () => {
                        const errorDiv = document.createElement("div");
                        errorDiv.innerHTML = "It seems we have two different entries associated with that phone number and email!";
                        errorDiv.classList.add("alert");
                        errorDiv.classList.add("h4");
                        errorDiv.classList.add("bg-danger");
                        errorDiv.classList.add("text-light");
                        document.getElementById("user_search_form").appendChild(errorDiv);
                    });
                </script>
            ';
            return;
        }

        $satData = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."canopy_saturday WHERE applicant_id=".$phoneId);
        $sunData = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."canopy_sunday WHERE applicant_id=".$phoneId);

        $satRet = '';
        $sunRet = '';

        if ($satData)
        {
            $satRet = check($satData[0], 'saturday');
        }
        
        if($sunData)
        {
            $sunRet = check($sunData[0], 'sunday');
        }

        echo '
            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    '.$satRet.'
                    '.$sunRet.'
                });
            </script>
        ';
    }

    function check($data, $day)
    {
        $message = '';
        $date = $day === 'saturday' ? 'Saturday, July 13, 2024' : 'Sunday, July 14, 2024';

        $win_status = $data->win_status !== null ? $data->win_status : 'Undecided';

        if ($win_status === 'Win' && !$data->confirmation_status)
        {
            $message = 'You have won a slot for '.$date.' check your email to confirm your attendance.\n';
        }
        else if ($win_status === 'Win' && $data->confirmation_status)
        {
            $message = 'You have won a slot for '.$date.' and confirmed your attendance. See you there!\n';
        }
        else if ($win_status === 'Waitlisted' && !$data->confirmation_status)
        {
            $message = 'You have been waitlisted for '.$date.'. Check your email to confirm that you will attend if you are taken off the waitlist.\n';
        }
        else if ($win_status === 'Waitlisted' && $data->confirmation_status)
        {
            $message = 'You have been waitlisted for '.$date.' and confirmed that you will attend if you are taken off the waitlist.\n';
        }
        else
        {
            $message = 'Your status for '.$date.' is:\n'.$win_status.'\n';
        }
        
        return '
            const '.$day.'h1 = document.createElement("h1");
            const '.$day.'message = document.createTextNode(`'.$message.'`);
            '.$day.'h1.appendChild('.$day.'message);
            '.$day.'h1.classList.add("font-weight-bold");
            document.getElementById("user_search_form").appendChild('.$day.'h1);
        ';
    }
?>