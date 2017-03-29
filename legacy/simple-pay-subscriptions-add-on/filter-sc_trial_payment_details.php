<?php

/**
 * This filter is to alter the output of the details screen when using a subscription with a trial
 */
function sc_trial_payment_details_example( $html, $subscription ) {


    // TIP: To see everything available with the subscription object checkout the Stripe API Docs or use the following:
    // return '<pre>' . print_r( $subscriptions, true ) . '</pre>';

    // For example you could output the ID
    $html = $subscription->id;

    return $html;
}
add_filter( 'sc_trial_payment_details', 'sc_trial_payment_details_example', 10, 2 );