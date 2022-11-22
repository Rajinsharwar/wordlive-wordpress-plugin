<?php

/** Trigger this file when plugin is Uninstalled

*/

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! defined( 'WP_UNINSTALL_PLUGIN' )){
	die;
}

global $wpdb;
$wpdb -> query( "DELETE FROM wp_options WHERE option_name LIKE ('livecall_%') or (option_name REGEXP 'wordlive_enable_shop_page_btn') or (option_name REGEXP 'wordlive_button_loc_shop_page') or (option_name REGEXP 'wordlive_enable_product_details_page_btn') or (option_name REGEXP 'wordlive_button_loc_product_details_page') or (option_name REGEXP 'wordlive_guestlogin_enable') or (option_name REGEXP 'wordlive_loginpage_slug') or (option_name REGEXP 'wordlive_howtojoinpage_slug') or (option_name REGEXP 'wordlive_seller_email_subject') or (option_name REGEXP 'wordlive_seller_email_temp')" );