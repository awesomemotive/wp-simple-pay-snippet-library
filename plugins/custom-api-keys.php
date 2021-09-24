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

/**
 * DO NOT MODIFY.
 * 
 * Clear associated Stripe Product information if it cannot be found via the filtered
 * API keys. If the form was created with unfiltered API keys the Stripe Product/Price
 * objects need to be recreated, which this allows.
 */
add_action(
	'admin_init',
	function() {
		if ( ! isset( $_GET['post'] ) ) {
			return;
		}

		$form = simpay_get_form( absint( $_GET['post'] ) );

		if ( false === $form ) {
			return;
		}

		$linked_product_key = $form->is_livemode()
			? '_simpay_product_live'
			: '_simpay_product_test';

		$linked_prices_key = $form->is_livemode()
			? '_simpay_prices_live'
			: '_simpay_prices_test';

		$product_id = get_post_meta( $form->id, $linked_product_key, true );

		try {
			\SimplePay\Core\API\Products\retrieve(
				$product_id,
				$form->get_api_request_args()
			);
		} catch ( \Exception $e ) {
			delete_post_meta( $form->id, $linked_product_key );
			delete_post_meta( $form->id, $linked_prices_key );
		}
	}
);
