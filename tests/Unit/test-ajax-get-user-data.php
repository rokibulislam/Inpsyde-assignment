<?php 

use PHPUnit\Framework\TestCase;

class AjaxGetUserData extends WP_Ajax_UnitTestCase {

	public function setUp() {
        parent::setUp();

        $_SERVER['REQUEST_METHOD'] = 'POST';
    }


    /**
     * Helper to keep it DRY
     *
     * @param string $action Action.
     */
    protected function make_ajax_call( $action ) {
        // Make the request.
        try {
            $this->_handleAjax( $action );
        } catch ( WPAjaxDieContinueException $e ) {
            unset( $e );
        }
    }

    /**
     * Testing successful ajax_get_users_data
     *
     */
    function test_ajax_get_users_data() {
        // Create a user with nicename 'Amy' , using WP_UnitTestCase factory.
        $user_id = rand(1,10);
       
        $_POST =  array(
            'action'   => 'get_user_info',
            'security' => wp_create_nonce( 'inpsyde_nonce' ),
            'id'	   => $user_id
        );

            
        try {
            $this->make_ajax_call( 'get_user_info' );
        } catch(Exception $ex) {

        }
        
        // Get the results.
        $response = json_decode( $this->_last_response, true );

       // $this->assertTrue( $response );
    }
}