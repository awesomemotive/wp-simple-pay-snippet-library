/* global jQuery */

/**
 * Trigger Custom Overlay or Stripe Checkout forms with buttons or links outside the form via jQuery.
 * Replace 123 part of the class IDs in CSS & JavaScript with the form IDs to target.
 */

/**
 * CSS to hide payment forms:
 *
 * Specific Custom Overlay form:
 * #simpay-overlay-form-wrap-123  { display: none; }
 *
 * Specific Stripe Checkout form:
 * #simpay-stripe_checkout-form-wrap-123 { display: none; }
 *
 * Hide all payment forms:
 * .simpay-form-wrap { display: none; }
 */

( function( $ ) {
	'use strict';

	// Custom Overlay forms

	$( '#my_custom_button' ).click( function( e ) {
		e.preventDefault();
		simpayAppPro.toggleOverlayForm( 123 );
	} );

	// Stripe Checkout forms

	$( '#my_custom_button' ).click( function( e ) {
		e.preventDefault();
		$( '#simpay-form-123' ).find( '.simpay-payment-btn' ).click();
	} );

}( jQuery ) );
