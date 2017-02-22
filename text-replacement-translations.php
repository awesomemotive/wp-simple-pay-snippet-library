<?php

/**
 * Replace any translatable text strings in the plugin.
 * Alternatively use a translation plugin such as https://wordpress.org/plugins/loco-translate/.
 * In this example, we'll change the coupon "Apply" button (and "remove" link) text.
 */
function simpay_text_replacement( $translations, $text, $domain ) {

	if ( 'stripe' == $domain ) {
		if ( 'Apply' == $text ) {
			return __( 'Apply coupon' );
		}
		if ( 'remove' == $text ) {
			return __( 'remove coupon' );
		}
	}

	return $translations;
}

add_filter( 'gettext', 'simpay_text_replacement', 10, 3 );
