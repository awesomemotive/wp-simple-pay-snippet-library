<?php

// Example #1
/*
 * $args is an array that contains
 * [id]
 * [label]
 * [placeholder]
 * [required]
 * [default]
 * [multiline]
 * [rows]
 * [is_quantity]
 * [unique_id]
 */
function sc_stripe_text_example( $html, $args ) {
    // Add a message that the field is required. Also add a specific required class constructed by using the id of the field
    return '<span class="required ' . $args['id'] . '-required">* </span>This field is required.' . $html;
}
add_filter( 'sc_stripe_text', 'sc_stripe_text_example', 10, 2 );


// Example #2
function sc_stripe_text_example( $html ) {
    // Add a custom wrapper around the standard HTML output
    return '<div class="custom-class">' . $html . '</div>';
}
add_filter( 'sc_stripe_text', 'sc_stripe_text_example' );