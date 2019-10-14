<?php
/**
 * Plugin Name: WP Simple Pay - Custom Webhook Handling
 * Plugin URI: https://wpsimplepay.com
 * Author: Sandhills Development, LLC
 * Author URI: https://sandhillsdev.com
 * Description: Add handling for additional webhook types.
 * Version: 1.0
 */

// Wait until WP Simple Pay is loaded.
add_action( 'init', function() {

	require_once( SIMPLE_PAY_INC . 'pro/webhooks/class-webhook-base.php' );
	require_once( SIMPLE_PAY_INC . 'pro/webhooks/class-webhook-interface.php' );

	/**
	 * Adds handling for `charge.succeeded` webhook.
	 *
	 * @param array $webhooks Registered webhooks.
	 * @return array
	 */
	function simpay_custom_webhooks_get_event_whitelist( $webhooks ) {
		$webhooks['charge.succeeded'] = '\Custom_Charge_Succeeded_Webhook';

		return $webhooks;
	}
	add_filter( 'simpay_webhooks_get_event_whitelist', 'simpay_custom_webhooks_get_event_whitelist' );

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

} );
