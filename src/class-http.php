<?php
/**
 * Inpsyde Geo
 *
 * @package Inpsyde\Http
 */

namespace Inpsyde;

use WP_Error;

/**
 * Http Class
 */
class Http {

	/**
	 * Http Root
	 *
	 * @var string
	 */
	public $root    = 'https://jsonplaceholder.typicode.com';
	/**
	 * Http Url
	 *
	 * @var string
	 */
	private $url = '';

	/**
	 * Http Query arguments
	 *
	 *  @var array
	 */
	private $query = array();

	/**
	 * The constructor
	 */
	public function __construct() {

	}

	/**
	 * Merge Array
	 *
	 * @param array $args args.
	 *
	 * @return Array
	 */
	private function args( $args ) {
		$defaults = array();
		return wp_parse_args( $args, $defaults );
	}

	/**
	 * Build Url
	 *
	 * @param string $url url.
	 * @param array  $query query.
	 *
	 * @return string
	 */
	private function build_url( $url = '', $query = array() ) {
		if ( $url ) {
			$url = $this->root . $url;
		} elseif ( $this->url ) {
			$url = $this->root . $this->url;
		}

		if ( ! empty( $query ) ) {
			$this->query = array_merge( $query, $this->query );
		}

		if ( ! empty( $this->query ) ) {
			$url .= '?' . http_build_query( $this->query );
		}

		$this->url   = '';
		$this->query = array();

		return $url;
	}


	/**
	 * Get Request
	 *
	 * @param string $url url.
	 * @param array  $query data.
	 * @param array  $args args.
	 *
	 * @return string
	 */
	public function get( $url = '', $query = array(), $args = array() ) {
		$args = $this->args( $args );
		$url  = $this->build_url( $url, $query );

		$response = wp_remote_get( $url, $args );

		return $this->response( $response );
	}

	/**
	 * Post Request
	 *
	 * @param string $url url.
	 * @param array  $data data.
	 * @param array  $args args.
	 *
	 * @return string
	 */
	public function post( $url = '', $data = array(), $args = array() ) {
		$args = $this->args( $args );

		$args['body'] = ! empty( $data ) ? json_encode( $data ) : null;

		$url = $this->build_url( $url );

		$response = wp_remote_post( $url, $args );

		return $this->response( $response );
	}

	/**
	 * Put Request
	 *
	 * @param string $url url.
	 * @param array  $data data.
	 * @param array  $args args.
	 *
	 * @return string
	 */
	public function put( $url = '', $data, $args = array() ) {
		$data['_method'] = 'PATCH';

		return $this->post( $url, $data, $args );
	}


	/**
	 * Delete Request
	 *
	 * @param array $data data.
	 * @param array $args args.
	 *
	 * @return string
	 */
	public function delete( $data = array(), $args = array() ) {
		$args = $this->args( $args );
		$args['method'] = 'delete';
		$args['body'] = ! empty( $data ) ? $data : null;

		$url = $this->build_url();

		$response = wp_remote_request( $url, $args );

		return $this->response( $response );
	}

	/**
	 * Get response
	 *
	 * @param string $response response.
	 *
	 * @return string
	 */
	private function response( $response ) {
		if ( is_wp_error( $response ) ) {
			return $response;
		}

		$response_code = wp_remote_retrieve_response_code( $response );
		$body = json_decode( $response['body'], true );

		if ( $response_code >= 200 && $response_code <= 299 ) {
			return $body;
		} else {
			$message    = is_array( $body ) && array_key_exists( 'message', $body ) ? $body['message'] : __( 'Something went wrong', 'wemail' );
			$error_data = array( 'status' => $response_code );

			if ( isset( $body['errors'] ) && ! empty( $body['errors'] ) && is_array( $body['errors'] ) ) {
				$error_data['errors'] = $body['errors'];
			}

			return new WP_Error( 'error', $message, $error_data );
		}
	}
}
