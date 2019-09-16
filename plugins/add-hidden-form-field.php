<?php
/**
 * Plugin Name: WP Simple Pay - Add Hidden Form Field
 * Plugin URI: https://wpsimplepay.com
 * Author: Sandhills Development, LLC
 * Author URI: https://sandhillsdev.com
 * Description: Add a hidden field inside the <form> tag.
 * Version: 1.0
 */

/**
 * Creates a hidden field with the current post/page ID as the value.
 *
 * @param int                           $form_id Current Form ID.
 * @param SimplePay\Core\Abstracts\Form $form Form instance.
 */
function simpay_custom_form_before_form_bottom( $form_id, $form ) {
	echo '<input name="current_post_id" type="hidden" value="' . absint( get_the_ID() ) . '" />';
}
add_action( 'simpay_form_before_form_bottom', 'simpay_custom_form_before_form_bottom', 10, 2 );
