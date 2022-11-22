<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
if ( ! isset( $_GET['_wpnonce'] ) || ! wp_verify_nonce( $_GET['_wpnonce']) ) {

    // Actions to do should the nonce is invalid
    exit;
  
  } 

      check_admin_referer( WORDLIVE_PLUGIN_PREFIX."formsettings");
      $sanitize = [];
      $allowed_variable = array(
      'wordlive_seller_email_temp',
      'wordlive_enable_shop_page_btn',
      'wordlive_button_loc_shop_page',
      'wordlive_enable_product_details_page_btn',
      'wordlive_button_loc_product_details_page',
      'wordlive_loginpage_slug',
      'wordlive_howtojoinpage_slug',
      'wordlive_guestlogin_enable',
      'wordlive_livecall_slug',
      'wordlive_livecall_btn_text',
      'wordlive_livecall_btn_width',
      'wordlive_livecall_btn_height',
      'wordlive_livecall_btn_margin_type',
      'wordlive_livecall_btn_margin_top',
      'wordlive_livecall_btn_margin_right',
      'wordlive_livecall_btn_margin_bottom',
      'wordlive_livecall_btn_margin_left',
      'wordlive_livecall_btn_padding_type',
      'wordlive_livecall_btn_padding_top',
      'wordlive_livecall_btn_padding_right',
      'wordlive_livecall_btn_padding_bottom',
      'wordlive_livecall_btn_padding_left',
      'wordlive_livecall_btn_textalign',
      'wordlive_livecall_btn_font_size',
      'wordlive_livecall_btn_fontfamily',
      'wordlive_livecall_btn_text_color',
      'wordlive_livecall_btn_border_width',
      'wordlive_livecall_btn_border_color_hover',
      'wordlive_livecall_btn_border_radius_hover',
      'wordlive_livecall_btn_bg_color_hover',
      'wordlive_seller_email_subject',
      'wordlive_seller_email_temp',
      'wordlive_livecall_btn_border_color',
      'wordlive_livecall_btn_border_radius',
      'wordlive_livecall_btn_bg_color',
      'wordlive_livecall_btn_font_size_hover',
      'wordlive_livecall_btn_text_color_hover',
      'wordlive_livecall_btn_border_width_hover',
     // 'wordlive_livecall_btn_width'
    );
    $sanitize=[];
      foreach($allowed_variable as $safe_key=>$safe_value){
            if(isset($_POST[$safe_value])){
                $sanitize[$safe_value] = wordlive_sanitize($_POST[$safe_value]);
                if($safe_value=="wordlive_seller_email_temp" && !empty($_POST[$safe_value])){
                    $sanitize[$safe_value] = wp_kses_post($_POST[$safe_value]);
                }
            }
              
       
         
      }
      //echo "<pre>";print_r($sanitize);die;
      update_option('save_settings', '1');

      //main settings
      if( isset($sanitize['wordlive_enable_shop_page_btn']) && $sanitize['wordlive_enable_shop_page_btn'] == '1' ){
          update_option('wordlive_enable_shop_page_btn', '1');
      } else {
          update_option('wordlive_enable_shop_page_btn', '0');
      }

      update_option('wordlive_button_loc_shop_page', $sanitize['wordlive_button_loc_shop_page']);

      if( isset($sanitize['wordlive_enable_product_details_page_btn']) && $sanitize['wordlive_enable_product_details_page_btn'] == '1' ){
          update_option('wordlive_enable_product_details_page_btn', '1');
      } else {
          update_option('wordlive_enable_product_details_page_btn', '0');
      }

      update_option('wordlive_button_loc_product_details_page', $sanitize['wordlive_button_loc_product_details_page']);

      update_option( 'wordlive_loginpage_slug', $sanitize['wordlive_loginpage_slug'] );
      update_option( 'wordlive_howtojoinpage_slug', $sanitize['wordlive_howtojoinpage_slug'] );

      update_option( 'wordlive_guestlogin_enable', $sanitize['wordlive_guestlogin_enable'] );
      update_option( 'wordlive_livecall_slug', $sanitize['wordlive_livecall_slug'] );
      update_option( 'wordlive_livecall_btn_text', $sanitize['wordlive_livecall_btn_text'] );

      //Button Style
      update_option( 'wordlive_livecall_btn_width', $sanitize['wordlive_livecall_btn_width'] );
      update_option( 'wordlive_livecall_btn_height', $sanitize['wordlive_livecall_btn_height'] );

      update_option( 'wordlive_livecall_btn_margin_type', $sanitize['wordlive_livecall_btn_margin_type'] );
      update_option( 'wordlive_livecall_btn_margin_top', $sanitize['wordlive_livecall_btn_margin_top'] );
      update_option( 'wordlive_livecall_btn_margin_right', $sanitize['wordlive_livecall_btn_margin_right'] );
      update_option( 'wordlive_livecall_btn_margin_bottom', $sanitize['wordlive_livecall_btn_margin_bottom'] );
      update_option( 'wordlive_livecall_btn_margin_left', $sanitize['wordlive_livecall_btn_margin_left'] );

      update_option( 'wordlive_livecall_btn_padding_type', $sanitize['wordlive_livecall_btn_padding_type'] );
      update_option( 'wordlive_livecall_btn_padding_top', $sanitize['wordlive_livecall_btn_padding_top'] );
      update_option( 'wordlive_livecall_btn_padding_right', $sanitize['wordlive_livecall_btn_padding_right'] );
      update_option( 'wordlive_livecall_btn_padding_bottom', $sanitize['wordlive_livecall_btn_padding_bottom'] );
      update_option( 'wordlive_livecall_btn_padding_left', $sanitize['wordlive_livecall_btn_padding_left'] );

      update_option( 'wordlive_livecall_btn_textalign', $sanitize['wordlive_livecall_btn_textalign'] );
      update_option( 'wordlive_livecall_btn_font_size', $sanitize['wordlive_livecall_btn_font_size'] );
      update_option( 'wordlive_livecall_btn_fontfamily', $sanitize['wordlive_livecall_btn_fontfamily'] );
      update_option( 'wordlive_livecall_btn_text_color', $sanitize['wordlive_livecall_btn_text_color'] );
      update_option( 'wordlive_livecall_btn_border_width', $sanitize['wordlive_livecall_btn_border_width'] );
      update_option( 'wordlive_livecall_btn_border_color', $sanitize['wordlive_livecall_btn_border_color'] );
      update_option( 'wordlive_livecall_btn_border_radius', $sanitize['wordlive_livecall_btn_border_radius'] );
      update_option( 'wordlive_livecall_btn_bg_color', $sanitize['wordlive_livecall_btn_bg_color'] );

      //Button Style (On hover state)
      update_option( 'wordlive_livecall_btn_font_size_hover', $sanitize['wordlive_livecall_btn_font_size_hover'] );
      update_option( 'wordlive_livecall_btn_text_color_hover', $sanitize['wordlive_livecall_btn_text_color_hover'] );
      update_option( 'wordlive_livecall_btn_border_width_hover', $sanitize['wordlive_livecall_btn_border_width_hover'] );
      update_option( 'wordlive_livecall_btn_border_color_hover', $sanitize['wordlive_livecall_btn_border_color_hover'] );
      update_option( 'wordlive_livecall_btn_border_radius_hover', $sanitize['wordlive_livecall_btn_border_radius_hover'] );
      update_option( 'wordlive_livecall_btn_bg_color_hover', $sanitize['wordlive_livecall_btn_bg_color_hover'] );

      //eamil template
      update_option( 'wordlive_seller_email_subject', $sanitize['wordlive_seller_email_subject'] );
      update_option( 'wordlive_seller_email_temp', $sanitize['wordlive_seller_email_temp'] );
      wp_redirect( admin_url( 'admin.php?page=WordLive&success=1' ) );
      exit;
      //echo '<script>window.location="admin.php?page=WordLive&success=1"</script>';

?>