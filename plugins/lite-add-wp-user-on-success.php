<?php
/**
 * Plugin Name: WP Simple Pay - Create WP User
 * Plugin URI: https://wpsimplepay.com
 * Author: Sandhills Development, LLC
 * Author URI: https://sandhillsdev.com
 * Description: Create a WordPress user account after a successful purchase.
 * Version: 2.0
 */

/**
 * Creates a new WordPress user when a the "Payment Confirmation" page is reached.
 *
 * This runs every time the "Payment Confirmation" page is reached, so duplicates must
 * be checked for.
 *
 * The "validation" is done by retrieving the Stripe Checkout Session based on the
 * Session ID `?session_id=` in the URL. If this record exists in Stripe, it is considered
 * valid regardless of who is viewing the page.
 */
add_action( 'init', function() {
	$data = \SimplePay\Core\Payments\Payment_Confirmation\get_confirmation_data();

	if ( ! isset( $data['customer'] ) ) {
		return;
	}

	$customer      = $data['customer'];
	$email_address = $customer->email;

	// Don't create duplicate records if the page is reloaded.
	if ( false !== username_exists( $email_address ) ) {
		return;
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

	if ( false === is_wp_error( $user_id ) ) {
		wp_new_user_notification( $user_id, null, 'both' );
	}
} );
