<?php

/**
 * Filter that allows changing of the script variables passed to create the checkout form.
 * Example 1: Modify the item description.
 */
function sc_modify_script_options_example_1( $options ) {
    // Change the description to include the page title
    $options['script']['description'] = 'Description - ' . get_the_title();

    return $options;
}
add_filter( 'sc_modify_script_options', 'sc_modify_script_options_example_1' );

/**
 * Example 2: Modify the pre-filled email.
 */
function sc_modify_script_options_example_2( $options ) {
    // Change the description to include the page title
    $options['script']['email'] = 'support@wpsimplepay.com';

    return $options;
}
add_filter( 'sc_modify_script_options', 'sc_modify_script_options_example_2' );
