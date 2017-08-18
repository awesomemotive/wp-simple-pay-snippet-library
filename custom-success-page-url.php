<?php
/**
 * Plugin Name: WP Simple Pay - Success Page URLs
 * Plugin URI: https://wpsimplepay.com
 * Description: Change the success page URLs for specific forms for WP Simple Pay
 * Version: 1.0
 */

/**
 * In this example, we'll see how to change the site wide payment success page to an external URL
 */

function simpay_custom_payment_success_page() {

	// Change the redirect URL
	return 'http://www.otherwebsite.com/landing-page';
}
add_filter( 'simpay_payment_success_page', 'simpay_custom_payment_success_page' );


/**
 * In this example, we'll see how to change the payment success page for a specific form ID
 */

/**
 * Repeat this function setup for each specific form ID you need to change the URL for.
 * If you need to forms to go to the same page you can use the same callback function instead of duplicating it.
 * If you still want to show the payment details then make sure the redirect page URL has the shortcode [simpay_payment_receipt]
 */
function simpay_custom_form_157_payment_success_page() {

	// Change the redirect URL
	return 'http://www.mywebsite.com/somepage';
}
add_filter( 'simpay_form_157_payment_success_page', 'simpay_custom_form_157_payment_success_page' );

