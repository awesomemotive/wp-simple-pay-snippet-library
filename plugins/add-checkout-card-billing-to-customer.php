<?php
/**
 * Plugin Name: WP Simple Pay - Stripe Checkout - Map Card Billing to Customer
 * Plugin URI: https://wpsimplepay.com
 * Author: Sandhills Development, LLC
 * Author URI: https://sandhillsdev.com
 * Description: Maps the billing address collected in Stripe Checkout to the Customer object.
 * Version: 2.0
 */

// Wait until WP Simple Pay is loaded.
add_action( 'simpay_webhook_checkout_session_completed', function( $event, $customer ) {
	$payment_methods = \SimplePay\Core\Payments\Stripe_API::request(
		'PaymentMethod',
		'all',
		array(
			'type'     => 'card',
			'customer' => $customer->id,
		)
	);

	$payment_method = current( $payment_methods->data );

	$address = $payment_method->billing_details->address->toArray();
	$name    = $payment_method->billing_details->name;
	$phone   = $payment_method->billing_details->phone;

	return \SimplePay\Core\Payments\Stripe_API::request(
		'Customer',
		'update',
		$customer->id,
		array(
			'name'    => $name,
			'address' => $address,
			'phone'   => $phone,
		)
	);
}, 10, 2 );
