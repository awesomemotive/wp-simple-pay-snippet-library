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
 * [currency]
 */
function sc_stripe_radio_example( $html, $args ) {
    // Function to add the amount onto the end of the option label
    // Should only be used for illustrative purposes
    // Most of the code here is from the default output except where we change the text output which is commented below

    extract( $args );

    $options = explode( ',', $options );
    $amounts = explode( ',', $amounts );

    $quantity_html  = ( ( 'true' == $is_quantity ) ? 'data-sc-quanitity="true" ' : '' );
    $quantity_class = ( ( 'true' == $is_quantity ) ? ' sc-cf-quantity' : '' );

    $amount_class = ( ! empty( $amounts ) || $is_amount == 'true' ? ' sc-cf-amount' : '' );
    $html = ( ! empty( $label ) ? '<label>' . $label . '</label>' : '' );
    $html .= '<div class="sc-radio-group">';

    $i = 1;
    foreach( $options as $option ) {

        $option = trim( $option );
        $value = $option;

        if( empty( $default ) ) {
            $default = $option;
        }

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

        $html .= '<label title="' . esc_attr( $option ) . '">';
        $html .= '<input type="radio" name="sc_form_field[' . esc_attr( $id ) . ']" value="' . esc_attr( $value ) . '" ' . ( $default == $option ? 'checked' : '' ) .
            ' class="' . esc_attr( $id ) . '_' . $i . $quantity_class . $amount_class . '" data-parsley-errors-container=".sc-form-group" ' . $quantity_html . '>';

        // Here is where we change the label to include the amount
        $html .= '<span>' . ( isset( $option_name ) ? $option_name : $option ) . ' - ' . sc_stripe_to_formatted_amount( $value, $currency ) . '</span>';
        $html .= '</label>';

        $i++;
    }

    $html .= '</div>'; //sc-radio-group

    return $html;
}
add_filter( 'sc_stripe_radio', 'sc_stripe_radio_example', 10, 2 );

// Example #2
function sc_stripe_radio_example( $html ) {
    // Add a custom wrapper around the standard HTML output
    return '<div class="custom-class">' . $html . '</div>';
}
add_filter( 'sc_stripe_radio', 'sc_stripe_radio_example' );