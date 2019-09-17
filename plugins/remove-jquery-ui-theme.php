<?php
/**
 * Plugin Name: WP Simple Pay - Dequeue jQuery UI theme
 * Plugin URI: https://wpsimplepay.com
 * Author: Sandhills Development, LLC
 * Author URI: https://sandhillsdev.com
 * Description: Dequeue jQuery UI theme used for datepicker.
 * Version: 1.0
 */

/**
 * Removes jQuery UI stylesheet.
 */
function simpay_custom_remove_jquery_ui_theme() {
	wp_dequeue_style( 'simpay-jquery-ui-cupertino' );
}
add_action( 'wp_enqueue_scripts', 'simpay_custom_remove_jquery_ui_theme', 100 );
