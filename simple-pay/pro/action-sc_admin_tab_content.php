<?php

// Hook into the Admin tab to add additional content, settings, etc
function sc_admin_tab_content_example() {
    // Add a label and a text box
    $html = '<label for="sc_custom_admin_box">Example Textbox</label><br>';
    $html .= '<input type="text" id="sc_custom_admin_box" />';

    echo $html;

}
add_action( 'sc_admin_tab_content', 'sc_admin_tab_content_example' );
