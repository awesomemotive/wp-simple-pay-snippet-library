<?php
/**
 * Plugin Name: WP Simple Pay - Custom Item Description
 * Plugin URI: https://wpsimplepay.com
 * Author: Sandhills Development, LLC
 * Author URI: https://sandhillsdev.com
 * Description: Custom item description.
 * Version: 1.0
 */

/**
 * Adjust the description for form 157.
 *
 * Replace 157 with the form ID to target.
 *
 * @param string $description Item description.
 * @return string
 */
function simpay_form_157_item_description( $description ) {
	return 'Custom description';
}
add_filter( 'simpay_form_157_item_description', __NAMESPACE__ . '\\simpay_form_157_item_description' );
