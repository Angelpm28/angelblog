<?php

/**
 * Theme Meta Info for internal usage
 *
 * Dont Mess with it.
 */
add_action( 'before_spyropress_core_includes', 'spyropress_setup_theme' );
function spyropress_setup_theme() {
    global $spyropress;

    $spyropress->internal_name = 'flato';
    $spyropress->theme_name = 'Flato';
    $spyropress->theme_version = '2.1.1';
    $spyropress->themekey = 'fj9nzqmyzqne9ouib0e0ivt9qgarra3nm';

    $spyropress->framework = 'bs3';
    $spyropress->grid_columns = 12;
    $spyropress->row_class = 'container';
}