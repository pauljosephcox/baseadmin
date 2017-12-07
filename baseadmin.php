<?php

/**
 *
 * @wordpress-plugin
 * Plugin Name: Base Admin
 * Description: A Custom Wordpress Admin Theme
 * Author: Luke Meyrick & Paul Joseph Cox
 * Version: 1.0
 * Author URI: http://pauljosephcox.com/
 */


if (!defined('ABSPATH')) exit;


class BaseAdmin {

	public $errors = false;
	public $notices = false;
	public $slug = 'baseadmin';

	function __construct() {

		$this->path = plugin_dir_path(__FILE__);
		$this->folder = basename($this->path);
		$this->dir = plugin_dir_url(__FILE__);
		$this->version = '1.0';

		$this->errors = false;
		$this->notice = false;

		// Actions
		if(is_admin()) {

			add_action('admin_enqueue_scripts', array($this, 'scripts'));
			add_action('admin_head',array($this,'font'));

		}

	}

	public function font(){

		echo '<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">';

	}

	/**
	 * Add Custom scriptions
	 * @return type
	 */

	public function scripts() {

		wp_enqueue_style('baseadmin', $this->dir.'assets/dist/css/site.min.css', array(), $this->version, false);
		wp_enqueue_script('baseadmin', $this->dir.'assets/dist/js/site.js', array(), $this->version, false);

	}

}


// ------------------------------------
// Go
// ------------------------------------

$meyrickalcox = new BaseAdmin();
