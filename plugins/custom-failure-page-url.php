<?php
/**
 * Plugin Name: WP Simple Pay - Failure Page URLs
 * Plugin URI: https://wpsimplepay.com
 * Description: Change the failure page URLs for WP Simple Pay
 * Version: 1.0
 */

/**
 * In this example, we'll see how to change the site wide payment failure page to an external URL
 */

function simpay_custom_payment_failure_page() {

	// Change the redirect URL
	return 'http://www.otherwebsite.com/landing-page';
}
add_filter( 'simpay_payment_failure_page', 'simpay_custom_payment_failure_page' );


/**
 * In this example, we'll see how to change the payment failure page for a specific form ID
 */

/**
 * Repeat this function setup for each specific form ID you need to change the URL for.
 * If you need to forms to go to the same page you can use the same callback function instead of duplicating it.
 */
function simpay_custom_form_157_payment_failure_page() {

	// Change the redirect URL
	return 'http://www.mywebsite.com/somepage';
}
add_filter( 'simpay_form_157_payment_failure_page', 'simpay_custom_form_157_payment_failure_page' );

