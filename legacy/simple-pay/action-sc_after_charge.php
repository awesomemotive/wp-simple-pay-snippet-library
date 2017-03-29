<?php

// Takes the $charge_response as a parameter so you can pull information from the charge
// For charge response info see: https://stripe.com/docs/api#charge_object
function sc_after_charge_example( $charge_response ) {
    // Useful for adding additional functionality after the charge is complete
    // For example something like storing the transaction ID in the database if you need to
}
add_action( 'sc_after_charge', 'sc_after_charge_example' );