<?php

/**
 * Note: If using with Subscriptions, increase the priority number in add_filter() to override the default subscriptions
 * payment details output.
 * i.e. add_filter( 'sc_payment_details', 'sc_payment_details_example', 20, 2 );
 */

// For charge response info see: https://stripe.com/docs/api#charge_object

// Example #1 - Add the last four digits of the credit card they used plus the expiration date.

function sc_payment_details_example_1( $html, $charge_response ) {

	// This is copied from the original output so that we can just add in our own details.

	$html = '<div class="sc-payment-details-wrap">' . "\n";

	$html .= '<p>' . __( 'Congratulations. Your payment went through!', 'stripe' ) . '</p>' . "\n";
	$html .= '<p>' . "\n";

	if ( ! empty( $charge_response->description ) ) {
		$html .= __( "Here's what you purchased:", 'stripe' ) . '<br/>' . "\n";
		$html .= $charge_response->description . '<br/>' . "\n";
	}

	if ( isset( $_GET['store_name'] ) && ! empty( $_GET['store_name'] ) ) {
		$html .= 'From: ' . stripslashes( stripslashes( esc_html( $_GET['store_name'] ) ) ) . '<br/>' . "\n";
	}

	$html .= '<br/>' . "\n";
	$html .= '<strong>' . __( 'Total Paid: ', 'stripe' ) . Stripe_Checkout_Misc::to_formatted_amount( $charge_response->amount, $charge_response->currency ) . ' ' . strtoupper( $charge_response->currency ) . '</strong>' . "\n";

	$html .= '</p>' . "\n";

	$html .= '<p>' . sprintf( __( 'Your transaction ID is: %s', 'stripe' ), $charge_response->id ) . '</p>' . "\n";

	// Our added details here.

	// Add the last four digits of the credit card they used plus the expiration date.
	$html .= '<p>Card: ****-****-****-' . $charge_response->source->last4 . '<br/>' . "\n";
	$html .= 'Expiration: ' . $charge_response->source->exp_month . '/' . $charge_response->source->exp_year . '</p>' . "\n";

	$html .= '</div>' . "\n";

	return $html;
}

// Priority number increased from default 10 here in case using with Subscriptions.
add_filter( 'sc_payment_details', 'sc_payment_details_example_1', 20, 2 );

// Example #2 - Add credit card billing address information.
// Also checks for a custom meta field and displays that if it is set.
function sc_payment_details_example_2( $html, $charge_response ) {

	// This is copied from the original output so that we can just add in our own details.
	$html = '<div class="sc-payment-details-wrap">' . "\n";

	$html .= '<p>' . __( 'Congratulations. Your payment went through!', 'stripe' ) . '</p>' . "\n";
	$html .= '<p>' . "\n";

	if ( ! empty( $charge_response->description ) ) {
		$html .= __( "Here's what you purchased:", 'stripe' ) . '<br/>' . "\n";
		$html .= $charge_response->description . '<br/>' . "\n";
	}

	if ( isset( $_GET['store_name'] ) && ! empty( $_GET['store_name'] ) ) {
		$html .= 'From: ' . stripslashes( stripslashes( esc_html( $_GET['store_name'] ) ) ) . '<br/>' . "\n";
	}

	$html .= '<br/>' . "\n";
	$html .= '<strong>' . __( 'Total Paid: ', 'stripe' ) . Stripe_Checkout_Misc::to_formatted_amount( $charge_response->amount, $charge_response->currency ) . ' ' . strtoupper( $charge_response->currency ) . '</strong>' . "\n";

	$html .= '</p>' . "\n";

	$html .= '<p>' . sprintf( __( 'Your transaction ID is: %s', 'stripe' ), $charge_response->id ) . '</p>' . "\n";

	// Our added details here.

	// Add the last four digits of the credit card they used plus the expiration date.
	$html .= '<p>Card: ****-****-****-' . $charge_response->source->last4 . '<br/>';
	$html .= 'Expiration: ' . $charge_response->source->exp_month . '/' . $charge_response->source->exp_year . '</p>';

	// Add credit card billing address information.
	$html .= '<p>Billing address:<br/>';
	$html .= $charge_response->source->address_line1 . '<br/>';
	if ( ! empty( $charge_response->source->address_line2 ) ) {
		$html .= $charge_response->source->address_line2 . '<br/>';
	}
	$html .= $charge_response->source->address_city . ', ' . $charge_response->source->address_state . ' ' . $charge_response->source->address_zip . '</p>';

	// Add the value of a custom field if it exists.
	// For our example shortcode: [stripe_text id="phone_number" label="Phone Number"]
	if ( ! empty( $charge_response->metadata->phone_number ) ) {
		$html .= '<p>Phone Number: ' . $charge_response->metadata->phone_number . '</p>';
	}

	$html .= '</div>' . "\n";

	return $html;
}

add_filter( 'sc_payment_details', 'sc_payment_details_example_2', 20, 2 );

// Example #3 - Hide the payment details message.

function sc_payment_details_example_3( $html, $charge ) {
	return '';
}

add_filter( 'sc_payment_details', 'sc_payment_details_example_3', 20, 2 );
