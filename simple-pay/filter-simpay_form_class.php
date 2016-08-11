<?php

// Add additional CSS classes to payment button element.

function simpay_add_form_class( $classes ) {
	// Add 1 class.
	return array_merge( $classes, array( 'my-form-class-1' ) );

	// Add multiple classes.
	//return array_merge( $classes, array( 'my-form-class-1', 'my-form-class-2' ) );
}

add_filter( 'simpay_form_class', 'simpay_add_form_class' );
