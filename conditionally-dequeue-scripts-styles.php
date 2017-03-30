<?php
/**
 * Plugin Name: WP Simple Pay - Conditionally dequeue scripts & styles
 * Plugin URI: https://wpsimplepay.com
 * Description: Conditionally dequeue scripts & styles based on set conditions.
 * Version: 1.0
 */

/**
 * In this example, we'll change dequeue all plugin scripts & styles unless on a specific page with the slug
 * "payment-page". Available WP conditional tags: https://codex.wordpress.org/Conditional_Tags
 */

// TODO
/*
function simpay_custom_dequeue_scripts_styles() {

	if ( ! is_page( 'payment-page' ) ) {

		// TODO Can we just run one call each to wp_dequeue_style & wp_dequeue_script?
		// TODO Do we need to also call wp_deregister_style & wp_deregister_script?
		wp_dequeue_style( 'XXX' );
		wp_dequeue_script( 'XXX' );
	}
}

add_action( 'wp_print_scripts', 'simpay_custom_dequeue_scripts_styles', 100 );
add_action( 'wp_print_styles', 'simpay_custom_dequeue_scripts_styles', 100 );
*/
