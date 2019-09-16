<?php
/**
 * Plugin Name: WP Simple Pay - Add Cache Exclusion
 * Plugin URI: https://wpsimplepay.com
 * Description: Add a page to exclude from caching
 * Version: 1.0
 */

/**
 * In this example, we'll see how to exclude a page from caching.
 *
 * Note: This tells us to set DONOTCACHEPAGE to true and might not work for server side caching systems.
 */

function simpay_custom_add_cache_exclusion( $uris ) {

	// $uris is an array of pages to exclude, so we just add on to the end of it
	// It uses the slug of the page you want to exclude
	$uris[] = 'custom-confirmation-page';

	return $uris;
}
add_filter( 'simpay_cache_exclusion_uris', 'simpay_custom_add_cache_exclusion' );
