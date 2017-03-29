<?php
/**
 * Adds a tab labeled "Example Tab" into the other tabs on the main settings page for SC
 * Availability: Lite, Pro
 */
function sc_admin_tabs_example( $tabs ) {
    $tabs['example_tab'] = 'Example Tab';

    return $tabs;
}
add_filter( 'sc_admin_tabs', 'sc_admin_tabs_example' );