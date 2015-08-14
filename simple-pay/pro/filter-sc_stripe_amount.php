<?php

// Example #1

/*
 * $args is an array that contains
 * [label]
 * [placeholder]
 * [default]
 * [currency]
 * [min_validation_msg]
 * [unique_id]
 */
function sc_stripe_amount_example( $html, $args ) {
    // Most of this is just the default output except we will change the placeholder value to be a standard set amount across all buttons

    extract( $args );

    // Change placeholder to suggest $15.00
    $placeholder = '15.00';

    $stripe_minimum_amount = 50;

    $converted_minimum_amount = sc_stripe_to_decimal_amount( $stripe_minimum_amount, $currency );

    // USD only: Show "50 cents" instead of "50" + currency code.
    // Non-USD: Format and show currency code on right.
    if ( $currency === 'USD' ) {
        $minimum_amount_validation_msg = sprintf( __( 'Please enter an amount equal to or more than %s cents.', 'sc' ), $stripe_minimum_amount );
    } else {
        // Format number with decimals depending on zero-decimal status.
        $minimum_amount_validation_msg = sprintf( __( 'Please enter an amount equal to or more than %s %s.', 'sc' ), $converted_minimum_amount, $currency );
    }

    $minimum_amount_validation_msg = apply_filters( 'sc_stripe_amount_validation_msg', $minimum_amount_validation_msg, $stripe_minimum_amount, $currency );

    $html  = '<input type="text" class="sc-form-control sc-uea-custom-amount" name="sc_uea_custom_amount" ';
    $html .= 'id="sc_uea_custom_amount_' . $unique_id . '" value="' . esc_attr( $default ) . '" placeholder="' . esc_attr( $placeholder ) . '" ';
    $html .= 'required data-parsley-required-message="Please enter an amount." ';
    $html .= 'data-parsley-type="number" data-parsley-type-message="Please enter a valid amount. Do not include a currency symbol." ';
    $html .= 'data-parsley-min="' . $converted_minimum_amount . '" data-parsley-min-message="' . $minimum_amount_validation_msg . '" ';
    // Point to custom container for errors so we can place the non-USD currencies on the right of the input box.
    $html .= 'data-parsley-errors-container="#sc_uea_custom_amount_errors_' . $unique_id . '">';

    return $html;

}
add_filter( 'sc_stripe_amount', 'sc_stripe_amount_example', 10, 2 );


// Example #2
function sc_stripe_amount_example( $html ) {
    // Add a custom wrapper around the standard HTML output
    return '<div class="custom-class">' . $html . '</div>';
}
add_filter( 'sc_stripe_amount', 'sc_stripe_amount_example' );