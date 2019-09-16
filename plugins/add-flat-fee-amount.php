<?php
/**
 * Plugin Name: WP Simple Pay - Add Flat Fee Amount
 * Plugin URI: https://wpsimplepay.com
 * Author: Sandhills Development, LLC
 * Author URI: https://sandhillsdev.com
 * Description: Add a flat fee amount to one-time payment forms.
 * Version: 1.0
 */

/**
 * Adds a flat fee to a specific one-time payment form in addition taxes.
 *
 * Replace 157 with the form ID to target.
 *
 * Note: Does not work for subscription charges.
 *
 * @return float
 */
function simpay_custom_form_157_fee_amount() {
	// This will be an additional $3.00 to the total price.
	return 3;
}
add_filter( 'simpay_form_157_fee_amount', 'simpay_custom_form_157_fee_amount' );
