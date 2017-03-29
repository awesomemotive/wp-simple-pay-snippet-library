<?php

// Change the default error message text
function sc_error_message_example() {
    return '<p>An error has occurred. Please contact a <a href="htttp://linktocontactpage.com">site administrator</a>.</p>';
}
add_filter( 'sc_error_message', 'sc_error_message_example' );