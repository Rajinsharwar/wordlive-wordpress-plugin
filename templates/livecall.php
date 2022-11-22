<?php /* Template name: Live call template */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?php wp_head(); ?>
 
</head>
<body>

<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$allowed_html = array(
	'a'      => array(
		'href'  => array(),
		'title' => array(),
	),
	'br'     => array(),
	'em'     => array(),
	'strong' => array(),
	'h2' => array(
		'class'=>array('talkingabout')
	),
	'style' => array(),
	'script' => array(),
);
$id = '';
if( isset($_GET['id']) && !empty($_GET['id']) ){
	$sanitize = [];
	$sanitize["id"] = wordlive_sanitize($_GET['id']);
	$sanitize["t"] = wordlive_sanitize($_GET['t']);

	
	$prodid = $sanitize['id'];
	$prodname = get_the_title($prodid);
	
	$prodcat = [];
	$pcat = get_the_terms($prodid, "product_cat");
	foreach ($pcat as $procat) {
		$prodcat[] = $procat->name;
	}
	$prodcategory = implode(", ", $prodcat);

	$get_details = get_post($prodid);
	$prod_author = $get_details->post_author;
	$get_user_details = get_userdata($prod_author);
	$seller_name = $get_user_details->display_name;
	$seller_email = $get_user_details->user_email;

	$current_user_id = (is_user_logged_in()) ? get_current_user_id() : "";
	$role = (is_user_logged_in() && $prod_author == $current_user_id) ? 'moderator' : 'participant';
	// echo $role; die;

	$selectedpage = get_option('wordlive_livecall_slug');

	$join_call_link = home_url($selectedpage)."?id=".$prodid."&t=".$sanitize['t'];

	//email notification
	$to = $seller_email;
	// $subject = "New sample watching request";
	$subject = get_option('wordlive_seller_email_subject');

	$replace_shortcode_withlink = str_replace( "{video_link}", "replace", get_option('wordlive_seller_email_temp') );

	if( is_user_logged_in() ){
		$current_user_information = get_userdata($current_user_id);
		$customer_name = $current_user_information->display_name;
	} else {
		$customer_name = "Guest";
	}

	// echo $seller_name.', '.$join_call_link.', '.$prodname.', '.$prodid.', '.$prodcategory.', '.$customer_name;
	// die;
	
	$emailtemp = str_replace( array("{seller_name}", "{video_link}", "{product_name}", "{product_id}", "{product_category}", "{customer_name}"), array($seller_name, $join_call_link, $prodname, $prodid, $prodcategory, $customer_name), get_option('wordlive_seller_email_temp') );

	$message = wordlive_email_template($emailtemp);
	// echo $message; die;
	wordlive_sendmail( $to, $subject, $message );
	

	$dokan_profile_settings = get_user_meta($prod_author, "dokan_profile_settings", true);
	$watch_from = (isset($dokan_profile_settings) && !empty($dokan_profile_settings)) ? strtotime($dokan_profile_settings['watchlive_from']) : "";
	$wfrom = (!empty($watch_from)) ? date("H", $watch_from) : "";
	$watch_to = (isset($dokan_profile_settings) && !empty($dokan_profile_settings)) ? strtotime($dokan_profile_settings['watchlive_to']) : "";
	$wto = (!empty($watch_to)) ? date("H", $watch_to) : "";
	// echo date("H", time());
	// echo $wfrom .' -  '.$wto;
	
	if(isset($dokan_profile_settings) && !empty($dokan_profile_settings) && !empty($dokan_profile_settings['watchlive_from']) && !empty($dokan_profile_settings['watchlive_to'])){
		if( date("H", time()) > $wfrom && 
			date("H", time()) < $wto ){
			// echo 'yes';
			$style = '<style>
			h2.talkingabout {
			    text-align: center;
			    margin: 10px auto;
			    font-size: 18px;
			}
			h2.talkingabout strong {
			    display: block;
			    font-size: 25px;
			}</style>';
			echo wp_kses($style.'<h2 class="talkingabout">You re talking about <strong>'.$prodname.'</strong></h2>',$allowed_html);
			echo do_shortcode('[videocall room="'.esc_attr($prodname).'" role="'.esc_attr($role).'"]');
		} else {
			// echo 'no';
			echo esc_html('Seller is unavailable this time, please join within '.date("h a", esc_attr($watch_from)).' to '.date("h a", esc_attr($watch_to)));
		}
	} else {
		$style= '<style>
		h2.talkingabout {
		    text-align: center;
		    margin: 10px auto;
		    font-size: 18px;
		}
		h2.talkingabout strong {
		    display: block;
		    font-size: 25px;
		}</style>';
		echo wp_kses($style.'<h2 class="talkingabout">You\'re talking about asda<strong>'.$prodname.'</strong></h2>',$allowed_html);
		echo do_shortcode('[videocall room="'.$prodname.'" role="'.$role.'"]');
	}

} else {

	$lynk = home_url('/');
	echo wp_kses('<script>window.location="'.$lynk.'"</script>',$allowed_html);

}
?>


<?php wp_footer(); ?>

</body>
</html>