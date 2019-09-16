<?php
/**
 * Plugin Name: WP Simple Pay - Use multiple Stripe API Keys
 * Plugin URI: https://wpsimplepay.com
 * Description: Use different Stripe API keys for different forms for WP Simple Pay
 * Version: 1.0
 */

/**
 * In this example, we'll see how to change the Stripe API keys for a form on a specific page.
 */

// Change the publishable keys based on a specific form ID and test or live mode.
function simpay_custom_publishable_key( $key ) {

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

// Replace 157 with the form ID to apply alternate API keys to.
add_filter( 'simpay_form_157_publishable_key', 'simpay_custom_publishable_key' );

// Change the secret keys based on a specific form ID and test or live mode.
function simpay_custom_secret_key( $key ) {

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

// Replace 157 with the form ID to apply alternate API keys to.
add_filter( 'simpay_form_157_secret_key', 'simpay_custom_secret_key' );

// Change the publishable keys based on form IDs and test or live mode.
function simpay_custom_publishable_key_all_forms( $key, $form_id ) {

	if ( simpay_is_test_mode() ) {

		// Test mode

		switch ( $form_id ) {

			case 146:
				$key = 'pk_test_111111';
				break;

			case 147:
				$key = 'pk_test_222222';
				break;

			case 148:
				$key = 'pk_test_333333';
				break;

			default:
				// Fall back to key saved in settings.
		}

	} else {

		// Live mode

		switch ( $form_id ) {

			case 146:
				$key = 'pk_live_111111';
				break;

			case 147:
				$key = 'pk_live_222222';
				break;

			case 148:
				$key = 'pk_live_333333';
				break;

			default:
				// Fall back to key saved in settings.
		}
	}

	return $key;
}

add_filter( 'simpay_publishable_key', 'simpay_custom_publishable_key_all_forms', 10, 2 );

// Change the secret keys based on form IDs and test or live mode.
function simpay_custom_secret_key_all_forms( $key, $form_id ) {

	if ( simpay_is_test_mode() ) {

		// Test mode

		switch ( $form_id ) {

			case 146:
				$key = 'sk_test_111111';
				break;

			case 147:
				$key = 'sk_test_222222';
				break;

			case 148:
				$key = 'sk_test_333333';
				break;

			default:
				// Fall back to key saved in settings.
		}

	} else {

		// Live mode

		switch ( $form_id ) {

			case 146:
				$key = 'sk_live_111111';
				break;

			case 147:
				$key = 'sk_live_222222';
				break;

			case 148:
				$key = 'sk_live_333333';
				break;

			default:
				// Fall back to key saved in settings.
		}
	}

	return $key;
}

add_filter( 'simpay_secret_key', 'simpay_custom_secret_key_all_forms', 10, 2 );

