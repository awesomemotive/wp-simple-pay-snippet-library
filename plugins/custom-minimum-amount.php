<?php
/**
 * Plugin Name: WP Simple Pay - Custom Minimum Amount
 * Plugin URI: https://wpsimplepay.com
 * Author: Sandhills Development, LLC
 * Author URI: https://sandhillsdev.com
 * Description: Change the minimum custom amount for all payment forms.
 * Version: 1.0
 */

/**
 * Sets the minimum amount for all forms to $0.50.
 *
 * $0.50 is the minimum amount Stripe accepts for most currencies.
 *
 * Note: This only allows the amount to be entered when configuring the form, it does
 *       not affect previously created forms with saved minimum values.
 *
 * @param float $minimum_amount Minimum amount.
 * @return float
 */
function simpay_custom_set_global_minimum_amount( $minimum_amount ) {
	return 0.50;
}
add_filter( 'simpay_global_minimum_amount', 'simpay_custom_set_global_minimum_amount' );
