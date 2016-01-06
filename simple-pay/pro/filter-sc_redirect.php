<?php

// This filter changes the base URL. If you are looking to change the query args of the URL we recommend you see sc_redirect_args

// Example #
// This example takes a value from a custom field and then returns the URL accordingly
// This example uses the following shortcode:
// [stripe amount="5900"]
// [stripe_dropdown id="loan_type" label="Type of loan" options="House, Car, Boat"]
// [/stripe]
function sc_redirect_example( $url ) {

    // Set the base URL to our site's home URL so we can just append to the end
    $base_url = get_home_url();

    // Get the value of the custom field dropdown
    $loan_type = $_POST['sc_form_field']['loan_type'];

    if ( ! empty ( $loan_type ) ) {

        // Find out which option was selected and then set our redirect page to the specific landing page for that option
        switch ( $loan_type ) {
            case 'House':
                return $base_url . '/loan/house';
            case 'Car':
                return $base_url . '/loan/car';
            case 'Boat':
                return $base_url . '/loan/boat';
            default:
                return $url;
        }
    }

    return $url;

}
add_filter( 'sc_redirect', 'sc_redirect_example' );
