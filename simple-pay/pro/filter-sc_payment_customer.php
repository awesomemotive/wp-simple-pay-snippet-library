<?php

/**
 * Retrieve existing Stripe customer by customer ID in POST variables for use in charge.
 * This overrides the new customer created for each charge.
 */

function sc_custom_stripe_customer() {

	$customer = array();

	if ( isset( $_POST['sc_customer_id'] ) && ! empty( $_POST['sc_customer_id'] ) ) {

		$customer_id = $_POST['sc_customer_id'];
		$customer    = \Stripe\Customer::retrieve( $customer_id );
	}

	return $customer;
}

add_filter( 'sc_payment_customer', 'sc_custom_stripe_customer' );

// Customer ID from variable stored in hidden field for testing sc_payment_customer().

function sc_custom_before_payment_button( $html ) {
	$current_customer_id = 'cus_7nGvrqUv2oEuGf'; // Set customer ID in code.

	$html = '<input type="hidden" id="sc_customer_id" name="sc_customer_id" value="' . $current_customer_id . '" />';

	return $html;
}

add_filter( 'sc_before_payment_button', 'sc_custom_before_payment_button' );
