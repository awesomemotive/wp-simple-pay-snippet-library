<?php
/**
 * Plugin Name: WP Simple Pay - Map Object Metadata to Customer
 * Plugin URI: https://wpsimplepay.com
 * Author: Sandhills Development, LLC
 * Author URI: https://sandhillsdev.com
 * Description: Map object metadata to a Customer.
 * Version: 1.0
 */

/**
 * Map object metadata to a Customer.
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
function simpay_add_metadata_to_customer( $event, $object ) {
	$customer_id = $object->customer->id;
	$customer    = \SimplePay\Core\Payments\Stripe_API::request( 'Customer', 'update', $customer_id, array(
		'metadata' => $object->metadata->toArray(),
	) );
}
add_action( 'simpay_webhook_subscription_created', __NAMESPACE__ . '\\simpay_add_metadata_to_customer', 10, 2 );
add_action( 'simpay_webhook_payment_intent_succeeded', __NAMESPACE__ . '\\simpay_add_metadata_to_customer', 10, 2 );
