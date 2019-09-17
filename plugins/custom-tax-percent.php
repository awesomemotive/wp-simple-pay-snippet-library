<?php
/**
 * Plugin Name: WP Simple Pay - Custom Tax Percent
 * Plugin URI: https://wpsimplepay.com
 * Author: Sandhills Development, LLC
 * Author URI: https://sandhillsdev.com
 * Description: Override the global tax percent fee for a payment form.
 * Version: 1.0
 */

/**
 * Override the global tax percent fee for a specific payment form.
 *
 * Replace 157 with the form ID to target.
 *
 * @param float $percent Tax percent.
 * @return float
 */
function simpay_custom_form_157_tax_percent( $percent ) {
	return 7.5;
}
add_filter( 'simpay_form_157_tax_percent', 'simpay_custom_form_157_tax_percent' );
