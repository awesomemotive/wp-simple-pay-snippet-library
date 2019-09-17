<?php
/**
 * Plugin Name: WP Simple Pay - Custom Currency and Position
 * Plugin URI: https://wpsimplepay.com
 * Author: Sandhills Development, LLC
 * Author URI: https://sandhillsdev.com
 * Description: Use a different currency and position for a specific form.
 * Version: 1.0
 */

/**
 * Changes the currency to EUR for form 157.
 *
 * Replace 157 with the form ID to target.
 *
 * @param string $currency Currency.
 * @return string
 */
function simpay_custom_form_157_currency( $currency ) {
	return 'EUR';
}
add_filter( 'simpay_form_157_currency', 'simpay_custom_form_157_currency' );

/**
 * Changes the currency position to the right for form 157.
 *
 * Available values:
 *   left
 *   left_space
 *   right
 *   right_space
 *
 * @param string $position Currency position.
 * @return string
 */
function simpay_custom_form_157_currency_position( $position ) {
	return 'right';
}
add_filter( 'simpay_form_157_currency_position', 'simpay_custom_form_157_currency_position' );
