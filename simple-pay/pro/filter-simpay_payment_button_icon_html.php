<?php

// Add additional CSS classes to payment form element.

function simpay_add_payment_button_icon() {
	return '<span class="dashicons dashicons-cart" aria-hidden="true"></span>';
}

add_filter( 'simpay_payment_button_icon_html', 'simpay_add_payment_button_icon' );
