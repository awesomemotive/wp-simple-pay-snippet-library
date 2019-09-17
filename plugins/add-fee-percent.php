<?php
/**
 * Plugin Name: WP Simple Pay - Add Percent Fee
 * Plugin URI: https://wpsimplepay.com
 * Author: Sandhills Development, LLC
 * Author URI: https://sandhillsdev.com
 * Description: Add a percent fee to one-time payment forms.
 * Version: 1.0
 */

/**
 * Adds a percent fee in addition to taxes to form 157.
 *
 * Replace 157 with the form ID to target.
 *
 * Note: Does not work for subscription charges.
 *
 * @return float
 */
function simpay_custom_form_157_fee_percent() {
	// This will be an additional 7.5% to the total price.
	return 7.5;
}
add_filter( 'simpay_form_157_fee_percent', 'simpay_custom_form_157_fee_percent' );
