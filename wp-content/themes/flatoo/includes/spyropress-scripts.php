<?php

/**
 * Enqueue scripts and stylesheets
 *
 * @category Core
 * @package SpyroPress
 *
 */

/**
 * Register StyleSheets
 */
function spyropress_register_stylesheets() {

    // Google Webfonts
    $gurl = 'http' . ( is_ssl() ? 's' : '' ) . '://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,600,700,800,300';
    wp_enqueue_style( 'google-fonts', $gurl );
    

    // Default stylesheets
    wp_enqueue_style( 'bootstrap', assets_css() . 'bootstrap.css', false, '3.0.2' );
    wp_enqueue_style( 'style', assets_css() . 'style.css', false, false );
    wp_enqueue_style( 'font-awesome', assets_css() . 'font-awesome.css', false, false );
    wp_enqueue_style( 'slideshow', assets_css() . 'slideshow.css', false, false );
    // Responsiveness
    $responsive_layout = get_setting_array( 'responsive-layout', false );
    // Large responsive css
    if ( $responsive_layout['large-responsive'] )
        wp_enqueue_style( 'responsive-large', assets_css() . 'responsive-1200px-min.css', false, '2.0.4' );
    // Large responsive css
    if ( $responsive_layout['responsive'] )
        wp_enqueue_style( 'responsive', assets_css() . 'responsive.css', false, '2.0.4' );

    wp_enqueue_style( 'jquery-custom', assets_css() . 'jquery-ui-1.8.16.custom.css', false, '2.0.0' );
    wp_enqueue_style( 'lightbox', assets_css() . 'lightbox.min.css', false, '2.0.0' );
    //if( is_single() ){
        wp_enqueue_style( 'blog', assets_css() . 'blog.css', false, false );
        wp_enqueue_style( 'flexslider', assets_css() . 'flexslider.css', false, '2.0.0' );
    //}
    
    wp_enqueue_style( 'main', child_url() . 'style.css' );
    
    // Dynamic StyleSheet
    if ( file_exists( dynamic_css_path() . 'dynamic.css' ) )
        wp_enqueue_style( 'dynamic', dynamic_css_url() . 'dynamic.css', false, '2.0.0' );

    // Builder StyleSheet
    if ( file_exists( dynamic_css_path() . 'builder.css' ) )
        wp_enqueue_style( 'builder', dynamic_css_url() . 'builder.css', false, '2.0.0' );

    // modernizr
    wp_enqueue_script( 'modernizr', assets_js() . 'modernizr.custom.26633.js', array( 'jquery' ), '2.6.2', false );
}

/**
 * Enqueque Scripts
 */
function spyropress_register_scripts() {

    /**
     * Register Scripts
     */
    // threaded comments
    if ( is_single() && comments_open() && get_option( 'thread_comments' ) )
        wp_enqueue_script( 'comment-reply' );

    // Plugins
    wp_register_script( 'jquery-bootstrap', assets_js() . 'bootstrap.js', false, '2.0', true );
    wp_register_script( 'jquery-gridrotator', assets_js() . 'jquery.gridrotator.js', false, '2.0', true );
    wp_register_script( 'jquery-placeholder', assets_js() . 'jquery.placeholder.js', false, '2.0', true );
    wp_register_script( 'jquery-isotope', assets_js() . 'jquery.isotope.js', false, '2.0', true );
    wp_register_script( 'jquery-widget', assets_js() . 'jquery.ui.widget.min.js', false, '2.0', true );
    wp_register_script( 'jquery-rlightbox', assets_js() . 'jquery.ui.rlightbox.js', false, '2.0', true );
    wp_register_script( 'jquery-easing', assets_js() . 'jquery.easing.min.js', false, '2.0', true );
    wp_register_script( 'jquery-easypiechart', assets_js() . 'jquery.easypiechart.js', false, '2.0', true );
    wp_register_script( 'jquery-flexslider', assets_js() . 'jquery.flexslider.js', false, '2.0', true );
    wp_register_script( 'jquery-sticky', assets_js() . 'jquery.sticky.js', false, '2.0', true );
    wp_register_script( 'jquery-nav', assets_js() . 'jquery.nav.js', false, '2.0', true );
      
    
    
    $deps = array(
        'jquery-bootstrap',
        'jquery-gridrotator',
        'jquery-placeholder',
        'jquery-isotope',
        'jquery-widget',
        'jquery-rlightbox',
        'jquery-easing',
        'jquery-easypiechart',
        'jquery-flexslider',
        'jquery-sticky',
        'jquery-nav',
    );
    // custom scripts
    wp_register_script( 'custom-script', assets_js() . 'custom.js', $deps, '2.1', true );

    /**
     * Enqueue All
     */
    wp_enqueue_script( 'custom-script' );
}

function spyropress_conditional_scripts() {

    $content = '<!--[if lt IE 9]>
			     <link rel="stylesheet" type="text/css" href="'. assets_css() .'fallback.css" />
		        <![endif]-->';

    echo get_relative_url( $content );
}