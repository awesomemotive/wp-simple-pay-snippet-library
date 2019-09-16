<?php
/**
 * Plugin Name: WP Simple Pay - Custom Thousand Separator
 * Plugin URI: https://wpsimplepay.com
 * Author: Sandhills Development, LLC
 * Author URI: https://sandhillsdev.com
 * Description: Change the thousand separator to .
 * Version: 1.0
 */

/**
 * Changes the thousand separatator from a , (comma) to a . (period).
 *
 * @param string $separator Decimal separator.
 * @return string
 */
function simpay_custom_thousand_separator( $separator ) {
	return '.';
}
add_filter( 'simpay_thousand_separator', 'simpay_custom_thousand_separator' );
