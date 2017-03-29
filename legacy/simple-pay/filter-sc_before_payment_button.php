<?php

/**
 * Fires just before the closing <form> tag of the form, right above the payment button.
 */

function sc_before_payment_button_example() {

    // Add a hidden input field to the form
    // Useful if you need to pass some meta values or extra info to use for JavaScript interactions
    $html = '<input type="hidden" id="hidden_field" value="some_value" />';

    return $html;
}
add_filter( 'sc_before_payment_button', 'sc_before_payment_button_example' );

function sc_before_payment_button_example_2() {

    // Add a custom message before the submit button
    $html = 'Make your purchase by clicking the button below!<br>';

    return $html;
}
add_filter( 'sc_before_payment_button', 'sc_before_payment_button_example_2' );
