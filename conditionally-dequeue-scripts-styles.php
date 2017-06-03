<?php
/**
 * Plugin Name: WP Simple Pay - Conditionally dequeue scripts & styles
 * Plugin URI: https://wpsimplepay.com
 * Description: Conditionally dequeue scripts & styles based on set conditions.
 * Version: 1.0
 */

/**
 * In this example, we'll remove all plugin scripts & styles unless on a specific page with the slug
 * "payment-page". Available WP conditional tags: https://codex.wordpress.org/Conditional_Tags
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
