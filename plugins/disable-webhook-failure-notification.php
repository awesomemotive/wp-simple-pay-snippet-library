<?php
/**
 * Plugin Name: WP Simple Pay - Disable Webhook Failed Notification
 * Plugin URI: https://wpsimplepay.com
 * Author: WP Simple Pay
 * Author URI: https://wpsimplepay.com
 * Description: Disable alert bubbles when webhook events are not received.
 * Version: 1.0
 */

add_filter( 'simpay_webhooks_check_received_events', '__return_false' );
