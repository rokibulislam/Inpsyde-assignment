<?php
/**
 * Inpsyde single user template
 *
 * @package Inpsyde\table
 */

	$uid = $user->get_id();
	$name = $user->get_name();
	$username = $user->get_username();
	$phone = $user->get_phone();
	$website = $user->get_website();
	$street = $user->get_address()->get_street();
	$suite = $user->get_address()->get_suite();
	$city = $user->get_address()->get_city();
	$zipcode = $user->get_address()->get_zipcode();
	$lat = $user->get_address()->get_geo()->get_lat();
	$lng = $user->get_address()->get_geo()->get_lng();
?>

<ul>
	<li> <?php esc_html_e( 'ID:', 'inpsyde' ); ?>  <?php printf( wp_kses_post( $uid ) ); ?> </li>
	<li> <?php esc_html_e( 'name:', 'inpsyde' ); ?> <?php printf( wp_kses_post( $name ) ); ?> </li>
	<li> <?php esc_html_e( 'Username:', 'inpsyde' ); ?> <?php printf( wp_kses_post( $username ) ); ?> </li>
	<li> <?php esc_html_e( 'Phone:', 'inpsyde' ); ?> <?php printf( wp_kses_post( $phone ) ); ?> </li>
	<li> <?php esc_html_e( 'Website:', 'inpsyde' ); ?> <?php printf( wp_kses_post( $website ) ); ?> </li>
	<li> <?php esc_html_e( 'Street:', 'inpsyde' ); ?> <?php printf( wp_kses_post( $street ) ); ?> </li>
	<li> <?php esc_html_e( 'Suit:', 'inpsyde' ); ?> <?php printf( wp_kses_post( $suite ) ); ?> </li>
	<li> <?php esc_html_e( 'City:', 'inpsyde' ); ?> <?php printf( wp_kses_post( $city ) ); ?> </li>
	<li> <?php esc_html_e( 'Zipcode:', 'inpsyde' ); ?>  <?php printf( wp_kses_post( $zipcode ) ); ?> </li>
	<li> <?php esc_html_e( 'Lat:', 'inpsyde' ); ?> <?php printf( wp_kses_post( $lat ) ); ?> </li>
	<li> <?php esc_html_e( 'Lng:', 'inpsyde' ); ?> <?php printf( wp_kses_post( $lng ) ); ?> </li>
</ul>

<a href="" id="back_to_user_list"> <?php esc_html_e( 'back to User List', 'inpsyde' ); ?> </a>