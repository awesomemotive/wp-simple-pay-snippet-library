<?php
/**
 * Plugin Name: WP Simple Pay - Add Percent Fee
 * Plugin URI: https://wpsimplepay.com
 * Description: Add a percent fee to one-time payment forms.
 * Version: 1.0
 */

/**
 * Add a percent fee to a specific one-time payment form in addition to the
 * global tax percent.
 *
 * TODO: Does this add to global tax percent instead of override?
 * TODO: Are tax amount & total amount labels correct?
 *
 * Replace 157 with the form ID to target.
 * Note: Does not work for subscription charges.
 */
function simpay_custom_form_157_fee_percent() {

	return 7.5; // This will be an additional 7.5 %
}

add_filter( 'simpay_form_157_fee_percent', 'simpay_custom_form_157_fee_percent' );
