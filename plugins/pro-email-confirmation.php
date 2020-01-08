<?php
/**
 * Plugin Name: WP Simple Pay - Email Customer Confirmation
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
 * @link https://stripe.com/docs/api/subscriptions/object
 * @link https://stripe.com/docs/api/payment_intent/object
 *
 * @param \Stripe\Event                              $event Stripe Event.
 * @param \Stripe\Subscription|\Stripe\PaymentIntent $object Stripe Subscription or PaymentIntent
 */
function simpay_custom_email_customer( $event, $object ) {
	$to = $object->customer->email;

	// Subscription payment.
	if ( is_a( $object, '\Stripe\Subscription' ) ) {
		$subject = 'Your WP Simple Pay Subscription';

		// Get the Plan name.
		$plan = $object->plan->nickname;

		// Find the payment amount.
		try {
			$latest_invoice = \SimplePay\Core\Payments\Stripe_API::request( 'Invoice', 'retrieve', $object->latest_invoice );
			$amount         = $latest_invoice->amount_paid;
		} catch( \Exception $e ) {
			$amount = $object->plan->amount;
		}

		$body = sprintf(
			'Thank you for your %1$s payment to start your subscription of %2$s',
			simpay_format_currency( simpay_convert_amount_to_dollars( $amount ) ),
			$plan
		);
	// Single payment.
	} else {
		$subject = 'Your WP Simple Pay Payment';

		// Get the description.
		$description = $object->description;

		// Get the payment amount.
		$amount = $object->charges->data[0]->amount;

		$body = sprintf(
			'Thank you for your %1$s payment to start your subscription of %2$s',
			simpay_format_currency( simpay_convert_amount_to_dollars( $amount ) ),
			$description
		);
	}

	wp_mail( $to, $subject, $body );
}
add_action( 'simpay_webhook_subscription_created', __NAMESPACE__ . '\\simpay_custom_email_customer', 10, 2 );
add_action( 'simpay_webhook_payment_intent_succeeded', __NAMESPACE__ . '\\simpay_custom_email_customer', 10, 2 );
