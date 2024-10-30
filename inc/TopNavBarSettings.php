<?php
class TopNavBarSettings
{
	public static function top_nav_html_page()
	{
		include_once('top_nav_bar_admin_page_sttings.php');
	}
	
	public static function adding_database_fields()
	{	
		add_option("leadsquared_all_fields",'','','yes');
		
	}
	
	public static function removing_database_fields()
	{
		delete_option('leadsquared_all_fields');
		
		
	}
	
}