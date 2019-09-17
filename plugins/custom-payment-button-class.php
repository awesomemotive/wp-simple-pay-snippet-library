<?php
/**
 * Plugin Name: WP Simple Pay - Custom Form Button Class
 * Plugin URI: https://wpsimplepay.com
 * Author: Sandhills Development, LLC
 * Author URI: https://sandhillsdev.com
 * Description: Add custom class to the payment button.
 * Version: 1.0
 */

/**
 * Adds the class `my-button-class` to Payment Buttons.
 *
 * @param array $classes List of class names.
 * @return array
 */
function simpay_custom_add_payment_button_class( $classes ) {
	$classes['my-button-class-1'];
	$classes['my-button-class-2'];

	return $classes;
}
add_filter( 'simpay_payment_button_class', 'simpay_custom_add_payment_button_class' );
