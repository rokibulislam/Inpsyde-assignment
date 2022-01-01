<?php
/**
 * Inpsyde Company
 *
 * @package Inpsyde\Company
 */

namespace Inpsyde;

/**
 * Company Class
 */
class Company {

	/**
	 * Company name
	 *
	 * @var string
	 */
	private string $name;

	/**
	 * Company catchPhrase
	 *
	 * @var string
	 */
	private string $catch_phrase;

	/**
	 * Company bs
	 *
	 * @var string
	 */
	private string $bs;

	/**
	 * Get name
	 *
	 * @return string
	 */
	public function get_name() : string {
		return $this->name;
	}

	/**
	 * Get catchPhrase
	 *
	 * @return string
	 */
	public function get_catch_phrase() : string {
		return $this->catch_phrase;
	}

	/**
	 * Get bs
	 *
	 * @return string
	 */
	public function get_bs() : string {
		return $this->bs;
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
	 * Set catch_phrase
	 *
	 * @param string $catch_phrase catch_phrase.
	 *
	 * @return void
	 */
	public function set_catch_phrase( $catch_phrase ) : void {
		$this->catch_phrase = $catch_phrase;
	}

	/**
	 * Set bs
	 *
	 * @param string $bs bs.
	 *
	 * @return void
	 */
	public function set_bs( $bs ) : void {
		$this->bs = $bs;
	}
}
