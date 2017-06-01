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

// The $scripts parameter is an array of all the scripts that need to be loaded for Simple Pay
function simpay_custom_remove_scripts( $scripts ) {

	if ( ! is_page( 'payment-page' ) ) {

		// If we don't want to load any scripts then we can just return an empty array.
		return array();
	}

	// By default we return the $scripts array that is setup through the plugin
	return $scripts;
}
add_filter( 'simpay_before_register_public_scripts', 'simpay_custom_remove_scripts' );


// The $style parameter is an array of all the styles that need to be loaded for Simple Pay
function simpay_custom_remove_styles( $styles ) {

	if ( ! is_page( 'payment-page' ) ) {

		// If we don't want to load any styles then we can just return an empty array.
		return array();
	}

	// By default we return the $styles array that is setup through the plugin
	return $styles;
}
add_filter( 'simpay_before_register_public_styles', 'simpay_custom_remove_styles' );
