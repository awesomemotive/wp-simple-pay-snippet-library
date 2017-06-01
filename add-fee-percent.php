<?php
/**
 * Plugin Name: WP Simple Pay - Add Fee Percent
 * Plugin URI: https://wpsimplepay.com
 * Description: Add a fee percent to all of your charges for WP Simple Pay
 * Version: 1.0
 */

/**
 * In this example, we'll see how to add a fee percent to all forms on the site.
 *
 * Note: Does not work for subscription charges.
 */
function simpay_custom_add_fee_percent() {
	// Needs to return the fee percent
	return 10; // This translates to 10 percent, so a form at $10.00 will now be $11.00
}
add_filter( 'simpay_fee_percent', 'simpay_custom_add_fee_percent' );

