<?php
	$lsq_get_json_data 				= 		get_option("leadsquared_all_fields");
	$lsq_decode_data 				= 		json_decode($lsq_get_json_data,true);
	// retrieving the data from json decode
	$lsq_leadsquared_message 		= 		$lsq_decode_data['leadsquared_message'];
	$lsq_leadsquared_link_text 		= 		$lsq_decode_data['leadsquared_link_text'];
	$lsq_leadsquared_link_url 		= 		$lsq_decode_data['leadsquared_link_url'];
	$lsq_bar_color 					= 		$lsq_decode_data['bar_color'];
	$lsq_text_color 				= 		$lsq_decode_data['text_color'];
	$lsq_link_color 				= 		$lsq_decode_data['link_color'];
	$lsq_nav_bar_show 				= 		$lsq_decode_data['nav_bar_show'];
	$lsq_close_button 				= 		$lsq_decode_data['close_button'];
	$lsq_close_color 				= 		$lsq_decode_data['close_color'];
	$lsq_font_family 				= 		$lsq_decode_data['font_family'];
	$lsq_shadow_box 				= 		$lsq_decode_data['shadow_box'];
	$lsq_toolbar_living_time 		= 		$lsq_decode_data['toolbar_living_time'];
	$lsq_click_here_color 			= 		$lsq_decode_data['click_here_color'];
	$lsq_open_url 					= 		$lsq_decode_data['open_url'];
	// setting the cookie 
	
		//setcookie("LS", $leadsquared_message, time()+7*24*3600);
	$lsq_urlOfSite 					=  		get_option('home');
	$lsq_url 						= 		parse_url($lsq_urlOfSite, PHP_URL_PATH);
	
?>
<div id = "lsq_nav_bar"  class = "lsq_nothing" >
<div  class = "lsq_box" style= "background-color:#<?php echo $lsq_bar_color;?>;font-family:<?php if(!empty($lsq_font_family)){echo $lsq_font_family;} ?> ;box-shadow:<?php if(!empty($lsq_shadow_box)){echo "0px 5px 15px #888888";}?>;" >
    
	
   <p id = "message_leadsquared" class = "lsq_message_bar">
   
   <span class = "lsq_message" style = "color:#<?php echo $lsq_text_color;?>;font-family:<?php echo $lsq_font_family; ?>;"><?php echo $lsq_leadsquared_message;?></span>
   <span class = "lsq_link_text" style = "background-color:#<?php echo $lsq_click_here_color; ?>">
	
   <a  style = "color:#<?php echo $lsq_link_color;?>;font-family:<?php echo $lsq_font_family; ?>;" target="<?php if($lsq_open_url == "yes")echo "_blank";?>" href = "<?php echo $lsq_leadsquared_link_url;?>"> <?php echo $lsq_leadsquared_link_text;?> </a></span>
   
   
   <span id = "lsq_close_button_id" class = "lsq_close_box" style = "color:#<?php echo $lsq_close_color; ?>;" ><strong>&ensp;<b>X</b>&ensp;</strong></span>
   </p>
   <input type = "hidden" name = "close_button_val" id = "lsq_close_button_val" value = "<?php echo $lsq_close_button;?>"/>
   <input type = "hidden" name = "message_cookie" id = "lsq_message_cookie" value = "<?php echo $lsq_leadsquared_message; ?>"/>
   <input type = "hidden" name = "cookie_name" id = "lsq_cookie_name" value = "<?php echo $lsq_leadsquared_link_text; ?>"/>
   <input type = "hidden" name = "site_url" id = "lsq_site_url" value = "<?php echo $lsq_url; ?>"/>
</div>
</div>

