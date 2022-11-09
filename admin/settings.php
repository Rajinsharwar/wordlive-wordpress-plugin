<?php //custom settings page.. 


function wordlive_settings_page(){
    ?>
        <div class="wrap">
          
            <h1>WordLive | Livecall Addon for Woocommerce</h1>
            
            <?php 
            
            //echo "<pre>";print_r($_POST);die;
            if(isset($_POST['_wp_http_referer']) && check_admin_referer( WORDLIVE_PLUGIN_PREFIX."formsettings")){
               include_once(WORDLIVE_PLUGINPATH . '/admin/settings_post.php');
            }

            if( isset($_GET['success']) && $_GET['success'] == '1' ){
                echo '<div style="color: #3c763d;background-color: #dff0d8;border-color: #d6e9c6;padding: 10px 16px;margin-bottom: 20px;border: 1px solid transparent;border-radius: 4px;display: inline-block;">Changes are saved successfully..</div>';
            }
            

            
            ?>
            <form method="post" action="<?= esc_url(admin_url('admin.php?page=WordLive')) ?>" enctype="multipart/form-data">

                <div class="rw">
                    <div class="col60">
                        <?php wp_nonce_field(WORDLIVE_PLUGIN_PREFIX."formsettings" ); ?>
                        <input type="hidden" name="action" value="<?php echo WORDLIVE_PLUGIN_PREFIX; ?>add_settings">

                        <h3>Settings</h3>

                        <p><input type="checkbox" value="1" name="enable_shop_page_btn" id="enable_shop_page_btn" <?php if( get_option('enable_shop_page_btn') == '1' ){ echo 'checked'; } ?> > &nbsp; <label for="enable_shop_page_btn">Enable button (for shop page)</label></p>

                        <p><label style="display: block; margin-bottom: 5px;">Button location (for shop page)</label>
                            <?php $button_loc_shop_page = get_option('button_loc_shop_page'); ?>
                            <select name="button_loc_shop_page" style="border-radius: 5px; min-width: 300px; padding:6px 12px;" required>
                                <option>--</option>
                                <?php $arr = array(
                                    'woocommerce_loop_add_to_cart_link'=>'After add to cart button'
                                ); 
                                foreach($arr as $key => $val) {
                                    ?><option value="<?php echo $key; ?>" <?php echo ($button_loc_shop_page == $key) ? "selected" : ""; ?> ><?php echo $val; ?></option><?php
                                } ?>
                            </select></p>

                        <p><input type="checkbox" value="1" name="enable_product_details_page_btn" id="enable_product_details_page_btn" <?php if( get_option('enable_product_details_page_btn') == '1' ){ echo 'checked'; } ?> > &nbsp; <label for="enable_product_details_page_btn">Enable button (for product details page)</label></p>

                        <p><label style="display: block; margin-bottom: 5px;">Button location (for product details page)</label>
                            <?php $button_loc_product_details_page = get_option('button_loc_product_details_page'); ?>
                            <select name="button_loc_product_details_page" style="border-radius: 5px; min-width: 300px; padding:6px 12px;" required>
                                <option>--</option>
                                <?php $arrr = array(
                                    'woocommerce_before_add_to_cart_button'=>'Before add to cart button',
                                    'woocommerce_after_add_to_cart_button'=>'After add to cart button',
                                    'woocommerce_product_meta_start' => 'Before meta information',
                                    'woocommerce_product_meta_end' => 'After meta information',
                                    'woocommerce_after_single_product_summary' => 'After product summary',
                                ); 
                                foreach($arrr as $key => $val) {
                                    ?><option value="<?php echo $key; ?>" <?php echo ($button_loc_product_details_page == $key) ? "selected" : ""; ?> ><?php echo $val; ?></option><?php
                                } ?>
                            </select></p>

                        <BR>
                        
                        <p><label style="display: block; margin-bottom: 5px;">Guest login enabled?</label>
                            <select name="guestlogin_enable" style="border-radius: 5px; min-width: 300px; padding:6px 12px;" required>
                                <option value="no" <?php if(get_option('guestlogin_enable')=='no'){ echo 'selected'; } ?> >No</option>
                                <option value="yes" <?php if(get_option('guestlogin_enable')=='yes'){ echo 'selected'; } ?> >Yes</option>
                            </select></p>
                        
                        <p><label style="display: block; margin-bottom: 5px;">Login page</label>
                            <select name="loginpage_slug" style="border-radius: 5px; min-width: 300px; padding:6px 12px;" required>
                                <option>--</option>
                                <?php 
                                $selectedpagee = get_option('loginpage_slug');
                                query_posts(array('post_type'=>'page', 'posts_per_page'=>'-1'));
                                if( have_posts() ){
                                    while (have_posts()) {  the_post();

                                        $post_id = get_the_ID();
                                        $pslug = get_post_field( 'post_name', $post_id );
                                        ?>
                                        <option value="<?php echo $pslug; ?>" <?php if($selectedpagee == $pslug){ echo 'selected'; } ?> ><?php the_title(); ?></option>
                                        <?php

                                    }
                                }
                                wp_reset_query();
                                ?>
                            </select></p>

                        <p><label style="display: block; margin-bottom: 5px;">How to join call page?</label>
                            <select name="howtojoinpage_slug" style="border-radius: 5px; min-width: 300px; padding:6px 12px;" required>
                                <option>--</option>
                                <?php 
                                $selectedpagee = get_option('howtojoinpage_slug');
                                query_posts(array('post_type'=>'page', 'posts_per_page'=>'-1'));
                                if( have_posts() ){
                                    while (have_posts()) {  the_post();

                                        $post_id = get_the_ID();
                                        $pslug = get_post_field( 'post_name', $post_id );
                                        ?>
                                        <option value="<?php echo $pslug; ?>" <?php if($selectedpagee == $pslug){ echo 'selected'; } ?> ><?php the_title(); ?></option>
                                        <?php

                                    }
                                }
                                wp_reset_query();
                                ?>
                            </select></p>
                        
                        <p><label style="display: block; margin-bottom: 5px;">Live call page</label>
                            <select name="livecall_slug" style="border-radius: 5px; min-width: 300px; padding:6px 12px;">
                                <option>--</option>
                                <?php 
                                $selectedpage = get_option('livecall_slug');
                                query_posts(array('post_type'=>'page', 'posts_per_page'=>'-1'));
                                if( have_posts() ){
                                    while (have_posts()) {  the_post();

                                        $post_id = get_the_ID();
                                        $pslug = get_post_field( 'post_name', $post_id );
                                        ?>
                                        <option value="<?php echo $pslug; ?>" <?php if($selectedpage == $pslug){ echo 'selected'; } ?> ><?php the_title(); ?></option>
                                        <?php

                                    }
                                }
                                wp_reset_query();
                                ?>
                            </select></p>

                        <p><label style="display: block; margin-bottom: 5px;">Live call button (text)</label>
                            <input onkeyup="jQuery('a.btnnn').text(this.value)" type="text" name="livecall_btn_text" value="<?php echo get_option('livecall_btn_text'); ?>" style="border-radius: 5px; min-width: 300px; padding:6px 12px;" required></p>

                        <BR><BR>

                        <h3>Button Style</h3>

                        <p><label style="display: block; margin-bottom: 5px;">Width</label>
                            <input onkeyup="jQuery('a.btnnn').css('width', this.value)" type="text" name="livecall_btn_width" value="<?php echo $livecall_btn_width; ?>" style="border-radius: 5px; min-width: 300px; padding:6px 12px;"></p>

                        <p><label style="display: block; margin-bottom: 5px;">Height</label>
                            <input onkeyup="jQuery('a.btnnn').css('height', this.value)" type="text" name="livecall_btn_height" value="<?php echo $livecall_btn_height; ?>" style="border-radius: 5px; min-width: 300px; padding:6px 12px;"></p>

                        <p><label style="display: block; margin-bottom: 5px;">Margin</label></p>
                        <p><?php 
                            $typs = array("px", "em", "%"); 
                            foreach($typs as $typ) {
                                ?><input type="radio" name="livecall_btn_margin_type" value="<?php echo $typ; ?>" <?php if( $typ == $livecall_btn_margin_type ){ echo 'checked'; } ?>> <?php echo $typ; ?> &nbsp; <?php
                            }
                            ?></p>
                        <div class="fourboxes">
                            <div class="bx">
                                <input type="text" name="livecall_btn_margin_top" value="<?php echo $livecall_btn_margin_top; ?>">
                                <span>Top</span>
                            </div>
                            <div class="bx">
                                <input type="text" name="livecall_btn_margin_right" value="<?php echo $livecall_btn_margin_right; ?>">
                                <span>Right</span>
                            </div>
                            <div class="bx">
                                <input type="text" name="livecall_btn_margin_bottom" value="<?php echo $livecall_btn_margin_bottom; ?>">
                                <span>Bottom</span>
                            </div>
                            <div class="bx">
                                <input type="text" name="livecall_btn_margin_left" value="<?php echo $livecall_btn_margin_left; ?>">
                                <span>Left</span>
                            </div>
                        </div>

                        <p><label style="display: block; margin-bottom: 5px;">Padding</label></p>
                        <p><?php 
                            $typss = array("px", "em", "%"); 
                            foreach($typss as $typ) {
                                ?><input type="radio" name="livecall_btn_padding_type" value="<?php echo $typ; ?>" <?php if( $typ == $livecall_btn_padding_type ){ echo 'checked'; } ?>> <?php echo $typ; ?> &nbsp; <?php
                            }
                            ?></p>
                        <div class="fourboxes">
                            <div class="bx">
                                <input type="text" onkeyup="jQuery('a.btnnn').css('padding-top', this.value+jQuery('[name=livecall_btn_padding_type]').val())" name="livecall_btn_padding_top" value="<?php echo $livecall_btn_padding_top; ?>">
                                <span>Top</span>
                            </div>
                            <div class="bx">
                                <input type="text" onkeyup="jQuery('a.btnnn').css('padding-right', this.value+jQuery('[name=livecall_btn_padding_type]').val())" name="livecall_btn_padding_right" value="<?php echo $livecall_btn_padding_right; ?>">
                                <span>Right</span>
                            </div>
                            <div class="bx">
                                <input type="text" onkeyup="jQuery('a.btnnn').css('padding-bottom', this.value+jQuery('[name=livecall_btn_padding_type]').val())" name="livecall_btn_padding_bottom" value="<?php echo $livecall_btn_padding_bottom; ?>">
                                <span>Bottom</span>
                            </div>
                            <div class="bx">
                                <input type="text" onkeyup="jQuery('a.btnnn').css('padding-left', this.value+jQuery('[name=livecall_btn_padding_type]').val())" name="livecall_btn_padding_left" value="<?php echo $livecall_btn_padding_left; ?>">
                                <span>Left</span>
                            </div>
                        </div>

                        <p><label style="display: block; margin-bottom: 5px;">Text alignment (horizontal)</label>
                            <select onchange="jQuery('a.btnnn').css('text-align', this.value)" name="livecall_btn_textalign" style="border-radius: 5px; min-width: 300px; padding:6px 12px;">
                                <?php 
                                $alignments = array("left", "center", "right"); 
                                foreach($alignments as $align) {
                                    ?><option value="<?php echo $align; ?>" <?php if( $align == $livecall_btn_textalign ){ echo 'selected'; } ?>><?php echo $align; ?></option><?php
                                }
                                ?>
                            </select></p>

                        <p><label style="display: block; margin-bottom: 5px;">Font size</label>
                            <select onchange="jQuery('a.btnnn').css('font-size', this.value)" name="livecall_btn_font_size" style="border-radius: 5px; min-width: 300px; padding:6px 12px;">
                                <?php 
                                for ( $i=4; $i<=36; $i++ ){

                                    $ii = ($i * 2).'px';

                                    ?><option value="<?php echo $ii; ?>" <?php if( $ii == $livecall_btn_font_size ){ echo 'selected'; } ?>><?php echo $ii; ?></option><?php
                                }
                                ?>
                            </select>
                            <?php /*<input onkeyup="jQuery('a.btnnn').css('font-size', this.value)" type="text" name="livecall_btn_font_size" value="<?php echo $livecall_btn_font_size; ?>" style="border-radius: 5px; min-width: 300px; padding:6px 12px;">*/ ?></p>

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
                            <select onchange="jQuery('a.btnnn').css('font-family', this.value)" name="livecall_btn_fontfamily" style="border-radius: 5px; min-width: 300px; padding:6px 12px;">
                                <?php 
                                foreach($font_family as $family => $family_name){
                                    ?><option value="<?php echo $family; ?>" <?php if( $family == $livecall_btn_fontfamily ){ echo 'selected'; } ?>><?php echo $family_name; ?></option><?php
                                }
                                ?>
                            </select>
                            <?php /*<input onkeyup="jQuery('a.btnnn').css('font-family', this.value)" type="text" name="livecall_btn_fontfamily" value="<?php echo $livecall_btn_fontfamily; ?>" style="border-radius: 5px; min-width: 300px; padding:6px 12px;">*/ ?></p>

                        <p><label style="display: block; margin-bottom: 5px;">Text color</label>
                            <input onchange="jQuery('a.btnnn').css('color', this.value)" type="text" name="livecall_btn_text_color" value="<?php echo $livecall_btn_text_color; ?>" data-jscolor="{}" style="border-radius: 5px; min-width: 300px; padding:6px 12px;"></p>

                        <p><label style="display: block; margin-bottom: 5px;">Border width</label>
                            <input onkeyup="jQuery('a.btnnn').css('border-width', this.value)" type="text" name="livecall_btn_border_width" value="<?php echo $livecall_btn_border_width; ?>" style="border-radius: 5px; min-width: 300px; padding:6px 12px;"></p>

                        <p><label style="display: block; margin-bottom: 5px;">Border color</label>
                            <input onchange="jQuery('a.btnnn').css('border-color', this.value)" type="text" name="livecall_btn_border_color" value="<?php echo $livecall_btn_border_color; ?>" data-jscolor="{}" style="border-radius: 5px; min-width: 300px; padding:6px 12px;"></p>

                        <p><label style="display: block; margin-bottom: 5px;">Border radius</label>
                            <input onkeyup="jQuery('a.btnnn').css('border-radius', this.value)" type="text" name="livecall_btn_border_radius" value="<?php echo $livecall_btn_border_radius; ?>" style="border-radius: 5px; min-width: 300px; padding:6px 12px;"></p>

                        <p><label style="display: block; margin-bottom: 5px;">Background color</label>
                            <input onchange="jQuery('a.btnnn').css('background-color', this.value)" type="text" name="livecall_btn_bg_color" value="<?php echo $livecall_btn_bg_color; ?>" data-jscolor="{}" style="border-radius: 5px; min-width: 300px; padding:6px 12px;"></p>

                        <BR><BR>

                        <h3>Button Style (On hover state)</h3>

                        <p><label style="display: block; margin-bottom: 5px;">Font size</label>
                            <select onchange="jQuery('a.btnnn').css('font-size', this.value)" name="livecall_btn_font_size_hover" style="border-radius: 5px; min-width: 300px; padding:6px 12px;">
                                <?php 
                                for ( $i=4; $i<=36; $i++ ){

                                    $ii = ($i * 2).'px';

                                    ?><option value="<?php echo $ii; ?>" <?php if( $ii == $livecall_btn_font_size_hover ){ echo 'selected'; } ?>><?php echo $ii; ?></option><?php
                                }
                                ?>
                            </select>
                            <?php /*<input type="text" name="livecall_btn_font_size_hover" value="<?php echo $livecall_btn_font_size_hover; ?>" style="border-radius: 5px; min-width: 300px; padding:6px 12px;">*/ ?></p>

                        <p><label style="display: block; margin-bottom: 5px;">Text color</label>
                            <input type="text" name="livecall_btn_text_color_hover" value="<?php echo $livecall_btn_text_color_hover; ?>" data-jscolor="{}" style="border-radius: 5px; min-width: 300px; padding:6px 12px;"></p>

                        <p><label style="display: block; margin-bottom: 5px;">Border width</label>
                            <input type="text" name="livecall_btn_border_width_hover" value="<?php echo $livecall_btn_border_width_hover; ?>" style="border-radius: 5px; min-width: 300px; padding:6px 12px;"></p>

                        <p><label style="display: block; margin-bottom: 5px;">Border color</label>
                            <input type="text" name="livecall_btn_border_color_hover" value="<?php echo $livecall_btn_border_color_hover; ?>" data-jscolor="{}" style="border-radius: 5px; min-width: 300px; padding:6px 12px;"></p>

                        <p><label style="display: block; margin-bottom: 5px;">Border radius</label>
                            <input type="text" name="livecall_btn_border_radius_hover" value="<?php echo $livecall_btn_border_radius_hover; ?>" style="border-radius: 5px; min-width: 300px; padding:6px 12px;"></p>

                        <p><label style="display: block; margin-bottom: 5px;">Background color</label>
                            <input type="text" name="livecall_btn_bg_color_hover" value="<?php echo $livecall_btn_bg_color_hover; ?>" data-jscolor="{}" style="border-radius: 5px; min-width: 300px; padding:6px 12px;"></p>

                        <BR><BR>

                        <h3>Email subject</h3>

                        <p><input type="text" name="seller_email_subject" value="<?php echo $seller_email_subject; ?>" style="border-radius: 5px; min-width: 300px; padding:6px 12px;"></p>

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
                            <?php $seller_email_temp = get_option('seller_email_temp');
                            $settings = array( 'media_buttons' => false, 'textarea_name' => 'seller_email_temp', 'textarea_rows' => 8, 'teeny' => true, 'quicktags' => false );
                            wp_editor( $seller_email_temp, "seller_email_temp", $settings );
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
                            <a href="javascript:;" class="btnnn"><?php echo get_option('livecall_btn_text'); ?></a>
                        </div>

                    </div>
                </div>

            </form>

        </div>
    <?php
}

function add_theme_menu_item() {
    add_menu_page( 
        __(WORDLIVE_PLUGINNAME, 'textdomain' ),
        WORDLIVE_PLUGINNAME,
        'manage_options',
        WORDLIVE_PLUGINNAME,
        'wordlive_settings_page',
        WORDLIVE_PLUGINLINK.'assets/img/icon.png',
    ); 
}
add_action("admin_menu", "add_theme_menu_item");
add_action( 'admin_enqueue_scripts', 'enqueue_admin_js' );

function enqueue_admin_js(){
    wp_enqueue_script( WORDLIVE_PLUGIN_PREFIX.'jscolor-js', WORDLIVE_PLUGINLINK  . '/assets/js/jscolor.js', array( 'jquery') );
    wp_enqueue_script( WORDLIVE_PLUGIN_PREFIX.'pop-footer-js', WORDLIVE_PLUGINLINK  . '/assets/js/pop-footer.js', array( 'jquery') );
    wp_enqueue_style( WORDLIVE_PLUGIN_PREFIX.'generated', WORDLIVE_PLUGINLINK  . '/assets/css/generated.css');
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

    $seller_email_subject = get_option('seller_email_subject');
    if( empty(trim($seller_email_subject)) ){
        $seller_email_subject = "Sample watching request";
    }
    $custom_css = "  a.btnnn {
        font-family: ".$livecall_btn_fontfamily.";
        width:".$livecall_btn_width.";
        height:".$livecall_btn_height.";

        /* top | right | bottom | left */
        margin: ".$livecall_btn_margin_top.(($livecall_btn_margin_top>0)?$livecall_btn_margin_type:"").' 
        '.$livecall_btn_margin_right.(($livecall_btn_margin_right>0)?$livecall_btn_margin_type:"").' 
        '.$livecall_btn_margin_bottom.(($livecall_btn_margin_bottom>0)?$livecall_btn_margin_type:"").' 
        '.$livecall_btn_margin_left.(($livecall_btn_margin_left>0)?$livecall_btn_margin_type:"").";

        /* top | right | bottom | left */
        padding:".$livecall_btn_padding_top.(($livecall_btn_padding_top>0)?$livecall_btn_padding_type:"").' 
        '.$livecall_btn_padding_right.(($livecall_btn_padding_right>0)?$livecall_btn_padding_type:"").' 
        '.$livecall_btn_padding_bottom.(($livecall_btn_padding_bottom>0)?$livecall_btn_padding_type:"").' 
        '.$livecall_btn_padding_left.(($livecall_btn_padding_left>0)?$livecall_btn_padding_type:"").";
        text-decoration: none;
        display: inline-block;
        transition: all .2s;
        color:".esc_attr($livecall_btn_text_color).";
        background-color:".esc_html($livecall_btn_bg_color).";
        border:".esc_html($livecall_btn_border_width)." solid ".esc_html($livecall_btn_border_color).";
        border-radius:".esc_html($livecall_btn_border_radius).";
        font-size:".esc_html($livecall_btn_font_size).";
        text-align:".esc_html($livecall_btn_textalign).";
    }";
    wp_add_inline_style(WORDLIVE_PLUGIN_PREFIX.'generated', $custom_css );

}
add_action( 'wp_enqueue_scripts', 'frontend_enqueue_admin_js' );
function frontend_enqueue_admin_js(){
   
    wp_enqueue_script( 'pop-footer-js', WORDLIVE_PLUGINLINK  . '/assets/js/pop-footer.js', array( 'jquery') );
}