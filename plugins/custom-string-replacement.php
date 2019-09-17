<?php
/**
 * Plugin Name: WP Simple Pay - Replace translatable text
 * Plugin URI: https://wpsimplepay.com
 * Author: Sandhills Development, LLC
 * Author URI: https://sandhillsdev.com
 * Description: Custom string translations.
 * Version: 1.0
 */

/**
 * Replaces "Apply" and "remove" strings with more specific strings.
 *
 * @link https://codex.wordpress.org/Plugin_API/Filter_Reference/gettext
 *
 * @param string $translated_text Translated text.
 * @param string $untranslated_text Untranslated text.
 * @param string $domain Text domain.
 * @return string
 */
function simpay_custom_replace_text( $translated_text, $untranslated_text, $domain ) {
	if ( 'simple-pay' !== $domain ) {
		return $translated_text;
	}

	switch ( $untranslated_text ) {
		case 'Apply' :
			$translated_text = 'Apply coupon';
			break;
		case 'remove' :
			$translated_text = 'remove coupon';
			break;
	}

	return $translated_text;
}
add_filter( 'gettext', 'simpay_custom_replace_text', 20, 3 );
