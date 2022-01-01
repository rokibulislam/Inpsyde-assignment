<?php
/**
 * Inpsyde UserTrait
 *
 * @package Inpsyde\UserTrait
 */

namespace Inpsyde;


trait UserTrait {

	/**
	 * Set User Info
	 *
	 * @param string $response response.
	 *
	 * @return Object
	 */
	public function set_user_info( $response ) : User {

		$geo     = new Geo();
		$geo->set_lat( $response['address']['geo']['lat'] );
		$geo->set_lng( $response['address']['geo']['lng'] );

		$address = new Address( $geo );
		$company = new Company();

		$address->set_street( $response['address']['street'] );
		$address->set_suite( $response['address']['suite'] );
		$address->set_city( $response['address']['city'] );
		$address->set_zipcode( $response['address']['zipcode'] );

		$company->set_name( $response['company']['name'] );
		$company->set_catch_phrase( $response['company']['catchPhrase'] );
		$company->set_catch_phrase( $response['company']['bs'] );

		$user = new User( $address, $company );

		$user->set_id( $response['id'] );
		$user->set_name( $response['name'] );
		$user->set_username( $response['username'] );
		$user->set_email( $response['email'] );
		$user->set_phone( $response['phone'] );
		$user->set_website( $response['website'] );

		return $user;
	}

}