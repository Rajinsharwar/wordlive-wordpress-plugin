<?php
/**
 * Plugin Name: WordLive | Livecall Addon for Woocommerce
 * Description: Add Livecall option in your Woocommerce store between Buyer and Seller. 
 * Author: Rajin Sharwar
 * Author URI: https://linkedin.com/in/rajinsharwar
 * Version: 1.0.1
 * Text Domain: wordlive
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}


define( 'WORDLIVE_PLUGINLINK', plugin_dir_url(__FILE__) );
define( 'WORDLIVE_PLUGINPATH', __DIR__ );
define( 'WORDLIVE_PLUGINNAME', "WordLive" );
define( 'WORDLIVE_PLUGIN_PREFIX', "wordlive" );

//add settings link on plugin row
add_filter('plugin_action_links_'.plugin_basename(__FILE__), 'wordlive_add_plugin_page_settings_link');
function wordlive_add_plugin_page_settings_link( $links ) {
    $links[] = '<a href="' .
        admin_url( 'admin.php?page=WordLive' ) .
        '">' . __('Settings') . '</a>';
    return $links;
}


//on plugin activation, redirect admin 
function wordlive_activation_redirect( $plugin ) {
    if( $plugin == plugin_basename( __FILE__ ) ) {
        exit( wp_redirect( admin_url( 'admin.php?page=WordLive' ) ) );
    }
}
add_action( 'activated_plugin', 'wordlive_activation_redirect' );

require  WORDLIVE_PLUGINPATH . '/admin/functions.php';
require  WORDLIVE_PLUGINPATH . '/admin/register.php';
require  WORDLIVE_PLUGINPATH . '/admin/settings.php';