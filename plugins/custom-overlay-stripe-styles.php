<?php
/**
 * Plugin Name: WP Simple Pay - Legacy Stripe Checkout Modal Styles
 * Plugin URI: https://wpsimplepay.com
 * Author: Sandhills Development, LLC
 * Author URI: https://sandhillsdev.com
 * Description: Transform "Overlay" form display styles to match legacy Stripe Checkout.
 * Version: 1.0
 */

$form_id  = 11;
$logo_url = 'https://cdn.worldvectorlogo.com/logos/dribbble-icon-1.svg';

/**
 * Adds logo image to overlay.
 *
 * Replace 157 with the form ID to target.
 */
function simpay_custom_legacy_modal_logo() {
	global $logo_url;

	echo '<img src="' . esc_url( $logo_url ) . '" alt="" class="simpay-modal-image" />';
}
add_action( 'simpay_form_' . $form_id . '_before_payment_form', 'simpay_custom_legacy_modal_logo', 20 );

/**
 * Adds CSS for overlay.
 */
function simpay_custom_enqueue_scripts() {
?>
<style>
.simpay-modal .simpay-modal__body {
	max-width: 300px;
	border-radius: 4px;
	box-shadow: 0 2px 3px rgba(0, 0, 0, 0.25);
	overflow: visible;
}

.simpay-modal .simpay-modal__content {
	padding-top: 45px;
	position: relative;
	background-color: #f5f5f7;
	position: relative;
	border-radius: 4px;
}

.simpay-modal__content:after {
	content: '';
	width: 100%;
	height: 95px;
	background: #e8e9eb;
	border-bottom: 1px solid #dbdcde;
	box-shadow: 0 1px 0 0 #fff;
	position: absolute;
	top: 0;
	left: 0;
	z-index: 0;
	border-top-left-radius: 4px;
	border-top-right-radius: 4px;
}

.simpay-modal .simpay-form-title, 
.simpay-modal .simpay-form-description {
	position: relative;
	z-index: 2;
}

.simpay-modal .simpay-form-title {
	margin-bottom: 5px;
	font-size: 18px;
}

.simpay-modal .simpay-form-description {
	font-size: 13px;
	font-weight: 400;
	color: #64636e;
}

.simpay-modal .simpay-checkout-form {
	margin-top: 40px;
}

.simpay-modal .simpay-checkout-form.simpay-checkout-form--overlay .simpay-address-container .simpay-field-wrap {
	margin-bottom: 0;
}

.simpay-modal .simpay-checkout-form.simpay-checkout-form--overlay .simpay-label-wrap {
	display: none;
}

.simpay-modal .simpay-form-control:not(:last-child) {
	margin-bottom: -1px;
}

.simpay-modal .simpay-form-control .simpay-card-wrap,
.simpay-modal .simpay-form-control input {
	border-radius: 0 !important;
}

.simpay-modal .simpay-form-control .StripeElement--focus,
.simpay-modal .simpay-form-control input:focus {
	border-color: #d1d1d1 !important;
}

.simpay-modal .simpay-form-control:first-child input {
	border-top-left-radius: 4px !important;
	border-top-right-radius: 4px !important;
	box-shadow: inset 0 1px 2px rgba(0, 0, 0, .05) !important;
}

.simpay-modal .simpay-form-control:last-child input {
	border-bottom-left-radius: 4px;
	border-bottom-right-radius: 4px;
	box-shadow: inset 0 1px 2px rgba(0, 0, 0, .05);
}

.simpay-modal .simpay-form-control .simpay-card-wrap {
	box-shadow: 0 1px 0 #fff;
	border-bottom-left-radius: 4px !important;
	border-bottom-right-radius: 4px !important;
}

.simpay-modal .simpay-form-control.simpay-checkout-btn-container {
	margin-top: 30px;
}

body .simpay-modal .simpay-form-control.simpay-checkout-btn-container .simpay-checkout-btn:not(.stripe-button-el) {
	text-shadow: 0 -1px 0 #009ae4;
	background: linear-gradient(to bottom, #00aeec, #0099e4);
	border-bottom: 1px solid #008cd8;
	box-shadow: 0 1px 2px rgba(0, 155, 229, 0.33);
}

body .simpay-modal .simpay-form-control.simpay-checkout-btn-container .simpay-checkout-btn:not(.stripe-button-el):hover,
body .simpay-modal .simpay-form-control.simpay-checkout-btn-container .simpay-checkout-btn:not(.stripe-button-el):active
{
	background: linear-gradient(to bottom, #0099e4, #0091d8);
	border-bottom: 1px solid #008cd8;
	box-shadow: 0 1px 2px rgba(0, 155, 229, 0.10);
}

.simpay-modal .simpay-modal-control-close {
	width: 18px;
	font-family: sans-serif;
	font-weight: bolder;
	color: #e7e8ea;
	font-size: 10px;
	z-index: 2;
	background: #c5c6c7;
	border-radius: 50%;
	box-shadow: 0 1px 0 rgba(255, 255, 255, 0.50), inset 0 1px 1px rgba(0, 0, 0, .10);
	height: 18px;
	text-align: center;
	padding: 0;
	line-height: 18px;
	text-shadow: 0 1px 0 rgba(0, 0, 0, .10);
	top: 10px;
	right: 10px;
}

.simpay-modal .simpay-modal-image {
	width: 70px;
	height: 70px;
	border: 3px solid #fff;
	position: absolute;
	top: -35px;
	left: 50%;
	margin-left: -35px;
	z-index: 2;
	border-radius: 50%;
	box-shadow: 0 1px 2px rgba(0, 0, 0, 0.20)
}

.simpay-modal .simpay-test-mode-badge-container {
	margin-top: 28px;
}
</style>
<?php
}
add_action( 'wp_print_scripts', 'simpay_custom_enqueue_scripts' );
