<?php
/**
 * Plugin Name: WP Simple Pay - Success Page URL
 * Plugin URI: https://wpsimplepay.com
 * Author: Sandhills Development, LLC
 * Author URI: https://sandhillsdev.com
 * Description: Change the success page URLs for WP Simple Pay.
 * Version: 1.0
 */

/**
 * Changes the success URL for form 157.
 *
 * Replace 157 with the ID of your form.
 *
 * @param string $url Failure URL.
 * @return string
 */
function simpay_custom_form_157_payment_success_page( $url ) {
	return 'http://www.mywebsite.com/somepage';
}
add_filter( 'simpay_form_157_payment_success_page', 'simpay_custom_form_157_payment_success_page' );
