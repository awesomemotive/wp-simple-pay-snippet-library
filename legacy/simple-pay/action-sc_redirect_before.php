<?php

// Send a very basic email right before the page redirect and only if the transaction was successful
function sc_redirect_before_example( $failed ) {
    if( ! $failed ) {
        wp_mail( 'user@mail.com', 'New Purchase', 'A new purchase has been made on your website!' );
    }
}
add_action( 'sc_redirect_before', 'sc_redirect_before_example' );