<?php
/**
 * Plugin Name: WP Simple Pay - Change Thousand Separator
 * Plugin URI: https://wpsimplepay.com
 * Description: Change the thousand separator using a filter for WP Simple Pay
 * Version: 1.0
 */

/**
 * In this example, we'll see how to change the thousand separator.
 */
function simpay_custom_thousand_separator() {

	// Change it to a period
	return '.';
}
add_filter( 'simpay_thousand_separator', 'simpay_custom_thousand_separator' );
