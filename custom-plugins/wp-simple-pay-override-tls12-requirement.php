<?php

/**
 * Plugin Name: WP Simple Pay - Override TLS 1.2 requirement.
 * Description: Override TLS 1.2 requirement by Stripe.
 */

// See https://github.com/stripe/stripe-php#ssl--tls-compatibility-issues
function simpay_override_tls12_requirement() {
	if ( class_exists( 'Stripe\Stripe' ) ) {
		$curl = new \Stripe\HttpClient\CurlClient( array( CURLOPT_SSLVERSION => CURL_SSLVERSION_TLSv1 ) );
		\Stripe\ApiRequestor::setHttpClient( $curl );
	}
}
add_action( 'init', 'simpay_override_tls12_requirement', 1, 0 );
