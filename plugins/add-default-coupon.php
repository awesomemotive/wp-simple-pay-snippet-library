<?php
/**
 * Plugin Name: WP Simple Pay - Apply Default Coupon
 * Plugin URI: https://wpsimplepay.com
 * Author: Sandhills Development, LLC
 * Author URI: https://sandhillsdev.com
 * Description: Auto apply a default coupon.
 * Version: 1.0
 */

/**
 * Adds and applies a coupon to a form.
 *
 * Replace 157 with the form ID to target.
 * Replace 44off with the ID of your coupon.
 */
/**
 * Adds and applies a coupon to a form.
 *
 * Replace 157 with the form ID to target.
 * Replace 44off with the ID of your coupon.
 */
add_action( 'wp_enqueue_scripts',  function() {
	static $rendered = false;

	if ( true === $rendered ) {
		return;
	}

	$form_id = 157;
	$coupon  = '44off';

	wp_add_inline_script(
		'simpay-public-pro',
		"jQuery( document ).on( 'simpayBindCoreFormEventsAndTriggers', function( e, spFormElem, formData ) {
			if ( {$form_id} !== formData.formId ) {
				return;
			}

			spFormElem.find( '.simpay-coupon-field' ).val( '{$coupon}' );
			spFormElem.find( '.simpay-apply-coupon' ).trigger( 'click' );
		} );"
	);

	$rendered = true;
} );
