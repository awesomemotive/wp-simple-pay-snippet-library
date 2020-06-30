<?php
/**
 * Plugin Name: WP Simple Pay - Add Translated Error Messages
 * Plugin URI: https://wpsimplepay.com
 * Author: Sandhills Development, LLC
 * Author URI: https://sandhillsdev.com
 * Description: Add translated Stripe error messages.
 * Version: 1.0
 */
 
/**
 * Filters the Stripe error messages (for translations).
 *
 * Requires WP Simple Pay 3.9.0+
 *
 * @link https://stripe.com/docs/error-codes
 *
 * @param array $messages Stripe error messages. Keyed by error code.
 * @return array
 */
add_filter( 'simpay_get_localized_error_list', function( $messages ) {
	$messages['coupon_expired'] = 'The coupon has expired and is no longer valid';
 
	return $messages;
} );
