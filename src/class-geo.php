<?php
/**
 * Inpsyde Geo
 *
 * @package Inpsyde\Geo
 */

namespace Inpsyde;

/**
 * Geo Class
 *
 * @class Geo class that holds location data
 */
class Geo {

	/**
	 * The lat
	 *
	 * @var string
	 */
	private string $lat;

	/**
	 * The lang
	 *
	 * @var string
	 */
	private string $lng;

	/**
	 * Get latitude
	 *
	 * @return string
	 */
	public function get_lat() : string {
		return $this->lat;
	}

	/**
	 * Get longitude
	 *
	 * @return string
	 */
	public function get_lng() : string {
		return $this->lng;
	}

	/**
	 * Set latitude on lng
	 *
	 * @param string $lat lat.
	 *
	 * @return void
	 */
	public function set_lat( $lat ) : void {
		$this->lat = $lat;
	}

	/**
	 * Set longitude on lng
	 *
	 * @param string $lng lng.
	 *
	 * @return void
	 */
	public function set_lng( $lng ) : void {
		$this->lng = $lng;
	}
}
