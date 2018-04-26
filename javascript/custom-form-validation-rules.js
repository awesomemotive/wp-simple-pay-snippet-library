/* global jQuery */

/**
 * Customize client-side form validation messages.
 *
 * WP Simple Pay Pro uses the jQuery Validation plugin internally (https://jqueryvalidation.org/).
 * How to add JavaScript to WordPress: https://docs.wpsimplepay.com/articles/adding-custom-javascript/
 */

(function( $ ) {
	'use strict';

	// Replace '#simpay-157-text-1' with the form element ID to target.
	$( document.body ).on( 'simpayFormValidationInitialized', function( event, spFormElem ) {

		$( '#simpay-157-text-1' ).rules( 'add', {
			messages: {
				required: 'My custom required message.'
			}
		} );

	} );

}( jQuery ));
