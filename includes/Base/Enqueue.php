<?php 

/**
* Trigger this file on Plugin uninstall
*
* 
*/

namespace Includes\Base;

use \Includes\Base\BaseController;

class Enqueue extends BaseController{

	public function register() {
		 add_action( 'admin_enqueue_scripts', array( $this, 'enqueueAdmin'));
		 add_action( 'wp_enqueue_scripts', array( $this, 'enqueuePage'));	
	}

	public function enqueueAdmin(){
		// enqueue all our scripts
		wp_enqueue_style( 'mypluginstyle-admin', $this->plugin_url . '/assets/css/pluginStyleSheet.css', __FILE__ );
	}

	public function enqueuePage(){
	
	/* 	wp_enqueue_style( 'mypluginstyle-page', $this->plugin_url . '', 99 ); */

	    wp_register_script( "ajax_submit_post" , $this->plugin_url . '/assets/scripts/ajax_submit_post.js', array('jquery') );
	    wp_localize_script( 'ajax_submit_post', 'ajax_submit_post', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )));        

	    wp_enqueue_script( 'jquery' );
	    wp_enqueue_script( 'ajax_submit_post' );

		wp_enqueue_script( 'mypluginscritpt-page', $this->plugin_url . '/assets/scripts/pluginScripts.js', __FILE__ , false, true );
		
		wp_enqueue_script( 'sweetalert-min-js', 'https://unpkg.com/sweetalert/dist/sweetalert.min.js', __FILE__ , false, true );
		
		wp_enqueue_media();
	}

}