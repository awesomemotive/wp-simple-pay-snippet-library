<?php
/**
 * Plugin Name: WP Simple Pay - Create WP User
 * Plugin URI: https://wpsimplepay.com
 * Description: Create a user using the email address for the payment for one-time and subscription charges.
 * Version: 1.0
 */

/**
 * In this example, we'll see how to create a WordPress user using the email address entered for the payment.
 *
 * After the payment is created this code will create a WordPress user with a generated password (using native WordPress functions) and then send a basic email to the
 * user's email address with the password that was generated.
 */

// This function controls adding the user for a one-time payment.
function simpay_custom_create_user_from_charge( $charge ) {

	// Grab the email from the charge object
	$email_address = $charge->receipt_email;

	// If a user doesn't exist with this email then create a new user and password
	if( null == username_exists( $email_address ) ) {

		// Generate the password and create the user
		$password = wp_generate_password( 16, true );
		$user_id  = wp_create_user( $email_address, $password, $email_address );

		// Set the required nickname field to the email address
		wp_update_user(
			array(
				'ID'       => $user_id,
				'nickname' => $email_address,
			)
		);

		// Set the role to the lowest role (subscriber). You can change this according to what you need.
		$user = new WP_User( $user_id );
		$user->set_role( 'subscriber' );

		// Email the user the generated password.
		wp_mail( $email_address, 'Welcome!', 'Your Password: ' . $password );
	}
}
add_action( 'simpay_charge_created', 'simpay_custom_create_user_from_charge' );

// This function controls adding a user for subscription payments.
function simpay_custom_create_user_from_subscription( $charge, $customer ) {

	// Grab the email from the customer object
	$email_address = $customer->email;

	// If a user doesn't exist with this email then create a new user and password
	if( null == username_exists( $email_address ) ) {

		// Generate the password and create the user
		$password = wp_generate_password( 16, true );
		$user_id  = wp_create_user( $email_address, $password, $email_address );

		// Set the required nickname field to the email address
		wp_update_user(
			array(
				'ID'       => $user_id,
				'nickname' => $email_address,
			)
		);

		// Set the role to the lowest role (subscriber). You can change this according to what you need.
		$user = new WP_User( $user_id );
		$user->set_role( 'subscriber' );

		// Email the user the generated password.
		wp_mail( $email_address, 'Welcome!', 'Your Password: ' . $password );
	}
}
add_action( 'simpay_subscription_created', 'simpay_custom_create_user_from_subscription', 10, 2 );

