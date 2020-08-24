<?php 

/**
* 
*
*
*/

namespace Includes\Base;

use \Includes\Base\BaseController;

class GetRequest extends BaseController{

	function register() {
		 if(isset($_GET)){
			 add_action( 'admin_post_approve_post', array($this , 'gp_approve_post_func') );
			 add_action( 'admin_post_nopriv_approve_post', array($this , 'gp_approve_post_func') ); 
		 }
	}
	function gp_approve_post_func(){
		global $wpdb;
		$gp_redirect_link_default = get_option( 'gp_redirect_link');
		// echo ;
		if(isset($_GET['key'])){
		
			$table = $wpdb->prefix . 'pending_post';
			$pending_post = $wpdb->get_results("SELECT * FROM `$table` WHERE `key` = '{$_GET['key']}'");
			// print_r($pending_post);
			
			if(!empty($pending_post)){
				$pending_post = $pending_post[0];
				$meta_post = unserialize($pending_post->meta_post);
				
				
				
				$post_id = wp_insert_post( $meta_post );
				
				set_post_thumbnail($post_id ,$meta_post['post_thumbnail'] );
				
				
				// echo $post_id;
				$delete = $wpdb->delete( $table, array( 'id' => $pending_post->id ) ); //True force deletes the post and doesn't send it to the Trash
				if($delete){
					echo "Post {$pending_post->id} deleted successfully!";
					wp_redirect( get_permalink($gp_redirect_link_default));	
				}
				else{
					echo "Post {$pending_post->id} was not deleted.";
				}
			}
			else{
				echo "Something Wrong!";
			}
			//set_post_thumbnail($post_id,$meta_post);
		}
		die();
	}

}