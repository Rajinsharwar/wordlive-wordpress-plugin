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
$wordlive_uninstall_sql = 'DELETE FROM ' . $wpdb->options . ' WHERE option_name LIKE "wordlive_%"'; 
$wpdb->query($wordlive_uninstall_sql);
