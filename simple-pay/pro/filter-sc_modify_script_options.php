<?php

/*
 * Filter that allows changing of the script variables passed to create the checkout form
 */
function sc_modify_script_options_example( $options ) {
    // Change the description to include the page title
    $options['script']['description'] = 'Description - ' . get_the_title();

    return $options;
}
add_filter( 'sc_modify_script_options', 'sc_modify_script_options_example' );