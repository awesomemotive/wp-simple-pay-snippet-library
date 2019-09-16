<?php
/**
 * Plugin Name: WP Simple Pay - Dequeue jQuery UI theme
 * Plugin URI: https://wpsimplepay.com
 * Description: Dequeue jQuery UI theme used for datepicker.
 * Probably because a jQuery UI theme is already in use.
 * Version: 1.0
 */

function simpay_custom_remove_jquery_ui_theme() {

	wp_dequeue_style( 'simpay-jquery-ui-cupertino' );
}

add_action( 'wp_print_styles', 'simpay_custom_remove_jquery_ui_theme', 100 );
