<?php
/**
 * Plugin Name: WP Simple Pay - Custom Statement Descriptor
 * Plugin URI: https://wpsimplepay.com
 * Author: Sandhills Development, LLC
 * Author URI: https://sandhillsdev.com
 * Description: Custom statement descriptor.
 * Version: 1.0
 */

// Use the "Title" field.

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
add_filter(
	'simpay_form_157_statement_descriptor',
	function( $value, $form_id ) {
		return get_post_meta( $form_id, '_company_name', true ); // "Title" setting.
	},
	10,
	2
);

// ... or use the "Description" field.

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
add_filter(
	'simpay_form_157_statement_descriptor',
	function( $value, $form_id ) {
		return get_post_meta( $form_id, '_item_description', true ); // "Description" setting.
	},
	10,
	2
);
