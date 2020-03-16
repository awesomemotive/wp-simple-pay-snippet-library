<?php
/**
 * Plugin Name: WP Simple Pay - Custom Default Value from URL
 * Plugin URI: https://wpsimplepay.com
 * Author: Sandhills Development, LLC
 * Author URI: https://sandhillsdev.com
 * Description: Use a value from the URL to set a field's default.
 * Version: 1.0
 */
 
/**
 * Changes the default value of Field 123 in Form 157 based off the URL.
 *
 * Sets the value from https://wpsimplepay.com/form/?custom-default=Test
 *
 * Replace 157 with the ID of your form.
 * Replace 123 with the ID of your field.
 *
 * @param string $default Default
 * @return string
 */
function custom_default_value_157_123( $default ) {
    $url_var = 'custom-default';
    
    $value = isset( $_GET[ $url_var ] ) ? sanitize_text_field( $_GET[ $url_var ] ) : $default;
    
    return $value;
};
add_filter( 'simpay_form_157_field_123_default_value', __NAMESPACE__ . '\\custom_default_value_157_123' );
