<?php 

/**
* Trigger this file on Plugin uninstall
*
* 
*/

namespace Includes\Base;


class BaseController {

	public $plugin_path;
	public $plugin_url;
	public $plugin;
	public $shippo;
	public $address;

	public function __construct() {

		$this->plugin_path = plugin_dir_path( dirname( __FILE__, 2 ) );
		$this->plugin_url = plugin_dir_url( dirname( __FILE__, 2 ) );
		$this->plugin = plugin_basename( dirname( __FILE__, 3 ) . '/bidi-recycle-program.php' );
		

	}

}