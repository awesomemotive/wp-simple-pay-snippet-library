<?php
/**
 * Plugin Name: WP Simple Pay - Comma Decimal Separator
 * Plugin URI: https://wpsimplepay.com
 * Author: Sandhills Development, LLC
 * Author URI: https://sandhillsdev.com
 * Description: Change the decimal separator to ,
 * Version: 1.0
 */

/**
 * Changes the decimal separatator from a . (period) to a , (comma).
 *
 * @param string $separator Decimal separator.
 * @return string
 */
function simpay_custom_decimal_separator( $separator ) {
	return ',';
}
add_filter( 'simpay_decimal_separator', 'simpay_custom_decimal_separator' );
