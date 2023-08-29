<?php
    function database_creation()
    {
        global $wpdb;


        $wpdb->get_results("
        CREATE TABLE ".$wpdb->prefix."canopy_applicants (
            id int NOT NULL AUTO_INCREMENT,
            name varchar(255) NOT NULL,
            address varchar(255) NOT NULL,
            email varchar(320) NOT NULL,
            town varchar(12) NOT NULL CHECK (Town IN ('Maplewood', 'South Orange')),
            phone char(10) NOT NULL,
            PRIMARY KEY (ID)
        )");
        
        $wpdb->get_results(get_day_query("saturday"));
        $wpdb->get_results(get_day_query("sunday"));
    }

    function get_day_query($day)
    {
        global $wpdb;
        
        return "
        CREATE TABLE ".$wpdb->prefix."canopy_".$day." (
            id int NOT NULL AUTO_INCREMENT,
            applicant_id int NOT NULL,
            slot int,
            arrival_time varchar(8) CHECK (Arrival_Time IN ('9:00 AM', '9:15 AM', '9:30 AM', '9:45 AM', '10:00 AM', '10:15 AM')),
            win_status varchar(12) CHECK (Win_Status IN ('Waitlisted', 'Win', 'Lose', 'Declined')),
            confirmation_status BIT,
            PRIMARY KEY (id),
            FOREIGN KEY (applicant_id) REFERENCES ".$wpdb->prefix."canopy_applicants(id)
        )";
    }
?>