<?php
    function dashboard()
    {
        global $wpdb;
        
        $sat_applicants = $wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."canopy_saturday");
        $sun_applicants = $wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."canopy_sunday");
        $total_applicants = $wpdb->get_var("SELECT COUNT(*) FROM ".$wpdb->prefix."canopy_applicants");
        $site_url = get_site_url();
        return <<<EOD
            <div class="d-flex flex-column">
                <div class="d-flex gap-5 mb-5 justify-content-center">  
                    <span class="border border-dark display-option">
                        <h3 class="text-muted text-center">Applicants</h3>
                        <h3 class="text-center">$total_applicants</h3>
                    </span>
                    <span class="border border-dark display-option">
                        <h3 class="text-muted text-center">Saturday Applicants</h3>
                        <h3 class="text-center">$sat_applicants</h3>
                    </span>
                    <span class="border border-dark display-option">
                        <h3 class="text-muted text-center">Sunday Applicants</h3>
                        <h3 class="text-center">$sun_applicants</h3>
                    </span>
                </div>
                <div class="d-flex gap-5 justify-content-center">  
                    <a href="$site_url/search-entries" class="bg-primary dash-option d-flex rounded">
                        <h1 class="text-center text-light m-auto">
                            <svg width="61" height="39" viewBox="0 0 61 39" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M30.3336 39C21.0928 39 12.3481 35.0848 5.70513 27.976C4.88829 27.1028 4.93596 25.7313 5.80913 24.9145C6.68446 24.0977 8.05379 24.1453 8.87279 25.0185C14.686 31.2412 22.3061 34.6667 30.3336 34.6667C40.6535 34.6667 50.1565 29.0225 55.987 19.5C50.1586 9.9775 40.6535 4.33333 30.3336 4.33333C19.6346 4.33333 9.81096 10.4022 4.05196 20.5682C3.46263 21.6103 2.13663 21.9787 1.09879 21.385C0.0566263 20.7957 -0.307373 19.474 0.28196 18.4318C6.81879 6.89 18.0551 0 30.3336 0C42.6143 0 53.8485 6.89 60.3853 18.4318C60.7601 19.0948 60.7601 19.9052 60.3853 20.566C53.8485 32.1078 42.6143 39 30.3336 39Z" fill="white"/>
                                <path d="M30.3338 30.3333C24.3603 30.3333 19.5005 25.4735 19.5005 19.5C19.5005 13.5265 24.3603 8.66667 30.3338 8.66667C36.3073 8.66667 41.1672 13.5265 41.1672 19.5C41.1672 25.4735 36.3073 30.3333 30.3338 30.3333ZM30.3338 13C26.7502 13 23.8338 15.9163 23.8338 19.5C23.8338 23.0837 26.7502 26 30.3338 26C33.9175 26 36.8338 23.0837 36.8338 19.5C36.8338 15.9163 33.9175 13 30.3338 13Z" fill="white"/>
                            </svg>
                            View Entries
                        </h1>
                    </a>
                    <button class="bg-success dash-option d-flex rounded" id="send">
                        <h2 class="text-center text-light m-auto">
                            <svg width="47" height="47" viewBox="0 0 47 47" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.1905 0C5.02303 0 0 5.02303 0 11.1905V35.8095C0 41.977 5.02303 47 11.1905 47H35.8095C41.977 47 47 41.977 47 35.8095V11.1905C47 5.02303 41.977 0 35.8095 0H11.1905ZM10.0714 13.4286H36.9286C37.13 13.4286 37.32 13.4513 37.499 13.5073L26.4987 24.4967C24.8425 26.1528 22.1466 26.1528 20.4904 24.4967L9.50098 13.5073C9.68002 13.4513 9.87 13.4286 10.0714 13.4286ZM7.91201 15.0962L16.3267 23.5L7.91201 31.9038C7.85606 31.7247 7.83333 31.5348 7.83333 31.3333V15.6667C7.83333 15.4652 7.85606 15.2753 7.91201 15.0962ZM39.088 15.0962C39.1439 15.2753 39.1667 15.4652 39.1667 15.6667V31.3333C39.1667 31.5348 39.1439 31.7247 39.088 31.9038L30.6623 23.5L39.088 15.0962ZM17.9048 25.078L18.9014 26.0856C20.1659 27.3501 21.8329 27.9762 23.4891 27.9762C25.1565 27.9762 26.8122 27.3501 28.0767 26.0856L29.0843 25.078L37.499 33.4927C37.32 33.5487 37.13 33.5714 36.9286 33.5714H10.0714C9.87 33.5714 9.68002 33.5487 9.50098 33.4927L17.9048 25.078Z" fill="white"/>
                            </svg>
                            Send Confirmation
                        </h2>
                    </button>
                    <button class="dash-option d-flex rounded" style="background-color: #8903AB;" id="select">
                        <h2 class="text-center text-light m-auto">
                            <svg width="42" height="48" viewBox="0 0 42 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M33.9611 17.4545C33.9611 23.5527 29.7862 28.6604 24.1429 30.1156V41.4545H30.6884C31.2917 41.4545 31.7793 41.9433 31.7793 42.5455C31.7793 43.1487 31.2917 43.6364 30.6884 43.6364H11.052C10.4488 43.6364 9.96113 43.1487 9.96113 42.5455C9.96113 41.9433 10.4488 41.4545 11.052 41.4545H17.5975V30.1156C11.9542 28.6604 7.77931 23.5527 7.77931 17.4545C3.56185 17.4545 0.142944 14.0356 0.142944 9.81818V7.63636C0.142944 7.03418 0.630581 6.54545 1.23385 6.54545H7.77931V5.45455C7.77931 3.64691 6.31422 2.18182 4.50658 2.18182C3.90331 2.18182 3.41567 1.69309 3.41567 1.09091C3.41567 0.488727 3.90331 0 4.50658 0H37.2338C37.8371 0 38.3248 0.488727 38.3248 1.09091C38.3248 1.69309 37.8371 2.18182 37.2338 2.18182C35.4262 2.18182 33.9611 3.64691 33.9611 5.45455V6.54545H40.5066C41.1099 6.54545 41.5975 7.03418 41.5975 7.63636V9.81818C41.5975 14.0356 38.1786 17.4545 33.9611 17.4545ZM19.7793 41.4545H21.9611V30.4898C21.6011 30.5204 21.2389 30.5455 20.8702 30.5455C20.5015 30.5455 20.1393 30.5204 19.7793 30.4898V41.4545ZM2.32476 8.72727V9.81818C2.32476 12.8313 4.76622 15.2727 7.77931 15.2727V8.72727H2.32476ZM8.84622 2.18182C9.53567 3.096 9.96113 4.22073 9.96113 5.45455V17.4545C9.96113 23.4796 14.8451 28.3636 20.8702 28.3636C26.8942 28.3636 31.7793 23.4796 31.7793 17.4545V5.45455C31.7793 4.22073 32.2048 3.096 32.8942 2.18182H8.84622ZM39.4157 8.72727H33.9611V15.2727C36.9742 15.2727 39.4157 12.8313 39.4157 9.81818V8.72727ZM7.77931 45.8182H33.9611C34.5644 45.8182 35.052 46.3069 35.052 46.9091C35.052 47.5124 34.5644 48 33.9611 48H7.77931C7.17603 48 6.6884 47.5124 6.6884 46.9091C6.6884 46.3069 7.17603 45.8182 7.77931 45.8182Z" fill="white"/>
                            </svg>                        
                            Randomizer
                        </h2>
                    </button>
                </div>
            </div>
            <div class="modal" id="confirm-modal" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        </div>
                        <div class="modal-body">
                            <h1 class="font-weight-bold text-center">Are you sure to you want to send a confirmation email to all winning applicants?</h1>
                            <div class="position-relative" style="height: 50px;">
                                <button class="btn btn-primary search-entries-option text-light rounded position-absolute start-0" id="cancel">
                                    Cancel
                                </button>
                                <button class="btn btn-light search-entries-option text-dark border-dark rounded position-absolute end-0" id="continue">
                                    Continue
                                </button>
                            </div>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal" id="confirmation-sent" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close" id="close-sModal"></button>
                        </div>
                        <div class="modal-body">
                            <h1 class="font-weight-bold">Confirmation Sent!</h1>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal" id="win-modal" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        </div>
                        <div class="modal-body">
                            <h1 class="font-weight-bold text-center">
                                Are you sure you want to assign slots to applicants?
                                <small class="form-text" style="font-size: 16px;">Existing slots will be replaced</small>
                            </h1>
                            <div class="position-relative" style="height: 50px;">
                                <button class="btn btn-primary search-entries-option text-light rounded position-absolute start-0" id="wCancel">
                                    Cancel
                                </button>
                                <button class="btn btn-light search-entries-option text-dark border-dark rounded position-absolute end-0" id="wContinue">
                                    Continue
                                </button>
                            </div>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal" id="winners-selected" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close" id="close-wsModal"></button>
                        </div>
                        <div class="modal-body">
                            <h1 class="font-weight-bold">Slots have been assigned!</h1>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>
            <script>
                const cModal = new bootstrap.Modal(document.getElementById('confirm-modal'), {
                    keyboard: false
                }); 
                
                const sModal = new bootstrap.Modal(document.getElementById('confirmation-sent'), {
                    keyboard: false
                }); 

                const wModal = new bootstrap.Modal(document.getElementById('win-modal'), {
                    keyboard: false
                }); 

                const wsModal = new bootstrap.Modal(document.getElementById('winners-selected'), {
                    keyboard: false
                }); 

                document.getElementById("select").addEventListener("click", () => wModal.show());
                document.getElementById("wCancel").addEventListener("click", () => wModal.hide());
                document.getElementById("close-wsModal").addEventListener("click", () => wsModal.hide());
                document.getElementById("wContinue").addEventListener("click", () => {
                    fetch('$site_url/wp-admin/admin-ajax.php?action=select_winners')
                        .then(() => {
                            wModal.hide();
                            wsModal.show();
                        });
                });
                
                document.getElementById("send").addEventListener("click", () => cModal.show());
                document.getElementById("cancel").addEventListener("click", () => cModal.hide());
                document.getElementById("close-sModal").addEventListener("click", () => sModal.hide());
                document.getElementById("continue").addEventListener("click", () => {
                    fetch('$site_url/wp-admin/admin-ajax.php?action=send_confirmation')
                        .then(() => {
                            cModal.hide();
                            sModal.show();
                        });
                });
            </script>
        EOD;
    }

    function send_confirmation()
    {
        global $wpdb;

        $sat_table = $wpdb->prefix."canopy_saturday";
        $sun_table = $wpdb->prefix."canopy_sunday";
        $app_table = $wpdb->prefix."canopy_applicants";
        
        $sat_entries = $wpdb->get_results("SELECT ".$sat_table.".slot, ".$app_table.".name, ".$app_table.".address, ".$app_table.".email, ".$app_table.".town, ".$app_table.".phone, ".$sat_table.".confirmation_status, ".$sat_table.".arrival_time, ".$sat_table.".win_status, ".$sat_table.".applicant_id, ".$sat_table.".id FROM ".$sat_table." INNER JOIN ".$app_table." ON ".$sat_table.".applicant_id=".$app_table.".id WHERE ".$sat_table.".win_status='WIN'");

        $sun_entries = $wpdb->get_results("SELECT ".$sun_table.".slot, ".$app_table.".name, ".$app_table.".address, ".$app_table.".email, ".$app_table.".town, ".$app_table.".phone, ".$sun_table.".confirmation_status, ".$sun_table.".arrival_time, ".$sun_table.".win_status, ".$sun_table.".applicant_id, ".$sun_table.".id FROM ".$sun_table." INNER JOIN ".$app_table." ON ".$sun_table.".applicant_id=".$app_table.".id WHERE ".$sun_table.".win_status='WIN'");

        foreach($sat_entries as $entry)
        {
            message_formatter($entry, "saturday");
        }

        foreach($sun_entries as $entry)
        {
            message_formatter($entry, "sunday");
        }
    }

    function message_formatter($entry, $day)
    {
        $site_url = get_site_url();
        
        $message = "
Dear {name},
Congratulations! You have won the Maplewoodstock Canopy Lottery for a canopy location on {day}! If you entered the lottery for multiple days, you will receive a separate notification for each day of the festival. Please read this entire email as action is required to confirm your attendance at the event.
        
You are {slot} in the lottery for that day and must arrive at {arrival_time} to set up your canopy.
        
The address we have on record for your entry is: {address} in {town}.
        
PLEASE COMPLETE THIS CONFIRMATION FORM NO LATER THAN JULY 6, 2024 TO CONFIRM YOUR ACCEPTANCE OF THE CANOPY LOCATION AND THE LOTTERY RULES:

{link_to_confirmation_form}
        
Failure to respond will forfeit your canopy location.
        
FOR ANY QUESTIONS, PLEASE REFER TO OUR FAQ
maplewoodstock.com/faq/canopy-space-crowd-policy";

        $fDay = $day == "saturday" ? "Saturday, 7/13/24" : "Sunday, 7/14/24";

        $en_e_id = openssl_encrypt($entry->id, CIPHER, KEY);
        $en_a_id = openssl_encrypt($entry->applicant_id, CIPHER, KEY);

        $message = str_replace("{name}", $entry->name, $message);
        $message = str_replace("{address}", $entry->address, $message);
        $message = str_replace("{town}", $entry->town, $message);
        $message = str_replace("{slot}", $entry->slot, $message);
        $message = str_replace("{arrival_time}", $entry->arrival_time, $message);
        $message = str_replace("{day}", $fDay, $message);
        $message = str_replace("{link_to_confirmation_form}", "$site_url/confirmation-form?a_id=$en_a_id&e_id=$en_e_id&day=$day", $message);

        wp_mail($entry->email, "You won!", $message);
    }

    function select_winners()
    {
        global $wpdb;

        $sat_entries = $wpdb->get_results("SELECT id FROM ".$wpdb->prefix."canopy_saturday ORDER BY RAND()");
        $sun_entries = $wpdb->get_results("SELECT id FROM ".$wpdb->prefix."canopy_sunday ORDER BY RAND()");
        $num = 1;

        foreach($sat_entries as $entry)
        {
            $wpdb->update(
                $wpdb->prefix."canopy_saturday",
                array(
                    'slot' => $num
                ),
                array(
                    'id' => $entry->id
                )
            );
            $num++;
        }

        $num = 1;

        foreach($sun_entries as $entry)
        {
            $wpdb->update(
                $wpdb->prefix."canopy_sunday",
                array(
                    'slot' => $num
                ),
                array(
                    'id' => $entry->id
                )
            );
            $num++;
        }
    }
?>