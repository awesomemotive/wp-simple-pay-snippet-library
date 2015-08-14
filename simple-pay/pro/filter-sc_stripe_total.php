<?php

// Example #1
/**
 * $args is an array and contains
 * [label]
 * [currency]
 * [amount]
 */
function sc_stripe_total_example( $html, $args ) {
    // Change around the text to look something like "10.00 USD is your total amount"
    $html = '<p>' . sc_stripe_to_formatted_amount( $args['amount'], $args['currency'] ) . ' ' . $args['currency'] . ' is your total amount.</p>';

    return $html;
}
add_filter( 'sc_stripe_total', 'sc_stripe_total_example', 10, 2 );


// Example #2
function sc_stripe_total_example( $html ) {
    // Add a custom wrapper around the stand HTML output
    return '<div class="custom-class">' . $html . '</div>';
}
add_filter( 'sc_stripe_total', 'sc_stripe_total_example' );