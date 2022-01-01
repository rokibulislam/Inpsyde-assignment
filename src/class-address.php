<?php
/**
 * Inpsyde Address
 *
 * @package Inpsyde\Address
 */

namespace Inpsyde;

/**
 * Address Class
 */
class Address {

	/**
	 * Address street
	 *
	 * @var string
	 */
	private string $street;

	/**
	 * Address suite
	 *
	 * @var string
	 */
	private string $suite;

	/**
	 * Address city
	 *
	 * @var string
	 */
	private string $city;

	/**
	 * Address zipcode
	 *
	 * @var string
	 */
	private string $zipcode;

	/**
	 * Address Geo object
	 *
	 * @var Geo
	 */
	private Geo $geo;

	/**
	 * The constructor
	 *
	 * @param Geo $geo geo.
	 */
	public function __construct( Geo $geo ) {
		$this->geo = $geo;
	}

	/**
	 * Get street
	 *
	 * @return street
	 */
	public function get_street() : string {
		return $this->street;
	}

	/**
	 *  Get suite
	 *
	 * @return suite
	 */
	public function get_suite() : string {
		return $this->suite;
	}

	/**
	 * Get city
	 *
	 * @return string
	 */
	public function get_city() : string {
		return $this->city;
	}

	/**
	 *  Get zip code
	 *
	 *  @return zipcode
	 */
	public function get_zipcode() : string {
		return $this->zipcode;
	}

	/**
	 * Get geolocation object
	 *
	 * @return Object
	 */
	public function get_geo() : Geo {
		return $this->geo;
	}

	/**
	 * Set street
	 *
	 * @param string $street street.
	 *
	 * @return void
	 */
	public function set_street( $street ) : void {
		$this->street = $street;
	}

	/**
	 * Set Suite
	 *
	 * @param string $suite suite.
	 *
	 * @return void
	 */
	public function set_suite( $suite ) : void {
		$this->suite = $suite;
	}

	/**
	 * Set City
	 *
	 * @param string $city city.
	 *
	 * @return void
	 */
	public function set_city( $city ) : void {
		$this->city = $city;
	}

	/**
	 * Set zipcode
	 *
	 * @param string $zipcode zipcode.
	 *
	 * @return void
	 */
	public function set_zipcode( $zipcode ) : void {
		$this->zipcode = $zipcode;
	}

	/**
	 * Set geo
	 *
	 * @param Geo $geo geolocation object.
	 *
	 * @return void
	 */
	public function set_geo( Geo $geo ) : void {
		$this->geo = $geo;
	}
}
