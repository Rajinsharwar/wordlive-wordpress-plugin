<?php
/**
 * Plugin Name: WordLive | Livecall Addon for Woocommerce
 * Description: Add Livecall option in your Woocommerce store between Buyer and Seller. 
 * Author: Rajin Sharwar
 * Author URI: https://linkedin.com/in/rajinsharwar
 * Version: 1.2.1
 * Text Domain: wordlive
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! function_exists( 'wordlive_track' ) ) {
    // Create a helper function for easy SDK access.
    function wordlive_track() {
        global $wordlive_track;

        if ( ! isset( $wordlive_track ) ) {
            // Include Freemius SDK.
            require_once dirname(__FILE__) . '/includes/start.php';

            $wordlive_track = fs_dynamic_init( array(
                'id'                  => '11520',
                'slug'                => 'wordlive-livecall-addon-for-woocommerce',
                'type'                => 'plugin',
                'public_key'          => 'pk_858951207521264c49ac24d55ffe1',
                'is_premium'          => false,
                'has_addons'          => false,
                'has_paid_plans'      => false,
                'menu'                => array(
                    'slug'           => 'WordLive',
                    'first-path'     => 'admin.php?page=WordLive',
                    'account'        => false,
                    'support'        => false,
                ),
            ) );
        }

        return $wordlive_track;
    }

    // Init Freemius.
    wordlive_track();
    // Signal that SDK was initiated.
    do_action( 'wordlive_track_loaded' );
}
 
// on update
     
function wordlive_track_custom_connect_message_on_update(
    $message,
    $user_first_name,
    $product_title,
    $user_login,
    $site_link,
    $freemius_link
) {
    return sprintf(
        __( 'Thanks for updating our plugin to the latest version.</br> Would you mind allow us to collect some non-sensitive data so that we can further improve your experiance with our plugin? </br>You can choose to Opt-Out anytime!!', 'my-text-domain' ),
        $user_first_name,
        '<b>' . $product_title . '</b>',
        '<b>' . $user_login . '</b>',
        $site_link,
        $freemius_link
    );
}
 
wordlive_track()->add_filter( 'connect_message_on_update', 'wordlive_track_custom_connect_message_on_update', 10, 6 );

//on install

     
function wordlive_track_custom_connect_message(
    $message,
    $user_first_name,
    $product_title,
    $user_login,
    $site_link,
    $freemius_link
) {
    return sprintf(
        __( 'Please help us improve your experiance by allowing some non-sensitive data to be collected. Click on "Allow & Continue below" so that we can collect some data that will help us release more bug fixes, and security patches. You can Opt-Out anytime!!', 'my-text-domain' ),
        $user_first_name,
        '<b>' . $product_title . '</b>',
        '<b>' . $user_login . '</b>',
        $site_link,
        $freemius_link
    );
}
 
wordlive_track()->add_filter( 'connect_message', 'wordlive_track_custom_connect_message', 10, 6 );


// if( !class_exists('Woocommerce')) {
//     function wordlive_admin_notice(){
//     echo '<div class="error"><p>WordLive plugin is activated, but will not function as Woocommerce plugin is not activated properly. Please install and activate the Woocommerce plugin for WordLive to work. </p>
//          </div>';
//     }
//     add_action('admin_notices', 'wordlive_admin_notice');

//     function wordlive_activation_redirect_nowoo( $plugin ) {
//         if( $plugin == plugin_basename( __FILE__ ) ) {
//         exit( wp_redirect( admin_url( '#' ) ) );
//         }
//     }
//     add_action( 'activated_plugin', 'wordlive_activation_redirect_nowoo' );

// }

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