<?php
/**
 * Plugin Name: WP Simple Pay - Custom Form Button Class
 * Plugin URI: https://wpsimplepay.com
 * Description: Custom form button class for WP Simple Pay
 * Version: 1.0
 */

/**
 * In this example, we'll see how to add a class to the on-page form payment button.
 */
function simpay_custom_add_payment_button_class( $classes ) {
	// Add 1 class.
	return array_merge( $classes, array( 'my-button-class-1' ) );

	// Add multiple classes.
	//return array_merge( $classes, array( 'my-button-class-1', 'my-button-class-2' ) );
}

add_filter( 'simpay_payment_button_class', 'simpay_custom_add_payment_button_class' );
