<?php
/**
 * Plugin Name: WP Simple Pay - Change Plan Labels
 * Plugin URI: https://wpsimplepay.com
 * Description: Change the plan labels through code.
 * Version: 1.0
 */

/**
 * In this example, we'll see how to change the plan label defaults to include the 3-letter currency code.
 */
function simpay_custom_change_plan_labels( $label, $plan ) {

	$label = $plan->name . ' ' . simpay_formatted_amount( $plan->amount, $plan->currency ) . ' ' . strtoupper( $plan->currency ) .
	         ' every ' . $plan->interval_count . ' ' . $plan->interval . '(s)';

	return $label;
}
add_filter( 'simpay_plan_name_label', 'simpay_custom_change_plan_labels', 10, 2 );
