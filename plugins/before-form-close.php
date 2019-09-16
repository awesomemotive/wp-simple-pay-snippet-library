<?php
/**
 * Plugin Name: WP Simple Pay - Before Form Close
 * Plugin URI: https://wpsimplepay.com
 * Description: Add code before the form close element.
 * Version: 1.0
 */

/**
 * In this example, we'll see how to add a hidden field before the closing form element.
 */

// We will add a hidden field that holds the current post ID the form is located on
function simpay_custom_before_form_close() {

	// We need this to get the current post ID
	global $post;

	echo '<input name="current_post_id" type="hidden" value="' . absint( $post->ID ) . '" />';

}
add_action( 'simpay_before_form_close', 'simpay_custom_before_form_close' );

