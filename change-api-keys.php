<?php
/**
 * Plugin Name: WP Simple Pay - Use multiple Stripe API Keys
 * Plugin URI: https://wpsimplepay.com
 * Description: Use different Stripe API keys for different forms for WP Simple Pay
 * Version: 1.0
 */

/**
 * In this example, we'll see how to change the Stripe API keys for a form on a specific page
 *
 */

// Change the secret keys based on the page found and what mode we are in
function simpay_custom_form_157_alternate_secret_key( $key ) {

	// Check if we are in test mode and load the correct key
	if ( simpay_is_test_mode() ) {

			// We are in test mode so we set the new test mode secret key
			$key = 'sk_test_123456789';
		} else {

		// We are in live mode so we set the new live mode secret key
		$key = 'sk_live_987654321';
	}

	// return the key
	return $key;
}
add_filter( 'simpay_form_157_secret_key', 'simpay_custom_form_157_alternate_secret_key' );

// Change the live keys based on the page found and what mode we are in
function simpay_custom_form_157_alternate_publishable_key( $key ) {

	// $test_mode will be true or false depending on what mode is selected in the main plugin settings
	if ( simpay_is_test_mode() ) {

		// We are in test mode so we set the new test mode publishable key
		$key = 'pk_test_123456789';
	} else {

		// We are in live mode so we set the new live mode publishable key
		$key = 'pk_live_987654321';
	}

	// return the key
	return $key;
}
add_filter( 'simpay_form_157_publishable_key', 'simpay_custom_form_157_alternate_publishable_key' );
