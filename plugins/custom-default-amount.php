<?php
/**
 * Plugin Name: WP Simple Pay - Custom Default Amount
 * Plugin URI: https://wpsimplepay.com
 * Author: Sandhills Development, LLC
 * Author URI: https://sandhillsdev.com
 * Description: Use a different amount for a specific form.
 * Version: 1.0
 */

/**
 * Changes the default amount in the "Custom Amount" field.
 *
 * Replace 157 with the form ID to target.
 *
 * @param string $default_amount Default amount set from the form settings.
 * @return string
 */
add_filter( 'simpay_form_157__default_amount', function( $default_amount ) {
	return 45;
} );
