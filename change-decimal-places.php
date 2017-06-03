<?php
/**
 * Plugin Name: WP Simple Pay - Change Decimal Places
 * Plugin URI: https://wpsimplepay.com
 * Description: Change the number of decimal places for WP Simple Pay
 * Version: 1.0
 */

/**
 * In this example, we'll see how to change the decimal separator.
 */
function simpay_custom_set_decimal_places() {

	// Return the number of decimal places we want to show
	// NOTE: Won't update the Stripe Checkout Overlay button
	// NOTE: Stripe rounds to the nearest 2 decimal places anyway.
	return 4;
}
add_filter( 'simpay_decimal_places', 'simpay_custom_set_decimal_places' );
