<?php
/**
 * Plugin Name: WP Simple Pay - Custom Statement Descriptor
 * Plugin URI: https://wpsimplepay.com
 * Author: Sandhills Development, LLC
 * Author URI: https://sandhillsdev.com
 * Description: Custom statement descriptor.
 * Version: 1.0
 */

/**
 * Adjust the statement descriptor for form 157.
 *
 * Replace 157 with the form ID to target.
 *
 * @link https://stripe.com/docs/statement-descriptors
 *
 * @param string $statement_descriptor Statement descriptor.
 * @return string
 */
function simpay_custom_form_157_statement_descriptor( $statement_descriptor ) {
	return get_bloginfo( 'name' );
}
add_filter( 'simpay_form_157_statement_descriptor', 'simpay_custom_form_157_statement_descriptor' );
