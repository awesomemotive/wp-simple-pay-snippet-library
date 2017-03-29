<?php

// Example #1
/*
 * $args is an array that contains
 * [id]
 * [label]
 * [default]
 * [options]
 * [is_quantity]
 * [amounts]
 * [is_amount]
 * [unique_id]
 */
function sc_stripe_dropdown_example( $html, $args ) {
    // Function to show how to add an option at the top that asks user to select an option
    // Should only be used for illustrative purposes.

    // Most of the code here is just the default HTML output except where we add the additional option

    extract( $args );
    $quantity_html  = ( ( 'true' == $is_quantity ) ? 'data-sc-quanitity="true" ' : '' );
    $quantity_class = ( ( 'true' == $is_quantity ) ? ' sc-cf-quantity' : '' );

    $amount_class = ( ! empty( $amounts ) || $is_amount == 'true' ? ' sc-cf-amount' : '' );

    $options = explode( ',', $options );
    $html = ( ! empty( $label ) ? '<label for="' . esc_attr( $id ) . '">' . $label . '</label>' : '' );
    $html .= '<select class="sc-form-control sc-cf-dropdown' . $quantity_class . $amount_class . '" id="' . esc_attr( $id ) . '" name="sc_form_field[' . esc_attr( $id ) . ']" ' . $quantity_html . '>';

    // Add an option to the very top as an informative option
    $html .= '<option>Select a payment amount below</option>';

    $i = 1;
    foreach( $options as $option ) {

        $option = trim( $option );
        $value = $option;

        if( $is_amount == 'true' ) {

            $currency = strtoupper( $sc_script_options['script']['currency'] );
            $amount = sc_stripe_to_formatted_amount( $option, $currency );

            if( $currency == 'USD' ) {
                $option_name = '$' . $amount;
            } else {
                $option_name = $amount . ' ' . $currency;
            }

        } else if( ! empty( $amounts ) ) {
            $value = $amounts[$i - 1];
        }

        $html .= '<option ' . ( $default == $option ? 'selected' : '' ) . ' value="' . esc_attr( $value ) . '">' . ( isset( $option_name ) ? $option_name : $option ) . '</option>';
        $i++;
    }

    $html .= '</select>';

    return $html;
}
add_filter( 'sc_stripe_dropdown', 'sc_stripe_dropdown_example', 10, 2 );


// Example #2
function sc_stripe_dropdown_example( $html ) {
    // Add a custom wrapper around the standard HTML output
    return '<div class="custom-class">' . $html . '</div>';
}
add_filter( 'sc_stripe_dropdown', 'sc_stripe_dropdown_example' );