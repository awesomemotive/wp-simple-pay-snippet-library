<?php
/**
 * Plugin Name: WP Simple Pay - Custom locale, date format and currency settings per form
 * Plugin URI: https://wpsimplepay.com
 * Description: Custom locale, date format, currency, currency position and decimal/thousands separator.
 * Version: 1.0
 */

/**
 * In this example, we'll change all these settings to French/Euro for a specific form.
 *
 * Replace XXX in filter names to your form ID.
 */

/**
 * Apply form locale
 *
 * @return string
 */
function simpay_custom_locale() {
	return 'fr';
}
add_filter( 'simpay_form_XXX_locale', 'simpay_custom_locale' );

/**
 * Apply form date filter
 *
 * Date formatting options: TODO link to jQuery page
 *
 * @return string
 */
function simpay_custom_date_format() {
	return 'yy/mm/dd';
}
add_filter( 'simpay_form_XXX_date_format', 'simpay_custom_date_format' );

/**
 * Apply the form currency filter
 *
 * @return string
 */
function simpay_custom_currency() {
	return 'EUR';
}
add_filter( 'simpay_form_XXX_currency', 'simpay_custom_currency' );

/**
 * Apply the form currency position filter to set the currency symbol to the right side.
 *
 * Acceptable values:
 * - left
 * - left_space
 * - right
 * - right_space
 *
 * @return string
 */
function simpay_custom_currency_position() {
	return 'right';
}
add_filter( 'simpay_form_XXX_currency_position', 'simpay_custom_currency_position' );

/**
 * Apply the form thousand separator filter to switch our thousands to a decimal point.
 *
 * @return string
 */
function simpay_custom_thousand_separator() {
	return '.';
}
add_filter( 'simpay_form_XXX_thousand_separator', 'simpay_custom_thousand_separator' );


/**
 * Apply the form decimal separator filter to switch our decimal to a comma.
 *
 * @return string
 */
function simpay_custom_decimal_separator() {
	return ',';
}
add_filter( 'simpay_form_XXX_decimal_separator', 'simpay_custom_decimal_separator' );
