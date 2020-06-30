<?php
/**
 * Plugin Name: WP Simple Pay - Remove "Update Payment Method"
 * Plugin URI: https://wpsimplepay.com
 * Author: Sandhills Development, LLC
 * Author URI: https://sandhillsdev.com
 * Description: Removes the "Update Payment Method" reminder email.
 * Version: 1.0
 */

// Requires WP Simple Pay 3.9.0+
add_filter( 'simpay_send_upcoming_invoice_email', '__return_false' );
