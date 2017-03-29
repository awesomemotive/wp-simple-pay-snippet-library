<?php

// Add additional CSS classes to payment form element.

function simpay_add_payment_button_class( $classes ) {
	// Add 1 class.
	return array_merge( $classes, array( 'my-button-class-1' ) );

	// Add multiple classes.
	//return array_merge( $classes, array( 'my-button-class-1', 'my-button-class-2' ) );
}

add_filter( 'simpay_payment_button_class', 'simpay_add_payment_button_class' );
