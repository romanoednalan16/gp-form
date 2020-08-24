<?php 

/**
* Trigger this file on Plugin uninstall
*
* 
*/

namespace Includes\Base;

class Activate {

	public static function activate(){
		
		flush_rewrite_rules();
		self::create_plugin_database_table();

	}
	static function create_plugin_database_table()
	{
		global  $wpdb;
		$tblname = 'pending_post';
		$pending_post = $wpdb->prefix  . "$tblname ";
		$charset_collate = $wpdb->get_charset_collate(); 
		$sql = "CREATE TABLE ". $pending_post . " ( ";
		$sql .= "  `id`  int(11)   NOT NULL auto_increment, ";
		$sql .= "  `key`  varchar(16)   NOT NULL, ";
		$sql .= "  `meta_post`  varchar(500)   NOT NULL, ";
		$sql .= "  `user_id`  int(16)   NOT NULL, ";
		$sql .= "  `created_at` datetime DEFAULT CURRENT_TIMESTAMP , ";
		$sql .= "  `email`  varchar(255)   NOT NULL, ";
		$sql .= "  `post_type`  varchar(255)   NOT NULL, ";
		$sql .= "  PRIMARY KEY (`id`) "; 
		$sql .= ")  $charset_collate;";
		require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );
		maybe_create_table( $wpdb->prefix . $tblname, $sql );
	}

}