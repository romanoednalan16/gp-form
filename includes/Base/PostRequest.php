<?php 

/**
* 
*
*
*/

namespace Includes\Base;

use \Includes\Base\BaseController;

class PostRequest extends BaseController{

	function register() {
		 if(isset($_POST)){
			  add_action( 'admin_post_gp_save_option', array($this , 'gp_save_option_func') );
			// add_action( 'admin_post_nopriv_gp_create_post', array($this , 'gp_create_post_func') ); 
			  add_action( 'wp_ajax_nopriv_gp_create_post', array($this , 'gp_create_post_func') ); 
			  add_action( 'wp_ajax_gp_create_post', array($this , 'gp_create_post_func') ); 
		 }
	}
	
	
	function gp_save_option_func() {
		
		
		
		if(isset($_POST['gp_redirect'])){
			update_option( 'gp_redirect_link', $_POST['gp_redirect'] );
			update_option( 'gp_email', $_POST['gp_email'] );
			wp_redirect( $_POST['redirect']);	
		}
		
	}
	function gp_create_post_func() {
		//print_r($_POST);
		global $wpdb;
			
			
		if ( !wp_verify_nonce( $_POST['nonce'], "approve_post_nonce")) {
		  exit("Please Check your security");
	    } 	
		
		
		$gp_email_default = (get_option( 'gp_email') != null ?get_option( 'gp_email'): "admin@email.com" );
		
		$to = $gp_email_default ;
		$subject = 'Activate Post';
		$body = 'Approve the post, click below the link. <br>';
		$headers = "MIME-Version: 1.0"  . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= "From: Author <Client@gmail.com>"."\r\n";
		$headers .= "Reply-To: <Client@gmail.com>"."\r\n";
		$headers .= "Subject: $subject"."\r\n";
		$headers .= "X-Mailer: PHP/".phpversion();
		
		
		// Gather post data.
		$data_post = array(
			'post_title'    => $_POST['title'],
			'post_content'  => $_POST['Description'],
			'post_status'   => 'publish',
			'post_excerpt'   => $_POST['excerpt'],
			'post_author'   => get_current_user_id(),
			'post_type'   => $_POST['postype'],
			'post_thumbnail'   => $_POST['featureimage']
		);
		 
		 

		// Insert the post into the database.
	
		
		
		$hash_key = wp_generate_password(12);
		$table = $wpdb->prefix.'pending_post';
		$data = array(
					'key' => $hash_key,
					'meta_post' => serialize($data_post),
					'user_id' => get_current_user_id() ,
					'email' => 're4227@gmail.com',
					'post_type' => $_POST['postype']
				);
		$format = array('%s','%s','%d' ,'%s','%s');
		$wpdb->insert($table,$data,$format);
		$my_id = $wpdb->insert_id;
		
		//echo $my_id ;
		
	
		$body .=  admin_url('admin-post.php') . "?action=approve_post&key=" .$hash_key ;
		
		
		
		
		
		
		
		
		
		if(!empty($my_id) && $my_id !== null ){
			$mail_status = mail($to,$subject,$body,$headers);
			
			
			
			echo json_encode(array("success" => true));
			
			
		}
		else{
			echo json_encode(array("success" => false));
		}
		
		
	
	
		/* $post_id = wp_insert_post( $my_post );
		set_post_thumbnail($post_id, $_POST['featureimage']); */
	
	
		//wp_redirect( $_POST['redirect']."?success=true");	
		die();
	
		
		//request handlers should die() when they complete their task
	}

}