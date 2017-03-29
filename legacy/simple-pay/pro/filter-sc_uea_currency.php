<?php

/**
 * Filter to add and change currency symbols and codes before and after the user-entered amount field.
 *
 * $args['before'] - What to display on the left of the input box.
 * $args['after'] - What to display on the right of the input box.
 *
 * 'before' defaults to dollar sign ($) for USD, blank for all other currencies.
 * 'after' defaults to blank for USD, the 3-letter currency code for all other currencies.
 */

// Example 1: Add a dollar sign ($) before and no text after the user-entered amount field.
function sc_change_currency( $args) {
    $args['before'] = '$';
    $args['after'] = ''; // Blank out the default 3-letter currency symbol (i.e. "CAD")

    return $args;
}
add_filter( 'sc_uea_currency', 'sc_change_currency' );

// Example 3: Add a dollar sign ($) before and "Canadian dollars" after the user-entered amount field.
function sc_change_currency( $args) {
    $args['before'] = '$';
    $args['after'] = 'Canadian dollars'; // Replace the default 3-letter currency symbol (i.e. "CAD") with custom text.

    return $args;
}
add_filter( 'sc_uea_currency', 'sc_change_currency' );

// Example 3: Blank out the dollar sign ($) before AND the currency symbol after the user-entered amount field.
function sc_change_currency( $args) {
    $args['before'] = '';
    $args['after'] = '';

    return $args;
}
add_filter( 'sc_uea_currency', 'sc_change_currency' );
