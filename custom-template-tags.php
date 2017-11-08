<?php
/**
 * Plugin Name: WP Simple Pay - Custom Template Tags
 * Plugin URI: https://wpsimplepay.com
 * Description: Add your own custom template tags for use with the payment confirmation messages.
 * Version: 1.0
 */

/**
 * @param $tags    array The current available tags and their values
 * @param $payment object The payment object being used for this tags values
 *
 * @return array
 */
function simpay_custom_template_tags( $tags, $payment ) {

	// Assign the charge source (card object).
	$charge_source = $payment->charge->source;

	// Add a tag with the id of billing-name which will translate to {billing-name} in the payment confirmation messages.
	$tags['billing-name'] = array(
		// The type determines which payment details templates will process it. Options are: all, trial, subscription
		'type'  => array( 'all' ),
		// This is the value we want to actually output when this tag is processed. In this case we use the payment
		// object passed in to grab the charge and the name provided by the customer.
		'value' => $charge_source->name,
	);

	// Additional tags to use in payment confirmation messages.
	$tags['billing-address'] = array( 'type' => array( 'all' ), 'value' => $charge_source->address_line1 ); // {billing-address}
	$tags['billing-city'] = array( 'type' => array( 'all' ), 'value' => $charge_source->address_city ); // {billing-city}
	$tags['billing-state'] = array( 'type' => array( 'all' ), 'value' => $charge_source->address_state ); // {billing-state}
	$tags['billing-zip'] = array( 'type' => array( 'all' ), 'value' => $charge_source->address_zip ); // {billing-zip}
	$tags['billing-country'] = array( 'type' => array( 'all' ), 'value' => $charge_source->address_country ); // {billing-country}

	return $tags;
}

add_filter( 'simpay_payment_details_template_tags', 'simpay_custom_template_tags', 10, 2 );
