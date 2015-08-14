<?php

// Example #1
/*
 * $args is an array that contains
 * [id]
 * [label]
 * [required]
 * [default]
 * [unique_id]
 */
function sc_stripe_checkbox_example( $html, $args ) {
    // Function to change the label color of checkboxes to red
    // This is not recommended but used as illustrative purposes

    // Extract our $args so we can use them as variables
    extract( $args );

    // Most of below is just the standard HTML output except for the changes we make to the <label>

    $checked  = ( ( $default === 'true' || $default === 'checked' ) ? 'checked' : '' );

    // Here is where we can change the label color
    $html = '<label style="color: #f00;">';
    $html .= '<input type="checkbox" id="' . esc_attr( $id ) . '" class="sc-cf-checkbox" name="sc_form_field[' . esc_attr( $id ) . ']" ';
    $html .= ( ( $required === 'true' ) ? 'required' : '' ) . ' ' . $checked . ' value="Yes" ';
    // Point to custom container for errors as checkbox fields aren't automatically placing it in the right place.
    $html .= 'data-parsley-errors-container="#sc_cf_checkbox_error_' . $unique_id . '">';
    // Actual label text.
    $html .= $label;
    $html .= '</label>';
    // Hidden field to hold a value to pass to Stripe payment record.
    $html .= '<input type="hidden" id="' . esc_attr( $id ) . '_hidden" class="sc-cf-checkbox-hidden" name="sc_form_field[' . esc_attr( $id ) . ']" value="No">';
    // Custom validation errors container for checkbox fields.
    // Needs counter ID specificity to match input above.
    $html .= '<div id="sc_cf_checkbox_error_' . $unique_id . '"></div>';

    return $html;
}
add_filter( 'sc_stripe_checkbox', 'sc_stripe_checkbox_example', 10, 2 );


// Example #2
function sc_stripe_checkbox_example( $html ) {
    // Add a custom wrapper around the standard HTML output
    return '<div class="custom-class">' . $html . '</div>';
}
add_filter( 'sc_stripe_checkbox', 'sc_stripe_checkbox_example' );