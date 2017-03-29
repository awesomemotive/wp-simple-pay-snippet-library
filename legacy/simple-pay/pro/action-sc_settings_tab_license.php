<?php

// Hook into the admin licenses tab to add additional content, settings, etc
function sc_settings_tab_license_example() {
    // Add a label and a text box
    $html = '<label for="sc_custom_admin_box">Example Textbox</label><br>';
    $html .= '<input type="text" id="sc_custom_admin_box" />';

    echo $html;
}
add_action( 'sc_settings_tab_license', 'sc_settings_tab_license_example' );