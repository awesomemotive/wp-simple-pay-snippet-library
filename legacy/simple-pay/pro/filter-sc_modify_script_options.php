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

/**
 * Example 3: Add a tax to the total
 */
function sc_modify_script_options_example_3( $options ) {

	// Get our amount
	$amount = $options['script']['amount'];

	// Calculate a 10% tax and add it to the amount
	$amount = $amount + ( $amount * .10 );

	// Now update the amount and return back all of the options
	$options['script']['amount'] = $amount;

	return $options;
}
add_filter( 'sc_modify_script_options', 'sc_modify_script_options_example_3' );