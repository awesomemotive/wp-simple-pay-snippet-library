<?php
/**
 * Plugin Name: WP Simple Pay - Custom API Keys
 * Plugin URI: https://wpsimplepay.com
 * Author: Sandhills Development, LLC
 * Author URI: https://sandhillsdev.com
 * Description: Use unique Stripe API keys for a specific form.
 * Version: 2.0
 */

/**
 * Changes the Stripe Publishable key for form 157.
 *
 * Replace 157 with the ID of your form.
 *
 * @param string $key Stripe API key.
 * @return string
 */
add_filter( 'simpay_form_157_publishable_key', function( $key ) {
	// We are in _global_ test mode so we set the new test mode publishable key.
	if ( simpay_is_test_mode() ) {
		$key = 'pk_test_123456789';

	// We are in _global_ live mode so we set the new live mode publishable key.
	} else {
		$key = 'pk_live_987654321';
	}

	return $key;
} );

/**
 * Changes the Stripe Secret key for form 157.
 *
 * Replace 157 with the ID of your form.
 *
 * @param string $key Stripe API key.
 * @return string
 */
add_filter( 'simpay_form_157_secret_key', function( $key ) {
	// We are in _global_ test mode so we set the new test mode publishable key.
	if ( simpay_is_test_mode() ) {
		$key = 'sk_test_123456789';

	// We are in _global_ live mode so we set the new live mode publishable key.
	} else {
		$key = 'sk_live_987654321';
	}

	return $key;
} );
