<?php
/**
 * Plugin Name: WP Simple Pay - Change Decimal Separator
 * Plugin URI: https://wpsimplepay.com
 * Description: Change the decimal separator using a filter for WP Simple Pay
 * Version: 1.0
 */

/**
 * In this example, we'll see how to change the decimal separator.
 */
function simpay_custom_decimal_separator() {

	// Change it to a comma
	return ',';
}
add_filter( 'simpay_decimal_separator', 'simpay_custom_decimal_separator' );
