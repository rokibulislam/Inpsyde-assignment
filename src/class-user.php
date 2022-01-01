<?php
/**
 * Inpsyde User
 *
 * @package Inpsyde\User
 */

namespace Inpsyde;

/**
 *  User Class
 */
class User {

	/**
	 * User id
	 *
	 * @var string
	 */
	private int $id;

	/**
	 * User name
	 *
	 * @var string
	 */
	private string $name;

	/**
	 * User username
	 *
	 * @var string
	 */
	private string $username;

	/**
	 * User email
	 *
	 * @var string
	 */
	private string $email;

	/**
	 * User phone
	 *
	 * @var string
	 */
	private string $phone;

	/**
	 * User website
	 *
	 * @var string
	 */
	private string $website;

	/**
	 * User address
	 *
	 * @var object
	 */
	private Address $address;

	/**
	 * User company
	 *
	 * @var object
	 */
	private Company $company;


	/**
	 * The Constructor
	 *
	 * @param Address $address address.
	 * @param Company $company company.
	 */
	public function __construct( Address $address, Company $company ) {

		$this->address = $address;

		$this->company = $company;
	}

	/**
	 * Get id
	 *
	 * @return string
	 */
	public function get_id() : int {
		return $this->id;
	}

	/**
	 * Get name
	 *
	 * @return string
	 */
	public function get_name() : string {
		return $this->name;
	}

	/**
	 * Get username
	 *
	 * @return string
	 */
	public function get_username() : string {
		return $this->username;
	}

	/**
	 * Get email
	 *
	 * @return string
	 */
	public function get_email() : string {
		return $this->email;
	}

	/**
	 * Get phone
	 *
	 * @return string
	 */
	public function get_phone() : string {
		return $this->phone;
	}

	/**
	 * Get website
	 *
	 * @return string
	 */
	public function get_website() : string {
		return $this->website;
	}

	/**
	 * Get Address object
	 *
	 * @return Address
	 */
	public function get_address() : Address {
		return $this->address;
	}

	/**
	 * Get Company object
	 *
	 * @return Company
	 */
	public function get_company() : Company {
		return $this->company;
	}

	/**
	 * Set id
	 *
	 * @param int $id id.
	 *
	 * @return void
	 */
	public function set_id( $id ) : void {
		$this->id = $id;
	}

	/**
	 * Set name
	 *
	 * @param string $name name.
	 *
	 * @return void
	 */
	public function set_name( $name ) : void {
		$this->name = $name;
	}

	/**
	 * Set username
	 *
	 * @param string $username username.
	 *
	 * @return void
	 */
	public function set_username( $username ) : void {
		$this->username = $username;
	}

	/**
	 * Set email
	 *
	 * @param string $email email.
	 *
	 * @return void
	 */
	public function set_email( $email ) : void {
		$this->email = $email;
	}

	/**
	 * Set phone
	 *
	 * @param string $phone phone.
	 *
	 * @return void
	 */
	public function set_phone( $phone ) : void {
		$this->phone = $phone;
	}

	/**
	 * Set website
	 *
	 * @param string $website website.
	 *
	 * @return void
	 */
	public function set_website( $website ) : void {
		$this->website = $website;
	}

	/**
	 * Set address
	 *
	 * @param Address $address address.
	 *
	 * @return void
	 */
	public function set_address( Address $address ) : void {
		$this->address = $address;
	}

	/**
	 * Set company
	 *
	 * @param Company $company company.
	 *
	 * @return void
	 */
	public function set_company( Company $company ) : void {
		$this->company = $company;
	}
}
