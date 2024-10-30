<?php
	define('LS_PLUGIN_URL', plugin_dir_url(__FILE__));
	if(isset($_POST['Save'])) 
	{
		$leadsquared_all_fields = array	(
											"leadsquared_message"		=> 		$_POST['leadsquared_message'],
											"leadsquared_link_text"		=>		$_POST['leadsquared_link_text'],
											"leadsquared_link_url"		=>		$_POST['leadsquared_link_url'],
											"bar_color"					=>		$_POST['bar_color'],
											"text_color"				=>		$_POST['text_color'],
											"link_color"				=>		$_POST['link_color'],
											"close_button"				=>		$_POST['close_button'],
											"close_color"				=>		$_POST['close_color'],
											"font_family"				=>		$_POST['font_family'],
											"shadow_box"				=>		$_POST['shadow_box'],
											"toolbar_living_time"		=>		$_POST['dateTime'],
											"timezone_city"				=>		$_POST['timezone_city'],
											"toggle_button"				=>		$_POST['toggle_button'],
											"click_here_color"			=>		$_POST['click_here_color'],
											"open_url"					=>		$_POST['open_url'],
											"toolbar_untill"			=>		$_POST['toolbar_untill']
										);
		$json_format_of_fields 											= 		json_encode($leadsquared_all_fields);
		
		update_option("leadsquared_all_fields",$json_format_of_fields);
	
		$message = '<div class = "updated"><p>Website topbar settings have been <strong> Updated! </strong></p></div>';
	}
	
	$get_json_data 					= 			get_option("leadsquared_all_fields");
	
	$decode_data 					= 			json_decode($get_json_data,true);
	// retrieving the data from json decode
	$leadsquared_message 			= 			$decode_data['leadsquared_message'];
	$leadsquared_link_text 			= 			$decode_data['leadsquared_link_text'];
	$leadsquared_link_url 			= 			$decode_data['leadsquared_link_url'];
	$bar_color 						= 			$decode_data['bar_color'];
	$text_color 					= 			$decode_data['text_color'];
	$link_color 					= 			$decode_data['link_color'];
	$nav_bar_show 					= 			$decode_data['nav_bar_show'];
	$close_button 					= 			$decode_data['close_button'];
	$close_color 					= 			$decode_data['close_color'];
	$font_family 					= 			$decode_data['font_family'];
	$shadow_box 					= 			$decode_data['shadow_box'];
	$toolbar_living_time 			= 			$decode_data['toolbar_living_time'];
	$timezone_city 					= 			$decode_data['timezone_city'];
	$toggle_button 					= 			$decode_data['toggle_button'];
	$click_here_color 				= 			$decode_data['click_here_color'];
	$open_url 						= 			$decode_data['open_url'];
	$toolbar_untill 				= 			$decode_data['toolbar_untill'];
	
	if(!empty($timezone_city))
	{
		date_default_timezone_set($timezone_city);
	}
?>
<div class="wrap">
	<div id="icon-options-general" class="icon32"></div>
	<h2>Website Topbar Settings</h2>
	<p><?php echo $message; ?></p>
	
		
		<div id = "lsq-demo-show-div" class = "lsq-preview_div" style = "background-color:#<?php echo $bar_color;?>;box-shadow:<?php if(!empty($shadow_box)){echo "0px 4px 2px #888888";}?>;">
		<div id = "close_button_div"  class = "lsq-close_box" style = "color:#<?php echo $close_color; ?>;"><strong>&ensp;<?php if(!empty($close_button)) echo "X"; else "";?>&ensp;</strong></div>
			<p class = "lsq-textdemo" style = "color:#<?php echo $text_color;?>;font-family:<?php echo $font_family; ?>;"  id = "demo_text">
			
			<span id = "myTextId" ><?php if(!empty($leadsquared_message)) echo $leadsquared_message; else echo  "Enter the name of Event !";?> 
			</span>
			<a id = "demo_link" style = "color:#<?php echo $link_color;?>;font-family:<?php echo $font_family; ?>;" href = "#"> <span id ="lsq_link_text" class = "lsq-btn-link" style = "background-color:#<?php echo $click_here_color;?>;color:#<?php echo $link_color;?>"> <?php if(!empty($leadsquared_link_text)) echo $leadsquared_link_text; else echo  "Join Now";?></span></a></p>
		</div>
	
	
	<form method="POST" action="" id ="form_admin">
		<div class = "lsq-toolbar-text" id = "dragmain">
			<div class = "lsq-inner">
				<?php wp_nonce_field('update-options'); ?>
				<h2>Topbar Message</h2><hr>
				<ul>
					<li><label for = "leadsquared_message" class = "lsq-labelText">Message on Toolbar</label></br>
					<input type = "text" id="leadsquared_message" name="leadsquared_message" title = "you can use HTML tags for more effects" value="<?php echo $leadsquared_message;?>" placeholder = "<?php if (empty($leadsquared_message)){echo "Enter the name of the Event !";}?>" maxlength = "100" size = "49"/></li>
				</ul>
				<table width = "105%">
					<tr>
						<td><label for = "leadsquared_link_text" class = "lsq-labelText">Link text</label></td>
						<td><label for = "leadsquared_link_url" class = "lsq-labelText">Link URL</label></td>
					</tr>
					<tr>
						<td><input type = "text" id = "leadsquared_link_text" name = "leadsquared_link_text" title = "you can use HTML tags for more effects" value="<?php echo $leadsquared_link_text;?>" size = "20" placeholder = "<?php if (empty($leadsquared_link_text)){echo "Join Now";}?>"/></td>
						<td><input type = "text" id = "leadsquared_link_url" name = "leadsquared_link_url"  value="<?php echo $leadsquared_link_url;?>" placeholder = "<?php if (empty($leadsquared_link_url)){echo "http://www.leadsquared.com";}?>" /></td>
					</tr>
				</table>
				<label><p class = "lsq-labelText"><input type = "checkbox" name = "open_url" value = "yes" <?php if($open_url=="yes"){echo "checked";}?>/>&emsp;Open link URL in new window</p></label>
				<label>
				<p valign="middle" class = "lsq-labelText"><input type = "checkbox" valign ="middle" name = "toolbar_untill" value = "topbar_checked" <?php if(!$toolbar_untill) echo ''; else echo 'checked';?> id = "toolbox_untill" />&emsp;Hide Topbar after:</p></label>
				<table width = "105%">
					<tr>
						<td><input type = "text" id = "dateTime" name = "dateTime" value = "<?php echo $toolbar_living_time; ?>" placeholder = "<?php if (empty($toolbar_living_time)){echo "Enter Date & Time";}?>"/></td>
						<td><select id = "timezone_city" name = "timezone_city" class = "lsq-timezone">
						<option disabled > Select your City</option>
						<option value="Pacific/Midway" <?php if($timezone_city=="Pacific/Midway") echo "selected" ?> >(GMT-11:00) Midway Island, Samoa</option>
						<option value="America/Adak" <?php if($timezone_city=="America/Adak") echo "selected" ?> >(GMT-10:00) Hawaii-Aleutian</option>
						<option value="Etc/GMT+10" <?php if($timezone_city=="Etc/GMT+10") echo "selected" ?> >(GMT-10:00) Hawaii</option>
						<option value="Pacific/Marquesas" <?php if($timezone_city=="Pacific/Marquesas") echo "selected" ?>>(GMT-09:30) Marquesas Islands</option>
						<option value="Pacific/Gambier" <?php if($timezone_city=="Pacific/Gambier") echo "selected" ?>>(GMT-09:00) Gambier Islands</option>
						<option value="America/Anchorage" <?php if($timezone_city=="America/Anchorage") echo "selected" ?>>(GMT-09:00) Alaska</option>
						<option value="America/Ensenada" <?php if($timezone_city=="America/Ensenada") echo "selected" ?>>(GMT-08:00) Tijuana, Baja California</option>
						<option value="Etc/GMT+8" <?php if($timezone_city=="Etc/GMT+8") echo "selected" ?> >(GMT-08:00) Pitcairn Islands</option>
						<option value="America/Los_Angeles" <?php if($timezone_city=="America/Los_Angeles") echo "selected" ?> >(GMT-08:00) Pacific Time (US & Canada)</option>
						<option value="America/Denver" <?php if($timezone_city=="America/Denver") echo "selected" ?> >(GMT-07:00) Mountain Time (US & Canada)</option>
						<option value="America/Chihuahua" <?php if($timezone_city=="America/Chihuahua") echo "selected" ?> >(GMT-07:00) Chihuahua, La Paz, Mazatlan</option>
						<option value="America/Dawson_Creek" <?php if($timezone_city=="America/Dawson_Creek") echo "selected" ?> >(GMT-07:00) Arizona</option>
						<option value="America/Belize" <?php if($timezone_city=="America/Belize") echo "selected" ?> >(GMT-06:00) Saskatchewan, Central America</option>
						<option value="America/Cancun" <?php if($timezone_city=="America/Cancun") echo "selected" ?> >(GMT-06:00) Guadalajara, Mexico City, Monterrey</option>
						<option value="Chile/EasterIsland" <?php if($timezone_city=="Chile/EasterIsland") echo "selected" ?> >(GMT-06:00) Easter Island</option>
						<option value="America/Chicago" <?php if($timezone_city=="America/Chicago") echo "selected" ?> >(GMT-06:00) Central Time (US & Canada)</option>
						<option value="America/New_York" <?php if($timezone_city=="America/New_York") echo "selected" ?> >(GMT-05:00) Eastern Time (US & Canada)</option>
						<option value="America/Havana" <?php if($timezone_city=="America/Havana") echo "selected" ?> >(GMT-05:00) Cuba</option>
						<option value="America/Bogota" <?php if($timezone_city=="America/Bogota") echo "selected" ?> >(GMT-05:00) Bogota, Lima, Quito, Rio Branco</option>
						<option value="America/Caracas" <?php if($timezone_city=="America/Caracas") echo "selected" ?> >(GMT-04:30) Caracas</option>
						<option value="America/Santiago" <?php if($timezone_city=="America/Santiago") echo "selected" ?> >(GMT-04:00) Santiago</option>
						<option value="America/La_Paz" <?php if($timezone_city=="America/La_Paz") echo "selected" ?> >(GMT-04:00) La Paz</option>
						<option value="Atlantic/Stanley" <?php if($timezone_city=="Atlantic/Stanley") echo "selected" ?> >(GMT-04:00) Faukland Islands</option>
						<option value="America/Campo_Grande" <?php if($timezone_city=="America/Campo_Grande") echo "selected" ?> >(GMT-04:00) Brazil</option>
						<option value="America/Goose_Bay" <?php if($timezone_city=="America/Goose_Bay") echo "selected" ?> >(GMT-04:00) Atlantic Time (Goose Bay)</option>
						<option value="America/Glace_Bay" <?php if($timezone_city=="America/Glace_Bay") echo "selected" ?> >(GMT-04:00) Atlantic Time (Canada)</option>
						<option value="America/St_Johns" <?php if($timezone_city=="America/St_Johns") echo "selected" ?> >(GMT-03:30) Newfoundland</option>
						<option value="America/Araguaina" <?php if($timezone_city=="America/Araguaina") echo "selected" ?> >(GMT-03:00) UTC-3</option>
						<option value="America/Montevideo" <?php if($timezone_city=="America/Montevideo") echo "selected" ?> >(GMT-03:00) Montevideo</option>
						<option value="America/Miquelon" <?php if($timezone_city=="America/Miquelon") echo "selected" ?> >(GMT-03:00) Miquelon, St. Pierre</option>
						<option value="America/Godthab" <?php if($timezone_city=="America/Godthab") echo "selected" ?> >(GMT-03:00) Greenland</option>
						<option value="America/Argentina/Buenos_Aires" <?php if($timezone_city=="America/Argentina/Buenos_Aires") echo "selected" ?> >(GMT-03:00) Buenos Aires</option>
						<option value="America/Sao_Paulo" <?php if($timezone_city=="America/Sao_Paulo") echo "selected" ?> >(GMT-03:00) Brasilia</option>
						<option value="America/Noronha" <?php if($timezone_city=="America/Noronha") echo "selected" ?> >(GMT-02:00) Mid-Atlantic</option>
						<option value="Atlantic/Cape_Verde" <?php if($timezone_city=="Atlantic/Cape_Verde") echo "selected" ?> >(GMT-01:00) Cape Verde Is.</option>
						<option value="Atlantic/Azores" <?php if($timezone_city=="Atlantic/Azores") echo "selected" ?> >(GMT-01:00) Azores</option>
						<option value="Europe/Belfast" <?php if($timezone_city=="Europe/Belfast") echo "selected" ?> >(GMT) Greenwich Mean Time : Belfast</option>
						<option value="Europe/Dublin" <?php if($timezone_city=="Europe/Dublin") echo "selected" ?> >(GMT) Greenwich Mean Time : Dublin</option>
						<option value="Europe/Lisbon" <?php if($timezone_city=="Europe/Lisbon") echo "selected" ?> >(GMT) Greenwich Mean Time : Lisbon</option>
						<option value="Europe/London" <?php if($timezone_city=="Europe/London"||empty($timezone_city)) echo "selected" ?> >(GMT) Greenwich Mean Time : London</option>
						<option value="Africa/Abidjan" <?php if($timezone_city=="Africa/Abidjan") echo "selected" ?> >(GMT) Monrovia, Reykjavik</option>
						<option value="Europe/Amsterdam" <?php if($timezone_city=="Europe/Amsterdam") echo "selected" ?> >(GMT+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna</option>
						<option value="Europe/Belgrade" <?php if($timezone_city=="Europe/Belgrade") echo "selected" ?> >(GMT+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague</option>
						<option value="Europe/Brussels" <?php if($timezone_city=="Europe/Brussels") echo "selected" ?> >(GMT+01:00) Brussels, Copenhagen, Madrid, Paris</option>
						<option value="Africa/Algiers" <?php if($timezone_city=="Africa/Algiers") echo "selected" ?> >(GMT+01:00) West Central Africa</option>
						<option value="Africa/Windhoek" <?php if($timezone_city=="Africa/Windhoek") echo "selected" ?> >(GMT+01:00) Windhoek</option>
						<option value="Asia/Beirut" <?php if($timezone_city=="Asia/Beirut") echo "selected" ?> >(GMT+02:00) Beirut</option>
						<option value="Africa/Cairo" <?php if($timezone_city=="Africa/Cairo") echo "selected" ?> >(GMT+02:00) Cairo</option>
						<option value="Asia/Gaza" <?php if($timezone_city=="Asia/Gaza") echo "selected" ?> >(GMT+02:00) Gaza</option>
						<option value="Africa/Blantyre" <?php if($timezone_city=="Africa/Blantyre") echo "selected" ?> >(GMT+02:00) Harare, Pretoria</option>
						<option value="Asia/Jerusalem" <?php if($timezone_city=="Asia/Jerusalem") echo "selected" ?> >(GMT+02:00) Jerusalem</option>
						<option value="Europe/Minsk" <?php if($timezone_city=="Europe/Minsk") echo "selected" ?> >(GMT+02:00) Minsk</option>
						<option value="Asia/Damascus" <?php if($timezone_city=="Asia/Damascus") echo "selected" ?> >(GMT+02:00) Syria</option>
						<option value="Europe/Moscow" <?php if($timezone_city=="Europe/Moscow") echo "selected" ?> >(GMT+03:00) Moscow, St. Petersburg, Volgograd</option>
						<option value="Africa/Addis_Ababa" <?php if($timezone_city=="Africa/Addis_Ababa") echo "selected" ?> >(GMT+03:00) Nairobi</option>
						<option value="Asia/Tehran" <?php if($timezone_city=="Asia/Tehran") echo "selected" ?> >(GMT+03:30) Tehran</option>
						<option value="Asia/Dubai" <?php if($timezone_city=="Asia/Dubai") echo "selected" ?> >(GMT+04:00) Abu Dhabi, Muscat</option>
						<option value="Asia/Yerevan" <?php if($timezone_city=="Asia/Yerevan") echo "selected" ?> >(GMT+04:00) Yerevan</option>
						<option value="Asia/Kabul" <?php if($timezone_city=="Asia/Kabul") echo "selected" ?> >(GMT+04:30) Kabul</option>
						<option value="Asia/Yekaterinburg" <?php if($timezone_city=="Asia/Yekaterinburg") echo "selected" ?> >(GMT+05:00) Ekaterinburg</option>
						<option value="Asia/Tashkent" <?php if($timezone_city=="Asia/Tashkent") echo "selected" ?> >(GMT+05:00) Tashkent</option>
						<option value="Asia/Kolkata"  <?php if($timezone_city=="Asia/Kolkata") echo "selected" ?> >(GMT+05:30) Chennai, Kolkata, Mumbai, New Delhi</option>
						<option value="Asia/Katmandu" <?php if($timezone_city=="Asia/Katmandu") echo "selected" ?> >(GMT+05:45) Kathmandu</option>
						<option value="Asia/Dhaka" <?php if($timezone_city=="Asia/Dhaka") echo "selected" ?> >(GMT+06:00) Astana, Dhaka</option>
						<option value="Asia/Novosibirsk" <?php if($timezone_city=="Asia/Novosibirsk") echo "selected" ?> >(GMT+06:00) Novosibirsk</option>
						<option value="Asia/Rangoon" <?php if($timezone_city=="Asia/Rangoon") echo "selected" ?> >(GMT+06:30) Yangon (Rangoon)</option>
						<option value="Asia/Bangkok" <?php if($timezone_city=="Asia/Bangkok") echo "selected" ?> >(GMT+07:00) Bangkok, Hanoi, Jakarta</option>
						<option value="Asia/Krasnoyarsk" <?php if($timezone_city=="Asia/Krasnoyarsk") echo "selected" ?> >(GMT+07:00) Krasnoyarsk</option>
						<option value="Asia/Hong_Kong"  <?php if($timezone_city=="Asia/Hong_Kong") echo "selected" ?> >(GMT+08:00) Beijing, Chongqing, Hong Kong, Urumqi</option>
						<option value="Asia/Irkutsk" <?php if($timezone_city=="Asia/Irkutsk") echo "selected" ?> >(GMT+08:00) Irkutsk, Ulaan Bataar</option>
						<option value="Australia/Perth" <?php if($timezone_city=="Australia/Perth") echo "selected" ?> >(GMT+08:00) Perth</option>
						<option value="Australia/Eucla" <?php if($timezone_city=="Australia/Eucla") echo "selected" ?> >(GMT+08:45) Eucla</option>
						<option value="Asia/Tokyo" <?php if($timezone_city=="Asia/Tokyo") echo "selected" ?> >(GMT+09:00) Osaka, Sapporo, Tokyo</option>
						<option value="Asia/Seoul" <?php if($timezone_city=="Asia/Seoul") echo "selected" ?> >(GMT+09:00) Seoul</option>
						<option value="Asia/Yakutsk" <?php if($timezone_city=="Asia/Yakutsk") echo "selected" ?> >(GMT+09:00) Yakutsk</option>
						<option value="Australia/Adelaide" <?php if($timezone_city=="Australia/Adelaide") echo "selected" ?> >(GMT+09:30) Adelaide</option>
						<option value="Australia/Darwin" <?php if($timezone_city=="Australia/Darwin") echo "selected" ?> >(GMT+09:30) Darwin</option>
						<option value="Australia/Brisbane" <?php if($timezone_city=="Australia/Brisbane") echo "selected" ?> >(GMT+10:00) Brisbane</option>
						<option value="Australia/Hobart" <?php if($timezone_city=="Australia/Hobart") echo "selected" ?> >(GMT+10:00) Hobart</option>
						<option value="Asia/Vladivostok" <?php if($timezone_city=="Asia/Vladivostok") echo "selected" ?> >(GMT+10:00) Vladivostok</option>
						<option value="Australia/Lord_Howe" <?php if($timezone_city=="Australia/Lord_Howe") echo "selected" ?> >(GMT+10:30) Lord Howe Island</option>
						<option value="Etc/GMT-11" <?php if($timezone_city=="Etc/GMT-11") echo "selected" ?> >(GMT+11:00) Solomon Is., New Caledonia</option>
						<option value="Asia/Magadan" <?php if($timezone_city=="Asia/Magadan") echo "selected" ?> >(GMT+11:00) Magadan</option>
						<option value="Pacific/Norfolk" <?php if($timezone_city=="Pacific/Norfolk") echo "selected" ?> >(GMT+11:30) Norfolk Island</option>
						<option value="Asia/Anadyr" <?php if($timezone_city=="Asia/Anadyr") echo "selected" ?> >(GMT+12:00) Anadyr, Kamchatka</option>
						<option value="Pacific/Auckland" <?php if($timezone_city=="Pacific/Auckland") echo "selected" ?> >(GMT+12:00) Auckland, Wellington</option>
						<option value="Etc/GMT-12" <?php if($timezone_city=="Etc/GMT-12") echo "selected" ?> >(GMT+12:00) Fiji, Kamchatka, Marshall Is.</option>
						<option value="Pacific/Chatham" <?php if($timezone_city=="Pacific/Chatham") echo "selected" ?> >(GMT+12:45) Chatham Islands</option>
						<option value="Pacific/Tongatapu" <?php if($timezone_city=="Pacific/Tongatapu") echo "selected" ?> >(GMT+13:00) Nuku'alofa</option>
						<option value="Pacific/Kiritimati" <?php if($timezone_city=="Pacific/Kiritimati") echo "selected" ?> >(GMT+14:00) Kiritimati</option>
						</select></td>
					</tr>
				</table>
				<span style = "font-size:11px; margin-top:10px;" valign = "top">&emsp;Toolbar will stop showing on your website after this time.</span>
			</div>
		</div>
		<div class = "lsq-toolbar-appearance" id = "dragAppearance" >
			<div class = "lsq-inner">
				<div class = "lsq_all_three">
					<h2>Appearance <span>
										<span><div class = "lsq-yellow" id = "yellowTheme" title = "Apply Theme"></div></span>
										<span><div class = "lsq-one" id = "greenTheme" title = "Apply Theme"></div></span>
										<span><div class = "lsq-two" id = "redTheme" title = "Apply Theme"></div></span>
										<span><div class = "lsq-three" id = "blueTheme" title = "Apply Theme"></div></span>										
									</span>
					</h2>
				</div>
				<hr>	
				
				<table>
					<tr class = "lsq-labelText">
						<td class = "lsq-padding">Bar Colour </td>
						<td class = "lsq-padding">Text Colour</td>					
					</tr>
					<tr>
						<td class = "lsq-padding"><input id = "bar_color" name = "bar_color" type = "text" class = "color lsq-sizenfont " style = "background-color:#<?php echo $bar_color;?>;" value = "<?php if(!empty($bar_color)){echo $bar_color;} else{ echo "1DB2DB";}?>"/></td>
						<td class = "lsq-padding"><input id = "text_color" name = "text_color" type = "text" class = "color lsq-sizenfont" style = "background-color:#<?php echo $text_color;?>;" value = "<?php echo $text_color;?>"/></td>												
					</tr>
					<tr class = "lsq-labelText">
						<td class = "lsq-padding">Button Colour</td>
						<td class = "lsq-padding">Link Colour</td>
					</tr>
					<tr>
						<td class = "lsq-padding"><input id = "click_here_color" name = "click_here_color" type = "text" class = "color lsq-sizenfont" style = "background-color:#<?php echo $click_here_color;?>" value= "<?php if(!empty($click_here_color)){echo $click_here_color;}else{echo "158AAB";} ?>"/></td>
						<td class = "lsq-padding"><input id = "link_color" name = "link_color" type = "text" class = "color lsq-sizenfont" style = "background-color:#<?php echo $link_color;?>" value = "<?php echo $link_color;?>"/></td>
					</tr>
				</table>
				</br>
				<p class = "lsq-showclose lsq-labelText" >
				<label>
				<input id = "close_button" type = "checkbox" valign ="middle" name = "close_button" <?php if($close_button=="show_close_button"){ echo 'checked';}?> value = "show_close_button"/> Show Close Button</label>
				<input id = "close_color" name = "close_color" type = "text" class = "color lsq-sizenfont" style = "background-color:#<?php echo $close_color;?>" value = "<?php echo $close_color;?>"/>
				</br>
				</p>
				<label class = "lsq-labelText">
				
				<input type = "checkbox" valign ="middle" name = "shadow_box" id = "shadow_box" value = "show_shadow" <?php if(!empty($shadow_box)){ echo 'checked';}?>/> Show Shadow
				</label>
				</br></br>
				<table width = "100%" style = "position:relative">
				<tr>
					<td valign = "middle"><label valign="middle" class = "lsq-labelText" >Select Font:</label></td>
					<td>
					<select id = "font_family" name = "font_family"  class = "lsq-timezone" >
					<option disabled>Select</option>
					<option value = "Arial" <?php if ($font_family=="Arial") echo "selected"?> >Arial</option>
					<option value = "Arial Black" <?php if ($font_family=="Arial Black") echo "selected"?> >Arial Black</option>
					<option value = "Brush Script MT" <?php if ($font_family=="Brush Script MT") echo "selected"?> >Brush Script MT</option>
					<option value = "Courier New" <?php if ($font_family=="Courier New") echo "selected"?> >Courier New</option>
					<option value = "Futura" <?php if ($font_family=="Futura") echo "selected"?> >Futura</option>
					<option value = "Geneva" <?php if ($font_family=="Geneva") echo "selected"?> >Geneva</option>
					<option value = "Helvetica Neue" <?php if ($font_family=="Helvetica Neue") echo "selected"?> >Helvetica</option>
					<option value = "Lucida Console" <?php if ($font_family=="Lucida Console") echo "selected"?> >Lucida Console</option>
					<option value = "Papyrus" <?php if ($font_family=="Papyrus") echo "selected"?> >Papyrus</option>
					<option value = "serif" <?php if ($font_family=="serif") echo "selected"?> >Serif</option>
					<option value = "Sans Serif" <?php if ($font_family=="Sans Serif") echo "selected"?> >Sans Serif</option>
					<option value = "Tahoma" <?php if ($font_family=="Tahoma") echo "selected"?> >Tahoma</option>
					<option value = "Times New Roman" <?php if ($font_family=="Times New Roman") echo "selected"?> >Times New Roman</option>
					<option value = "Verdana" <?php if ($font_family=="Verdana") echo "selected"?>  >Verdana</option>
					</select>
					</td>
				</tr>
				</table>
				<input type="hidden" name="action" value="update" />
				<input type="hidden" name="page_options" value="leadsquared_toolbar" />
			</div>
		</div>
		<div class = "imageLS"><a href = "http://www.leadsquared.com" target="_blank" ><img src = "<?php echo plugins_url('../images/powered_byLS.png',__FILE__);?>" alt = "LeadSquared Image"></a></div>
		</br>		
		<div>
			<table class = "lsq-HideShow" >			
			<tr>
				<th>
					<label>Set the visibility of the topbar on your website</label>
				</th>
				<td>
					<select name = "toggle_button">
						<option value = "Yes" <?php if($toggle_button=="Yes" && !empty($toggle_button)) echo "selected" ?> > Show </option>
						<option value = "No" <?php if($toggle_button=="No" && !empty($toggle_button)) echo "selected" ?> > Hide </option>								
					</select>
				</td> 
			</tr>
			</table>
		</div>
		<div  class = "lsq-button-save">
			<input id = "lsq_save_button" class = "button-primary" type="submit" name="Save" value="<?php _e('Save Toolbar'); ?>" />			
		</div>
	</form>
		
</div>

  

			



