<?php 
/*
 * Plugin Name: Restrcition for Non Users
 * Description: Makes the site only accessable for the logged in users
 * Author: Mahiubl Hasan
 * Author Uri: http://sohag07hasan.elance.com
 * */

class WpNonUserRestriction{
	
	var $current_directory;
	
	function __construct(){
		add_action('init', array(&$this, 'restriction_check'));
		$this->current_directory = dirname(__FILE__) . '/';
	}
	
	
	//check if the current visitor is an user. If not exit showing a message
	function restriction_check(){
		if(!is_user_logged_in() && !$this->is_login_page()){
			//$login_url = add_query_arg(array('restriction' => 'applied'), wp_login_url());			
			//return $this->redirect($login_url);
			
			$login_url = wp_login_url();
			include $this->current_directory . 'includes/message.php';
			exit;
		}		
	}
	
	
	//redirection
	function redirect($url){
		if(!function_exists('wp_redirect')){
			include ABSPATH . 'wp-includes/pluggable.php';
		}
		
		wp_redirect($url);
		exit;
	}
	
	
	//conditionally checking if the current page is login page
	function is_login_page(){
		return strstr($this->get_current_url(), 'login.php') ? true : false;
	}
	
	
	//return the current page url
	function get_current_url(){
		$page_url = 'http';
		if ($_SERVER["HTTPS"] == "on") {$page_url .= "s";}
		$page_url .= "://";
		if ($_SERVER["SERVER_PORT"] != "80") {
			$page_url .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
		} else {
			$page_url .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		}
		return $page_url;
	}
	
}


return new WpNonUserRestriction();



?>