<?php
/**
 * Plugin Name: WP Simple Pay - Replace translatable text
 * Plugin URI: https://wpsimplepay.com
 * Description: Replace translatable text strings in WP Simple Pay.
 * Version: 1.0
 */

/**
 * In this example, we'll change the coupon "Apply" button (and "remove" link) text.
 * Alternatively use a translation plugin such as https://wordpress.org/plugins/loco-translate/.
 * Ref: https://codex.wordpress.org/Plugin_API/Filter_Reference/gettext
 */

function simpay_custom_replace_text( $translated_text, $untranslated_text, $domain ) {

	if ( 'simple-pay' == $domain ) {

		switch ( $untranslated_text ) {
			case 'Apply' :
				$translated_text = __( 'Apply Coupon', 'simple-pay' );
				break;
			case 'remove' :
				$translated_text = __( 'remove coupon', 'simple-pay' );
				break;
		}
	}

	return $translated_text;
}

add_filter( 'gettext', 'simpay_custom_replace_text', 20, 3 );
