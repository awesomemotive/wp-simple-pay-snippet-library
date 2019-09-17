<?php
/**
 * Plugin Name: WP Simple Pay - Admin List Separators
 * Plugin URI: https://wpsimplepay.com
 * Author: Sandhills Development, LLC
 * Author URI: https://sandhillsdev.com
 * Description: Use a different delimiter for admin fields that use list-type values.
 * Version: 1.0
 */

/**
 * Changes the way single-line values and determined in custom fields.
 *
 * 1,2,3 in to 1|2|3
 *
 * Affected Custom Fields:
 *   - Dropdown values, amounts, quantities.
 *   - Radio values, amounts, quantities.
 *
 * @param string $separator List separator.
 */
function simpay_custom_list_separator( $separator ) {
	return '|';
}
add_filter( 'simpay_list_separator', 'simpay_custom_list_separator' );
