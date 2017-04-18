<?php
/**
* Plugin Name: WP Simple Pay - Custom statement descriptors
* Plugin URI: https://wpsimplepay.com
* Description: Custom statement descriptors for WP Simple Pay
* Version: 1.0
*/

/**
* In this example, we'll see how to change the statement descriptor for one-time payment forms.
 *
 * Note: Does not work for subscription charges.
*/

/**
 * Form-specific statement description filter.
 * The new statement descriptor for this example will return the site name.
 *
 * < > ' " are illegal characters and will automatically be stripped out.
 * Maximum length for the description is 22 characters.
 */
function simpay_custom_statement_descriptor() {
	return get_bloginfo( 'name' );
}
add_filter( 'simpay_form_150_statement_descriptor', 'simpay_custom_statement_descriptor' ); // Replace 150 with your form ID
