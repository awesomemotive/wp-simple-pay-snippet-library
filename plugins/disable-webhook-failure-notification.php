<?php
/**
 * Plugin Name: WP Simple Pay - Disable Webhook Failed Notification
 * Plugin URI: https://wpsimplepay.com
 * Author: Sandhills Development, LLC
 * Author URI: https://sandhillsdev.com
 * Description: Add a page to exclude from caching.
 * Version: 1.0
 */

add_filter( 'simpay_webhooks_check_received_events', '__return_false' );
