<?php

// NOTE: This will change ALL instances of controls using the 'sc-form-control' class.
// If you need to change only a specific form control (text, number, checkbox, etc) it is recommended you use
// the specific class filter for those instead.

// Add a class in addition to the default class.
function sc_form_control_class_example( $default ) {
    // Need to add the space in manually here
    return $default . ' ' . 'my-css-class';

    // Another optional way is adding the space at the beginning of the class you want to insert
    // return $default . ' my-css-class';
}
add_filter( 'sc_form_control_class', 'sc_form_control_class_example' );

// Don't use the default class and overwrite with multiple classes of your own
function sc_form_control_class_example_2() {
    return 'my-css-class-1 my-class-2 my-class-3';
}
add_filter( 'sc_form_control_class', 'sc_form_control_class_example_2' );