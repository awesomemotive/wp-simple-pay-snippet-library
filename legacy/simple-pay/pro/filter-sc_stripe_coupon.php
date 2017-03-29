<?php

// Example #1
/*
 * $args is an array that contains
 * [label]
 * [placeholder]
 * [apply_button_style]
 * [unique_id]
 */
function sc_stripe_coupon_example( $html, $args ) {

    // Add a default label if the label is not set
    if( empty( $args['label'] ) ) {
        //return $html;
        $label = 'Default Label';
    }

    return $label . $html;

}
add_filter( 'sc_stripe_coupon', 'sc_stripe_coupon_example', 10, 2 );


// Example #2

function sc_stripe_coupon_example( $html ) {
    // Add a custom wrapper around the stand HTML output
    return '<div class="custom-class">' . $html . '</div>';
}
add_filter( 'sc_stripe_coupon', 'sc_stripe_coupon_example' );