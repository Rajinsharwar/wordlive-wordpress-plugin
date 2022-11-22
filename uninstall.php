<?php

/** Trigger this file when plugin is Uninstalled

*/


if ( ! defined( 'WP_UNINSTALL_PLUGIN' )){
	die;
}

global $wpdb;
$wpdb -> query( "DELETE FROM wp_options WHERE option_name LIKE ('livecall_%') or (option_name REGEXP 'enable_shop_page_btn') or (option_name REGEXP 'button_loc_shop_page') or (option_name REGEXP 'enable_product_details_page_btn') or (option_name REGEXP 'button_loc_product_details_page') or (option_name REGEXP 'guestlogin_enable') or (option_name REGEXP 'loginpage_slug') or (option_name REGEXP 'howtojoinpage_slug') or (option_name REGEXP 'seller_email_subject') or (option_name REGEXP 'seller_email_temp')" );