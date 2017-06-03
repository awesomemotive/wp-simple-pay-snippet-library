<?php
/**
 * Plugin Name: WP Simple Pay - Subscription Charge Created
 * Plugin URI: https://wpsimplepay.com
 * Description: Perform some action after a subscription charge has been completed for WP Simple Pay
 * Version: 1.0
 */

/**
 * In this example, we'll see how to send an email to the site admin after a subscription charge has been successfully created.
 */
function simpay_custom_send_email_on_subscription() {

	$to = get_bloginfo( 'admin_email' );
	$subject = 'New WP Simple Pay Subscription';
	$body = 'A subscription charge has been made on your site.';
	$headers = array('Content-Type: text/html; charset=UTF-8');

	wp_mail( $to, $subject, $body, $headers );

}
add_filter( 'simpay_subscription_created', 'simpay_custom_send_email_on_subscription' );

