<?php
/**
 * Plugin Name: WP Simple Pay - Add customer args and metadata
 * Plugin URI: https://wpsimplepay.com
 * Description: Add args and metadata to Stripe customer.
 * Version: 1.0
 */

function simpay_custom_add_customer_args_metadata( $args ) {

	// Add description arg & extra metadata.
	$new_args = array(
		'description' => 'customer description value',
		'metadata' => array(
			'referral_code' => 'customer metadata referral code',
		),
	);

	// Merge new args with existing args.
	return array_merge( $new_args, $args );
}

add_filter( 'simpay_stripe_customer_args', 'simpay_custom_add_customer_args_metadata' );
