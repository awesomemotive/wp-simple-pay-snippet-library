<?php

// This filter changes the base URL. If you are looking to change the query args of the URL we recommend you see sc_redirect_args

// Example #1
function sc_redirect_example( $url ) {

    // Return a URL with an additional query parameter
    // In this example we are adding 'show_related=true' which may be used elsewhere
    // to show something like related products ( this logic would need to be in the theme or
    // other non-Stripe filter - this is just an example for how it could be used )
    return add_query_arg( 'show_related', 'true', $url );
}
add_filter( 'sc_redirect', 'sc_redirect_example' );
