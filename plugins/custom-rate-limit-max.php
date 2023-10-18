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
 * Lower the number of requests allowed for the set timeframe to 3 (default 5).
 */
add_filter(
	'simpay_rate_limiting_max_rate_count',
	/**
 	 * @return int The number of requests that can be made in the timeframe.
   	 */
	function() {
		return 3;
	}
);

/**
 * Increase the rate limit timeframe to 12 hours (default 2.5 hours).
 */
add_filter(
	'simpay_rate_limiting_timeout',
	/**
 	 * @return int The number of seconds of the rate limit timeframe.
   	 */
	function() {
		return HOUR_IN_SECONDS * 12;
	}
);

/**
 * Change the rate limit's unique identifier to the current user ID, if available.
 *
 * By default this is the best approximation of the user's IP address.
 * IP address may be affected byIf the store is behind a proxy, load balancer, CDN etc.
 *
 * Only recommmended if "WP Simple Pay > Settings > Anti-Spam > Require User Authentication" is enabled.
 */
add_filter(
	'simpay_rate_limiting_id',
	/**
	 * @var string $ip
	 * @return string|int
	 */
	function( $ip ) {
		if ( ! is_user_logged_in() ) {
			return $ip;
		}
		
		return get_current_user_id();
	}
);
