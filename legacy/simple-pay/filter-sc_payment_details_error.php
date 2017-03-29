<?php

/*
 * Filter to change the output of the error details HTML
 */
function sc_payment_details_error_example( $html ) {
    return $html . '<p>To report this error email admin@website.com</p>';
}
add_filter( 'sc_payment_details_error', 'sc_payment_details_error_example' );