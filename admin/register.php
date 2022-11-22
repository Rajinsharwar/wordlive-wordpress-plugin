<?php
//Shortcode: [watchlive product_id=""]
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_shortcode('watchlive', 'wordlive_watchlive_func');
function wordlive_watchlive_func($atts) {

    $c = '';

    $product_id = "";
    if( isset($atts['product_id']) && !empty($atts['product_id']) ){
        $product_id = $atts['product_id'];
    }

    $selectedpage = get_option('wordlive_livecall_slug');
    $c .= '<div class="meet_link"><a class="meet_link_link" href="'.home_url($selectedpage).'?id='.$product_id.'" target="_blank">'.get_option('wordlive_livecall_btn_text').'</a></div>';

    return $c;

}


// Shortcode: [videocall width="100%" height="600px" room="testroom"]
add_shortcode('videocall', 'wordlive_videocall_func');
function wordlive_videocall_func($atts) {

    $c = '';

    $width = "100%";
    if( isset($atts['width']) && !empty($atts['width']) ){
        $width = $atts['width'];
    }
    $height = "600px";
    if( isset($atts['height']) && !empty($atts['height']) ){
        $height = $atts['height'];
    }

    //$room = "Name_Room_".substr(md5(date('Ymd')), 0, 4);
    $room = "Testroom";
    if( isset($atts['room']) && !empty($atts['room']) ){
        $room = $atts['room'];
    }

    $display_name = "";
    if( isset($atts['display_name']) && !empty($atts['display_name']) ){
        $display_name = $atts['display_name'];
    }

    $role = "";
    if( isset($atts['role']) && !empty($atts['role']) ){
        $role = $atts['role'];
    }

    // echo $role;

    $selectedpagee = get_option('wordlive_guestlogin_enable');
    if( isset($selectedpagee) && $selectedpagee == 'yes' ){ //guest login allowed.. end

        $randkey = rand(100000, 10000000);
        
        if( is_user_logged_in() ){

            $current_user = wp_get_current_user();
            $userid = $current_user->ID;
            $user_info = get_userdata( $userid );
            $userrole = implode(",", $user_info->roles);

            $email = $user_info->user_email;

            if( empty(trim($display_name)) ){
                $displayname = $user_info->display_name;
            }

        } else {
            
            $displayname = $randkey;
            $email = $randkey."@example.com";
            
        }

        $c .= '<script>
            const domain = "meet.jit.si";
            const options = {
                roomName: "'.$room.'",
                width: "'.$width.'",
                height: "'.$height.'",
                parentNode: undefined,
                userInfo: {
                    email: "'.$email.'",
                    displayName: "'.$displayname.'",
                },
                configOverwrite: {
                    prejoinPageEnabled: false,
                    disableScreensharingVirtualBackground: true,
                    requireDisplayName: true,
                    doNotStoreRoom: true,
                    disableModeratorIndicator: true,
                    disableDeepLinking: true,
                    disableRemoteMute: true,
                    remoteVideoMenu: {disableKick: true, disableGrantModerator: true},
                    toolbarButtons: ["camera","chat","desktop","fullscreen","hangup","microphone","profile","raisehand","select-background","settings","tileview","toggle-camera","videoquality","__end"]
                },
                interfaceConfigOverwrite: {
                    DEFAULT_BACKGROUND: "#000000",
                    SHOW_JITSI_WATERMARK: false,
                    SHOW_BRAND_WATERMARK: false,
                    SHOW_WATERMARK_FOR_GUESTS: false,
                    SHOW_POWERED_BY: false,
                    OPTIMAL_BROWSERS: ["chrome","chromium","firefox"],
                    MOBILE_APP_PROMO: false,
                    DEFAULT_LOCAL_DISPLAY_NAME: "Me",
                    DISABLE_JOIN_LEAVE_NOTIFICATIONS: true,
                    SHOW_CHROME_EXTENSION_BANNER: false,
                    SETTINGS_SECTIONS: ["devices","language","profile","sounds"],
                    TOOLBAR_BUTTONS: [
                            "microphone", "camera", "closedcaptions", "desktop", "fullscreen",
                            "fodeviceselection", "hangup", "profile", "recording",
                            "livestreaming", "etherpad", "sharedvideo", "settings", "raisehand",
                            "videoquality", "filmstrip", "feedback", "stats", "shortcuts",
                            "tileview"
                        ],
                }
            }
            const api = new JitsiMeetExternalAPI(domain, options);
            api.executeCommand("subject", "'.$room.'");
            </script>
            <div id="meet"></div>';


    } //guest login allowed.. end
    else { //guest login not allowed.. start

        if( is_user_logged_in() ){

            $current_user = wp_get_current_user();
            $userid = $current_user->ID;
            $user_info = get_userdata( $userid );
            $userrole = implode(",", $user_info->roles);

            $email = $user_info->user_email;

            if( empty(trim($display_name)) ){
                $displayname = $user_info->display_name;
            }

            $c .= '<script>
            const domain = "meet.jit.si";
            const options = {
                roomName: "'.$room.'",
                width: "'.$width.'",
                height: "'.$height.'",
                parentNode: undefined,
                userInfo: {
                    email: "'.$email.'",
                    displayName: "'.$displayname.'",
                },
                configOverwrite: {
                    prejoinPageEnabled: false,
                    disableScreensharingVirtualBackground: true,
                    requireDisplayName: true,
                    doNotStoreRoom: true,
                    disableModeratorIndicator: true,
                    disableDeepLinking: true,
                    disableRemoteMute: true,
                    remoteVideoMenu: {disableKick: true, disableGrantModerator: true},
                    toolbarButtons: ["camera","chat","desktop","fullscreen","hangup","microphone","profile","raisehand","select-background","settings","tileview","toggle-camera","videoquality","__end"]
                },
                interfaceConfigOverwrite: {
                    DEFAULT_BACKGROUND: "#000000",
                    SHOW_JITSI_WATERMARK: false,
                    SHOW_BRAND_WATERMARK: false,
                    SHOW_WATERMARK_FOR_GUESTS: false,
                    SHOW_POWERED_BY: false,
                    OPTIMAL_BROWSERS: ["chrome","chromium","firefox"],
                    MOBILE_APP_PROMO: false,
                    DEFAULT_LOCAL_DISPLAY_NAME: "Me",
                    DISABLE_JOIN_LEAVE_NOTIFICATIONS: true,
                    SHOW_CHROME_EXTENSION_BANNER: false,
                    SETTINGS_SECTIONS: ["devices","language","profile","sounds"],
                    TOOLBAR_BUTTONS: [
                            "microphone", "camera", "closedcaptions", "desktop", "fullscreen",
                            "fodeviceselection", "hangup", "profile", "recording",
                            "livestreaming", "etherpad", "sharedvideo", "settings", "raisehand",
                            "videoquality", "filmstrip", "feedback", "stats", "shortcuts",
                            "tileview"
                        ],
                }
            }
            const api = new JitsiMeetExternalAPI(domain, options);
            api.executeCommand("subject", "'.$room.'");
            </script>
            <div id="meet"></div>';

        } else {

            $selectedpagee = get_option('wordlive_loginpage_slug');
            if( !empty($selectedpagee) ){
                $lynk = home_url($selectedpagee);
            } else {
                $lynk = home_url('/');
            }
            if(isset($_GET['id'])){
                $safeGet = wordlive_sanitize($_GET['id']);
            }
            $prodid = (isset($safeGet) && !empty($safeGet)) ? $safeGet : "";

            $selectedpage = get_option('wordlive_livecall_slug');
            $redirect_link = home_url($selectedpage)."?id=".$prodid;

            $c .= 'Please login to call..';
            return $c.'<script>window.location="'.$lynk.'?redirect_to='.$redirect_link.'";</script>';

        }

    } //guest login not allowed.. end

    return $c;

}