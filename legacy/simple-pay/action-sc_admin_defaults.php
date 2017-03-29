<?php

// This hook is for setting default settings values in the admin
// Mostly only useful if you are using it for an add-on and want to set some settings
function sc_admin_defaults_example() {
    global $sc_options;

    $sc_options->add_setting( 'your_setting', 'value to set' );
}
add_action( 'sc_admin_defaults', 'sc_admin_defaults_example' );