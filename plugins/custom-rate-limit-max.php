<?php
/**
 * Plugin Name: WP Simple Pay - Custom Rate Limit Maximum
 * Plugin URI: https://wpsimplepay.com
 * Author: Sandhills Development, LLC
 * Author URI: https://sandhillsdev.com
 * Description: Changes the default rate limit maximum.
 * Version: 1.0
 */
 
/**
 * Changes the default rate limit count.
 *
 * The default number of requests is 18.
 * Each payment requires 2-4 requests depending on the form type.
 */
add_filter(
	'simpay_rate_limiting_max_rate_count',
	function() {
		return 30;
	}
);

/**
 * Optional: Changes the default rate limit window.
 *
 * By default users must wait 2.5 hours to make another request.
 */
add_filter(
	'simpay_rate_limiting_timeout',
	function() {
		return HOUR_IN_SECONDS * 12;
	}
);

/**
 * Optional: Changes the rate limit identifier.
 *
 * By default this is the best approximation of the user's IP address.
 * IP address may be affected byIf the store is behind a proxy, load balancer, CDN etc.
 *
 * Only recommmended if "WP Simple Pay > Settings > Anti-Spam > Require User Authentication" is enabled.
 *
 * Use the current user's ID.
 */
add_filter(
	'simpay_rate_limiting_id',
	function( $ip ) {
		if ( ! is_user_logged_in() ) {
			return $ip;
		}
		
		return get_current_user_id();
	}
);
