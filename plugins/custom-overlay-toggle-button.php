<?php
/**
 * Plugin Name: WP Simple Pay - Custom Overlay Button Toggle
 * Plugin URI: https://wpsimplepay.com
 * Author: Sandhills Development, LLC
 * Author URI: https://sandhillsdev.com
 * Description: Use a custom button to launch an Overlay payment form.
 * Version: 1.0
 */

/**
 * Adds a custom overlay toggle button to the page header.
 */
function simpay_custom_overlay_toggle() {
?>

<!-- Launch Custom Overlay or Stripe Checkout forms with a button or link -->
<!-- The `simpay-modal-control` class is required. -->
<!-- Replace number in `data-form-id=""` with the form IDs to target. -->

<!--
CSS to hide payment forms:

Specific Custom Overlay form:
#simpay-overlay-form-wrap-123  { display: none; }

Specific Stripe Checkout form:
#simpay-stripe_checkout-form-wrap-123 { display: none; }

Hide all payment forms:
.simpay-form-wrap { display: none; }
-->

<button class="simpay-modal-control" data-form-id="43">Click to buy</button>

<?php
}
add_action( 'wp_head', 'simpay_custom_overlay_toggle' );
