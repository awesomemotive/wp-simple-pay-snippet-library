<?php
/**
 * Plugin Name: WP Simple Pay - Custom Default Amount From URL
 * Plugin URI: https://wpsimplepay.com
 * Author: Sandhills Development, LLC
 * Author URI: https://sandhillsdev.com
 * Description: Use a different amount for a specific form.
 * Version: 1.0
 */

/**
 * Changes the default amount in the "Custom Amount" field based on the URL value
 * ?amount=
 *
 * Replace 157 with the form ID to target.
 *
 * @param string $amount Amount set from the form settings.
 * @return string
 */
add_filter( 'simpay_form_157__default_amount', function( $default_amount ) {
	return isset( $_GET[ 'amount' ] )
		? sanitize_text_field( $_GET[ 'amount' ] )
		: $default_amount;
} );
