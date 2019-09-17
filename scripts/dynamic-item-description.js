/* global jQuery */

/**
 * Update the item description in the Stripe Checkout overlay dynamically via jQuery.
 */

(function( $ ) {
	'use strict';

	$( document.body ).on( 'simpayBeforeStripePayment', function( event, spFormElem, formData ) {

		// These are several examples mixed together. Remove code not necessary for your use case.

		// Set to a specific form ID
		if ( 50 === formData.formId ) {

			// Set item description from text
			formData.stripeParams.description = 'Custom item description';

			// Set item description from dropdown
			formData.stripeParams.description = spFormElem.find( '#simpay-50-dropdown-2' ).find( 'option:selected' ).first().val();

			// Set item description from radio button
			formData.stripeParams.description = spFormElem.find( 'input[type="radio"]:checked' ).first().val();

		}
	} );

}( jQuery ));
