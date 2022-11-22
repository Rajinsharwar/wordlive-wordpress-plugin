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
$wpdb -> query( "DELETE FROM wp_options WHERE option_name LIKE ('wordlive_%') ");