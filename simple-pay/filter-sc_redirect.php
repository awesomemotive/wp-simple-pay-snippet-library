<?php

// Example #1
function sc_redirect_example( $url ) {

    // Return a URL with an additional query parameter
    // In this example we are adding 'show_related=true' which may be used elsewhere
    // to show something like related products ( this logic would need to be in the theme or
    // other non-Stripe filter - this is just an example for how it could be used )
    return add_query_arg( 'show_related', 'true', $url );
}
add_filter( 'sc_redirect', 'sc_redirect_example' );


// Example #2
function sc_redirect_example( $url, $failed ) {

    // Check if the transaction failed and act accordingly
    // In this example we add a query arg 'utm_campaign=failed_transaction' to let us find out
    // how many failed transactions we are getting using a web traffic analytics site.
    if( $failed ) {
        return add_query_arg( 'utm_campaign', 'failed_transaction', $url );
    }

    return $url;
}
add_filter( 'sc_redirect', 'sc_redirect_example', 10, 2 );