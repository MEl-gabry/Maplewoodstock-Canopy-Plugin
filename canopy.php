<?php
/** 
*Plugin Name: Canopy 
*Description: Plugin for Maplewoodstock Canopy System.
*Author: Marwan El-Gabry
**/
    require_once "entry_form.php";
    require_once "css.php";
    require_once "dashboard.php";
    require_once "search_entries.php";
    require_once "confirmation_form.php";
    require_once "user_search.php";
    require_once "db.php";
    require_once "paypal.php";

    register_activation_hook(__FILE__, 'database_creation');

    add_action('init', 'use_paypal_webhook');
    add_action('wp_head', 'user_search_capture');
    add_action('wp_head', 'entry_form_capture');
    add_action('wp_head', 'enqueue_paypal_sdk');
    add_action('wp_loaded', 'confirmation_form_capture');
    add_shortcode('canopy_entry_form', 'entry_form');
    add_action('wp_head', 'canopy_css');
    add_shortcode('canopy_user_search', 'user_search');
    add_shortcode('canopy_dashboard', 'dashboard');
    add_shortcode('canopy_filter', 'search_entries_filter');
    add_shortcode('canopy_table', 'search_entries_table');
    add_shortcode('canopy_confirmation_form', 'confirmation_form');
    add_action('wp_ajax_table_response', 'table_response');
    add_action('wp_ajax_get_rows_count', 'get_rows_count');
    add_action('wp_ajax_apply_changes', 'apply_changes');
    add_action('wp_ajax_spreadsheet', 'spreadsheet');
    add_action('wp_ajax_send_message', 'send_message');
    add_action('wp_ajax_delete_entries', 'delete_entries');
    add_action('wp_ajax_send_confirmation', 'send_confirmation');
    add_action('wp_ajax_select_winners', 'select_winners');
?>