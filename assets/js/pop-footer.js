jQuery(document).ready(function(){
    jQuery('a.meet_link_link').click(function(e){
        e.preventDefault();
        var livecalllink = jQuery(this).attr('href');
        jQuery(".woolive_popup_content").html('<iframe src="'+livecalllink+'" frameborder="0" style="width:100%;height:600px;border:0;"></iframe>');
        jQuery('.woolive_popup').show();
    });
    jQuery('a.open_popup_div').click(function(e){
        e.preventDefault();
        jQuery('.woolive_popup').show();
        jQuery("a.open_popup_div").hide();
    });
    jQuery('a.woolive_popup_minus').click(function(e){
        e.preventDefault();
        jQuery('.woolive_popup').hide();
        jQuery("a.open_popup_div").show();
    });
    jQuery('a.woolive_popup_close').click(function(e){
        e.preventDefault();
        jQuery(".woolive_popup_content").html("");
        jQuery('.woolive_popup').hide();
        jQuery("a.open_popup_div").hide();
    });
});