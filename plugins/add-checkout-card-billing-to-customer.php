<?php
/**
 * Plugin Name: WP Simple Pay - Stripe Checkout - Map Card Billing to Customer
 * Plugin URI: https://wpsimplepay.com
 * Author: Sandhills Development, LLC
 * Author URI: https://sandhillsdev.com
 * Description: Maps the billing address collected in Stripe Checkout to the Customer object.
 * Version: 1.0
 */

// Wait until WP Simple Pay is loaded.
add_action( 'plugins_loaded', function() {

	require_once( SIMPLE_PAY_INC . 'pro/webhooks/class-webhook-base.php' );
	require_once( SIMPLE_PAY_INC . 'pro/webhooks/class-webhook-interface.php' );

	/**
	 * Adds handling for `payment_method.attached` webhook.
	 *
	 * @param array $webhooks Registered webhooks.
	 * @return array
	 */
	function simpay_custom_webhooks_get_event_whitelist( $webhooks ) {
		$webhooks['payment_method.attached'] = '\Custom_Payment_Method_Attached_Webhook';

		return $webhooks;
	}
	add_filter( 'simpay_webhooks_get_event_whitelist', 'simpay_custom_webhooks_get_event_whitelist' );

	/**
	 * Callback for `payment_method.attached` webook.
	 */
	class Custom_Payment_Method_Attached_Webhook extends SimplePay\Pro\Webhooks\Webhook_Base implements SimplePay\Pro\Webhooks\Webhook_Interface {

		/**
		 * Handle the Webhook's data.
		 */
		public function handle() {
			$object  = $this->event->data->object;
			$address = $object->billing_details->address->__toArray();
			$name    = $object->billing_details->name;
			$phone   = $object->billing_details->phone;

			return \SimplePay\Core\Payments\Stripe_API::request( 'Customer', 'update', $object->customer, array(
				'name'    => $name,
				'address' => $address,
				'phone'   => $phone,
			) );
		}
	}

} );
