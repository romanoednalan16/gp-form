<?php 

/**
* Trigger this file on Plugin uninstall
*
* @package 
*/

namespace Includes\Pages;

use \Includes\Base\BaseController;

class Admin extends BaseController {

	public function register() {
		add_action( 'init', array( $this, 'add_admin_pages' ) );
	}

	public function add_admin_pages() {
			   $labels = array(
						'name'                  => _x(
				 'Guest', 'Post type general name', 'textdomain' ),
						'singular_name'         => _x(
				 'Guest', 'Post type singular name', 'textdomain' ),
						'menu_name'             => _x(
				 'Guest', 'Admin Menu text', 'textdomain' ),
						'name_admin_bar'        => _x(
				 'Guest', 'Add New on Toolbar', 'textdomain' ),
						'add_new'               => __( 'Add New', 'textdomain' ),
						'add_new_item'          => __( 'Add New Guest', 'textdomain' ),
						'new_item'              => __( 'New Guest', 'textdomain' ),
						'edit_item'             => __( 'Edit Guest', 'textdomain' ),
						'view_item'             => __( 'View Guest', 'textdomain' ),
						'all_items'             => __( 'All Guest', 'textdomain' ),
						'search_items'          => __( 'Search Guest', 'textdomain' ),
						'parent_item_colon'     => __( 'Parent Guest:', 'textdomain' ),
						'not_found'             => __( 'No guests found.', 'textdomain' ),
						'not_found_in_trash'    => __( 'No guests found in Trash.', 'textdomain' ),
						'featured_image'        => _x(
				 'Guest Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
						'set_featured_image'    => _x(
				 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
						'remove_featured_image' => _x(
				 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
						'use_featured_image'    => _x(
				 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
						'archives'              => _x(
				 'Guest archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
						'insert_into_item'      => _x(
				 'Insert into guest', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
						'uploaded_to_this_item' => _x(
				 'Uploaded to this guest', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
						'filter_items_list'     => _x(
				 'Filter books list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
						'items_list_navigation' => _x(
				 'Books list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
						'items_list'            => _x(
				 'Books list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
					);
				 
				$args = array(
					'labels'             => $labels,
					'public'             => true,
					'publicly_queryable' => true,
					'show_ui'            => true,
					'show_in_menu'       => true,
					'query_var'          => true,
					'rewrite'            => array( 'slug' => 'guest' ),
					'capability_type'    => 'post',
					'has_archive'        => true,
					'hierarchical'       => false,
					'menu_position'      => null,
					'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
				);
				
			
			 
				register_post_type( 'guest', $args );
				
				
				$labels = array(
					'name'              => _x(
				'Genres', 'taxonomy general name', 'textdomain' ),
					'singular_name'     => _x(
				'Genre', 'taxonomy singular name', 'textdomain' ),
					'search_items'      => __( 'Search Genres', 'textdomain' ),
					'all_items'         => __( 'All Genres', 'textdomain' ),
					'parent_item'       => __( 'Parent Genre', 'textdomain' ),
					'parent_item_colon' => __( 'Parent Genre:', 'textdomain' ),
					'edit_item'         => __( 'Edit Genre', 'textdomain' ),
					'update_item'       => __( 'Update Genre', 'textdomain' ),
					'add_new_item'      => __( 'Add New Genre', 'textdomain' ),
					'new_item_name'     => __( 'New Genre Name', 'textdomain' ),
					'menu_name'         => __( 'Genre', 'textdomain' ),
				);
			 
				$args = array(
					'hierarchical'      => true,
					'labels'            => $labels,
					'show_ui'           => true,
					'show_admin_column' => true,
					'query_var'         => true,
					'rewrite'           => array( 'slug' => 'genre' ),
				);
				
				register_taxonomy( 'genre', 'Category', $args );
				
	}

	public function admin_index(){
		// require admin template
		require_once $this->plugin_path . 'templates\admin.template.php';				
	}

}