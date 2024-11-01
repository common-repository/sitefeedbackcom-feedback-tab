<?php
   /*
   Plugin Name: SiteFeedback.com Widget
   Plugin URI: http://www.SiteFeedback.com/getthecode/#wordpress
   Description: Display a feedback tab on each page of your site to collect user feedback and ratings accessible on http://www.sitefeedback.com
   Version: 1.2
   Author: SiteFeedback.com
   Author URI: http://www.SiteFeedback.com
   License: GPL2
   */

if(isset($_POST['WFSFSubmit'])){
		if($_POST['wfsf_username'] != '')
			update_option('wfsf_username', sf_sanitize($_POST['wfsf_username']));
			else
			update_option('wfsf_username', '');	
		if($_POST['wfsf_email'] != '' && is_email($_POST['wfsf_email']))
			update_option('wfsf_email', sf_sanitize($_POST['wfsf_email']));
			else
			update_option('wfsf_email', '');	
		if($_POST['wfsf_password'] != '')
			update_option('wfsf_password', sf_sanitize($_POST['wfsf_password']));
			else
			update_option('wfsf_password', '');
		if(isset($_POST['wfsf_showhomepage']))
			update_option('wfsf_showhomepage', sf_sanitize($_POST['wfsf_showhomepage']));
			else
			update_option('wfsf_showhomepage','');
		if(isset($_POST['wfsf_showarchive']))
			update_option('wfsf_showarchive', sf_sanitize($_POST['wfsf_showarchive']));
			else
			update_option('wfsf_showarchive','');
		if(isset($_POST['wfsf_showpages']))
			update_option('wfsf_showpages', sf_sanitize($_POST['wfsf_showpages']));
			else
			update_option('wfsf_showpages','');	
}
	
	function sf_sanitize($str){ //simple sanitizing function for input strings
		return addslashes(trim(strip_tags($str)));
	}  
   
	function wfsf_admin_menu () { //adding options page
			add_options_page("SiteFeedback.com Settings","SiteFeedback Widget","manage_options","wfsf-widget-setting", "wfsf_setting");
	}

	function  wfsf_setting () {
		if ( !current_user_can( 'manage_options' ) ) //check users capability
			wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
		include("sf-options-page.php");
	}

	function wfsf_load_widget(){ //write widget code in footer
		if(is_single() || (get_option('wfsf_showhomepage', false) && is_home()) || (get_option('wfsf_showarchive', false) && is_archive())){ //check users preferences 	
			if(get_option('wfsf_username', false))
				echo "<script src='http://www.sitefeedback.com/wth-latest.js' type='text/javascript' _pubid='".htmlspecialchars(get_option('wfsf_username'))."' id='wfwhtsf'></script>";
			else
				echo "<script src='http://www.sitefeedback.com/wth-latest.js' type='text/javascript'></script>";
			}
	}

add_action("admin_menu", "wfsf_admin_menu"); // adding admin menu under Settings
add_action('wp_footer', 'wfsf_load_widget'); // write widget javascript snippet in footer


