<?php
/**
 * Plugin Name: WP Simple Pay - Add payment metadata
 * Plugin URI: https://wpsimplepay.com
 * Description: Add metadata to Stripe payment.
 * Version: 1.0
 */

function simpay_custom_add_payment_metadata( $payment ) {

	$new_metadata = array();
	$new_metadata[ 'shirt_color' ] = 'Red';
	$new_metadata[ 'shirt_size' ] = 'Medium';

	// Merge new metadata with existing metadata.
	$payment->metadata = array_merge( $payment->metadata, $new_metadata );
}

add_action( 'simpay_process_form', 'simpay_custom_add_payment_metadata' );
