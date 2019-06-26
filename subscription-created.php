<?php
/**
 * Plugin Name: WP Simple Pay - Subscription Charge Created
 * Plugin URI: https://wpsimplepay.com
 * Description: Perform some action after a subscription charge has been completed for WP Simple Pay
 * Version: 1.0
 */

/**
 * Send an email to the site admin after a charge has been successfully created.
 */
function simpay_custom_send_email_on_charge( $charge ) {
	$url    = site_url();
	$amount = simpay_format_currency( $charge->amount );

	// Retrieve the full customer object.
	$customer = \SimplePay\Core\Payments\Stripe_API::request( 'Customer', 'retrieve', $charge->customer );
	$email    = $customer->email;

	$to      = get_bloginfo( 'admin_email' );
	$subject = 'New WP Simple Pay Charge';
	$body    = sprintf( 'You have just received a payment of %1$s by %2$s on %3$s', $amount, $email, $url );
	$headers = array( 'Content-Type: text/html; charset=UTF-8' );

	wp_mail( $to, $subject, $body, $headers );
}
add_action( 'simpay_charge_created', 'simpay_custom_send_email_on_charge' );
