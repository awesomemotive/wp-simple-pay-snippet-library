<?php
/**
 * Plugin Name: WP Simple Pay - Remove Payment Page Compatibility Mode
 * Plugin URI: https://wpsimplepay.com
 * Author: WP Simple Pay
 * Author URI: https://wpsimplepay.com
 * Description: Allows 3rd party scripts and styles to load on dedicated Payment Pages.
 * Version: 1.0
 */

// Allows 3rd party scripts and styles to load on dedicated Payment Pages.
add_filter( 'simpay_payment_page_css_compatibility_mode', '__return_false' );
add_filter( 'simpay_payment_page_js_compatibility_mode', '__return_false' );
