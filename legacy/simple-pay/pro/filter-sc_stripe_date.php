<?php

// Example #1
/*
 * $args is an array that contains
 * [id]
 * [label]
 * [placeholder]
 * [required]
 * [default]
 * [unique_id]
 */
function sc_stripe_date_example( $html, $args ) {

    // Extract the $args so we can use them as variables
    extract( $args );

    // Get the date format for the current day by using the current time
    // We need to use the format mm/dd/YYYY since that is what the date picker uses and we don't want to confuse it
    $today = current_time( 'm/d/Y' );

    // We are just using the default output here but replacing the value with the changes
    $html  = ( ! empty( $label ) ? '<label for="' . esc_attr( $id ) . '">' . $label . '</label>' : '' );
    $html .= '<input type="text" value="' . esc_attr( $today ) . '" class="sc-form-control sc-cf-date" name="sc_form_field[' . $id . ']" ';
    $html .= 'id="' . esc_attr( $id ) . '" value="' . esc_attr( $default ) . '" placeholder="' . esc_attr( $placeholder ) . '" ';
    $html .= ( ( $required === 'true') ? 'required' : '' ) . ' data-parsley-required-message="Please select a date.">';

    return $html;
}
add_filter( 'sc_stripe_date', 'sc_stripe_date_example', 10, 2 );

// Example #2
function sc_stripe_date_example( $html ) {
    // Add a custom wrapper around the standard HTML output
    return '<div class="custom-class">' . $html . '</div>';
}
add_filter( 'sc_stripe_date', 'sc_stripe_date_example' );