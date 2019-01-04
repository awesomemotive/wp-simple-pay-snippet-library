<?php
/**
 * Plugin Name: WP Simple Pay - Change Custom Amount Field Type
 * Plugin URI: https://wpsimplepay.com
 * Description: Change the type of the custom amount field to a number field.
 * Version: 1.0
 */

/**
 * In this example, we'll see how to change the custom amount field to type="number".
 * Default "tel" input type brings up number pad but does not allow decimal entry on mobile browsers.
 * If type="number", automatically add step="0.01" attribute.
 */
function simpay_set_custom_amount_field_type() {

	// Only accepts 'number' and 'tel'. Default is 'tel'
	return 'number';
}
add_filter( 'simpay_custom_amount_field_type', 'simpay_set_custom_amount_field_type' );
