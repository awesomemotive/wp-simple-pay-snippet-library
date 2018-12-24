<?php
/**
 * Plugin Name: WP Simple Pay - Set global minimum amount
 * Plugin URI: https://wpsimplepay.com
 * Description: Change the minimum custom amount for all payment forms.
 * Version: 1.0
 */

function simpay_custom_set_global_minimum_amount() {

	// Set the global minimum amount to 0.50
	// For most currencies, the minimum amount Stripe accepts is 0.50
	return 0.50;
}

add_filter( 'simpay_global_minimum_amount', 'simpay_custom_set_global_minimum_amount' );
