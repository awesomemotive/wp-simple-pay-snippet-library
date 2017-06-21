<?php
/**
 * Plugin Name: WP Simple Pay - Change Custom Amount Field Type
 * Plugin URI: https://wpsimplepay.com
 * Description: Change the type of the custom amount field to a number field.
 * Version: 1.0
 */

/**
 * In this example, we'll see how to change the custom amount field to type="number"
 */
function simpay_custom_change_amount_field() {

	// Only accepts 'number' and 'tel'. Default is 'tel'
	return 'number';
}
add_filter( 'simpay_custom_amount_field_type', 'simpay_custom_change_amount_field' );
