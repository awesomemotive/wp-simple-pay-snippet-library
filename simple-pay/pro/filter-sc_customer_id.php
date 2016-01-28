<?php

/**
 * Retrieve existing Stripe customer ID in POST variables for use in charge.
 */

function sc_custom_customer_id() {

	if ( isset( $_POST['sc_customer_id'] ) && ! empty( $_POST['sc_customer_id'] ) ) {
		return $_POST['sc_customer_id'];
	} else {
		return null;
	}
}

add_filter( 'sc_customer_id', 'sc_custom_customer_id' );

// Customer ID from variable stored in hidden field for use in sc_custom_customer_id().

function sc_custom_before_payment_button( $html ) {
	$current_customer_id = 'cus_7nkiC7URE1cCzj'; // Set customer ID in code.

	$html = '<input type="hidden" id="sc_customer_id" name="sc_customer_id" value="' . $current_customer_id . '" />';

	return $html;
}

add_filter( 'sc_before_payment_button', 'sc_custom_before_payment_button' );
