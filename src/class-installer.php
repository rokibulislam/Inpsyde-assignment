<?php
/**
 * Inpsyde Installer
 *
 * @package Inpsyde\Installer
 */

namespace Inpsyde;

/**
 * Installer Class
 */
class Installer {

	/**
	 * The constructor
	 */
	public function __construct() {
		$this->setup_pages();
	}

	/**
	 * Setup pages
	 *
	 * @return void
	 */
	public function setup_pages() {
		$meta_key = '_wp_page_template';

		$pages = array(
			array(
				'post_title' => __( 'Lovely User List', '' ),
				'slug'       => 'lovely-users',
				'page_id'    => 'lovely_users',
				'content'    => '[lovely_users]',
			),
		);

		if ( $pages ) {
			foreach ( $pages as $page ) {
				$page_id = $this->create_page( $page );
			}
		}
	}

	/**
	 * Create Page
	 *
	 * @param array $page page.
	 *
	 * @return int $page_id
	 */
	public function create_page( $page ) {
		$page_obj = get_page_by_path( $page['post_title'] );

		if ( ! $page_obj ) {

			$page_id = wp_insert_post(
				array(
					'post_title'     => $page['post_title'],
					'post_name'      => $page['slug'],
					'post_content'   => $page['content'],
					'post_status'    => 'publish',
					'post_type'      => 'page',
					'comment_status' => 'closed',
				)
			);

			return $page_id;
		}

		return false;
	}
}
