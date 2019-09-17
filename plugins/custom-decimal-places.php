<?php
/**
 * Plugin Name: WP Simple Pay - Remove Decimals
 * Plugin URI: https://wpsimplepay.com
 * Author: Sandhills Development, LLC
 * Author URI: https://sandhillsdev.com
 * Description: Remove trailing decimals in Stripe.
 * Version: 1.0
 */

/**
 * Removes trailing decimals on price outputs.
 *
 * Note: Does not affect Stripe Checkout.
 *
 * @param int $places Number of decimal places.
 * @return int
 */
function simpay_custom_set_decimal_places() {
	return 0;
}
add_filter( 'simpay_decimal_places', 'simpay_custom_set_decimal_places' );
