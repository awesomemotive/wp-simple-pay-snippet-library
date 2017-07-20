<?php
/**
 * Plugin Name: WP Simple Pay - Custom Tax Percent
 * Plugin URI: https://wpsimplepay.com
 * Description: Change the tax percent for a specific form
 * Version: 1.0
 */

/**
 * In this example, we'll see how to change the tax percent for a specific form ID
 */

/**
 * Repeat this function setup for each specific form ID you need to change the tax percent for.
 */

function simpay_custom_form_157_tax_percent() {

	// Change to 25%
	return 25;
}
add_filter( 'simpay_form_157_tax_percent', 'simpay_custom_form_157_tax_percent' );

