<?php
/**
 * Plugin Name: WP Simple Pay - &lt;input type="number" /&gt; Custom Amount Field
 * Plugin URI: https://wpsimplepay.com
 * Author: Sandhills Development, LLC
 * Author URI: https://sandhillsdev.com
 * Description: Change the type of the custom amount field to a number field.
 * Version: 1.0
 */

/**
 * Changes the `type` attribute on the `input` tag.
 *
 * @param string $input_type Input type.
 * @return string
 */
function simpay_set_custom_amount_field_type( $input_type ) {
	return 'number';
}
add_filter( 'simpay_custom_amount_field_type', 'simpay_set_custom_amount_field_type' );
