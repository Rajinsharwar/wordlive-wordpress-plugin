<?php
      check_admin_referer( WORDLIVE_PLUGIN_PREFIX."formsettings");
      $safe = $_POST;
      $sanitize = [];
      $allowed_variable = array(
      'seller_email_temp',
      'enable_shop_page_btn',
      'button_loc_shop_page',
      'enable_product_details_page_btn',
      'button_loc_product_details_page',
      'loginpage_slug',
      'howtojoinpage_slug',
      'guestlogin_enable',
      'livecall_slug',
      'livecall_btn_text',
      'livecall_btn_width',
      'livecall_btn_height',
      'livecall_btn_margin_type',
      'livecall_btn_margin_top',
      'livecall_btn_margin_right',
      'livecall_btn_margin_bottom',
      'livecall_btn_margin_left',
      'livecall_btn_padding_type',
      'livecall_btn_padding_top',
      'livecall_btn_padding_right',
      'livecall_btn_padding_bottom',
      'livecall_btn_padding_left',
      'livecall_btn_textalign',
      'livecall_btn_font_size',
      'livecall_btn_fontfamily',
      'livecall_btn_text_color',
      'livecall_btn_border_width',
      'livecall_btn_border_color_hover',
      'livecall_btn_border_radius_hover',
      'livecall_btn_bg_color_hover',
      'seller_email_subject',
      'seller_email_temp'
    );
    $sanitize=[];
      foreach($allowed_variable as $safe_key=>$safe_value){
            if(isset($_POST[$safe_value])){
                $sanitize[$safe_value] = _sanitize($_POST[$safe_value]);
                if($safe_value=="seller_email_temp" && !empty($_POST[$safe_value])){
                    $sanitize[$safe_value] = sanitize_email($_POST[$safe_value]);
                }
                if($safe_value=="seller_email_temp" && !empty($_POST[$safe_value])){
                    $sanitize[$safe_value] = sanitize_textarea_field($_POST[$safe_value]);
                }
            }
              
       
         
      }
      update_option('save_settings', '1');

      //main settings
      if( isset($sanitize['enable_shop_page_btn']) && $sanitize['enable_shop_page_btn'] == '1' ){
          update_option('enable_shop_page_btn', '1');
      } else {
          update_option('enable_shop_page_btn', '0');
      }

      update_option('button_loc_shop_page', $sanitize['button_loc_shop_page']);

      if( isset($sanitize['enable_product_details_page_btn']) && $sanitize['enable_product_details_page_btn'] == '1' ){
          update_option('enable_product_details_page_btn', '1');
      } else {
          update_option('enable_product_details_page_btn', '0');
      }

      update_option('button_loc_product_details_page', $sanitize['button_loc_product_details_page']);

      update_option( 'loginpage_slug', $sanitize['loginpage_slug'] );
      update_option( 'howtojoinpage_slug', $sanitize['howtojoinpage_slug'] );

      update_option( 'guestlogin_enable', $sanitize['guestlogin_enable'] );
      update_option( 'livecall_slug', $sanitize['livecall_slug'] );
      update_option( 'livecall_btn_text', $sanitize['livecall_btn_text'] );

      //Button Style
      update_option( 'livecall_btn_width', $sanitize['livecall_btn_width'] );
      update_option( 'livecall_btn_height', $sanitize['livecall_btn_height'] );

      update_option( 'livecall_btn_margin_type', $sanitize['livecall_btn_margin_type'] );
      update_option( 'livecall_btn_margin_top', $sanitize['livecall_btn_margin_top'] );
      update_option( 'livecall_btn_margin_right', $sanitize['livecall_btn_margin_right'] );
      update_option( 'livecall_btn_margin_bottom', $sanitize['livecall_btn_margin_bottom'] );
      update_option( 'livecall_btn_margin_left', $sanitize['livecall_btn_margin_left'] );

      update_option( 'livecall_btn_padding_type', $sanitize['livecall_btn_padding_type'] );
      update_option( 'livecall_btn_padding_top', $sanitize['livecall_btn_padding_top'] );
      update_option( 'livecall_btn_padding_right', $sanitize['livecall_btn_padding_right'] );
      update_option( 'livecall_btn_padding_bottom', $sanitize['livecall_btn_padding_bottom'] );
      update_option( 'livecall_btn_padding_left', $sanitize['livecall_btn_padding_left'] );

      update_option( 'livecall_btn_textalign', $sanitize['livecall_btn_textalign'] );
      update_option( 'livecall_btn_font_size', $sanitize['livecall_btn_font_size'] );
      update_option( 'livecall_btn_fontfamily', $sanitize['livecall_btn_fontfamily'] );
      update_option( 'livecall_btn_text_color', $sanitize['livecall_btn_text_color'] );
      update_option( 'livecall_btn_border_width', $sanitize['livecall_btn_border_width'] );
      update_option( 'livecall_btn_border_color', $sanitize['livecall_btn_border_color'] );
      update_option( 'livecall_btn_border_radius', $sanitize['livecall_btn_border_radius'] );
      update_option( 'livecall_btn_bg_color', $sanitize['livecall_btn_bg_color'] );

      //Button Style (On hover state)
      update_option( 'livecall_btn_font_size_hover', $sanitize['livecall_btn_font_size_hover'] );
      update_option( 'livecall_btn_text_color_hover', $sanitize['livecall_btn_text_color_hover'] );
      update_option( 'livecall_btn_border_width_hover', $sanitize['livecall_btn_border_width_hover'] );
      update_option( 'livecall_btn_border_color_hover', $sanitize['livecall_btn_border_color_hover'] );
      update_option( 'livecall_btn_border_radius_hover', $sanitize['livecall_btn_border_radius_hover'] );
      update_option( 'livecall_btn_bg_color_hover', $sanitize['livecall_btn_bg_color_hover'] );

      //eamil template
      update_option( 'seller_email_subject', $sanitize['seller_email_subject'] );
      update_option( 'seller_email_temp', $sanitize['seller_email_temp'] );

      //echo '<script>window.location="admin.php?page=WordLive&success=1"</script>';

?>