<?php
/**
 * Plugin Name: WP Simple Pay - Custom Template Tags
 * Plugin URI: https://wpsimplepay.com
 * Author: Sandhills Development, LLC
 * Author URI: https://sandhillsdev.com
 * Description: Custom payment success message template tags.
 * Version: 1.0
 */

/**
 * Register a new template tag.
 *
 * @param array $tags Template tags.
 * @return array
 */
function simpay_custom_template_tags( $tags ) {
	$tags[] = 'name-on-card';

	return $tags;
}
add_filter( 'simpay_payment_details_template_tags', 'simpay_custom_template_tags' );

/**
 * Replaces the {name-on-card} template tag with the name of the Customer's payment method.
 *
 * @param string $value Template tag value.
 * @param array  $payment_confirmation_data {
 *   Contextual information about this payment confirmation.
 *
 *   @type \Stripe\Customer               $customer Stripe Customer
 *   @type \SimplePay\Core\Abstracts\Form $form Payment form.
 *   @type object                         $subscriptions Subscriptions associated with the Customer.
 *   @type object                         $paymentintents PaymentIntents associated with the Customer.
 * }
 * @return string
 */
function simpay_custom_template_tag_name_on_card( $value, $payment_confirmation_data ) {
	// Get all cards.
	$payment_methods = SimplePay\Core\Payments\Stripe_API::request( 'PaymentMethod', 'all', array(
		'customer' => $payment_confirmation_data['customer']->id,
		'type'     => 'card',
	) );

	// Find the most recent card.
	$card = current( $payment_methods->data );

	return $card->billing_details->name;
}
add_filter( 'simpay_payment_confirmation_template_tag_name-on-card', 'simpay_custom_template_tag_name_on_card', 10, 2 );
