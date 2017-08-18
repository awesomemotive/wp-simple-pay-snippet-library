<?php
/**
 * Plugin Name: WP Simple Pay - Custom Template Tags
 * Plugin URI: https://wpsimplepay.com
 * Description: Add your own custom template tags for use with the payment details output.
 * Version: 1.0
 */

/**
 * @param $tags    array The current available tags and their values
 * @param $payment Payment The payment object being used for this tags values
 *
 * @return array
 */
function simpay_custom_template_tag( $tags, $payment ) {

	// Add a tag with the id of billing-name which will translate to {billing-name} in the payment details editor.
	$tags['billing-name'] = array(
		// The type determines which payment details templates will process it. Options are: all, trial, subscription
		'type'  => array( 'all' ),
		// This is the value we want to actually output when this tag is processed. In this case we use the payment
		// object passed in to grab the charge and the name provided by the customer.
		'value' => $payment->charge->source->name,
	);

	return $tags;
}

add_filter( 'simpay_payment_details_template_tags', 'simpay_custom_template_tag', 10, 2 );
