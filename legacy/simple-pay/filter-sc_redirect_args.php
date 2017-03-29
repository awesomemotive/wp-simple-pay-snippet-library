<?php

// For charge response info see: https://stripe.com/docs/api#charge_object

// Add additional arguments to pass along with the redirect
// Uses the current args being passed (you should try to avoid modifying these) and passes the charge as well
// This example shows a way to add the customer id as a query arg so that it will append &cust_id=12345 to the success URL.
// This filter only changes the query args and does not affect the base URL like sc_redirect does.
function sc_redirect_args_example( $args, $charge ) {

    // Append the customer ID  to the redirect URL
    $args['cust_id'] = $charge->customer;

    return $args;
}
add_filter( 'sc_redirect_args', 'sc_redirect_args_example', 10, 2 );