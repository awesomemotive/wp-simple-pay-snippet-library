<?php
/**
 * Plugin Name: WP Simple Pay - Add subscription args and metadata
 * Plugin URI: https://wpsimplepay.com
 * Description: Add args and metadata to Stripe subscription.
 * Version: 1.0
 */

function simpay_custom_add_subscription_args_metadata( $args ) {

	// Add application fee percent arg & extra metadata.
	$new_args = array(
		'application_fee_percent' => 5,
		'metadata' => array(
			'invoice_note' => 'due in 10 days',
		),
	);

	// Merge new args with existing args.
	return array_merge( $new_args, $args );
}

add_filter( 'simpay_stripe_subscription_args', 'simpay_custom_add_subscription_args_metadata' );
