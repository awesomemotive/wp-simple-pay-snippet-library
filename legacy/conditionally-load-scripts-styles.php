<?php

/**
 * Dequeue Simple Pay scripts & styles on posts & pages where not in use.
 */

function simpay_dequeue_scripts_styles() {

	// In this example, Simple Pay scripts & styles are dequeued on all posts and pages except the PAGE with the slug "payment-page".
	// Replace with conditional logic you require.
	// Available WP conditional tags: https://codex.wordpress.org/Conditional_Tags
	if ( ! is_page( 'payment-page' ) ) {
		
		// Dequeue plugin scripts.
		wp_dequeue_script( 'stripe-checkout' );
		wp_dequeue_script( 'stripe-checkout-pro-accounting' );
		wp_dequeue_script( 'stripe-checkout-pro-parsley' );
		wp_dequeue_script( 'stripe-checkout-pro-moment' );
		wp_dequeue_script( 'stripe-checkout-pro-pikaday' );
		wp_dequeue_script( 'stripe-checkout-pro-pikaday-jquery' );
		wp_dequeue_script( 'stripe-checkout-pro-public' );
		wp_dequeue_script( 'stripe-subscriptions-public' ); // If Subscriptions add-on active.

		// Dequeue plugin styles.
		wp_dequeue_style( 'stripe-checkout-button' );
		wp_dequeue_style( 'stripe-checkout-pro-pikaday' );
		wp_dequeue_style( 'stripe-checkout-pro-public-lite' );
		wp_dequeue_style( 'stripe-checkout-pro-public' );

		// Comment out above and uncomment below if using WP Simple Pay Lite.
		//wp_dequeue_style( 'stripe-checkout-public-lite' );
	}
}

add_action( 'wp_print_scripts', 'simpay_dequeue_scripts_styles', 100 );
add_action( 'wp_print_styles', 'simpay_dequeue_scripts_styles', 100 );
