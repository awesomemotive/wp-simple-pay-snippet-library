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
 * Changes the default rate limit maximum.
 *
 * Default number of requests is 20 (~4/5 payments per IP address)
 * Increase limit to 30 (~5/6 payments per IP address)
 */
function simpay_custom_rate_limiting_max_rate_count() {
  return 30;
}
add_filter( 'simpay_rate_limiting_max_rate_count', 'simpay_custom_rate_limiting_max_rate_count' );
