<?php
/**
 * Inpsyde Shortcode
 *
 * @package Inpsyde\Shortcode
 */

namespace Inpsyde;

/**
 *  Shortcode Class
 */
class Shortcode {

	use UserTrait;

	/**
	 * The constructor
	 */
	public function __construct() {
		add_shortcode( 'lovely_users', array( $this, 'render_shortcode' ) );
	}

	/**
	 * Lovely Users form shortcode callback
	 *
	 * @return string
	 */
	public function render_shortcode() {
		ob_start();

		wpinpsyde()->assets->enqueue_frontend_scripts();

		global $wp_query;

		$http      = new Http();
		$cache_key = 'lovely_all_users';
		$users = get_transient( $cache_key );

		if ( false === $users ) {

			error_log( print_r( 'getting all data from api', true ) );

			$users     = new Users();

			$responses = $http->get( '/users/' );

			foreach ( $responses as $response ) {

				$user = $this->set_user_info( $response );

				$users->set_users( $user );
			}

			set_transient( $cache_key, $users, 12 * HOUR_IN_SECONDS );
		}

		inpsyde_get_template_part( 'tables', '', array( 'users' => $users ) );

		return ob_get_clean();
	}
}
