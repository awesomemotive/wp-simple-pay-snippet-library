<?php
/**
 * Plugin Name: WP Simple Pay - Custom Default Email Address
 * Plugin URI: https://wpsimplepay.com
 * Author: Sandhills Development, LLC
 * Author URI: https://sandhillsdev.com
 * Description: Automatically set the current user's email address if logged in.
 * Version: 1.0
 */

/**
 * Set the value of Field 1 (email address) on Form 87 to the logged in user's email address.
 * 
 * Replace 157 with the ID of your form.
 * Replace 123 with the ID of your field.
 */
add_filter(
	'simpay_form_157_field_123_default_value',
	function() {
		return esc_html(
			is_user_logged_in() ? wp_get_current_user()->user_email : ''
		);
	}
);
