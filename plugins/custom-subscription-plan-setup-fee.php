<?php
/**
 * Plugin Name: WP Simple Pay - Custom Subscription Plan Setup Fee
 * Plugin URI: https://wpsimplepay.com
 * Description: Override the subscription plan setup fee for a payment form.
 * Version: 1.0
 */

/**
 * Set a subscription plan setup fee for a specific payment form.
 *
 * Replace 157 with the form ID to target.
 */
function simpay_custom_form_157_subscription_setup_fee() {

	// Needs to return the setup fee amount IN CENTS
	return 300; // This will return 3.00
}

add_filter( 'simpay_form_157_subscription_setup_fee', 'simpay_custom_form_157_subscription_setup_fee' );
