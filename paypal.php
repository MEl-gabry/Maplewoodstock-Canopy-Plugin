<?php
    function enqueue_paypal_sdk()
    {
        ?>
        <script src="https://www.paypal.com/sdk/js?client-id=AZDJdwHojIhxfAZgJs59P3a16lNzVJj3BE_ImQKXwZC5Wmbvc3UvrzEI0X8c32KV95mVXzHBAOjxIBYx&currency=USD"></script>
        <?php
    }

    function handle_paypal_webhook()
    {
        $raw_post_data = file_get_contents('php://input');
        $json_data = json_decode($raw_post_data, true);
    
        if ($json_data['event_type'] == 'PAYMENT.CAPTURE.COMPLETED') 
        {
            $transaction_id = $json_data['resource']['id'];
    
            $applicant_id = $json_data['resource']['custom_id'];
    
            if ($transaction_id && $applicant_id) 
            {
                global $wpdb;
                
                $query = $wpdb->prepare(
                    "UPDATE ".$wpdb->prefix."canopy_applicants SET payment_confirmed=TRUE, paypal_transaction_id=%s WHERE id=%d",
                    array($transaction_id, $applicant_id)
                );

                $wpdb->get_results($query);
            }
        }
        http_response_code(200);
        exit;
    }

    function use_paypal_webhook()
    {
        if (strpos($_SERVER['REQUEST_URI'], '/paypal-webhook') !== false) 
        {
            handle_paypal_webhook();
        }
    }
?>