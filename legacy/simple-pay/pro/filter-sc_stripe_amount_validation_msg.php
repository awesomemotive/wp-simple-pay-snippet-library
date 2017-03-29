<?php

// Example #1
function sc_stripe_amount_validation_msg_example( $message, $min, $currency ) {
    //Change around the message but include reference to the currency and the minimum amount.
    $message = 'There is an error. You must enter ' . sc_stripe_to_formatted_amount( $min, $currency ) . ' ' . $currency . ' or greater.';

    return $message;
}
add_filter( 'sc_stripe_amount_validation_msg', 'sc_stripe_amount_validation_msg_example', 10, 3 );


// Example #2
function sc_stripe_amount_validation_msg_example( $message ) {
    // Change the message text to be generic
    return 'You have entered an amount below the minimum required. Please try again.';
}
add_filter( 'sc_stripe_amount_validation_msg', 'sc_stripe_amount_validation_msg_example' );
