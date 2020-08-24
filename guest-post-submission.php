<?php 
/**
* @package Plugin Formatting
*/
/*
Plugin Name: A Guest Post 
Plugin URI: 
Description: 
Version: 1.0.0
Author: Nulled
Author URI : 
*/


if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ){
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}


function activate_guest_plugin(){
	Includes\Base\Activate::activate();
}
 register_activation_hook( __FILE__, 'activate_guest_plugin' );
//add_action( 'init', 'activate_guest_plugin' );

// Initialize Deactivation, The code that runs during plugin deactivation
function deactivate_guest_plugin(){
	Includes\Base\Deactivate::deactivate();
}
register_deactivation_hook( __FILE__, 'deactivate_guest_plugin' );


// Include the Init folder, Initialize all the core classes of the plugin
if ( class_exists( 'Includes\\Init' ) ) {
	
	global $getThisTemplates;
	Includes\Init::load_template();
	Includes\Init::register_services(); 
}





function wpdocs_guest_admin_script( $hook ) {
 // echo get_stylesheet_directory_uri();
		
	
		wp_enqueue_style( 'wp-astra-child-theme-shippo-css', get_stylesheet_directory_uri() . '/assets/css/admin_css_shippo.css', array(), '1.1.1' );
}
add_action( 'init', 'wpdocs_guest_admin_script' );
