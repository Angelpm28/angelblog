<?php

/**
 * Shortcodes
 */

init_shortcode();
function init_shortcode() {
    
    $shortcodes = array(
        'dummy'   => 'spyropress_dummy'
    );
    
    foreach( $shortcodes as $tag => $func )
        add_shortcode( $tag, $func );
}

function spyropress_dummy( $atts = array(), $content = '' ) {

    // Defaults
    $atts = shortcode_atts( array(
        'arg1' => 'val1',
        'arg2' => 'val2',
    ), $atts );
    extract( $atts );
    
    return '';
}
?>