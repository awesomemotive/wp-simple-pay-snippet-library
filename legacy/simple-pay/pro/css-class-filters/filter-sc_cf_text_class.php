<?php

// Add or change the classes for fields using the 'sc-cf-text' class

// Add a class in addition to the default class.
function sc_cf_text_class_example( $default ) {
// Need to add the space in manually here
    return $default . ' ' . 'my-css-class';

// Another optional way is adding the space at the beginning of the class you want to insert
// return $default . ' my-css-class';
}
add_filter( 'sc_cf_text_class', 'sc_cf_text_class_example' );

// Don't use the default class and overwrite with multiple classes of your own
function sc_cf_text_class_example_2() {
    return 'my-css-class-1 my-class-2 my-class-3';
}
add_filter( 'sc_cf_text_class', 'sc_cf_text_class_example_2' );