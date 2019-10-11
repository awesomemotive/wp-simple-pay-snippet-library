<?php
/**
 * Plugin Name: WP Simple Pay - Create WP User
 * Plugin URI: https://wpsimplepay.com
 * Author: Sandhills Development, LLC
 * Author URI: https://sandhillsdev.com
 * Description: Create a WordPress user account after a successful purchase.
 * Version: 1.0
 */

/**
 * Creates a new WordPress user when a Subscription or PaymentIntent are created.
 *
 * Note: Requires Webhooks.
 * @link https://docs.wpsimplepay.com/articles/webhooks/
 *
 * @param \Stripe\Event                              $event Stripe Event.
 * @param \Stripe\Subscription|\Stripe\PaymentIntent $object Stripe Subscription or PaymentIntent
 */
function simpay_custom_create_user( $event, $object ) {
	$email_address = $object->customer->email;

	// Don't create duplicate records.
	if ( false !== username_exists( $email_address ) ) {
		throw new \Exception( 'Email address already exists.' );
	}

	// Creates a new user and notifies both the user and the site admin.
	//
	// @link https://developer.wordpress.org/reference/functions/wp_insert_user/
	// @link https://developer.wordpress.org/reference/functions/wp_new_user_notification/
	$user_id  = wp_insert_user( array(
		'user_email' => $email_address,
		'user_login' => $email_address,
		'nickname'   => $email_address,
		'role'       => 'subscriber',
		'user_pass'  => null,
	) );

	if ( is_wp_error( $user_id ) ) {
		throw new \Exception( $user_id->get_error_message() );
	}

	wp_new_user_notification( $user_id, null, 'both' );
}
add_action( 'simpay_webhook_subscription_created', 'simpay_custom_create_user', 10, 2 );
add_action( 'simpay_webhook_payment_intent_succeeded', 'simpay_custom_create_user', 10, 2 );
