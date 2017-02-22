<?php

/**
 * Replace any translatable text strings in the plugin.
 * Alternatively use a translation plugin such as https://wordpress.org/plugins/loco-translate/.
 * In this example, we'll change the coupon "Apply" button (and "remove" link) text.
 */
function simpay_text_replacement( $translated_text, $text, $domain ) {

	if ( 'stripe' == $domain ) {

		switch ( $translated_text ) {
			case 'Apply' :
				$translated_text = __( 'NEW APPLY BUTTON TEXT', 'stripe' );
				break;
			case 'remove' :
				$translated_text = __( 'NEW REMOVE LINK TEXT', 'stripe' );
				break;
		}
	}

	return $translated_text;
}

add_filter( 'gettext', 'simpay_text_replacement', 10, 3 );
