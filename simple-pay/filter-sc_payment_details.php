<?php

// Example #1 - Add a simple output of the last 4 of the credit card and the expiration date
function sc_payment_details_example( $html, $charge_response ) {
    // This is copied from the original output so that we can just add in our own details
    $html = '<div class="sc-payment-details-wrap">';

    $html .= '<p>' . __( 'Congratulations. Your payment went through!', 'sc' ) . '</p>' . "\n";

    if( ! empty( $charge_response->description ) ) {
        $html .= '<p>' . __( "Here's what you bought:", 'sc' ) . '</p>';
        $html .= $charge_response->description . '<br>' . "\n";
    }

    if ( isset( $_GET['store_name'] ) && ! empty( $_GET['store_name'] ) ) {
        $html .= 'From: ' . esc_html( $_GET['store_name'] ) . '<br/>' . "\n";
    }

    $html .= '<br><strong>' . __( 'Total Paid: ', 'sc' ) . sc_stripe_to_formatted_amount( $charge_response->amount, $charge_response->currency ) . ' ' .
        strtoupper( $charge_response->currency ) . '</strong>' . "\n";

    $html .= '<p>Your transaction ID is: ' . $charge_response->id . '</p>';
    //Our own new details
    // Let's add the last four of the card they used and the expiration date
    $html .= '<p>Card: ****-****-****-' . $charge_response->card->last4 . '<br>';
    $html .= 'Expiration: ' . $charge_response->card->exp_month . '/' . $charge_response->card->exp_year . '</p>';

    $html .= '</div>';

    return $html;
}
add_filter( 'sc_payment_details', 'sc_payment_details_example', 10, 2 );


// Example #2 - Hide the payment details message
function sc_payment_details_example( $html, $charge ) {
    return '';
}
add_filter( 'sc_payment_details', 'sc_payment_details_example', 10, 2 );

// Example #3 - Add the address entered at checkout
// Also checks for a custom meta field and displays that if it is set.
function sc_payment_details_example( $html, $charge_response ) {
    // This is copied from the original output so that we can just add in our own details
    $html = '<div class="sc-payment-details-wrap">';

    $html .= '<p>' . __( 'Congratulations. Your payment went through!', 'sc' ) . '</p>' . "\n";

    if( ! empty( $charge_response->description ) ) {
        $html .= '<p>' . __( "Here's what you bought:", 'sc' ) . '</p>';
        $html .= $charge_response->description . '<br>' . "\n";
    }

    if ( isset( $_GET['store_name'] ) && ! empty( $_GET['store_name'] ) ) {
        $html .= 'From: ' . esc_html( $_GET['store_name'] ) . '<br/>' . "\n";
    }

    $html .= '<br><strong>' . __( 'Total Paid: ', 'sc' ) . sc_stripe_to_formatted_amount( $charge_response->amount, $charge_response->currency ) . ' ' .
        strtoupper( $charge_response->currency ) . '</strong>' . "\n";

    $html .= '<p>Your transaction ID is: ' . $charge_response->id . '</p>';

    //Our own new details
    // Let's add the last four of the card they used and the expiration date
    $html .= '<p>Card: ****-****-****-' . $charge_response->card->last4 . '<br>';
    $html .= 'Expiration: ' . $charge_response->card->exp_month . '/' . $charge_response->card->exp_year . '</p>';

    $html .= '<p>Address Line 1: ' . $charge_response->card->address_line1 . '</p>';
    $html .= '<p>Address Line 2: ' . $charge_response->card->address_line2 . '</p>';
    $html .= '<p>Address City: ' . $charge_response->card->address_city . '</p>';
    $html .= '<p>Address State: ' . $charge_response->card->address_state . '</p>';
    $html .= '<p>Address Zip: ' . $charge_response->card->address_zip . '</p>';

    // Finally we can add the output of a custom field
    // For our example shortcode: [stripe_text id="phone_number" label="Phone Number"]
    if( ! empty( $charge_response->metadata->phone_number ) ) {
        $html .= '<p>Phone Number: ' . $charge_response->metadata->phone_number . '</p>';
    }

    $html .= '</div>';

    return $html;
}
add_filter( 'sc_payment_details', 'sc_payment_details_example', 10, 2 );