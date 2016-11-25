<?php

/**
 * Plugin Name: WP Simple Pay - Add Shipping Metadata Fields
 * Description: Add shipping data to metadata fields.
 */

// Add shipping data back to metadata fields (in addition to shipping property on Stripe charge object).
// This was being done using POST variables prior to WP Simple Pay Pro 2.5.2.

function simpay_add_shipping_metadata_fields( $meta ) {

	$meta['shipping name'] = ( isset( $_POST['sc-shipping-name'] ) ? $_POST['sc-shipping-name'] : '' );
	$meta['shipping address'] = ( isset( $_POST['sc-shipping-line1'] ) ? $_POST['sc-shipping-line1'] : '' );
	$meta['shipping city'] = ( isset( $_POST['sc-shipping-city'] ) ? $_POST['sc-shipping-city'] : '' );
	$meta['shipping state'] = ( isset( $_POST['sc-shipping-state'] ) ? $_POST['sc-shipping-state'] : '' );
	$meta['shipping country'] = ( isset( $_POST['sc-shipping-country'] ) ? $_POST['sc-shipping-country'] : '' );
	$meta['shipping zip code'] = ( isset( $_POST['sc-shipping-postal-code'] ) ? $_POST['sc-shipping-postal-code'] : '' );

	return $meta;
}
add_filter( 'sc_meta_values', 'simpay_add_shipping_metadata_fields' );
