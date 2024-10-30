jQuery.noConflict();
jQuery(document).ready(function(){

	var message_cookie = jQuery("#lsq_message_cookie").val();
	
	var cookie_name = jQuery("#lsq_cookie_name").val();
	
	var site_get_cookie = docCookies.getItem(cookie_name);
	
	var close_button = jQuery("#lsq_close_button_val").val();
	
	if(close_button!="show_close_button"){
		jQuery("#lsq_close_button_id").hide();
	}
	
	if(site_get_cookie != message_cookie){
		jQuery("#lsq_nav_bar").css("display", "inline-block");
		
	}else{
		jQuery("#lsq_nav_bar").css("display", "none");
	}
	var siteUrl = jQuery("#lsq_site_url").val();
		
	jQuery(document).on('click','.lsq_close_box',function(){
	jQuery(this).parent().fadeTo(500,0,function(){
		docCookies.setItem(cookie_name, message_cookie, 604800, "/");
		jQuery("#lsq_nav_bar").css('display','none');
        jQuery(this).remove();
	});
	});
});

