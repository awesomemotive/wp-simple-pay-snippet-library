<?php
/**
 * Plugin Name: WP Simple Pay - Add Cache Exclusion
 * Plugin URI: https://wpsimplepay.com
 * Author: Sandhills Development, LLC
 * Author URI: https://sandhillsdev.com
 * Description: Add a page to exclude from caching.
 * Version: 1.0
 */

/**
 * Helps WordPress caching plugins ignore certain pages to be cached.
 *
 * In this example a page with the slug of `custom-confirmation-page` is excluded.
 *
 * @param array $uris A list of URIs to attempt to exclude from caching.
 * @return array
 */
function simpay_custom_add_cache_exclusion( $uris ) {
	// Exclude a page such as https://mysite.com/custom-confirmation-page
	$uris[] = 'custom-confirmation-page';

	return $uris;
}
add_filter( 'simpay_cache_exclusion_uris', 'simpay_custom_add_cache_exclusion' );
