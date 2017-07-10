<?php
/**
 * Plugin Name: WP Simple Pay - Admin List Separators
 * Plugin URI: https://wpsimplepay.com
 * Description: Use a different delimiter for admin fields that use list-type values.
 * Version: 1.0
 */

/**
 * In this example, we'll see how to change the default comma for separating list-type values
 *
 *  Affected Custom Fields: Dropdown values/amounts/quantities, radio values/amounts/quantities
 */

// We will change it from the default comma (,) to use a pipe (|)
function simpay_custom_list_separator() {
	return '|';
}
add_filter( 'simpay_list_separator', 'simpay_custom_list_separator' );
