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
 * Adds the class `my-button-class-1` and `my-button-class-2` to Payment Buttons.
 *
 * "Payment Button" refers to the button that launches an Overlay or Stripe Checkout
 * Payment Form.
 *
 * @param array $classes List of class names.
 * @return array
 */
add_filter( 'simpay_payment_button_class', function( $classes ) {
	$classes[] = 'my-button-class-1';
	$classes[] = 'my-button-class-2';

	return $classes;
} );
