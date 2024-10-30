<?php
/*
Plugin Name: LeadSquared Website Topbar
Plugin URI: http://help.leadsquared.com/how-can-i-use-leadsquareds-website-top-bar-plugin-for-wordpress/
Description: This plugin will add a nice, customizable bar on the top of your website. You can use it as a notification bar, a call-to-action bar or as an announcement. You can  customize the look and feel of the bar including the text and colors, and how long you want to show the bar on your website.
Version: 1.5
Author: LeadSquared, Inc.
Author URI: http://www.leadsquared.com/LeadSquared-For-WordPress
License: GPLv2
*/
define('leadsquared-website-topbar', 'leadsquared-website-topbar');
define('LS_PLUGIN_URL', plugin_dir_url(__FILE__));
define('LS_PLUGIN_SLUG', 'leadsquared');
include_once('inc/TopNavBarSettings.php');
register_activation_hook(__FILE__, 'TopNavBarSettings::adding_database_fields');
register_deactivation_hook(__FILE__, 'TopNavBarSettings::removing_database_fields' );

add_action( 'admin_enqueue_scripts', 'scripts_for_admin_page' );
add_action( 'init', 'adding_jquery' );

function adding_jquery(){
	wp_enqueue_script("jquery");
}

if(!function_exists('scripts_for_admin_page')){
	function scripts_for_admin_page(){
		if(is_admin()){
					
			wp_register_style('jquery_ui','http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css');
			wp_enqueue_style('jquery_ui');
			
			wp_register_style('timepickercss',plugins_url('css/jquery-ui-timepicker-addon.css',__FILE__));
			wp_enqueue_style('timepickercss');
			
			wp_register_style('innerstyle_admin',plugins_url('css/innerstyle.css',__FILE__));
			wp_enqueue_style('innerstyle_admin');
						
			// js files included

			wp_register_script('datetimepicker_jquery_ui','http://code.jquery.com/ui/1.10.3/jquery-ui.js');
			wp_enqueue_script('datetimepicker_jquery_ui');
			
			wp_register_script('datetimepicker_addon',plugins_url('js/datetimepicker/jquery-ui-timepicker-addon.js',__FILE__));
			wp_enqueue_script('datetimepicker_addon');
			
			wp_register_script('js_color',plugins_url('js/jscolor/jscolor.js',__FILE__));
			wp_enqueue_script('js_color');
			// style & design
			wp_register_script('leadsquaed_script',plugins_url('js/admin_script.js',__FILE__));
			wp_enqueue_script('leadsquaed_script');
			
			
		}
	}
}



add_action( 'wp_enqueue_scripts', 'leadsquared_scripts_enqueue' );
if(!function_exists('leadsquared_scripts_enqueue'))
{
	function leadsquared_scripts_enqueue()
	{
		if(!is_admin()){
						
			wp_register_script('cookies_script',plugins_url('js/lscookie.js',__FILE__));
			wp_enqueue_script('cookies_script');
					
			wp_register_script('leadsquaed_script',plugins_url('js/our_script.js',__FILE__));
			wp_enqueue_script('leadsquaed_script');
			
			wp_register_style('nav_bar_style',plugins_url('css/nav_bar_style.css',__FILE__));
			wp_enqueue_style('nav_bar_style');
		}
	}
}



add_action('wp_head', 'print_on_which_page');
if(is_admin()){
	wp_register_style('LeadSquared-home-style', plugins_url( '/css/style.css' , __FILE__ ), array(), '1.0', 'all' );
	wp_enqueue_style( 'LeadSquared-home-style' );
}	
	function print_on_which_page()
	{		
		$lsq_get_json_data = get_option("leadsquared_all_fields");
		
		$lsq_decode_data = json_decode($lsq_get_json_data,true);
		
		$lsq_toggle_button =$lsq_decode_data['toggle_button'];
		
		$lsq_to_timezone_city = $lsq_decode_data['timezone_city'];
		$lsq_Topbar_living_time = $lsq_decode_data['toolbar_living_time'];
		$lsq_show_bar = true;
		if(!empty($lsq_to_timezone_city) && !empty($lsq_Topbar_living_time) ){
			date_default_timezone_set($lsq_to_timezone_city);
			$lsq_currentTime = date('Y/m/d H:i');
			$lsq_endTime = date($lsq_Topbar_living_time);
			$lsq_current_time_stamp = strtotime($lsq_currentTime);// my time stamp
			$lsq_end_time_stamp = strtotime($lsq_endTime);// his time stAMP
			if($lsq_current_time_stamp > $lsq_end_time_stamp){
				$lsq_show_bar = false;
			}
		}
			
		//-------------------------------------------------------------------------------------------//
				
		if($lsq_toggle_button=="No"||empty($lsq_toggle_button)||$lsq_show_bar == false ){
			
		}
		else
		{
			include_once('inc/page_html.php');
		}
		
		
	}
add_action('admin_menu','leadsquare_top_bar_nav_page');

//-------------------------------------------------------------------------------------------------------------------------------------------------------//

function leadsquare_top_bar_nav_page()
{
	global $menu;
	global $submenu;
	$menu_exist = false;
	if(is_array($menu)) 
	{
		foreach($menu as $item) 
		{
			if(strtolower($item[2]) == strtolower(LS_PLUGIN_SLUG)) 
			{
                $menuExist = true;
			}
		}
    }
	
    if(!$menuExist) 
	{ 
		add_menu_page('LeadSquared', 'LeadSquared', 'manage_options', LS_PLUGIN_SLUG, 'leadsquared_home_page', plugins_url( 'images/icon.png',__FILE__ ));
		add_submenu_page(LS_PLUGIN_SLUG, '', '', 'manage_options', LS_PLUGIN_SLUG);
		add_submenu_page(LS_PLUGIN_SLUG, 'Website Topbar', 'Website Topbar', 'manage_options', 'top_nav_html_page_slug', 'TopNavBarSettings::top_nav_html_page');
		
	} 
	else 
	{
		add_submenu_page(LS_PLUGIN_SLUG, 'Website Topbar', 'Website Topbar', 'manage_options', 'top_nav_html_page_slug', 'TopNavBarSettings::top_nav_html_page');
	}

}

//-------------------------------------------------------------------------------------------------------------------------------------------------------//

if(!function_exists(leadsquared_home_page))
{
	function leadsquared_home_page()
	{
		include_once('inc/leadsquared-admin.php');
	}
}
