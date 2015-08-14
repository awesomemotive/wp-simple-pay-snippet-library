<?php

// Example 1
// Outputs $ {text field} CAD
// Alter the before or after how you need.
function sc_change_currency( $args) {
    $args['before'] = '$';
    $args['after'] = 'CAD';
    return $args;
}
add_filter( 'sc_uea_currency', 'sc_change_currency' );