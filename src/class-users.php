<?php
/**
 * Inpsyde Users
 *
 * @package Inpsyde\Users
 */

namespace Inpsyde;

/**
 *  User Class
 */
class Users {

	/**
	 * Array of User Object
	 *
	 *  @var Array
	 */
	private $users = array();

	/**
	 * Get Array of users
	 *
	 * @return Object
	 */
	public function get_users() {
		return $this->users;
	}

	/**
	 * Set Users
	 *
	 * @param User $user user.
	 *
	 * @return void
	 */
	public function set_users( User $user ) {
		$this->users[] = $user;
	}
}
