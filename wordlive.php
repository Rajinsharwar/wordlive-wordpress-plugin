<?php
/**
 * Plugin Name: WordLive | Livecall Addon for Woocommerce
 * Description: Add Livecall option in your Woocommerce store between Buyer and Seller. 
 * Author: Rajin Sharwar
 * Author URI: https://linkedin.com/in/rajinsharwar
 * Version: 1.0.0
 * Text Domain: wordlive
 */


define( 'PLUGINLINK', plugin_dir_url(__FILE__) );
define( 'PLUGINPATH', __DIR__ );
define( 'PLUGINNAME', "WordLive" );
define( 'PLUGIN_PREFIX', "wordlive" );

//add settings link on plugin row
add_filter('plugin_action_links_'.plugin_basename(__FILE__), 'woolive_add_plugin_page_settings_link');
function woolive_add_plugin_page_settings_link( $links ) {
    $links[] = '<a href="' .
        admin_url( 'admin.php?page=WordLive' ) .
        '">' . __('Settings') . '</a>';
    return $links;
}


//on plugin activation, redirect admin 
function woolive_activation_redirect( $plugin ) {
    if( $plugin == plugin_basename( __FILE__ ) ) {
        exit( wp_redirect( admin_url( 'admin.php?page=WordLive' ) ) );
    }
}
add_action( 'activated_plugin', 'woolive_activation_redirect' );

require  PLUGINPATH . '/admin/functions.php';
require  PLUGINPATH . '/admin/register.php';
require  PLUGINPATH . '/admin/settings.php';