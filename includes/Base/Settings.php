<?php 

/**
* Trigger this file on Plugin uninstall
*
* @package 
*/

namespace Includes\Base;

use \Includes\Libraries\Shippo\Shippo;
use \Includes\Libraries\Shippo\Shippo_Address;


class Settings extends BaseController {
	
	
	
	public function register(){
		
	
		
		
		
		//add_filter( "plugin_action_links_$this->plugin", array( $this, 'settings_link' ) );
		add_action( 'admin_menu', array( $this, 'menu_redirect_gpost' ) );
		
		


	}

	function menu_redirect_gpost() {
		add_options_page( 'GPost Setting', 'GPost Setting', 'manage_options', 'menu-setting-gpost-identifier', array( $this, 'settings_template_gpost' ) );
	}


	public function settings_template_gpost( ){
		// add custom settings link
		global $getThisTemplates;
		global $wp;
		
		$pages = get_pages(
			array (
				'parent'  => 0, // replaces 'depth' => 1,
			)
		);

		$array_page = wp_list_pluck( $pages,'post_title', 'ID'  );
		
		$gp_redirect_link_default = get_option( 'gp_redirect_link');
		$gp_email_default = get_option( 'gp_email');
		
		
		//echo (get_option( 'gp_email') != null ?get_option( 'gp_email'): "null" );
		
		$current_url = $_SERVER["REQUEST_URI"];
	
		
		if (isset( $getThisTemplates['gpostsetting.teamplate'])) {
			include($getThisTemplates['gpostsetting.teamplate']);
		}
		else{
			echo "Not Available";
		}
		
	}
}