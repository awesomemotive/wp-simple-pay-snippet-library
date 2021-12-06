<?php
/**
 * Plugin Name: WP Simple Pay - Custom Amount
 * Plugin URI: https://wpsimplepay.com
 * Author: Sandhills Development, LLC
 * Author URI: https://sandhillsdev.com
 * Description: Use a different amount for a specific form.
 * Version: 1.0
 */

/**
 * Adjusts the WP Simple Pay payment form amount.
 *
 * Update $form_id, $unit_amount, and $currency variables only.
 *
 * @param \SimplePay\Core\PaymentForm\PriceOption[] $price_options Payment form price options.
 * @param \SimplePay\Core\Abstracts\Form            $form Payment form.
 * @return \SimplePay\Core\PaymentForm\PriceOption[]
 */
add_filter(
	'simpay_get_payment_form_price_options',
	function( $price_options, $form ) {
		$form_id     = 150;
		$unit_amount = 2000; // $20.00 in cents.
		$currency    = 'usd';

		// STOP EDITING.
		if ( $form_id !== $form->id ) {
			return $price_options;
		}

		$custom_amount = new \SimplePay\Core\PaymentForm\PriceOption(
			array(
				'id'              => 'simpay_custom_amount',
				'currency'        => $currency,
				'unit_amount'     => $unit_amount,
				'unit_amount_min' => $unit_amount,
				'default'         => true,
			),
			$form
		);

		return array( $custom_amount );
	},
	10,
	2
);
