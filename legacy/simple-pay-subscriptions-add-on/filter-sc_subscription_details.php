<?php

// Change how the subscription details can be shown
function sc_subscription_details_example( $details_html, $sub )  {

    // Show just the plan name and not all the extra details
    $details_html = $sub->name;

    return $details_html;
}
add_filter( 'sc_subscription_details', 'sc_subscription_details_example', 10, 2 );