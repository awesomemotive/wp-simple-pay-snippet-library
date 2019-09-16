<?php
/**
 * Plugin Name: WP Simple Pay - Subscription Charge Created Metadata
 * Plugin URI: https://wpsimplepay.com
 * Description: Access custom field data when a subscription is created.
 * Version: 1.0
 */

/**
 * Perform additional actions when a subscription is created, using custom field values.
 *
 * @param object $subscription Stripe Subscription object.
 * @param object $customer Stripe Customer object.
 * @param object $charge Stripe Charge object.
 */
function simpay_custom_subscription_created( $subscription, $customer, $charge ) {
	// Fetch and sanitize custom fields.
	$fields = isset( $_POST['simpay_field'] ) ? array_map( 'sanitize_text_field', wp_unslash( $_POST['simpay_field'] ) ) : false;

	// Do nothing if fields are not found.
	if ( ! $fields ) {
		return;
	}

	// Perform actions with field data...
	//
	// Replace `field-meta-label` with the `Stripe Metadata Label` value in your form.
	return simpay_custom_save_custom_field( $fields['field-meta-label'] );
}
add_action( 'simpay_subscription_created', 'simpay_custom_subscription_created', 10, 3 );

/**
 * Save the custom field data elsewhere.
 *
 * @param mixed $value Value to save.
 */
function simpay_custom_save_custom_field( $value ) {
	// Save $value somewhere...
}
