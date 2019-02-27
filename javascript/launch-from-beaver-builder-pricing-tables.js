/* global jQuery */

/**
 * Trigger Custom Overlay or Stripe Checkout forms with Beaver Builder pricing tables via jQuery.
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

	// Match numbers in pricing table class names with its columns starting with zero (0).

	// Custom Overlay forms

	$( '.fl-pricing-table-column-0' ).find( '.fl-button' ).click( function( e ) {
		e.preventDefault();
		simpayAppPro.toggleOverlayForm( 100 );
	} );
	$( '.fl-pricing-table-column-1' ).find( '.fl-button' ).click( function( e ) {
		e.preventDefault();
		simpayAppPro.toggleOverlayForm( 101 );
	} );
	$( '.fl-pricing-table-column-2' ).find( '.fl-button' ).click( function( e ) {
		e.preventDefault();
		simpayAppPro.toggleOverlayForm( 102 );
	} );

	// Stripe Checkout forms

	$( '.fl-pricing-table-column-0' ).find( '.fl-button' ).click( function( e ) {
		e.preventDefault();
		$( '#simpay-form-200' ).find( '.simpay-payment-btn' ).click();
	} );
	$( '.fl-pricing-table-column-1' ).find( '.fl-button' ).click( function( e ) {
		e.preventDefault();
		$( '#simpay-form-201' ).find( '.simpay-payment-btn' ).click();
	} );
	$( '.fl-pricing-table-column-2' ).find( '.fl-button' ).click( function( e ) {
		e.preventDefault();
		$( '#simpay-form-202' ).find( '.simpay-payment-btn' ).click();
	} );

}( jQuery ));
