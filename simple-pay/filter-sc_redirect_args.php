<?php

// Add additional arguments to pass along with the redirect
// Uses the current args being passed (you should try to avoid modifying these) and passes the charge as well
function sc_redirect_args_example( $args, $charge ) {

    // Append the customer ID  to the redirect URL
    $args['cust_id'] = $charge->customer;

    return $args;
}
add_filter( 'sc_redirect_args', 'sc_redirect_args_example', 10, 2 );