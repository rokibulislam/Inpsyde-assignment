<?php
/**
 * Inpsyde Assets
 *
 * @package Inpsyde\Assets
 */

namespace Inpsyde;

/**
 * Assets Class
 */
class Assets {

	/**
	 * The constructor
	 */
	public function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_register_scripts' ) );
	}

	/**
	 * Registered scripts
	 *
	 * @return void
	 */
	public function enqueue_register_scripts() {

		wp_register_style( 'inpsyde-frontend', INPSYDE_ASSETS . '/css/inpsyde.css', array(), '1.0.0', 'all' );

		wp_register_script( 'inpsyde-frontend', INPSYDE_ASSETS . '/js/inpsyde.js', array( 'jquery' ), '1.0.0', true );
	}

	/**
	 * Enqueue scripts
	 *
	 * @return void
	 */
	public function enqueue_frontend_scripts() {

		wp_enqueue_style( 'inpsyde-frontend' );

		wp_enqueue_script( 'inpsyde-frontend' );

		$localize_script = $this->get_frontend_localized_scripts();

		wp_localize_script( 'inpsyde-frontend', 'inpsyde_frontend', $localize_script );
	}

	/**
	 * Localized scripts
	 *
	 * @return array
	 */
	public function get_frontend_localized_scripts() {

		return apply_filters(
			'inpsyde_frontend_localize_script',
			array(
				'nonce'   => wp_create_nonce( 'inpsyde_nonce' ),
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
			)
		);
	}
}
