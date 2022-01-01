<?php
/**
 * Plugin Name: Inpsyde Assignment Test
 * Description: Description
 * Plugin URI: http://#
 * Author: Author
 * Author URI: http://#
 * Version: 1.0.0
 * License: GPL2
 * Text Domain: inpsyde
 * Domain Path: /languages
 * Requires at least: 5.6
 * Requires PHP: 7.0
 *
 * @package Inpsyde
 */

/*
	Copyright (C) Year  Author  Email

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License, version 2, as
	published by the Free Software Foundation.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once __DIR__ . '/vendor/autoload.php';


/**
 * WpInpsyde class
 *
 * @class WpInpsyde The class that holds the entire WpInpsyde plugin
 */
final class WpInpsyde {

	/**
	 *
	 * Plugin version
	 *
	 * @var string
	 */
	public $version    = '1.0.0';

	/**
	 * Holds various class instances
	 *
	 * @var array
	 */
	private $container = array();

	/**
	 * Constructor for the WpInpsyde class
	 *
	 * Sets up all the appropriate hooks and actions
	 * within our plugin.
	 */
	public function __construct() {
		$this->define_constants();

		register_activation_hook( __FILE__, array( $this, 'activate' ) );
		register_deactivation_hook( __FILE__, array( $this, 'deactivate' ) );

		add_action( 'plugins_loaded', array( $this, 'init_plugin' ) );
	}


	/**
	 * Magic getter to bypass referencing objects
	 *
	 * @param string $prop prop.
	 *
	 * @return Class Instance
	 */
	public function __get( $prop ) {
		if ( array_key_exists( $prop, $this->container ) ) {
			return $this->container[ $prop ];
		}

		return $this->{$prop};
	}

	/**
	 * Magic check referencing objects
	 *
	 * @param string $prop prop.
	 *
	 * @return boolean
	 */
	public function __isset( $prop ) {
		return isset( $this->{$prop} ) || isset( $this->container[ $prop ] );
	}

	/**
	 * Initializes the WpInpsyde() class
	 *
	 * Checks for an existing wpinpsyde() instance
	 * and if it doesn't find one, creates it.
	 */
	public static function init() {
		static $instance = false;

		if ( ! $instance ) {
			$instance = new self();
		}

		return $instance;
	}

	/**
	 * Define Constants
	 */
	public function define_constants() {
		define( 'INPSYDE_VERSION', $this->version );
		define( 'INPSYDE_SEPARATOR', ' | ' );
		define( 'INPSYDE_FILE', __FILE__ );
		define( 'INPSYDE_ROOT', __DIR__ );
		define( 'INPSYDE_PATH', dirname( INPSYDE_FILE ) );
		define( 'INPSYDE_URL', plugins_url( '', INPSYDE_FILE ) );
		define( 'INPSYDE_ASSETS', INPSYDE_URL . '/assets' );
	}

	/**
	 *  When activate plugin fire this function
	 */
	public function activate() {
		new \Inpsyde\Installer();
	}

	/**
	 *  When deactivate plugin fire this function
	 */
	public function deactivate() {

	}

	/**
	 * Init plugin
	 */
	public function init_plugin() {

		add_action( 'init', array( $this, 'localization_setup' ) );

		add_action( 'init', array( $this, 'init_classes' ) );
	}

	/**
	 * Localization plugin
	 */
	public function localization_setup() {
		load_plugin_textdomain( 'inpsyde', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	}

	/**
	 * Init classes
	 */
	public function init_classes() {
		new \Inpsyde\Shortcode();
		new \Inpsyde\Ajax();

		$this->container['assets'] = new \Inpsyde\Assets();
	}
}


/**
 * Load Inpsyde Assignment Plugin when all plugins loaded
 *
 * @return WpInpsyde
 */
function wpinpsyde() {
	return WpInpsyde::init();
}

wpinpsyde();
