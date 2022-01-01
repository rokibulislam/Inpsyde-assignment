<?php 

use PHPUnit\Framework\TestCase;

class AssetsEnqueueScriptsTest extends WP_UnitTestCase {

	/**
	 * Test for constructor function
	*/
	function test_constructor() {

		$assets = new \Inpsyde\Assets();

		$front_end_scripts_action_hooked = has_action( 'wp_enqueue_scripts', [ $assets, 'enqueue_register_scripts' ] );

		// var_dump( $front_end_scripts_action_hooked );
	}
}