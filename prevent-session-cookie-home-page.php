<?php
/**
 * Plugin Name: WP Simple Pay - Prevent session/cookie on home page
 * Plugin URI: https://wpsimplepay.com
 * Description: Don't start a session/save a cookie on the home page.
 * Version: 1.0
 */

/**
 * If the page loaded is the homepage, we don't need to start a session if one doesn't exist.
 *
 * Could also check for other URL patterns if further session/cookie saving desired.
 */
function simpay_custom_maybe_start_session( $start_session ) {

	if ( '/' == $_SERVER['REQUEST_URI'] ) {
		$start_session = false;
	}

	return $start_session;
}

add_filter( 'simpay_start_session', 'simpay_custom_maybe_start_session', 10, 1 );
