<?php
/**
 * Plugin Name: WP Simple Pay - Custom Amount
 * Plugin URI: https://wpsimplepay.com
 * Author: Sandhills Development, LLC
 * Author URI: https://sandhillsdev.com
 * Description: Use a different amount for a specific form.
 * Version: 1.0
 */

/**
 * Changes the currency to EUR for form 157.
 *
 * Replace 157 with the form ID to target.
 *
 * @param string $currency Currency.
 * @return string
 */
function simpay_custom_form_157_amount( $currency ) {
	return '123.25';
}
add_filter( 'simpay_form_157_amount', 'simpay_custom_form_157_amount' );
