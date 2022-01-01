<?php
/**
 * Inpsyde Ajax
 *
 * @package Inpsyde\Ajax
 */

namespace Inpsyde;

/**
 * Ajax Class
 */
class Ajax {

	use UserTrait;

	/**
	 * The constructor
	 */
	public function __construct() {

		add_action( 'wp_ajax_get_user_info', array( $this, 'get_user_info' ) );

		add_action( 'wp_ajax_nopriv_get_user_info', array( $this, 'get_user_info' ) );
	}


	/**
	 * Get User Info
	 *
	 * @return string
	 */
	public function get_user_info() : string {
		$post_data = wp_unslash( $_POST );

		$id = $post_data['id'];

		if ( ! wp_verify_nonce( $post_data['nonce'], 'inpsyde_nonce' ) ) {
			wp_send_json_error( __( 'Unauthorized operation', 'inpsyde' ) );
		}

		$cache_key = 'lovely_users' . $id;

		$user = get_transient( $cache_key );

		if ( false === $user ) {

			$http = new Http();

			$response = $http->get( '/users/', array( 'id' => $id ) );

			$user = $this->set_user_info( $response[0] );

			set_transient( $cache_key, $user, 12 * HOUR_IN_SECONDS );
		}

		ob_start();

		inpsyde_get_template_part( 'table', '', array( 'user' => $user ) );

		return ob_get_contents();
	}

}
