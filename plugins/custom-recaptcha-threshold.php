<?php
/**
 * Plugin Name: WP Simple Pay - reCAPTCHA Threshold
 * Plugin URI: https://wpsimplepay.com
 * Author: Sandhills Development, LLC
 * Author URI: https://sandhillsdev.com
 * Description: Changes the reCAPTCHA v3 threshold.
 * Version: 1.0
 */

/**
 * Adjusts the reCAPTCHA v3 threshold for determing fraudulant interactions.
 *
 * @link https://developers.google.com/recaptcha/docs/v3
 *
 * @param string $threshold Threshold. 0-1. Default 0.5
 * @return string
 */
function custom_threshold( $threshold ) {
	return '0.3';
}
add_filter( 'simpay_recpatcha_minimum_score', __NAMESPACE__ . '\\custom_threshold' );
