<?php

// Example #1
/*
 * $args is an array that contains
 * [id]
 * [label]
 * [required]
 * [placeholder]
 * [default]
 * [min]
 * [max]
 * [step]
 * [is_quantity]
 * [unique_id]
 */
function sc_stripe_number_example( $html, $args ) {
    // Function to set all of the buttons on the site to use a specific min, max, and step interval

    // Extract our $args so we can use them as variables
    extract( $args );

    // Default output
    $quantity_html  = ( ( 'true' == $is_quantity ) ? 'data-sc-quanitity="true" data-parsley-min="1" ' : '' );
    $quantity_class = ( ( 'true' == $is_quantity ) ? ' sc-cf-quantity' : '' );

    // Set all default buttons min, max, and step values
    $min  = 'min="1" ';
    $max  = 'max="100" ';
    $step = 'step="1" ';

    // Default output
    $html = ( ! empty( $label ) ? '<label for="' . esc_attr( $id ) . '">' . $label . '</label>' : '' );
    // No Parsley JS number validation yet as HTML5 number type takes care of it.
    // Default output
    $html .= '<input type="number" data-parsley-type="number" class="sc-form-control sc-cf-number' . $quantity_class . '" id="' . esc_attr( $id ) . '" name="sc_form_field[' . $id . ']" ';
    $html .= 'placeholder="' . esc_attr( $placeholder ) . '" value="' . esc_attr( $default ) . '" ';
    $html .= $min . $max . $step . ( ( $required === 'true' ) ? 'required' : '' ) . $quantity_html . '>';

    return $html;
}
add_filter( 'sc_stripe_number', 'sc_stripe_number_example', 10, 2 );


// Example #2
function sc_stripe_number_example( $html ) {
    // Add a custom wrapper around the standard HTML output
    return '<div class="custom-class">' . $html . '</div>';
}
add_filter( 'sc_stripe_number', 'sc_stripe_number_example' );