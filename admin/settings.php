<?php //custom settings page.. 
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function wordlive_settings_page(){
    $wordlive_livecall_btn_margin_type = get_option("wordlive_livecall_btn_margin_type");
    if( empty(trim($wordlive_livecall_btn_margin_type)) ){
        $wordlive_livecall_btn_margin_type = "px";
    }

    $wordlive_livecall_btn_margin_top = get_option("wordlive_livecall_btn_margin_top");
    if( empty(trim($wordlive_livecall_btn_margin_top)) ){
        $wordlive_livecall_btn_margin_top = "auto";
    }
    $wordlive_livecall_btn_margin_right = get_option("wordlive_livecall_btn_margin_right");
    if( empty(trim($wordlive_livecall_btn_margin_right)) ){
        $wordlive_livecall_btn_margin_right = "auto";
    }
    $wordlive_livecall_btn_margin_bottom = get_option("wordlive_livecall_btn_margin_bottom");
    if( empty(trim($wordlive_livecall_btn_margin_bottom)) ){
        $wordlive_livecall_btn_margin_bottom = "auto";
    }
    $wordlive_livecall_btn_margin_left = get_option("wordlive_livecall_btn_margin_left");
    if( empty(trim($wordlive_livecall_btn_margin_left)) ){
        $wordlive_livecall_btn_margin_left = "auto";
    }

    
    $wordlive_livecall_btn_padding_type = get_option("wordlive_livecall_btn_padding_type");
    if( empty(trim($wordlive_livecall_btn_padding_type)) ){
        $wordlive_livecall_btn_padding_type = "px";
    }

    $wordlive_livecall_btn_padding_top = get_option("wordlive_livecall_btn_padding_top");
    if( empty(trim($wordlive_livecall_btn_padding_top)) ){
        $wordlive_livecall_btn_padding_top = "0";
    }
    $wordlive_livecall_btn_padding_right = get_option("wordlive_livecall_btn_padding_right");
    if( empty(trim($wordlive_livecall_btn_padding_right)) ){
        $wordlive_livecall_btn_padding_right = "0";
    }
    $wordlive_livecall_btn_padding_bottom = get_option("wordlive_livecall_btn_padding_bottom");
    if( empty(trim($wordlive_livecall_btn_padding_bottom)) ){
        $wordlive_livecall_btn_padding_bottom = "0";
    }
    $wordlive_livecall_btn_padding_left = get_option("wordlive_livecall_btn_padding_left");
    if( empty(trim($wordlive_livecall_btn_padding_left)) ){
        $wordlive_livecall_btn_padding_left = "0";
    }

    $wordlive_livecall_btn_textalign = get_option('wordlive_livecall_btn_textalign');
    if( empty(trim($wordlive_livecall_btn_textalign)) ){
        $wordlive_livecall_btn_textalign = "center";
    }

    $wordlive_livecall_btn_font_size = get_option('wordlive_livecall_btn_font_size');
    $wordlive_livecall_btn_text_color = get_option('wordlive_livecall_btn_text_color');
    if( empty(trim($wordlive_livecall_btn_text_color)) ){
        $wordlive_livecall_btn_text_color = "#FFFFFF";
    }
    $wordlive_livecall_btn_border_width = get_option('wordlive_livecall_btn_border_width');
    $wordlive_livecall_btn_border_color = get_option('wordlive_livecall_btn_border_color');
    if( empty(trim($wordlive_livecall_btn_border_color)) ){
        $wordlive_livecall_btn_border_color = "#FFFFFF";
    }
    $wordlive_livecall_btn_border_radius = get_option('wordlive_livecall_btn_border_radius');
    $wordlive_livecall_btn_bg_color = get_option('wordlive_livecall_btn_bg_color');
    if( empty(trim($wordlive_livecall_btn_bg_color)) ){
        $wordlive_livecall_btn_bg_color = "#27A0B7";
    }

    //hover state..
    $wordlive_livecall_btn_font_size_hover = get_option('wordlive_livecall_btn_font_size_hover');
    $wordlive_livecall_btn_text_color_hover = get_option('wordlive_livecall_btn_text_color_hover');
    if( empty(trim($wordlive_livecall_btn_text_color_hover)) ){
        $wordlive_livecall_btn_text_color_hover = "#FFFFFF";
    }
    $wordlive_livecall_btn_border_width_hover = get_option('wordlive_livecall_btn_border_width_hover');
    $wordlive_livecall_btn_border_color_hover = get_option('wordlive_livecall_btn_border_color_hover');
    if( empty(trim($wordlive_livecall_btn_border_color_hover)) ){
        $wordlive_livecall_btn_border_color_hover = "#FFFFFF";
    }
    $wordlive_livecall_btn_border_radius_hover = get_option('wordlive_livecall_btn_border_radius_hover');
    $wordlive_livecall_btn_bg_color_hover = get_option('wordlive_livecall_btn_bg_color_hover');
    if( empty(trim($wordlive_livecall_btn_bg_color_hover)) ){
        $wordlive_livecall_btn_bg_color_hover = "#000000";
    }

    $wordlive_livecall_btn_width = get_option("wordlive_livecall_btn_width");
    if( empty(trim($wordlive_livecall_btn_width)) ){
        $wordlive_livecall_btn_width = "auto";
    }
    $wordlive_livecall_btn_height = get_option("wordlive_livecall_btn_height");
    if( empty(trim($wordlive_livecall_btn_height)) ){
        $wordlive_livecall_btn_height = "auto";
    }

    $wordlive_livecall_btn_fontfamily = get_option('wordlive_livecall_btn_fontfamily');
    if( empty(trim($wordlive_livecall_btn_fontfamily)) ){
        $wordlive_livecall_btn_fontfamily = "inherit";
    }

    $wordlive_seller_email_subject = get_option('wordlive_seller_email_subject');
    if( empty(trim($wordlive_seller_email_subject)) ){
        $wordlive_seller_email_subject = "Sample watching request";
    }
    ?>
        <div class="wrap">
          
            <h1>WordLive | Livecall Addon for Woocommerce</h1>
            
            <?php 
            
            //echo "<pre>";print_r($_POST);die;
            if(isset($_POST['_wp_http_referer']) && check_admin_referer( WORDLIVE_PLUGIN_PREFIX."formsettings")){
               include_once(WORDLIVE_PLUGINPATH . '/admin/settings_post.php');
            }

            if( isset($_GET['success']) && $_GET['success'] == '1' ){
                echo wp_kses_post('<div style="color: #3c763d;background-color: #dff0d8;border-color: #d6e9c6;padding: 10px 16px;margin-bottom: 20px;border: 1px solid transparent;border-radius: 4px;display: inline-block;">Changes are saved successfully..</div>');
            }
            

            
            ?>
            <?php
                $nonceUrl = wp_nonce_url(admin_url('admin.php?page=WordLive'));
            ?>
            <form method="post" action="<?php echo esc_url($nonceUrl) ?>" enctype="multipart/form-data">

                <div class="rw">
                    <div class="col60">
                        <?php wp_nonce_field(WORDLIVE_PLUGIN_PREFIX."formsettings" ); ?>
                        <input type="hidden" name="action" value="<?php echo esc_attr(WORDLIVE_PLUGIN_PREFIX); ?>add_settings">

                        <h3>Settings</h3>

                        <p><input type="checkbox" value="1" name="wordlive_enable_shop_page_btn" id="wordlive_enable_shop_page_btn" <?php if( get_option('wordlive_enable_shop_page_btn') == '1' ){ echo esc_attr('checked'); } ?> > &nbsp; <label for="wordlive_enable_shop_page_btn">Enable button (for shop page)</label></p>

                        <p><label style="display: block; margin-bottom: 5px;">Button location (for shop page)</label>
                            <?php $wordlive_button_loc_shop_page = get_option('wordlive_button_loc_shop_page'); ?>
                            <select name="wordlive_button_loc_shop_page" style="border-radius: 5px; min-width: 300px; padding:6px 12px;" required>
                                <option>--</option>
                                <?php $arr = array(
                                    'woocommerce_loop_add_to_cart_link'=>'After add to cart button'
                                ); 
                                foreach($arr as $key => $val) {
                                    ?><option value="<?php echo esc_attr($key); ?>" <?php echo esc_attr(($wordlive_button_loc_shop_page == $key)) ? esc_attr("selected") : ""; ?> ><?php echo esc_attr($val); ?></option><?php
                                } ?>
                            </select></p>

                        <p><input type="checkbox" value="1" name="wordlive_enable_product_details_page_btn" id="wordlive_enable_product_details_page_btn" <?php if( get_option('wordlive_enable_product_details_page_btn') == '1' ){ echo 'checked'; } ?> > &nbsp; <label for="wordlive_enable_product_details_page_btn">Enable button (for product details page)</label></p>

                        <p><label style="display: block; margin-bottom: 5px;">Button location (for product details page)</label>
                            <?php $wordlive_button_loc_product_details_page = get_option('wordlive_button_loc_product_details_page'); ?>
                            <select name="wordlive_button_loc_product_details_page" style="border-radius: 5px; min-width: 300px; padding:6px 12px;" required>
                                <option>--</option>
                                <?php $arrr = array(
                                    'woocommerce_before_add_to_cart_button'=>'Before add to cart button',
                                    'woocommerce_after_add_to_cart_button'=>'After add to cart button',
                                    'woocommerce_product_meta_start' => 'Before meta information',
                                    'woocommerce_product_meta_end' => 'After meta information',
                                    'woocommerce_after_single_product_summary' => 'After product summary',
                                ); 
                                foreach($arrr as $key => $val) {
                                    ?><option value="<?php echo esc_attr($key); ?>" <?php echo esc_attr(($wordlive_button_loc_product_details_page == $key)) ? esc_attr("selected") : ""; ?> ><?php echo esc_attr($val); ?></option><?php
                                } ?>
                            </select></p>

                        <BR>
                        
                        <p><label style="display: block; margin-bottom: 5px;">Guest calling enabled?</label>
                            <select name="wordlive_guestlogin_enable" style="border-radius: 5px; min-width: 300px; padding:6px 12px;" required>
                                <option value="no" <?php if(get_option('wordlive_guestlogin_enable')=='no'){ echo esc_attr('selected'); } ?> >No</option>
                                <option value="yes" <?php if(get_option('wordlive_guestlogin_enable')=='yes'){ echo esc_attr('selected'); } ?> >Yes</option>
                            </select></p>
                        
                        <p><label style="display: block; margin-bottom: 5px;">Login page</label>
                            <select name="wordlive_loginpage_slug" style="border-radius: 5px; min-width: 300px; padding:6px 12px;" required>
                                <option>--</option>
                                <?php 
                                $selectedpagee = get_option('wordlive_loginpage_slug');
                                query_posts(array('post_type'=>'page', 'posts_per_page'=>'-1'));
                                if( have_posts() ){
                                    while (have_posts()) {  the_post();

                                        $post_id = get_the_ID();
                                        $pslug = get_post_field( 'post_name', $post_id );
                                        ?>
                                        <option value="<?php echo esc_attr($pslug); ?>" <?php if($selectedpagee == $pslug){ echo esc_attr('selected'); } ?> ><?php the_title(); ?></option>
                                        <?php

                                    }
                                }
                                wp_reset_query();
                                ?>
                            </select></p>

                        <p><label style="display: block; margin-bottom: 5px;">How to join call page?</label>
                            <select name="wordlive_howtojoinpage_slug" style="border-radius: 5px; min-width: 300px; padding:6px 12px;" required>
                                <option>--</option>
                                <?php 
                                $selectedpagee = get_option('wordlive_howtojoinpage_slug');
                                query_posts(array('post_type'=>'page', 'posts_per_page'=>'-1'));
                                if( have_posts() ){
                                    while (have_posts()) {  the_post();

                                        $post_id = get_the_ID();
                                        $pslug = get_post_field( 'post_name', $post_id );
                                        ?>
                                        <option value="<?php echo esc_attr($pslug); ?>" <?php if($selectedpagee == $pslug){ echo esc_attr('selected'); } ?> ><?php the_title(); ?></option>
                                        <?php

                                    }
                                }
                                wp_reset_query();
                                ?>
                            </select></p>
                        
                        <p><label style="display: block; margin-bottom: 5px;">Live call page</label>
                            <select name="wordlive_livecall_slug" style="border-radius: 5px; min-width: 300px; padding:6px 12px;">
                                <option>--</option>
                                <?php 
                                $selectedpage = get_option('wordlive_livecall_slug');
                                query_posts(array('post_type'=>'page', 'posts_per_page'=>'-1'));
                                if( have_posts() ){
                                    while (have_posts()) {  the_post();

                                        $post_id = get_the_ID();
                                        $pslug = get_post_field( 'post_name', $post_id );
                                        ?>
                                        <option value="<?php echo esc_attr($pslug); ?>" <?php if($selectedpage == $pslug){ echo esc_attr('selected'); } ?> ><?php the_title(); ?></option>
                                        <?php

                                    }
                                }
                                wp_reset_query();
                                ?>
                            </select></p>

                        <p><label style="display: block; margin-bottom: 5px;">Live call button (text)</label>
                            <input onkeyup="jQuery('a.btnnn').text(this.value)" type="text" name="wordlive_livecall_btn_text" value="<?php echo esc_attr(get_option('wordlive_livecall_btn_text')); ?>" style="border-radius: 5px; min-width: 300px; padding:6px 12px;" required></p>

                        <BR><BR>

                        <h3>Button Style</h3>

                        <p><label style="display: block; margin-bottom: 5px;">Width</label>
                            <input onkeyup="jQuery('a.btnnn').css('width', this.value)" type="text" name="wordlive_livecall_btn_width" value="<?php echo esc_attr($wordlive_livecall_btn_width); ?>" style="border-radius: 5px; min-width: 300px; padding:6px 12px;"></p>

                        <p><label style="display: block; margin-bottom: 5px;">Height</label>
                            <input onkeyup="jQuery('a.btnnn').css('height', this.value)" type="text" name="wordlive_livecall_btn_height" value="<?php echo esc_attr($wordlive_livecall_btn_height); ?>" style="border-radius: 5px; min-width: 300px; padding:6px 12px;"></p>

                        <p><label style="display: block; margin-bottom: 5px;">Margin</label></p>
                        <p><?php 
                            $typs = array("px", "em", "%"); 
                            foreach($typs as $typ) {
                                ?><input type="radio" name="wordlive_livecall_btn_margin_type" value="<?php echo esc_attr($typ); ?>" <?php if( $typ == $wordlive_livecall_btn_margin_type ){ echo esc_attr('checked'); } ?>> <?php echo $typ; ?> &nbsp; <?php
                            }
                            ?></p>
                        <div class="fourboxes">
                            <div class="bx">
                                <input type="text" name="wordlive_livecall_btn_margin_top" value="<?php echo esc_attr($wordlive_livecall_btn_margin_top); ?>">
                                <span>Top</span>
                            </div>
                            <div class="bx">
                                <input type="text" name="wordlive_livecall_btn_margin_right" value="<?php echo esc_attr($wordlive_livecall_btn_margin_right); ?>">
                                <span>Right</span>
                            </div>
                            <div class="bx">
                                <input type="text" name="wordlive_livecall_btn_margin_bottom" value="<?php echo esc_attr($wordlive_livecall_btn_margin_bottom); ?>">
                                <span>Bottom</span>
                            </div>
                            <div class="bx">
                                <input type="text" name="wordlive_livecall_btn_margin_left" value="<?php echo esc_attr($wordlive_livecall_btn_margin_left); ?>">
                                <span>Left</span>
                            </div>
                        </div>

                        <p><label style="display: block; margin-bottom: 5px;">Padding</label></p>
                        <p><?php 
                            $typss = array("px", "em", "%"); 
                            foreach($typss as $typ) {
                                ?><input type="radio" name="wordlive_livecall_btn_padding_type" value="<?php echo esc_attr($typ); ?>" <?php if( $typ == $wordlive_livecall_btn_padding_type ){ echo esc_attr('checked'); } ?>> <?php echo esc_attr($typ); ?> &nbsp; <?php
                            }
                            ?></p>
                        <div class="fourboxes">
                            <div class="bx">
                                <input type="text" onkeyup="jQuery('a.btnnn').css('padding-top', this.value+jQuery('[name=wordlive_livecall_btn_padding_type]').val())" name="wordlive_livecall_btn_padding_top" value="<?php echo esc_attr($wordlive_livecall_btn_padding_top); ?>">
                                <span>Top</span>
                            </div>
                            <div class="bx">
                                <input type="text" onkeyup="jQuery('a.btnnn').css('padding-right', this.value+jQuery('[name=wordlive_livecall_btn_padding_type]').val())" name="wordlive_livecall_btn_padding_right" value="<?php echo esc_attr($wordlive_livecall_btn_padding_right); ?>">
                                <span>Right</span>
                            </div>
                            <div class="bx">
                                <input type="text" onkeyup="jQuery('a.btnnn').css('padding-bottom', this.value+jQuery('[name=wordlive_livecall_btn_padding_type]').val())" name="wordlive_livecall_btn_padding_bottom" value="<?php echo esc_attr($wordlive_livecall_btn_padding_bottom); ?>">
                                <span>Bottom</span>
                            </div>
                            <div class="bx">
                                <input type="text" onkeyup="jQuery('a.btnnn').css('padding-left', this.value+jQuery('[name=wordlive_livecall_btn_padding_type]').val())" name="wordlive_livecall_btn_padding_left" value="<?php echo esc_attr($wordlive_livecall_btn_padding_left); ?>">
                                <span>Left</span>
                            </div>
                        </div>

                        <p><label style="display: block; margin-bottom: 5px;">Text alignment (horizontal)</label>
                            <select onchange="jQuery('a.btnnn').css('text-align', this.value)" name="wordlive_livecall_btn_textalign" style="border-radius: 5px; min-width: 300px; padding:6px 12px;">
                                <?php 
                                $alignments = array("left", "center", "right"); 
                                foreach($alignments as $align) {
                                    ?><option value="<?php echo esc_attr($align); ?>" <?php if( $align == $wordlive_livecall_btn_textalign ){ echo esc_attr('selected'); } ?>><?php echo esc_attr($align); ?></option><?php
                                }
                                ?>
                            </select></p>

                        <p><label style="display: block; margin-bottom: 5px;">Font size</label>
                            <select onchange="jQuery('a.btnnn').css('font-size', this.value)" name="wordlive_livecall_btn_font_size" style="border-radius: 5px; min-width: 300px; padding:6px 12px;">
                                <?php 
                                for ( $i=4; $i<=36; $i++ ){

                                    $ii = ($i * 2).'px';

                                    ?><option value="<?php echo esc_attr($ii); ?>" <?php if( $ii == $wordlive_livecall_btn_font_size ){ echo esc_attr('selected'); } ?>><?php echo esc_attr($ii); ?></option><?php
                                }
                                ?>
                            </select>
                            <?php /*<input onkeyup="jQuery('a.btnnn').css('font-size', this.value)" type="text" name="wordlive_livecall_btn_font_size" value="<?php echo $wordlive_livecall_btn_font_size; ?>" style="border-radius: 5px; min-width: 300px; padding:6px 12px;">*/ ?></p>

                        <p><label style="display: block; margin-bottom: 5px;">Font family</label>
                            <?php 
                            $font_family = array(
                                'arial'     => 'Arial',
                                'verdana'   => 'Verdana, Geneva',
                                'trebuchet' => 'Trebuchet',
                                'georgia'   => 'Georgia',
                                'times'     => 'Times New Roman',
                                'tahoma'    => 'Tahoma, Geneva',
                                'palatino'  => 'Palatino',
                                'helvetica' => 'Helvetica',
                                'inherit'   => 'Theme default font'
                            );
                            ?>
                            <select onchange="jQuery('a.btnnn').css('font-family', this.value)" name="wordlive_livecall_btn_fontfamily" style="border-radius: 5px; min-width: 300px; padding:6px 12px;">
                                <?php 
                                foreach($font_family as $family => $family_name){
                                    ?><option value="<?php echo esc_attr($family); ?>" <?php if( $family == $wordlive_livecall_btn_fontfamily ){ echo esc_attr('selected'); } ?>><?php echo esc_attr($family_name); ?></option><?php
                                }
                                ?>
                            </select>
                            <?php /*<input onkeyup="jQuery('a.btnnn').css('font-family', this.value)" type="text" name="wordlive_livecall_btn_fontfamily" value="<?php echo $wordlive_livecall_btn_fontfamily; ?>" style="border-radius: 5px; min-width: 300px; padding:6px 12px;">*/ ?></p>

                        <p><label style="display: block; margin-bottom: 5px;">Text color</label>
                            <input onchange="jQuery('a.btnnn').css('color', this.value)" type="text" name="wordlive_livecall_btn_text_color" value="<?php echo esc_attr($wordlive_livecall_btn_text_color); ?>" data-jscolor="{}" style="border-radius: 5px; min-width: 300px; padding:6px 12px;"></p>

                        <p><label style="display: block; margin-bottom: 5px;">Border width</label>
                            <input onkeyup="jQuery('a.btnnn').css('border-width', this.value)" type="text" name="wordlive_livecall_btn_border_width" value="<?php echo esc_attr($wordlive_livecall_btn_border_width); ?>" style="border-radius: 5px; min-width: 300px; padding:6px 12px;"></p>

                        <p><label style="display: block; margin-bottom: 5px;">Border color</label>
                            <input onchange="jQuery('a.btnnn').css('border-color', this.value)" type="text" name="wordlive_livecall_btn_border_color" value="<?php echo esc_attr($wordlive_livecall_btn_border_color); ?>" data-jscolor="{}" style="border-radius: 5px; min-width: 300px; padding:6px 12px;"></p>

                        <p><label style="display: block; margin-bottom: 5px;">Border radius</label>
                            <input onkeyup="jQuery('a.btnnn').css('border-radius', this.value)" type="text" name="wordlive_livecall_btn_border_radius" value="<?php echo esc_attr($wordlive_livecall_btn_border_radius); ?>" style="border-radius: 5px; min-width: 300px; padding:6px 12px;"></p>

                        <p><label style="display: block; margin-bottom: 5px;">Background color</label>
                            <input onchange="jQuery('a.btnnn').css('background-color', this.value)" type="text" name="wordlive_livecall_btn_bg_color" value="<?php echo esc_attr($wordlive_livecall_btn_bg_color); ?>" data-jscolor="{}" style="border-radius: 5px; min-width: 300px; padding:6px 12px;"></p>

                        <BR><BR>

                        <h3>Button Style (On hover state)</h3>

                        <p><label style="display: block; margin-bottom: 5px;">Font size</label>
                            <select onchange="jQuery('a.btnnn').css('font-size', this.value)" name="wordlive_livecall_btn_font_size_hover" style="border-radius: 5px; min-width: 300px; padding:6px 12px;">
                                <?php 
                                for ( $i=4; $i<=36; $i++ ){

                                    $ii = ($i * 2).'px';

                                    ?><option value="<?php echo esc_attr($ii); ?>" <?php if( $ii == $wordlive_livecall_btn_font_size_hover ){ echo esc_attr('selected'); } ?>><?php echo esc_attr($ii); ?></option><?php
                                }
                                ?>
                            </select>
                            <?php /*<input type="text" name="wordlive_livecall_btn_font_size_hover" value="<?php echo $wordlive_livecall_btn_font_size_hover; ?>" style="border-radius: 5px; min-width: 300px; padding:6px 12px;">*/ ?></p>

                        <p><label style="display: block; margin-bottom: 5px;">Text color</label>
                            <input type="text" name="wordlive_livecall_btn_text_color_hover" value="<?php echo esc_attr($wordlive_livecall_btn_text_color_hover); ?>" data-jscolor="{}" style="border-radius: 5px; min-width: 300px; padding:6px 12px;"></p>

                        <p><label style="display: block; margin-bottom: 5px;">Border width</label>
                            <input type="text" name="wordlive_livecall_btn_border_width_hover" value="<?php echo esc_attr($wordlive_livecall_btn_border_width_hover); ?>" style="border-radius: 5px; min-width: 300px; padding:6px 12px;"></p>

                        <p><label style="display: block; margin-bottom: 5px;">Border color</label>
                            <input type="text" name="wordlive_livecall_btn_border_color_hover" value="<?php echo esc_attr($wordlive_livecall_btn_border_color_hover); ?>" data-jscolor="{}" style="border-radius: 5px; min-width: 300px; padding:6px 12px;"></p>

                        <p><label style="display: block; margin-bottom: 5px;">Border radius</label>
                            <input type="text" name="wordlive_livecall_btn_border_radius_hover" value="<?php echo esc_attr($wordlive_livecall_btn_border_radius_hover); ?>" style="border-radius: 5px; min-width: 300px; padding:6px 12px;"></p>

                        <p><label style="display: block; margin-bottom: 5px;">Background color</label>
                            <input type="text" name="wordlive_livecall_btn_bg_color_hover" value="<?php echo esc_attr($wordlive_livecall_btn_bg_color_hover); ?>" data-jscolor="{}" style="border-radius: 5px; min-width: 300px; padding:6px 12px;"></p>

                        <BR><BR>

                        <h3>Email subject</h3>

                        <p><input type="text" name="wordlive_seller_email_subject" value="<?php echo esc_attr($wordlive_seller_email_subject); ?>" style="border-radius: 5px; min-width: 300px; padding:6px 12px;"></p>

                        <BR>

                        <h3>Email sent to seller</h3>

                        <p><label style="display: block; margin-bottom: 5px;"><em><u>Shortcodes:</u></em><BR>
                            Seller name: <strong>{seller_name}</strong><BR>
                            Video call link: <strong>{video_link}</strong><BR>

                            Product name: <strong>{product_name}</strong><BR>
                            Product id: <strong>{product_id}</strong><BR>
                            Product category: <strong>{product_category}</strong><BR>
                            Customer's name: <strong>{customer_name}</strong><BR>
                            </label>
                            <?php $wordlive_seller_email_temp = get_option('wordlive_seller_email_temp');
                            $settings = array( 'media_buttons' => true, 'textarea_name' => 'wordlive_seller_email_temp', 'textarea_rows' => 8, 'teeny' => true, 'quicktags' => true );
                            wp_editor( $wordlive_seller_email_temp, "wordlive_seller_email_temp", $settings );
                            ?></p>

                        <BR><BR>

                        <h3>Shortcode to show button on page template:</h3>
                        <p>[watchlive product_id="0"]</p>
                        <p><em>( Replace "0" with <strong>Product ID</strong> )</em></p>

                        <BR>
                        <p><input type="submit" value="Save changes" style="border-radius: 5px; cursor: pointer; background: #000; color: #fff; border:none;padding: 6px 13px;"></p>

                    </div>
                    <div class="col40">
                        
                        <div class="fixd">
                            <h2>Preview for button:</h2>
                            <a href="javascript:;" class="btnnn"><?php echo get_option('wordlive_livecall_btn_text'); ?></a>
                        </div>

                    </div>
                </div>

            </form>

        </div>
    <?php
}

function wordlive_add_theme_menu_item() {
    add_menu_page( 
        __(WORDLIVE_PLUGINNAME, 'textdomain' ),
        WORDLIVE_PLUGINNAME,
        'manage_options',
        WORDLIVE_PLUGINNAME,
        'wordlive_settings_page',
        WORDLIVE_PLUGINLINK.'assets/img/icon.png',
    ); 
}
add_action("admin_menu", "wordlive_add_theme_menu_item");
add_action( 'admin_enqueue_scripts', 'wordlive_enqueue_admin_js' );

function wordlive_enqueue_admin_js(){
    wp_enqueue_script( WORDLIVE_PLUGIN_PREFIX.'jscolor-js', WORDLIVE_PLUGINLINK  . '/assets/js/jscolor.js', array( 'jquery') );
    wp_enqueue_script( WORDLIVE_PLUGIN_PREFIX.'pop-footer-js', WORDLIVE_PLUGINLINK  . '/assets/js/pop-footer.js', array( 'jquery') );
    wp_enqueue_style( WORDLIVE_PLUGIN_PREFIX.'generated', WORDLIVE_PLUGINLINK  . '/assets/css/generated.css');
    //normal state..
    $wordlive_livecall_btn_margin_type = get_option("wordlive_livecall_btn_margin_type");
    if( empty(trim($wordlive_livecall_btn_margin_type)) ){
        $wordlive_livecall_btn_margin_type = "px";
    }

    $wordlive_livecall_btn_margin_top = get_option("wordlive_livecall_btn_margin_top");
    if( empty(trim($wordlive_livecall_btn_margin_top)) ){
        $wordlive_livecall_btn_margin_top = "auto";
    }
    $wordlive_livecall_btn_margin_right = get_option("wordlive_livecall_btn_margin_right");
    if( empty(trim($wordlive_livecall_btn_margin_right)) ){
        $wordlive_livecall_btn_margin_right = "auto";
    }
    $wordlive_livecall_btn_margin_bottom = get_option("wordlive_livecall_btn_margin_bottom");
    if( empty(trim($wordlive_livecall_btn_margin_bottom)) ){
        $wordlive_livecall_btn_margin_bottom = "auto";
    }
    $wordlive_livecall_btn_margin_left = get_option("wordlive_livecall_btn_margin_left");
    if( empty(trim($wordlive_livecall_btn_margin_left)) ){
        $wordlive_livecall_btn_margin_left = "auto";
    }

    
    $wordlive_livecall_btn_padding_type = get_option("wordlive_livecall_btn_padding_type");
    if( empty(trim($wordlive_livecall_btn_padding_type)) ){
        $wordlive_livecall_btn_padding_type = "px";
    }

    $wordlive_livecall_btn_padding_top = get_option("wordlive_livecall_btn_padding_top");
    if( empty(trim($wordlive_livecall_btn_padding_top)) ){
        $wordlive_livecall_btn_padding_top = "0";
    }
    $wordlive_livecall_btn_padding_right = get_option("wordlive_livecall_btn_padding_right");
    if( empty(trim($wordlive_livecall_btn_padding_right)) ){
        $wordlive_livecall_btn_padding_right = "0";
    }
    $wordlive_livecall_btn_padding_bottom = get_option("wordlive_livecall_btn_padding_bottom");
    if( empty(trim($wordlive_livecall_btn_padding_bottom)) ){
        $wordlive_livecall_btn_padding_bottom = "0";
    }
    $wordlive_livecall_btn_padding_left = get_option("wordlive_livecall_btn_padding_left");
    if( empty(trim($wordlive_livecall_btn_padding_left)) ){
        $wordlive_livecall_btn_padding_left = "0";
    }

    $wordlive_livecall_btn_textalign = get_option('wordlive_livecall_btn_textalign');
    if( empty(trim($wordlive_livecall_btn_textalign)) ){
        $wordlive_livecall_btn_textalign = "center";
    }

    $wordlive_livecall_btn_font_size = get_option('wordlive_livecall_btn_font_size');
    $wordlive_livecall_btn_text_color = get_option('wordlive_livecall_btn_text_color');
    if( empty(trim($wordlive_livecall_btn_text_color)) ){
        $wordlive_livecall_btn_text_color = "#FFFFFF";
    }
    $wordlive_livecall_btn_border_width = get_option('wordlive_livecall_btn_border_width');
    $wordlive_livecall_btn_border_color = get_option('wordlive_livecall_btn_border_color');
    if( empty(trim($wordlive_livecall_btn_border_color)) ){
        $wordlive_livecall_btn_border_color = "#FFFFFF";
    }
    $wordlive_livecall_btn_border_radius = get_option('wordlive_livecall_btn_border_radius');
    $wordlive_livecall_btn_bg_color = get_option('wordlive_livecall_btn_bg_color');
    if( empty(trim($wordlive_livecall_btn_bg_color)) ){
        $wordlive_livecall_btn_bg_color = "#27A0B7";
    }

    //hover state..
    $wordlive_livecall_btn_font_size_hover = get_option('wordlive_livecall_btn_font_size_hover');
    $wordlive_livecall_btn_text_color_hover = get_option('wordlive_livecall_btn_text_color_hover');
    if( empty(trim($wordlive_livecall_btn_text_color_hover)) ){
        $wordlive_livecall_btn_text_color_hover = "#FFFFFF";
    }
    $wordlive_livecall_btn_border_width_hover = get_option('wordlive_livecall_btn_border_width_hover');
    $wordlive_livecall_btn_border_color_hover = get_option('wordlive_livecall_btn_border_color_hover');
    if( empty(trim($wordlive_livecall_btn_border_color_hover)) ){
        $wordlive_livecall_btn_border_color_hover = "#FFFFFF";
    }
    $wordlive_livecall_btn_border_radius_hover = get_option('wordlive_livecall_btn_border_radius_hover');
    $wordlive_livecall_btn_bg_color_hover = get_option('wordlive_livecall_btn_bg_color_hover');
    if( empty(trim($wordlive_livecall_btn_bg_color_hover)) ){
        $wordlive_livecall_btn_bg_color_hover = "#000000";
    }

    $wordlive_livecall_btn_width = get_option("wordlive_livecall_btn_width");
    if( empty(trim($wordlive_livecall_btn_width)) ){
        $wordlive_livecall_btn_width = "auto";
    }
    $wordlive_livecall_btn_height = get_option("wordlive_livecall_btn_height");
    if( empty(trim($wordlive_livecall_btn_height)) ){
        $wordlive_livecall_btn_height = "auto";
    }

    $wordlive_livecall_btn_fontfamily = get_option('wordlive_livecall_btn_fontfamily');
    if( empty(trim($wordlive_livecall_btn_fontfamily)) ){
        $wordlive_livecall_btn_fontfamily = "inherit";
    }

    $wordlive_seller_email_subject = get_option('wordlive_seller_email_subject');
    if( empty(trim($wordlive_seller_email_subject)) ){
        $wordlive_seller_email_subject = "Sample watching request";
    }
    $custom_css = "  a.btnnn {
        font-family: ".$wordlive_livecall_btn_fontfamily.";
        width:".$wordlive_livecall_btn_width.";
        height:".$wordlive_livecall_btn_height.";

        /* top | right | bottom | left */
        margin: ".$wordlive_livecall_btn_margin_top.(($wordlive_livecall_btn_margin_top>0)?$wordlive_livecall_btn_margin_type:"").' 
        '.$wordlive_livecall_btn_margin_right.(($wordlive_livecall_btn_margin_right>0)?$wordlive_livecall_btn_margin_type:"").' 
        '.$wordlive_livecall_btn_margin_bottom.(($wordlive_livecall_btn_margin_bottom>0)?$wordlive_livecall_btn_margin_type:"").' 
        '.$wordlive_livecall_btn_margin_left.(($wordlive_livecall_btn_margin_left>0)?$wordlive_livecall_btn_margin_type:"").";

        /* top | right | bottom | left */
        padding:".$wordlive_livecall_btn_padding_top.(($wordlive_livecall_btn_padding_top>0)?$wordlive_livecall_btn_padding_type:"").' 
        '.$wordlive_livecall_btn_padding_right.(($wordlive_livecall_btn_padding_right>0)?$wordlive_livecall_btn_padding_type:"").' 
        '.$wordlive_livecall_btn_padding_bottom.(($wordlive_livecall_btn_padding_bottom>0)?$wordlive_livecall_btn_padding_type:"").' 
        '.$wordlive_livecall_btn_padding_left.(($wordlive_livecall_btn_padding_left>0)?$wordlive_livecall_btn_padding_type:"").";
        text-decoration: none;
        display: inline-block;
        transition: all .2s;
        color:".esc_attr($wordlive_livecall_btn_text_color).";
        background-color:".esc_html($wordlive_livecall_btn_bg_color).";
        border:".esc_html($wordlive_livecall_btn_border_width)." solid ".esc_html($wordlive_livecall_btn_border_color).";
        border-radius:".esc_html($wordlive_livecall_btn_border_radius).";
        font-size:".esc_html($wordlive_livecall_btn_font_size).";
        text-align:".esc_html($wordlive_livecall_btn_textalign).";
        }";
        wp_add_inline_style(WORDLIVE_PLUGIN_PREFIX.'generated', $custom_css );

}
add_action( 'wp_enqueue_scripts', 'wordlive_frontend_enqueue_admin_js' );
function wordlive_frontend_enqueue_admin_js(){
   
    wp_enqueue_script( 'pop-footer-js', WORDLIVE_PLUGINLINK  . '/assets/js/pop-footer.js', array( 'jquery') );
    wp_enqueue_script( 'meet-js', 'https://meet.jit.si/external_api.js', false );

}