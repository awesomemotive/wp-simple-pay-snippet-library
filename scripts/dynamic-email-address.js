/* global jQuery */

/**
 * Dynamically pre-populate the email address in the Stripe Checkout overlay dynamically via jQuery.
 */

(function( $ ) {
	'use strict';

	$( document.body ).on( 'simpayBeforeStripePayment', function( event, spFormElem, formData ) {

		// Set to a specific form ID
		if ( 90 === formData.formId ) {

			// Set email from textbox
			formData.stripeParams.email = spFormElem.find( '#simpay-90-text-1' ).val();
		}
	} );

}( jQuery ));
