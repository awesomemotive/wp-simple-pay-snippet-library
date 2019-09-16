<?php
/**
 * Plugin Name: WP Simple Pay - Hide reCAPTCHA Badge
 * Plugin URI: https://wpsimplepay.com
 * Description: Hide reCAPTCHA badge and add links to privacy policy and terms of service.
 * Version: 1.0
 */

/**
 * Add CSS to hide the badge and add links to Google terms and policies.
 */
function simpay_remove_recaptcha_badge() {
?>
<style>.grecaptcha-badge { display: none; }</style>

<p>This site is protected by reCAPTCHA and the Google <a href="https://policies.google.com/privacy">Privacy Policy</a> and <a href="https://policies.google.com/terms">Terms of Service</a> apply.</p>

<?php
}
add_action( 'simpay_form_before_form_bottom', 'simpay_remove_recaptcha_badge' );
