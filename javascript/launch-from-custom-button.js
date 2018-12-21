/* global jQuery */

// TODO Currently works with Stripe Checkout forms only.

/**
 * Trigger Custom Overlay or Stripe Checkout forms with buttons or links outside the form via jQuery.
 * Replace number part of the class IDs in CSS & JavaScript with the form IDs to target.
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

(function( $ ) {
	'use strict';

	// Custom Overlay forms

	$( '#my_custom_button' ).click( function( e ) {
		e.preventDefault();
		$( '#simpay-100-payment-button' ).click();
	} );

	// Stripe Checkout forms

	$( '#my_custom_button' ).click( function( e ) {
		e.preventDefault();
		$( '#simpay-form-200' ).find( '.simpay-payment-btn' ).click();
	} );

}( jQuery ));
