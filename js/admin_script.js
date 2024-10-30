jQuery(document).ready(function(){

jQuery(".buttonset").buttonset();

	jQuery("#dateTime").datetimepicker({
		minDate: 0,		
	});

	jQuery("#bar_color").change(function(){
			
			var color = jQuery("#bar_color").val();
			
			jQuery("#lsq-demo-show-div").css("background-color","#"+color);
	});
	jQuery("#text_color").change(function(){
			
			var color = jQuery("#text_color").val();
			
			jQuery("#myTextId").css("color","#"+color);
	});
	jQuery("#link_color").change(function(){
			
			var color = jQuery("#link_color").val();
			
			jQuery("#lsq_link_text").css("color","#"+color);
	});
// check boxes shadow

	var showShadow = function(){
		if (jQuery('#shadow_box').is(':checked')) {
			jQuery("#lsq-demo-show-div").css("box-shadow", "0px 4px 2px #888888");
		} else {
			jQuery("#lsq-demo-show-div").css("box-shadow", "0px 0px 0px" );
		} 
	};
	jQuery( "#shadow_box" ).on( "click", showShadow );
	// checkbox close div
	var showCloseBox = function(){
		if(jQuery('#close_button').is(':checked')) {
			var color_close_button = jQuery("#close_color").val();
			console.log("Clicked");
			jQuery("#close_button_div").html('&ensp;X&ensp;');
			jQuery("#close_button_div").show();
			jQuery("#close_button_div").css("color","#"+color_close_button);
		} else{
			jQuery("#close_button_div").hide();
		}
	};
	jQuery("#close_button").on("click", showCloseBox);
	// on change on close button
	jQuery("#close_color").change(function(){
		var clr_close_button = jQuery("#close_color").val();
		jQuery("#close_button_div").css("color","#"+clr_close_button);
	});
	// select option
	jQuery("#font_family").change(function(){
		var font_family = jQuery("#font_family").val();
		jQuery("#demo_text").css("font-family",font_family);
		jQuery("#demo_link").css("font-family",font_family);
		
	}).keyup(function(){
		var font_family = jQuery("#font_family").val();
		jQuery("#demo_text").css("font-family",font_family);
		jQuery("#demo_link").css("font-family",font_family);
	});
	// on keyup event for the div on top nav baar
	jQuery("#leadsquared_message").on('keyup',function(){
			
			var textindiv = jQuery("#leadsquared_message").val();
			jQuery("#myTextId").html(textindiv);
	});
	// link text keyup
	jQuery("#leadsquared_link_text").on('keyup',function(){
			
			var textindiv = jQuery("#leadsquared_link_text").val();
			jQuery("#lsq_link_text").html(textindiv);
	});



	// checkbox enable disable for date time 

	jQuery("#toolbox_untill").click(function(){
		var check = jQuery(this).is(':checked') ? 1 : 0;
		
		
		if(check == 1){
		
			jQuery("#dateTime").removeAttr("disabled");
			jQuery("#timezone_city").removeAttr("disabled");
		}else{
		
			jQuery("#dateTime").attr("disabled", true);
			jQuery("#timezone_city").attr("disabled", true);
		}
	});
	// show/Hide behaviour grey text on hidden
	
		
	jQuery("#lsq_show").click(function(){
		if(jQuery('input:radio:checked').length > 0)
		{
		jQuery("#lsq_hide").removeClass("lsq-show").addClass("lsq-hide");
		jQuery(this).removeClass("lsq-hide").addClass("lsq-show");
		
		}
	});
	jQuery("#lsq_hide").click(function(){
		if(jQuery('input:radio:checked').length > 0)
		{
		jQuery("#lsq_show").removeClass("lsq-show").addClass("lsq-hide");
		jQuery(this).removeClass("lsq-hide").addClass("lsq-show");
		
		}
	});
	
	
	jQuery("#blueTheme").click(function(){
		jQuery("#lsq-demo-show-div").css("background-color","#1DB2DB");
		jQuery("#bar_color").val("1DB2DB");
		jQuery("#bar_color").css("background-color","#1DB2DB");
		jQuery("#lsq_link_text").css("background-color","#158AAB");
		jQuery("#click_here_color").val("158AAB");
		jQuery("#click_here_color").css("background-color","#158AAB");
		jQuery("#text_color").val("FFFFFF");
		jQuery("#link_color").val("FFFFFF");
		jQuery("#text_color").css("background-color","#FFFFFF");
		jQuery("#link_color").css("background-color","#FFFFFF");
		
		jQuery("#text_color").css("color","#000000");
		jQuery("#link_color").css("color","#000000");
		jQuery("#lsq_link_text").css("color","#FFFFFF");
		
		jQuery("#myTextId").css("color","#FFFFFF");
		jQuery("#demo_link").css("color","#FFFFFF");
		
	});
	
	jQuery("#greenTheme").click(function(){
		jQuery("#lsq-demo-show-div").css("background-color","#50B543");
		jQuery("#bar_color").val("50B543");
		jQuery("#bar_color").css("background-color","#50B543");
		jQuery("#lsq_link_text").css("background-color","#3C8233");
		jQuery("#click_here_color").val("3C8233");
		jQuery("#click_here_color").css("background-color","#3C8233");
		jQuery("#text_color").val("FFFFFF");
		jQuery("#link_color").val("FFFFFF");
		jQuery("#text_color").css("background-color","#FFFFFF");
		jQuery("#link_color").css("background-color","#FFFFFF");
		
		jQuery("#text_color").css("color","#000000");
		jQuery("#link_color").css("color","#000000");
		jQuery("#lsq_link_text").css("color","#FFFFFF");
		jQuery("#myTextId").css("color","#FFFFFF");
		jQuery("#demo_link").css("color","#FFFFFF");
		
	});
	
	jQuery("#redTheme").click(function(){
		jQuery("#lsq-demo-show-div").css("background-color","#D46A24");
		jQuery("#bar_color").val("D46A24");
		jQuery("#bar_color").css("background-color","#D46A24");
		jQuery("#lsq_link_text").css("background-color","#8F4718");
		jQuery("#click_here_color").val("8F4718");
		jQuery("#click_here_color").css("background-color","#8F4718");
		jQuery("#text_color").val("FFFFFF");
		jQuery("#link_color").val("FFFFFF");
		jQuery("#text_color").css("background-color","#FFFFFF");
		jQuery("#link_color").css("background-color","#FFFFFF");
		
		jQuery("#text_color").css("color","#000000");
		jQuery("#link_color").css("color","#000000");
		jQuery("#lsq_link_text").css("color","#FFFFFF");
		jQuery("#myTextId").css("color","#FFFFFF");
		jQuery("#demo_link").css("color","#FFFFFF");
		
	});
	
	// click here on change 
	
	jQuery("#click_here_color").change(function(){
		var color_value = jQuery(this).val();
		
		jQuery("#lsq_link_text").css("background-color","#"+color_value);
		
	});
	// yellow div settings
	jQuery("#yellowTheme").click(function(){
		jQuery("#lsq-demo-show-div").css("background-color","#F7DC79");
		jQuery("#bar_color").val("F7DC79");
		jQuery("#bar_color").css("background-color","#F7DC79");
		jQuery("#lsq_link_text").css("background-color","#000000");
		jQuery("#click_here_color").val("000000");
		jQuery("#click_here_color").css("background-color","#000000");
		jQuery("#text_color").val("000000");
		jQuery("#link_color").val("FFFFFF");
		jQuery("#text_color").css("background-color","#000000");
		jQuery("#link_color").css("background-color","#FFFFFF");
		
		jQuery("#text_color").css("color","#FFFFFF");
		jQuery("#link_color").css("color","#000000");
		jQuery("#lsq_link_text").css("color","#FFFFFF");
		jQuery("#myTextId").css("color","#000000");
		jQuery("#demo_link").css("color","#000000");
		
	});
	
	var check = jQuery("#toolbox_untill").is(':checked') ? 1 : 0;
		
		
		if(check == 1){
		
			jQuery("#dateTime").removeAttr("disabled");
			jQuery("#timezone_city").removeAttr("disabled");
		}else{
		
			jQuery("#dateTime").attr("disabled", true);
			jQuery("#timezone_city").attr("disabled", true);
		}

});