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
function simpay_custom_send_email_on_subscription( $subscription, $customer ) {

	$url = site_url();
	$plan_name = $subscription->plan->name;
	$email = $customer->email;

	$to = get_bloginfo( 'admin_email' );
	$subject = 'New WP Simple Pay Subscription';
	$body = sprintf( 'You have just received a subscription signup to %1$s by %2$s on %3$s', $plan_name, $email, $url );
	$headers = array('Content-Type: text/html; charset=UTF-8');

	wp_mail( $to, $subject, $body, $headers );

}
add_action( 'simpay_subscription_created', 'simpay_custom_send_email_on_subscription', 10, 2 );

