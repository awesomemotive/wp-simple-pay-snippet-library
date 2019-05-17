<?php
/**
 * Plugin Name: WP Simple Pay - Custom Webhook Handling
 * Plugin URI: https://wpsimplepay.com
 * Description: Add handling for additional webhook types.
 * Version: 1.0
 */

/**
 * Add handling for `charge.succeeded` webhook.
 */
add_filter( 'simpay_webhooks_get_event_whitelist', function( $webhooks ) {
	$webhooks['charge.succeeded'] = '\Custom_Charge_Succeeded_Webhook';

	return $webhooks;
} );

/**
 * Callback for `charge.succeeded` webook.
 */
class Custom_Charge_Succeeded_Webhook extends SimplePay\Pro\Webhooks\Webhook_Base implements SimplePay\Pro\Webhooks\Webhook_Interface {

	/**
	 * Handle the Webhook's data.
	 */
	public function handle() {
		$object = $this->event->data->object;

		// Deal with the webhook main object data.
		// Find the available object data by viewing Events in
		//
		// https://dashboard.stripe.com/test/events
		//   or
		// https://dashboard.stripe.com/events

		// $charge_id = $object->id;
		// $customer_id = $object->customer
		// $amount = $object->amount
		// $metadata = $object->metadata
		// etc...
	}
}
