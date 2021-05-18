<?php
/**
 * Plugin Name: WP Simple Pay - Validate Custom Field
 * Plugin URI: https://wpsimplepay.com
 * Author: Sandhills Development, LLC
 * Author URI: https://sandhillsdev.com
 * Description: Validate a custom field with a "Stripe Metadata Label" of "Invoice Number"
 * Version: 1.0.0
 */
add_action(
	'simpay_before_customer_from_payment_form_request',
	function( $args, $form, $form_data, $form_values ) {
		$field = $form_values['simpay_field']['Invoice Number'];

		// Field value must be "123". Adjust for your own validation.
		if ( '123' !== $field ) {
			throw new \Exception(
				'Value of "Invoice Number" must be 123'
			);
		}

		return $args;
	},
	10,
	4
);
