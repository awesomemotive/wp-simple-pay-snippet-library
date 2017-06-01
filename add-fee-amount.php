<?php
/**
 * Plugin Name: WP Simple Pay - Add Fee Amount
 * Plugin URI: https://wpsimplepay.com
 * Description: Add a fee amount to all of your charges for WP Simple Pay
 * Version: 1.0
 */

/**
 * In this example, we'll see how to add a fee amount to all forms on the site.
 *
 * Note: Does not work for subscription charges.
 */
function simpay_add_amount_fee() {
	// Needs to return the additional amount IN CENTS
	return 300; // This will be an additional 3.00
}
add_filter( 'simpay_fee_amount', 'simpay_add_amount_fee' );

