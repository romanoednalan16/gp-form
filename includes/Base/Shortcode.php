<?php 

/**
* Trigger this file on Plugin uninstall
*
*
*/

namespace Includes\Base;

use \Includes\Base\BaseController;

class Shortcode extends BaseController{

	function register() {
		add_shortcode( 'guest_form_post', array( $this , 'guest_form_post_func' ) );
	}

	function guest_form_post_func(){
		// require admin template
		
		global $getThisTemplates;
		
		 $args = array(
		   'public'   => true,
		   '_builtin' => false,
		);
		
		$post_types = get_post_types( $args , 'names' , 'and'  );
		$post_types['page'] = 'page';
		$post_types['post'] = 'post';
	
		$user = wp_get_current_user();
		$roles = ( array ) $user->roles;
		$nonce = wp_create_nonce("approve_post_nonce");
		//print_r($roles );
	
		ob_start();
		
		
		
		if (isset( $getThisTemplates['submitFormPost.template']) && in_array( 'author', $roles)) {
			include($getThisTemplates['submitFormPost.template']);
		}
		else{
			echo "Not Available";
		}
		
		$output = ob_get_clean();
		
		return $output; 
	}
}