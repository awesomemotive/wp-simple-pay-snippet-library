<?php

/**
 * Dequeue Simple Pay scripts & styles on posts & pages where not in use.
 */

function simpay_dequeue_scripts_styles() {

	// In this example, Simple Pay scripts & styles are dequeued on all pages except the one with the slug "payment-page".
	// Replace with conditional logic you require.
	// Available WP conditional tags: https://codex.wordpress.org/Conditional_Tags
	if ( ! is_single( 'payment-page' ) ) {

		// Dequeue scripts & styles in Simple Pay Pro.
		wp_dequeue_script( 'stripe-checkout-pro-public' );
		wp_dequeue_style( 'stripe-checkout-pro-public' );

		// Dequeue scripts & styles in Subscriptions add-on.
		wp_dequeue_script( 'stripe-subscriptions-public' );

		// Dequeue styles in Simple Pay Lite (checkout.js is inline).
		//wp_dequeue_style( 'stripe-checkout-lite-public' );
	}
}

add_action( 'wp_print_scripts', 'simpay_dequeue_scripts_styles', 100 );
add_action( 'wp_print_styles', 'simpay_dequeue_scripts_styles', 100 );
