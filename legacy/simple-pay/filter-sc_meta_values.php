<?php
/*
 * Filter used to add additional meta data to show in the Stripe dashboard.
 */
function sc_meta_values_example( $meta ) {
    $meta['meta_test'] = 'An example of adding meta data.';

    return $meta;
}
add_filter( 'sc_meta_values', 'sc_meta_values_example' );