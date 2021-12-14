<?php
/**
 * Plugin Name: WP Simple Pay - Use Payment Form Description as Payment Description
 * Plugin URI: https://wpsimplepay.com
 * Author: Sandhills Development, LLC
 * Author URI: https://sandhillsdev.com
 * Description: Custom item description.
 * Version: 1.0
 */
add_filter(
	'simpay_get_paymentintent_args_from_payment_form_request',
	function( $args, $form ) {
		$args['description'] = $form->item_description;

		return $args;
	},
	10,
	2
);
