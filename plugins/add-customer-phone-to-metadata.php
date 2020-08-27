<?php
/**
 * Plugin Name: WP Simple Pay - Add Customer Phone to Metadata
 * Plugin URI: https://wpsimplepay.com
 * Author: Sandhills Development, LLC
 * Author URI: https://sandhillsdev.com
 * Description: Add custom parameters to the Stripe Customer creation request.
 * Version: 1.0
 */

/**
 * Adds the "Telephone" field to the Customer metadata.
 *
 * @param array $args
 * @return array
 */
add_filter(
	'simpay_get_customer_args_from_payment_form_request',
	function( $args ) {
		if ( isset( $args['phone'] ) ) {
			$args['metadata']['phone'] = $args['phone'];
		}

		return $args;
	}
);
