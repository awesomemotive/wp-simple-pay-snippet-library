<?php
/**
 * Plugin Name: WP Simple Pay - Custom Tax Rate Percentage
 * Plugin URI: https://wpsimplepay.com
 * Author: Sandhills Development, LLC
 * Author URI: https://sandhillsdev.com
 * Description: Override the returned tax rate for a given Payment Form.
 * Version: 2.0
 */

/**
 * Important: Tax rates with the percentage to use must first be created in Simple Pay Pro > Settings > General > Taxes.
 */

/**
 * Find a tax rate based on a given percentage.
 * 
 * @param int                            $percentage Tax rate percentage.
 * @param \SimplePay\Pro\Taxes\TaxRate[] $tax_rates Tax Rates
 */
function simpay_find_tax_rate( $percentage, $tax_rates ) {
	return array_filter(
		$tax_rates,
		function ( $tax_rate ) use ( $percentage ) {
			return $tax_rate->percentage == $percentage;
		}
	);
}

// Filter a Payment Form's prices.
add_filter(
	'simpay_get_payment_form_tax_rates',
	/**
	 * Filters the tax rates for a given form.
	 * 
	 * @param \SimplePay\Pro\Taxes\TaxRate[] $tax_rates Tax Rates
	 * @param \SimplePay\Core\Abstracts\Form $form Payment Form.
	 */
	function( $tax_rates, $form ) {
		switch ( $form->id ) {
			// Return a tax rate of 10% for Payment Form 13.
			case 13:
				return simpay_find_tax_rate( 10, $tax_rates );
				break;
			// Return a tax rate of 12% for Payment Form 57
			case 57:
				return simpay_find_tax_rate( 12, $tax_rates );
				break;
			default:
				return $tax_rates;
		}
	},
	10,
	2
);
