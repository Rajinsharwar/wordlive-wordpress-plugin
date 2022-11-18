<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

if( is_plugin_active( "dokan-lite/dokan.php" ) ){

    add_filter( 'dokan_query_var_filter', 'wordlive_dokan_load_document_menu' );
    function wordlive_dokan_load_document_menu( $query_vars ) {
        $query_vars['how_to_join_call'] = 'how_to_join_call';
        return $query_vars;
    }

    add_filter( 'dokan_get_dashboard_nav', 'wordlive_dokan_add_help_menu' );
    function wordlive_dokan_add_help_menu( $urls ) {
        $urls['how_to_join_call'] = array(
            'title' => __( 'How to join call?', 'dokan'),
            'icon'  => '<i class="fa fa-info-circle"></i>',
            'url'   => home_url( get_option('howtojoinpage_slug') ), //dokan_get_navigation_url( 'how_to_join_call' )
            'pos'   => 51
        );
        return $urls;
    }

    // add_action( 'dokan_load_custom_template', 'dokan_load_template' );
    // function dokan_load_template( $query_vars ) {
    //     if ( isset( $query_vars['how_to_join_call'] ) || is_page('how-to-join-call') ) {
    //         require_once PLUGINPATH . '/templates/how_to_join_call.php';
    //     }
    // }

    /*Extra field on the seller settings and show the value on the store banner -Dokan*/

    // Add extra field in seller settings

    add_filter( 'dokan_settings_form_bottom', 'wordlive_extra_fields', 10, 2);

    function wordlive_extra_fields( $current_user, $profile_info ){
        $watchlive_from = isset( $profile_info['watchlive_from'] ) ? $profile_info['watchlive_from'] : '';
        $watchlive_to = isset( $profile_info['watchlive_to'] ) ? $profile_info['watchlive_to'] : '';
        ?>
        <div class="gregcustom dokan-form-group">
            <label class="dokan-w3 dokan-control-label" for="reg_watchlive_from">
                <?php _e( 'Watch live (from)', 'dokan' ); ?>
            </label>
            <div class="dokan-w5">
                <input type="text" class="dokan-form-control input-md valid" name="watchlive_from" id="reg_watchlive_from" value="<?php echo esc_attr($watchlive_from); ?>" />
            </div>
        </div>
        <div class="gregcustom dokan-form-group">
            <label class="dokan-w3 dokan-control-label" for="reg_watchlive_to">
                <?php _e( 'Watch live (to)', 'dokan' ); ?>
            </label>
            <div class="dokan-w5">
                <input type="text" class="dokan-form-control input-md valid" name="watchlive_to" id="reg_watchlive_to" value="<?php echo esc_attr($watchlive_to); ?>" />
            </div>
        </div>
        <?php
    }

    //save the field value

    add_action( 'dokan_store_profile_saved', 'wordlive_save_extra_fields', 15 );
    function wordlive_save_extra_fields( $store_id ) {
        $dokan_settings = dokan_get_store_info($store_id);
        if ( isset( $_POST['watchlive_from'] ) ) {

            $dokan_settings['watchlive_from'] = sanitize_text_field($_POST['watchlive_from']);
        }
        if ( isset( $_POST['watchlive_to'] ) ) {
            $dokan_settings['watchlive_to'] = sanitize_text_field($_POST['watchlive_to']);
        }
        update_user_meta( $store_id, 'dokan_profile_settings', $dokan_settings );
    }

    // show on the store page

    add_action( 'dokan_store_header_info_fields', 'wordlive_save_seller_url', 10);

    function wordlive_save_seller_url($store_user){

        // echo $store_user;
        $store_info = dokan_get_store_info($store_user);

        $watchlive = [];

        if ( isset( $store_info['watchlive_from'] ) && !empty( $store_info['watchlive_from'] ) ) {
            $watchlive[] = esc_html( $store_info['watchlive_from'] );
        } 

        if ( isset( $store_info['watchlive_to'] ) && !empty( $store_info['watchlive_to'] ) ) {
            $watchlive[] = esc_html( $store_info['watchlive_to'] );
        }

        // echo implode(" - ", $watchlive);

    }

}

//init
add_action('init', 'wordlive_addpage_func');
function wordlive_addpage_func(){

    $save_settings = get_option('save_settings');

    if( $save_settings != '1' ){

        update_option('enable_shop_page_btn', '1');
        update_option('button_loc_shop_page', 'woocommerce_loop_add_to_cart_link');

        update_option('enable_product_details_page_btn', '1');
        update_option('button_loc_product_details_page', 'woocommerce_after_add_to_cart_button');

        update_option( 'guestlogin_enable', 'no' );

        update_option( 'loginpage_slug', 'my-account' );
        update_option( 'livecall_slug', "live-call" );
        update_option( 'howtojoinpage_slug', "how-to-join-call" );

        update_option( 'livecall_btn_text', "Watch live sample" );

        //Button Style
        update_option( 'livecall_btn_width', 'auto' );
        update_option( 'livecall_btn_height', 'auto' );

        update_option( 'livecall_btn_margin_type', 'px' );
        update_option( 'livecall_btn_margin_top', '10' );
        update_option( 'livecall_btn_margin_right', 'auto' );
        update_option( 'livecall_btn_margin_bottom', 'auto' );
        update_option( 'livecall_btn_margin_left', 'auto' );

        update_option( 'livecall_btn_padding_type', 'px' );
        update_option( 'livecall_btn_padding_top', '10' );
        update_option( 'livecall_btn_padding_right', '20' );
        update_option( 'livecall_btn_padding_bottom', '10' );
        update_option( 'livecall_btn_padding_left', '20' );

        update_option( 'livecall_btn_textalign', 'center' );
        update_option( 'livecall_btn_font_size', '14px' );
        update_option( 'livecall_btn_fontfamily', 'inherit' );
        update_option( 'livecall_btn_text_color', '#FFFFFF' );
        update_option( 'livecall_btn_border_width', '1px' );
        update_option( 'livecall_btn_border_color', '#FFFFFF' );
        update_option( 'livecall_btn_border_radius', '5px' );
        update_option( 'livecall_btn_bg_color', '#27A0B7' );

        //Button Style (On hover state)
        update_option( 'livecall_btn_font_size_hover', '14px' );
        update_option( 'livecall_btn_text_color_hover', '#FFFFFF' );
        update_option( 'livecall_btn_border_width_hover', '1px' );
        update_option( 'livecall_btn_border_color_hover', '#FFFFFF' );
        update_option( 'livecall_btn_border_radius_hover', '5px' );
        update_option( 'livecall_btn_bg_color_hover', '#000000' );

        //eamil template
        update_option( 'seller_email_subject', 'Sample watching request' );
        update_option( 'seller_email_temp', 'Hello {seller_name},<BR><BR>Good News. Somebody wants to view your product on Live. Please click on the below link and attend with the customer.<BR>{video_link}<BR><BR>Regards,<BR>'.WORDLIVE_PLUGINNAME.' Team' );

    }

    $new_page_title = __('Live Call');
    $new_page_content = '';
    $new_page_template = '';
    $page_check = get_page_by_title($new_page_title);
    $new_page = array(
            'post_type' => 'page',
            'post_title' => $new_page_title,
            'post_content' => $new_page_content,
            'post_status' => 'publish',
            'post_author' => 1,
            'post_slug' => 'live-call'
    );
    if( !isset($page_check->ID) ){
        $new_page_id = wp_insert_post($new_page);
        if(!empty($new_page_template)){
            update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
        }
        if( $new_page_id ){
            update_option( 'livecall_slug', "live-call" );
        }
    }

    $new_page_titlee = __('How to join call?');
    $new_page_contentt = 'You can join call by clicking on Watch live button on shop page or product details page, and it will open calling window. If seller didnt joined, seller will get an email somebody wants to watch product live.';
    $new_page_templatee = '';
    $page_checkk = get_page_by_title($new_page_titlee);
    $new_pagee = array(
            'post_type' => 'page',
            'post_title' => $new_page_titlee,
            'post_content' => $new_page_contentt,
            'post_status' => 'publish',
            'post_author' => 1,
            'post_slug' => 'how-to-join-call'
    );
    if( !isset($page_checkk->ID) ){
        $new_page_idd = wp_insert_post($new_pagee);
        if(!empty($new_page_templatee)){
            update_post_meta($new_page_idd, '_wp_page_template', $new_page_templatee);
        }
        if( $new_page_idd ){
            update_option( 'howtojoinpage_slug', "how-to-join-call" );
        }
    }

}


//css file
add_action('wp_enqueue_scripts', 'wordlive_loading_assets_func');
function wordlive_loading_assets_func(){

    wp_enqueue_style( WORDLIVE_PLUGINNAME.'-css', WORDLIVE_PLUGINLINK . "/assets/css/style.css" );

    //normal state..
    $livecall_btn_margin_type = get_option("livecall_btn_margin_type");
    if( empty(trim($livecall_btn_margin_type)) ){
        $livecall_btn_margin_type = "px";
    }
    
    $livecall_btn_margin_top = get_option("livecall_btn_margin_top");
    if( empty(trim($livecall_btn_margin_top)) ){
        $livecall_btn_margin_top = "auto";
    }
    $livecall_btn_margin_right = get_option("livecall_btn_margin_right");
    if( empty(trim($livecall_btn_margin_right)) ){
        $livecall_btn_margin_right = "auto";
    }
    $livecall_btn_margin_bottom = get_option("livecall_btn_margin_bottom");
    if( empty(trim($livecall_btn_margin_bottom)) ){
        $livecall_btn_margin_bottom = "auto";
    }
    $livecall_btn_margin_left = get_option("livecall_btn_margin_left");
    if( empty(trim($livecall_btn_margin_left)) ){
        $livecall_btn_margin_left = "auto";
    }

    
    $livecall_btn_padding_type = get_option("livecall_btn_padding_type");
    if( empty(trim($livecall_btn_padding_type)) ){
        $livecall_btn_padding_type = "px";
    }

    $livecall_btn_padding_top = get_option("livecall_btn_padding_top");
    if( empty(trim($livecall_btn_padding_top)) ){
        $livecall_btn_padding_top = "0";
    }
    $livecall_btn_padding_right = get_option("livecall_btn_padding_right");
    if( empty(trim($livecall_btn_padding_right)) ){
        $livecall_btn_padding_right = "0";
    }
    $livecall_btn_padding_bottom = get_option("livecall_btn_padding_bottom");
    if( empty(trim($livecall_btn_padding_bottom)) ){
        $livecall_btn_padding_bottom = "0";
    }
    $livecall_btn_padding_left = get_option("livecall_btn_padding_left");
    if( empty(trim($livecall_btn_padding_left)) ){
        $livecall_btn_padding_left = "0";
    }

    $livecall_btn_textalign = get_option('livecall_btn_textalign');
    if( empty(trim($livecall_btn_textalign)) ){
        $livecall_btn_textalign = "center";
    }

    $livecall_btn_font_size = get_option('livecall_btn_font_size');
    $livecall_btn_text_color = get_option('livecall_btn_text_color');
    if( empty(trim($livecall_btn_text_color)) ){
        $livecall_btn_text_color = "#FFFFFF";
    }
    $livecall_btn_border_width = get_option('livecall_btn_border_width');
    $livecall_btn_border_color = get_option('livecall_btn_border_color');
    if( empty(trim($livecall_btn_border_color)) ){
        $livecall_btn_border_color = "#FFFFFF";
    }
    $livecall_btn_border_radius = get_option('livecall_btn_border_radius');
    $livecall_btn_bg_color = get_option('livecall_btn_bg_color');
    if( empty(trim($livecall_btn_bg_color)) ){
        $livecall_btn_bg_color = "#27A0B7";
    }

    //hover state..
    $livecall_btn_font_size_hover = get_option('livecall_btn_font_size_hover');
    $livecall_btn_text_color_hover = get_option('livecall_btn_text_color_hover');
    if( empty(trim($livecall_btn_text_color_hover)) ){
        $livecall_btn_text_color_hover = "#FFFFFF";
    }
    $livecall_btn_border_width_hover = get_option('livecall_btn_border_width_hover');
    $livecall_btn_border_color_hover = get_option('livecall_btn_border_color_hover');
    if( empty(trim($livecall_btn_border_color_hover)) ){
        $livecall_btn_border_color_hover = "#FFFFFF";
    }
    $livecall_btn_border_radius_hover = get_option('livecall_btn_border_radius_hover');
    $livecall_btn_bg_color_hover = get_option('livecall_btn_bg_color_hover');
    if( empty(trim($livecall_btn_bg_color_hover)) ){
        $livecall_btn_bg_color_hover = "#000000";
    }

    $livecall_btn_width = get_option("livecall_btn_width");
    if( empty(trim($livecall_btn_width)) ){
        $livecall_btn_width = "auto";
    }
    $livecall_btn_height = get_option("livecall_btn_height");
    if( empty(trim($livecall_btn_height)) ){
        $livecall_btn_height = "auto";
    }

    $livecall_btn_fontfamily = get_option('livecall_btn_fontfamily');
    if( empty(trim($livecall_btn_fontfamily)) ){
        $livecall_btn_fontfamily = "inherit";
    }

    ?>
    <?php 
    $empty= "";
    $style=  "
    a.meet_link_link {
        font-family:".$livecall_btn_fontfamily.";
        width:".$livecall_btn_width;";
        height:".$livecall_btn_height.";

        /* top | right | bottom | left */
        margin:".$livecall_btn_margin_top.(($livecall_btn_margin_top>0)?$livecall_btn_margin_type:$empty).$livecall_btn_margin_right.(($livecall_btn_margin_right>0)?$livecall_btn_margin_type:$empty).$livecall_btn_margin_bottom.(($livecall_btn_margin_bottom>0)?$livecall_btn_margin_type:$empty).$livecall_btn_margin_left.(($livecall_btn_margin_left>0)?$livecall_btn_margin_type:$empty)."; !important;

        /* top | right | bottom | left */
        padding: ".$livecall_btn_padding_top.(($livecall_btn_padding_top>0)?$livecall_btn_padding_type:$empty).$livecall_btn_padding_right.(($livecall_btn_padding_right>0)?$livecall_btn_padding_type:$empty).$livecall_btn_padding_bottom.(($livecall_btn_padding_bottom>0)?$livecall_btn_padding_type:$empty).$livecall_btn_padding_left.(($livecall_btn_padding_left>0)?$livecall_btn_padding_type:$empty)."; !important;

        color: ". $livecall_btn_text_color." !important;
        background-color:".$livecall_btn_bg_color."!important;
        border: ".$livecall_btn_border_width."solid".$livecall_btn_border_color."!important;
        border-radius:".$livecall_btn_border_radius."!important;
        font-size: ".$livecall_btn_font_size."!important;
        text-align:".$livecall_btn_textalign.";
    }
    a.meet_link_link:hover {
        color: ".$livecall_btn_text_color_hover."!important;
        background-color:".$livecall_btn_bg_color_hover." !important;
        border: ". $livecall_btn_border_width_hover." solid". $livecall_btn_border_color_hover." !important;
        border-radius: ".$livecall_btn_border_radius_hover."!important;
        font-size: ".$livecall_btn_font_size_hover." !important;
    }";
    wp_add_inline_style(WORDLIVE_PLUGINNAME.'-css', $style );
    ?>
    <?php

}


//live call page template
add_filter( 'page_template', 'wordlive_page_template_func' );
function wordlive_page_template_func( $page_template ) {

    $selectedpage = get_option('livecall_slug');
    if ( is_page( $selectedpage ) ) {
        $page_template = WORDLIVE_PLUGINPATH . '/templates/livecall.php';
    }
    return $page_template;

}


//auto add button below product add to cart button on shop page
if( get_option('enable_shop_page_btn') == '1' ){

    $button_loc_shop_page = get_option('button_loc_shop_page');
    
    add_filter( $button_loc_shop_page, 'after_btn_func', 10, 3 );
    function after_btn_func( $add_to_cart_html, $product, $args ){
        
        $selectedpage = get_option('livecall_slug');
        $text = '<div class="meet_link"><a class="meet_link_link" href="'.home_url($selectedpage).'?id='.get_the_ID().'&t='.time().'" target="_blank">'.get_option('livecall_btn_text').'</a></div>';
        return $add_to_cart_html . $text;

    }

}


//auto add button below product add to cart button on product details page
if( get_option('enable_product_details_page_btn') == '1' ){

    $button_loc_product_details_page = get_option('button_loc_product_details_page');
    
    add_action( $button_loc_product_details_page, 'wordlive_addbutton_func' );
    function wordlive_addbutton_func() {
        
        $selectedpage = get_option('livecall_slug');
        $text = '<div class="meet_link"><a class="meet_link_link" href="'.home_url($selectedpage).'?id='.get_the_ID().'&t='.time().'" target="_blank">'.get_option('livecall_btn_text').'</a></div>';
        echo wp_kses_post($text);

    }

}


//sendmail
function wordlive_sendmail( $to, $subject, $message ) {
    
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: Demolink <noreply@demolink.co>' . "\r\n";

    @mail($to, $subject, $message, $headers);

    return '1';

}


//email template 
function wordlive_email_template( $content = "" ) {

    $mail_footer_text = "&copy; 2022 Copyright, All rights reserved";

    $temp = '<table cellpadding="0" cellspacing="0" border="0" width="100%" style="margin:0 0 400px;background: #f5f8fa; min-width: 350px; font-size: 1px; line-height: normal; height:100%; border: none;">
      <tr>
        <td align="center" valign="top">
          <table cellpadding="0" cellspacing="0" border="0" width="750" class="table750"
                style="width: 100%; max-width: 750px; min-width: 350px; background: #f5f8fa; border: none;">
            <tr>
              <td class="mob_pad" width="25" style="width: 25px; max-width: 25px; min-width: 25px;">&nbsp;</td>
              <td align="center" valign="top" style="background: #ffffff;">
                <table cellpadding="0" cellspacing="0" border="0" width="100%" style="width: 100% !important; min-width: 100%; max-width: 100%; background: #f5f8fa; border: none;">
                  <tr>
                    <td align="right" valign="top"><div class="top_pad" style="height: 25px; line-height: 25px; font-size: 23px;">&nbsp;</div></td>
                  </tr>
                </table>
                <table cellpadding="40" cellspacing="0" border="0" width="100%" style="width: 100% !important; min-width: 100%; max-width: 100%; border: none; font-size: 16px;">
                  <tr>
                    <td align="left" valign="top"><div style="padding-top:30px;padding-bottom:30px;padding-left:30px;padding-right:30px;">'.$content.'</div></td>
                  </tr>
                </table>
                </td>
              <td class="mob_pad" width="25" style="width: 25px; max-width: 25px; min-width: 25px;">&nbsp;</td>
            </tr>
          </table>
        </td>
      </tr>
    </table>';

    return $temp;

}



//add popup to footer
add_action('wp_footer', 'wordlive_addpopupmarkup');
function wordlive_addpopupmarkup() {

    ?>
    
    <div class="woolive_popup"><div class="woolive_popup_container">
        <a href="javascript:;" class="woolive_popup_minus">&minus;</a>
        <a href="javascript:;" class="woolive_popup_close">&times;</a>
        <div class="woolive_popup_content"></div>
    </div></div>
    <a href="javascript:;" class="open_popup_div">Maximize call <span>+</span></a>
    <?php

}

function wordlive_sanitize($data)
{
    return strip_tags(
        stripslashes(
            sanitize_text_field(
               $data
            )
        )
    );
}