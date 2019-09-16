<?php
/**
 * Plugin Name: WP Simple Pay - Custom Plan Labels
 * Plugin URI: https://wpsimplepay.com
 * Author: Sandhills Development, LLC
 * Author URI: https://sandhillsdev.com
 * Description: Change the plan labels that are output on the subscription selector.
 * Version: 1.0
 */

/**
 * Changes the output of the form's plan label to "{name} {amount} {currency} every {interval_count} {interval}"
 *
 * @param string       $label Plan label.
 * @param \Stripe\Plan $plan Stripe Plan.
 * @return string
 */
function simpay_custom_plan_labels( $label, $plan ) {
	$label = sprintf(
		'%1$s %2$s %3$s every %4$s %5$s(s)',
		$plan->name,
		simpay_format_currency(
			simpay_convert_amount_to_dollars( $plan->amount ),
			$plan->currency
		),
		strtoupper( $plan->currency ),
		$plan->interval_count,
		$plan->interval
	);

	return $label;
}
add_filter( 'simpay_plan_name_label', 'simpay_custom_plan_labels', 10, 2 );
