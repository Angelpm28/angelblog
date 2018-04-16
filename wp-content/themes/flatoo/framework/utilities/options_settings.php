<?php

/**
 * Option/Settings Helper Functions
 *
 * @category Utilities
 * @package Spyropress
 *
 */

/** Option Getter and Formatter **********************/

function get_float_class( $float ) {
    
    // check for null
    if ( ! $float ) return;

    $allowed_floats = array( 'left' => 'pull-left', 'right' => 'pull-right' );

    if ( in_array( $float, array_keys( $allowed_floats ) ) )
        $float = $allowed_floats[$float];

    return $float;
}

/**
 * Row Class
 */
function get_row_class( $return = false ) {
    global $spyropress;

    if ( $return )
        return $spyropress->row_class;
    echo $spyropress->row_class;
}

/**
 * Column Class
 */
function get_column_class( $column ) {
    if( 'skt' == get_html_framework() ) return get_skeleton_col_class( $column );
    
    if( 'bs' == get_html_framework() ) return get_bootstrap_class( $column );
    
    if( 'bs3' == get_html_framework() ) return get_bootstrap3_class( $column );
    
    if( 'fd3' == get_html_framework() ) return get_foundation3_col_class( $column );
}

/**
 * Bootstrap Class
 */
function get_bootstrap_class( $column ) {

    $class = 'span12';

    switch ( $column ) {
        case 2:
            $class = 'span6';
            break;
        case 3:
            $class = 'span4';
            break;
        case 4:
            $class = 'span3';
            break;
        case 6:
            $class = 'span2';
            break;
    }

    return $class;
}

/**
 * Bootstrap Class
 */
function get_bootstrap3_class( $column ) {

    $class = 'col-md-12';

    switch ( $column ) {
        case 2:
            $class = 'col-md-6';
            break;
        case 3:
            $class = 'col-md-4';
            break;
        case 4:
            $class = 'col-md-3';
            break;
        case 6:
            $class = 'col-md-2';
            break;
    }

    return $class;
}

/**
 * Skeleton Classes
 */
function get_skeleton_col_class( $column ) {

    $class = get_skeleton_class( 16 );

    switch ( $column ) {
        case 2:
            $class = get_skeleton_class( 8 );
            break;
        case 3:
            $class = get_skeleton_class( '1/3' );
            break;
        case 4:
            $class = get_skeleton_class( 4 );
            break;
        case 8:
            $class = get_skeleton_class( 2 );
            break;
    }

    return $class;
}

function get_skeleton_class( $column ) {
    
    $classes = array(
        1 => 'one columns',
        2 => 'two columns',
        3 => 'three columns',
        4 => 'four columns',
        5 => 'five columns',
        6 => 'six columns',
        7 => 'seven columns',
        8 => 'eight columns',
        9 => 'nine columns',
        10 => 'ten columns',
        11 => 'eleven columns',
        12 => 'twelve columns',
        13 => 'thirteen columns',
        14 => 'fourteen columns',
        15 => 'fifteen columns',
        16 => 'sixteen columns',
        '1/3' => 'one-third column',
        '2/3' => 'two-thirds column',
    );
    
    return $classes[$column];
}

function get_admin_column_class( $column ) {
    
    $class = '';
    if( 12 == get_grid_columns() ) {

        $class = 'span12';
        
        switch ( $column ) {
            case 2:
                $class = 'span6';
                break;
            case 3:
                $class = 'span4';
                break;
            case 4:
                $class = 'span3';
                break;
            case 6:
                $class = 'span2';
                break;
        }
    }
    elseif( 16 == get_grid_columns() ) {

        $class = 'span16';
        
        switch ( $column ) {
            case 2:
                $class = 'span8';
                break;
            case 3:
                $class = 'span1by3';
                break;
            case 4:
                $class = 'span4';
                break;
            case 8:
                $class = 'span2';
                break;
        }
    }
    
    return $class;
}

/**
 * Foundation3 Classes
 */

function get_foundation3_col_class( $column ) {

    $class = get_foundation3_class( 12 );

    switch ( $column ) {
        case 2:
            $class = get_foundation3_class( 6 );
            break;
        case 3:
            $class = get_foundation3_class( 4 );
            break;
        case 4:
            $class = get_foundation3_class( 3 );
            break;
        case 6:
            $class = get_foundation3_class( 2 );
            break;
    }

    return $class;
}

function get_foundation3_class( $column ) {

    $classes = array(
        1 => 'one columns',
        2 => 'two columns',
        3 => 'three columns',
        4 => 'four columns',
        5 => 'five columns',
        6 => 'six columns',
        7 => 'seven columns',
        8 => 'eight columns',
        9 => 'nine columns',
        10 => 'ten columns',
        11 => 'eleven columns',
        12 => 'twelve columns'
    );
    
    return $classes[$column];
}

/**
 * Get HTML Framework
 */
function get_html_framework() {
    global $spyropress;
    return $spyropress->framework;
}

/**
 * Get Grid Column
 */
function get_grid_columns() {
    global $spyropress;
    return $spyropress->grid_columns;
}

/**
 * First Column Class accoring to framework
 */
function get_first_column_class() {
    
    // Skeleton
    if( 'skt' == get_html_framework() ) return 'alpha';
    
    // Others
    return 'column_first';
}

/**
 * Last Column Class accoring to framework
 */
function get_last_column_class() {
    
    // Skeleton
    if( 'skt' == get_html_framework() ) return 'omega';
    
    // Foundation
    if( 'fd3' == get_html_framework() ) return 'end';
    
    // Others
    return 'column_last';
}

/** Data Sources for Post Type and Taxonomies **********************/

/**
 * Buckets
 */
function spyropress_get_buckets() {
    
    $buckets = array();
    
    if ( ! post_type_exists( 'bucket' ) ) return $buckets;
    
    // get posts
    $args = array(
        'post_type' => 'bucket',
        'posts_per_page' => -1,
        'orderby' => 'title',
        'order' => 'asc'
    );
    $posts = get_posts( $args );
    if ( !empty( $posts ) ) {
        foreach ( $posts as $post ) {
            $buckets[$post->ID] = $post->post_title;
        }
    }

    return $buckets;
}

/**
 * Custom Taxonomies
 */
function spyropress_get_taxonomies( $tax = '' ) {
    
    if ( ! $tax ) return array();

    $terms = get_terms( $tax );
    $taxs = array();
    if ( !empty( $terms ) )
        foreach ( $terms as $term )
            $taxs[$term->slug] = $term->name;

    return $taxs;
}

/** Custom Data Sources ********************************************/

/**
 * jQuery Easing Options
 */
function spyropress_get_options_easing() {
    return array(
        'linear' => __( 'linear', 'spyropress' ),
        'jswing' => __( 'jswing', 'spyropress' ),
        'def' => __( 'def', 'spyropress' ),
        'easeInQuad' => __( 'easeInQuad', 'spyropress' ),
        'easeOutQuad' => __( 'easeOutQuad', 'spyropress' ),
        'easeInOutQuad' => __( 'easeInOutQuad', 'spyropress' ),
        'easeInCubic' => __( 'easeInCubic', 'spyropress' ),
        'easeOutCubic' => __( 'easeOutCubic', 'spyropress' ),
        'easeInOutCubic' => __( 'easeInOutCubic', 'spyropress' ),
        'easeInQuart' => __( 'easeInQuart', 'spyropress' ),
        'easeOutQuart' => __( 'easeOutQuart', 'spyropress' ),
        'easeInOutQuart' => __( 'easeInOutQuart', 'spyropress' ),
        'easeInQuint' => __( 'easeInQuint', 'spyropress' ),
        'easeOutQuint' => __( 'easeOutQuint', 'spyropress' ),
        'easeInOutQuint' => __( 'easeInOutQuint', 'spyropress' ),
        'easeInSine' => __( 'easeInSine', 'spyropress' ),
        'easeOutSine' => __( 'easeOutSine', 'spyropress' ),
        'easeInOutSine' => __( 'easeInOutSine', 'spyropress' ),
        'easeInExpo' => __( 'easeInExpo', 'spyropress' ),
        'easeOutExpo' => __( 'easeOutExpo', 'spyropress' ),
        'easeInOutExpo' => __( 'easeInOutExpo', 'spyropress' ),
        'easeInCirc' => __( 'easeInCirc', 'spyropress' ),
        'easeOutCirc' => __( 'easeOutCirc', 'spyropress' ),
        'easeInOutCirc' => __( 'easeInOutCirc', 'spyropress' ),
        'easeInElastic' => __( 'easeInElastic', 'spyropress' ),
        'easeOutElastic' => __( 'easeOutElastic', 'spyropress' ),
        'easeInOutElastic' => __( 'easeInOutElastic', 'spyropress' ),
        'easeInBack' => __( 'easeInBack', 'spyropress' ),
        'easeOutBack' => __( 'easeOutBack', 'spyropress' ),
        'easeInOutBack' => __( 'easeInOutBack', 'spyropress' ),
        'easeInBounce' => __( 'easeInBounce', 'spyropress' ),
        'easeOutBounce' => __( 'easeOutBounce', 'spyropress' ),
        'easeInOutBounce' => __( 'easeInOutBounce', 'spyropress' ),
    );
}

function spyropress_get_options_float() {
    return array(
        'none' => __( 'None', 'spyropress' ),
        'left' => __( 'Left', 'spyropress' ),
        'right' => __( 'Right', 'spyropress' ),
    );
}

function spyropress_get_options_link( $fields ) {
    // check for emptiness
    if ( empty( $fields ) ) $fields = array();

    return array_merge( $fields, array(
        array(
            'label' => __( 'URL/Link Setting', 'spyropress' ),
            'type' => 'toggle'
        ),

        array(
            'label' => __( 'Link Text', 'spyropress' ),
            'id' => 'url_text',
            'type' => 'text'
        ),

        array(
            'label' => __( 'URL/Hash', 'spyropress' ),
            'id' => 'url',
            'type' => 'text'
        ),

        array(
            'label' => __( 'Link to Post/Page', 'spyropress' ),
            'id' => 'link_url',
            'type' => 'custom_post',
            'post_type' => array( 'post', 'page' )
        ),

        array( 'type' => 'toggle_end' )
    ) );
}

function spyropress_get_options_fontawesome_icons(){
    
     return array(
        'fa-glass' => __( 'Glass', 'spyropress' ),
        'fa-music' => __( 'Music', 'spyropress' ),
        'fa-search' => __( 'Search', 'spyropress' ),
        'fa-envelope-o' => __( 'Envelope Outline', 'spyropress' ),
        'fa-heart' => __( 'Heart', 'spyropress' ),
        'fa-star' => __( 'Star', 'spyropress' ),
        'fa-star-o' => __( 'Star Outline', 'spyropress' ),
        'fa-user' => __( 'User', 'spyropress' ),
        'fa-film' => __( 'Film', 'spyropress' ),
        'fa-th-large' => __( 'Th Large', 'spyropress' ),
        'fa-th' => __( 'Th', 'spyropress' ),
        'fa-th-list' => __( 'Th List', 'spyropress' ),
        'fa-check' => __( 'Check', 'spyropress' ),
        'fa-times' => __( 'Times', 'spyropress' ),
        'fa-search-plus' => __( 'Search Plus', 'spyropress' ),
        'fa-search-minus' => __( 'Search Minus', 'spyropress' ),
        'fa-power-off' => __( 'Power Off', 'spyropress' ),
        'fa-signal' => __( 'Signal', 'spyropress' ),
        'fa-gear' => __( 'Gear', 'spyropress' ),
        'fa-cog' => __( 'Cog', 'spyropress' ),
        'fa-trash-o' => __( 'Trash Outline', 'spyropress' ),
        'fa-home' => __( 'Home', 'spyropress' ),
        'fa-file-o' => __( 'File Outline', 'spyropress' ),
        'fa-clock-o' => __( 'Clock Outline', 'spyropress' ),
        'fa-road' => __( 'Road', 'spyropress' ),
        'fa-download' => __( 'Download', 'spyropress' ),
        'fa-arrow-circle-o-down' => __( 'Arrow Circle Outline Down', 'spyropress' ),
        'fa-arrow-circle-o-up' => __( 'Arrow Circle Outline Up', 'spyropress' ),
        'fa-inbox' => __( 'Inbox', 'spyropress' ),
        'fa-play-circle-o' => __( 'Play Circle Outline', 'spyropress' ),
        'fa-rotate-right' => __( 'Rotate Right', 'spyropress' ),
        'fa-repeat' => __( 'Repeat', 'spyropress' ),
        'fa-refresh' => __( 'Refresh', 'spyropress' ),
        'fa-list-alt' => __( 'List Alt', 'spyropress' ),
        'fa-lock' => __( 'Lock', 'spyropress' ),
        'fa-flag' => __( 'Flag', 'spyropress' ),
        'fa-headphones' => __( 'Headphones', 'spyropress' ),
        'fa-volume-off' => __( 'Volume Off', 'spyropress' ),
        'fa-volume-down' => __( 'Volume Down', 'spyropress' ),
        'fa-volume-up' => __( 'Volume Up', 'spyropress' ),
        'fa-qrcode' => __( 'Qrcode', 'spyropress' ),
        'fa-barcode' => __( 'Barcode', 'spyropress' ),
        'fa-tag' => __( 'Tag', 'spyropress' ),
        'fa-tags' => __( 'Tags', 'spyropress' ),
        'fa-book' => __( 'Book', 'spyropress' ),
        'fa-bookmark' => __( 'Bookmark', 'spyropress' ),
        'fa-print' => __( 'Print', 'spyropress' ),
        'fa-camera' => __( 'Camera', 'spyropress' ),
        'fa-font' => __( 'Font', 'spyropress' ),
        'fa-bold' => __( 'Bold', 'spyropress' ),
        'fa-italic' => __( 'Italic', 'spyropress' ),
        'fa-text-height' => __( 'Text Height', 'spyropress' ),
        'fa-text-width' => __( 'Text Width', 'spyropress' ),
        'fa-align-left' => __( 'Align Left', 'spyropress' ),
        'fa-align-center' => __( 'Align Center', 'spyropress' ),
        'fa-align-right' => __( 'Align Right', 'spyropress' ),
        'fa-align-justify' => __( 'Align Justify', 'spyropress' ),
        'fa-list' => __( 'List', 'spyropress' ),
        'fa-dedent' => __( 'Dedent', 'spyropress' ),
        'fa-outdent' => __( 'Outdent', 'spyropress' ),
        'fa-indent' => __( 'Indent', 'spyropress' ),
        'fa-video-camera' => __( 'Video Camera', 'spyropress' ),
        'fa-picture-o' => __( 'Picture Outline', 'spyropress' ),
        'fa-pencil' => __( 'Pencil', 'spyropress' ),
        'fa-map-marker' => __( 'Map Marker', 'spyropress' ),
        'fa-adjust' => __( 'Adjust', 'spyropress' ),
        'fa-tint' => __( 'Tint', 'spyropress' ),
        'fa-edit' => __( 'Edit', 'spyropress' ),
        'fa-pencil-square-o' => __( 'Pencil Square Outline', 'spyropress' ),
        'fa-share-square-o' => __( 'Share Square Outline', 'spyropress' ),
        'fa-check-square-o' => __( 'Check Square Outline', 'spyropress' ),
        'fa-arrows' => __( 'Arrows', 'spyropress' ),
        'fa-step-backward' => __( 'Step Backward', 'spyropress' ),
        'fa-fast-backward' => __( 'Fast Backward', 'spyropress' ),
        'fa-backward' => __( 'Backward', 'spyropress' ),
        'fa-play' => __( 'Play', 'spyropress' ),
        'fa-pause' => __( 'Pause', 'spyropress' ),
        'fa-stop' => __( 'Stop', 'spyropress' ),
        'fa-forward' => __( 'Forward', 'spyropress' ),
        'fa-fast-forward' => __( 'Fast Forward', 'spyropress' ),
        'fa-step-forward' => __( 'Step Forward', 'spyropress' ),
        'fa-eject' => __( 'Eject', 'spyropress' ),
        'fa-chevron-left' => __( 'Chevron Left', 'spyropress' ),
        'fa-chevron-right' => __( 'Chevron Right', 'spyropress' ),
        'fa-plus-circle' => __( 'Plus Circle', 'spyropress' ),
        'fa-minus-circle' => __( 'Minus Circle', 'spyropress' ),
        'fa-times-circle' => __( 'Times Circle', 'spyropress' ),
        'fa-check-circle' => __( 'Check Circle', 'spyropress' ),
        'fa-question-circle' => __( 'Question Circle', 'spyropress' ),
        'fa-info-circle' => __( 'Info Circle', 'spyropress' ),
        'fa-crosshairs' => __( 'Crosshairs', 'spyropress' ),
        'fa-times-circle-o' => __( 'Times Circle Outline', 'spyropress' ),
        'fa-check-circle-o' => __( 'Check Circle Outline', 'spyropress' ),
        'fa-ban' => __( 'Ban', 'spyropress' ),
        'fa-arrow-left' => __( 'Arrow Left', 'spyropress' ),
        'fa-arrow-right' => __( 'Arrow Right', 'spyropress' ),
        'fa-arrow-up' => __( 'Arrow Up', 'spyropress' ),
        'fa-arrow-down' => __( 'Arrow Down', 'spyropress' ),
        'fa-mail-forward' => __( 'Mail Forward', 'spyropress' ),
        'fa-share' => __( 'Share', 'spyropress' ),
        'fa-expand' => __( 'Expand', 'spyropress' ),
        'fa-compress' => __( 'Compress', 'spyropress' ),
        'fa-plus' => __( 'Plus', 'spyropress' ),
        'fa-minus' => __( 'Minus', 'spyropress' ),
        'fa-asterisk' => __( 'Asterisk', 'spyropress' ),
        'fa-exclamation-circle' => __( 'Exclamation Circle', 'spyropress' ),
        'fa-gift' => __( 'Gift', 'spyropress' ),
        'fa-leaf' => __( 'Leaf', 'spyropress' ),
        'fa-fire' => __( 'Fire', 'spyropress' ),
        'fa-eye' => __( 'Eye', 'spyropress' ),
        'fa-eye-slash' => __( 'Eye Slash', 'spyropress' ),
        'fa-warning' => __( 'Warning', 'spyropress' ),
        'fa-exclamation-triangle' => __( 'Exclamation Triangle', 'spyropress' ),
        'fa-plane' => __( 'Plane', 'spyropress' ),
        'fa-calendar' => __( 'Calendar', 'spyropress' ),
        'fa-random' => __( 'Random', 'spyropress' ),
        'fa-comment' => __( 'Comment', 'spyropress' ),
        'fa-magnet' => __( 'Magnet', 'spyropress' ),
        'fa-chevron-up' => __( 'Chevron Up', 'spyropress' ),
        'fa-chevron-down' => __( 'Chevron Down', 'spyropress' ),
        'fa-retweet' => __( 'Retweet', 'spyropress' ),
        'fa-shopping-cart' => __( 'Shopping Cart', 'spyropress' ),
        'fa-folder' => __( 'Folder', 'spyropress' ),
        'fa-folder-open' => __( 'Folder Open', 'spyropress' ),
        'fa-arrows-v' => __( 'Arrows V', 'spyropress' ),
        'fa-arrows-h' => __( 'Arrows H', 'spyropress' ),
        'fa-bar-chart-o' => __( 'Bar Chart Outline', 'spyropress' ),
        'fa-twitter-square' => __( 'Twitter Square', 'spyropress' ),
        'fa-facebook-square' => __( 'Facebook Square', 'spyropress' ),
        'fa-camera-retro' => __( 'Camera Retro', 'spyropress' ),
        'fa-key' => __( 'Key', 'spyropress' ),
        'fa-gears' => __( 'Gears', 'spyropress' ),
        'fa-cogs' => __( 'Cogs', 'spyropress' ),
        'fa-comments' => __( 'Comments', 'spyropress' ),
        'fa-thumbs-o-up' => __( 'Thumbs Outline Up', 'spyropress' ),
        'fa-thumbs-o-down' => __( 'Thumbs Outline Down', 'spyropress' ),
        'fa-star-half' => __( 'Star Half', 'spyropress' ),
        'fa-heart-o' => __( 'Heart Outline', 'spyropress' ),
        'fa-sign-out' => __( 'Sign Out', 'spyropress' ),
        'fa-linkedin-square' => __( 'Linkedin Square', 'spyropress' ),
        'fa-thumb-tack' => __( 'Thumb Tack', 'spyropress' ),
        'fa-external-link' => __( 'External Link', 'spyropress' ),
        'fa-sign-in' => __( 'Sign In', 'spyropress' ),
        'fa-trophy' => __( 'Trophy', 'spyropress' ),
        'fa-github-square' => __( 'Github Square', 'spyropress' ),
        'fa-upload' => __( 'Upload', 'spyropress' ),
        'fa-lemon-o' => __( 'Lemon Outline', 'spyropress' ),
        'fa-phone' => __( 'Phone', 'spyropress' ),
        'fa-square-o' => __( 'Square Outline', 'spyropress' ),
        'fa-bookmark-o' => __( 'Bookmark Outline', 'spyropress' ),
        'fa-phone-square' => __( 'Phone Square', 'spyropress' ),
        'fa-twitter' => __( 'Twitter', 'spyropress' ),
        'fa-facebook' => __( 'Facebook', 'spyropress' ),
        'fa-github' => __( 'Github', 'spyropress' ),
        'fa-unlock' => __( 'Unlock', 'spyropress' ),
        'fa-credit-card' => __( 'Credit Card', 'spyropress' ),
        'fa-rss' => __( 'Rss', 'spyropress' ),
        'fa-hdd-o' => __( 'Hdd Outline', 'spyropress' ),
        'fa-bullhorn' => __( 'Bullhorn', 'spyropress' ),
        'fa-bell' => __( 'Bell', 'spyropress' ),
        'fa-certificate' => __( 'Certificate', 'spyropress' ),
        'fa-hand-o-right' => __( 'Hand Outline Right', 'spyropress' ),
        'fa-hand-o-left' => __( 'Hand Outline Left', 'spyropress' ),
        'fa-hand-o-up' => __( 'Hand Outline Up', 'spyropress' ),
        'fa-hand-o-down' => __( 'Hand Outline Down', 'spyropress' ),
        'fa-arrow-circle-left' => __( 'Arrow Circle Left', 'spyropress' ),
        'fa-arrow-circle-right' => __( 'Arrow Circle Right', 'spyropress' ),
        'fa-arrow-circle-up' => __( 'Arrow Circle Up', 'spyropress' ),
        'fa-arrow-circle-down' => __( 'Arrow Circle Down', 'spyropress' ),
        'fa-globe' => __( 'Globe', 'spyropress' ),
        'fa-wrench' => __( 'Wrench', 'spyropress' ),
        'fa-tasks' => __( 'Tasks', 'spyropress' ),
        'fa-filter' => __( 'Filter', 'spyropress' ),
        'fa-briefcase' => __( 'Briefcase', 'spyropress' ),
        'fa-arrows-alt' => __( 'Arrows Alt', 'spyropress' ),
        'fa-group' => __( 'Group', 'spyropress' ),
        'fa-users' => __( 'Users', 'spyropress' ),
        'fa-chain' => __( 'Chain', 'spyropress' ),
        'fa-link' => __( 'Link', 'spyropress' ),
        'fa-cloud' => __( 'Cloud', 'spyropress' ),
        'fa-flask' => __( 'Flask', 'spyropress' ),
        'fa-cut' => __( 'Cut', 'spyropress' ),
        'fa-scissors' => __( 'Scissors', 'spyropress' ),
        'fa-copy' => __( 'Copy', 'spyropress' ),
        'fa-files-o' => __( 'Files Outline', 'spyropress' ),
        'fa-paperclip' => __( 'Paperclip', 'spyropress' ),
        'fa-save' => __( 'Save', 'spyropress' ),
        'fa-floppy-o' => __( 'Floppy Outline', 'spyropress' ),
        'fa-square' => __( 'Square', 'spyropress' ),
        'fa-bars' => __( 'Bars', 'spyropress' ),
        'fa-list-ul' => __( 'List Ul', 'spyropress' ),
        'fa-list-ol' => __( 'List Ol', 'spyropress' ),
        'fa-strikethrough' => __( 'Strikethrough', 'spyropress' ),
        'fa-underline' => __( 'Underline', 'spyropress' ),
        'fa-table' => __( 'Table', 'spyropress' ),
        'fa-magic' => __( 'Magic', 'spyropress' ),
        'fa-truck' => __( 'Truck', 'spyropress' ),
        'fa-pinterest' => __( 'Pinterest', 'spyropress' ),
        'fa-pinterest-square' => __( 'Pinterest Square', 'spyropress' ),
        'fa-google-plus-square' => __( 'Google Plus Square', 'spyropress' ),
        'fa-google-plus' => __( 'Google Plus', 'spyropress' ),
        'fa-money' => __( 'Money', 'spyropress' ),
        'fa-caret-down' => __( 'Caret Down', 'spyropress' ),
        'fa-caret-up' => __( 'Caret Up', 'spyropress' ),
        'fa-caret-left' => __( 'Caret Left', 'spyropress' ),
        'fa-caret-right' => __( 'Caret Right', 'spyropress' ),
        'fa-columns' => __( 'Columns', 'spyropress' ),
        'fa-unsorted' => __( 'Unsorted', 'spyropress' ),
        'fa-sort' => __( 'Sort', 'spyropress' ),
        'fa-sort-down' => __( 'Sort Down', 'spyropress' ),
        'fa-sort-asc' => __( 'Sort Asc', 'spyropress' ),
        'fa-sort-up' => __( 'Sort Up', 'spyropress' ),
        'fa-sort-desc' => __( 'Sort Desc', 'spyropress' ),
        'fa-envelope' => __( 'Envelope', 'spyropress' ),
        'fa-linkedin' => __( 'Linkedin', 'spyropress' ),
        'fa-rotate-left' => __( 'Rotate Left', 'spyropress' ),
        'fa-undo' => __( 'Undo', 'spyropress' ),
        'fa-legal' => __( 'Legal', 'spyropress' ),
        'fa-gavel' => __( 'Gavel', 'spyropress' ),
        'fa-dashboard' => __( 'Dashboard', 'spyropress' ),
        'fa-tachometer' => __( 'Tachometer', 'spyropress' ),
        'fa-comment-o' => __( 'Comment Outline', 'spyropress' ),
        'fa-comments-o' => __( 'Comments Outline', 'spyropress' ),
        'fa-flash' => __( 'Flash', 'spyropress' ),
        'fa-bolt' => __( 'Bolt', 'spyropress' ),
        'fa-sitemap' => __( 'Sitemap', 'spyropress' ),
        'fa-umbrella' => __( 'Umbrella', 'spyropress' ),
        'fa-paste' => __( 'Paste', 'spyropress' ),
        'fa-clipboard' => __( 'Clipboard', 'spyropress' ),
        'fa-lightbulb-o' => __( 'Lightbulb Outline', 'spyropress' ),
        'fa-exchange' => __( 'Exchange', 'spyropress' ),
        'fa-cloud-download' => __( 'Cloud Download', 'spyropress' ),
        'fa-cloud-upload' => __( 'Cloud Upload', 'spyropress' ),
        'fa-user-md' => __( 'User Md', 'spyropress' ),
        'fa-stethoscope' => __( 'Stethoscope', 'spyropress' ),
        'fa-suitcase' => __( 'Suitcase', 'spyropress' ),
        'fa-bell-o' => __( 'Bell Outline', 'spyropress' ),
        'fa-coffee' => __( 'Coffee', 'spyropress' ),
        'fa-cutlery' => __( 'Cutlery', 'spyropress' ),
        'fa-file-text-o' => __( 'File Text Outline', 'spyropress' ),
        'fa-building-o' => __( 'Building Outline', 'spyropress' ),
        'fa-hospital-o' => __( 'Hospital Outline', 'spyropress' ),
        'fa-ambulance' => __( 'Ambulance', 'spyropress' ),
        'fa-medkit' => __( 'Medkit', 'spyropress' ),
        'fa-fighter-jet' => __( 'Fighter Jet', 'spyropress' ),
        'fa-beer' => __( 'Beer', 'spyropress' ),
        'fa-h-square' => __( 'H Square', 'spyropress' ),
        'fa-plus-square' => __( 'Plus Square', 'spyropress' ),
        'fa-angle-double-left' => __( 'Angle Double Left', 'spyropress' ),
        'fa-angle-double-right' => __( 'Angle Double Right', 'spyropress' ),
        'fa-angle-double-up' => __( 'Angle Double Up', 'spyropress' ),
        'fa-angle-double-down' => __( 'Angle Double Down', 'spyropress' ),
        'fa-angle-left' => __( 'Angle Left', 'spyropress' ),
        'fa-angle-right' => __( 'Angle Right', 'spyropress' ),
        'fa-angle-up' => __( 'Angle Up', 'spyropress' ),
        'fa-angle-down' => __( 'Angle Down', 'spyropress' ),
        'fa-desktop' => __( 'Desktop', 'spyropress' ),
        'fa-laptop' => __( 'Laptop', 'spyropress' ),
        'fa-tablet' => __( 'Tablet', 'spyropress' ),
        'fa-mobile-phone' => __( 'Mobile Phone', 'spyropress' ),
        'fa-mobile' => __( 'Mobile', 'spyropress' ),
        'fa-circle-o' => __( 'Circle Outline', 'spyropress' ),
        'fa-quote-left' => __( 'Quote Left', 'spyropress' ),
        'fa-quote-right' => __( 'Quote Right', 'spyropress' ),
        'fa-spinner' => __( 'Spinner', 'spyropress' ),
        'fa-circle' => __( 'Circle', 'spyropress' ),
        'fa-mail-reply' => __( 'Mail Reply', 'spyropress' ),
        'fa-reply' => __( 'Reply', 'spyropress' ),
        'fa-github-alt' => __( 'Github Alt', 'spyropress' ),
        'fa-folder-o' => __( 'Folder Outline', 'spyropress' ),
        'fa-folder-open-o' => __( 'Folder Open Outline', 'spyropress' ),
        'fa-smile-o' => __( 'Smile Outline', 'spyropress' ),
        'fa-frown-o' => __( 'Frown Outline', 'spyropress' ),
        'fa-meh-o' => __( 'Meh Outline', 'spyropress' ),
        'fa-gamepad' => __( 'Gamepad', 'spyropress' ),
        'fa-keyboard-o' => __( 'Keyboard Outline', 'spyropress' ),
        'fa-flag-o' => __( 'Flag Outline', 'spyropress' ),
        'fa-flag-checkered' => __( 'Flag Checkered', 'spyropress' ),
        'fa-terminal' => __( 'Terminal', 'spyropress' ),
        'fa-code' => __( 'Code', 'spyropress' ),
        'fa-reply-all' => __( 'Reply All', 'spyropress' ),
        'fa-mail-reply-all' => __( 'Mail Reply All', 'spyropress' ),
        'fa-star-half-empty' => __( 'Star Half Empty', 'spyropress' ),
        'fa-star-half-full' => __( 'Star Half Full', 'spyropress' ),
        'fa-star-half-o' => __( 'Star Half Outline', 'spyropress' ),
        'fa-location-arrow' => __( 'Location Arrow', 'spyropress' ),
        'fa-crop' => __( 'Crop', 'spyropress' ),
        'fa-code-fork' => __( 'Code Fork', 'spyropress' ),
        'fa-unlink' => __( 'Unlink', 'spyropress' ),
        'fa-chain-broken' => __( 'Chain Broken', 'spyropress' ),
        'fa-question' => __( 'Question', 'spyropress' ),
        'fa-info' => __( 'Info', 'spyropress' ),
        'fa-exclamation' => __( 'Exclamation', 'spyropress' ),
        'fa-superscript' => __( 'Superscript', 'spyropress' ),
        'fa-subscript' => __( 'Subscript', 'spyropress' ),
        'fa-eraser' => __( 'Eraser', 'spyropress' ),
        'fa-puzzle-piece' => __( 'Puzzle Piece', 'spyropress' ),
        'fa-microphone' => __( 'Microphone', 'spyropress' ),
        'fa-microphone-slash' => __( 'Microphone Slash', 'spyropress' ),
        'fa-shield' => __( 'Shield', 'spyropress' ),
        'fa-calendar-o' => __( 'Calendar Outline', 'spyropress' ),
        'fa-fire-extinguisher' => __( 'Fire Extinguisher', 'spyropress' ),
        'fa-rocket' => __( 'Rocket', 'spyropress' ),
        'fa-maxcdn' => __( 'Maxcdn', 'spyropress' ),
        'fa-chevron-circle-left' => __( 'Chevron Circle Left', 'spyropress' ),
        'fa-chevron-circle-right' => __( 'Chevron Circle Right', 'spyropress' ),
        'fa-chevron-circle-up' => __( 'Chevron Circle Up', 'spyropress' ),
        'fa-chevron-circle-down' => __( 'Chevron Circle Down', 'spyropress' ),
        'fa-html5' => __( 'Html5', 'spyropress' ),
        'fa-css3' => __( 'Css3', 'spyropress' ),
        'fa-anchor' => __( 'Anchor', 'spyropress' ),
        'fa-unlock-alt' => __( 'Unlock Alt', 'spyropress' ),
        'fa-bullseye' => __( 'Bullseye', 'spyropress' ),
        'fa-ellipsis-h' => __( 'Ellipsis H', 'spyropress' ),
        'fa-ellipsis-v' => __( 'Ellipsis V', 'spyropress' ),
        'fa-rss-square' => __( 'Rss Square', 'spyropress' ),
        'fa-play-circle' => __( 'Play Circle', 'spyropress' ),
        'fa-ticket' => __( 'Ticket', 'spyropress' ),
        'fa-minus-square' => __( 'Minus Square', 'spyropress' ),
        'fa-minus-square-o' => __( 'Minus Square Outline', 'spyropress' ),
        'fa-level-up' => __( 'Level Up', 'spyropress' ),
        'fa-level-down' => __( 'Level Down', 'spyropress' ),
        'fa-check-square' => __( 'Check Square', 'spyropress' ),
        'fa-pencil-square' => __( 'Pencil Square', 'spyropress' ),
        'fa-external-link-square' => __( 'External Link Square', 'spyropress' ),
        'fa-share-square' => __( 'Share Square', 'spyropress' ),
        'fa-compass' => __( 'Compass', 'spyropress' ),
        'fa-toggle-down' => __( 'Toggle Down', 'spyropress' ),
        'fa-caret-square-o-down' => __( 'Caret Square Outline Down', 'spyropress' ),
        'fa-toggle-up' => __( 'Toggle Up', 'spyropress' ),
        'fa-caret-square-o-up' => __( 'Caret Square Outline Up', 'spyropress' ),
        'fa-toggle-right' => __( 'Toggle Right', 'spyropress' ),
        'fa-caret-square-o-right' => __( 'Caret Square Outline Right', 'spyropress' ),
        'fa-euro' => __( 'Euro', 'spyropress' ),
        'fa-eur' => __( 'Eur', 'spyropress' ),
        'fa-gbp' => __( 'Gbp', 'spyropress' ),
        'fa-dollar' => __( 'Dollar', 'spyropress' ),
        'fa-usd' => __( 'Usd', 'spyropress' ),
        'fa-rupee' => __( 'Rupee', 'spyropress' ),
        'fa-inr' => __( 'Inr', 'spyropress' ),
        'fa-cny' => __( 'Cny', 'spyropress' ),
        'fa-rmb' => __( 'Rmb', 'spyropress' ),
        'fa-yen' => __( 'Yen', 'spyropress' ),
        'fa-jpy' => __( 'Jpy', 'spyropress' ),
        'fa-ruble' => __( 'Ruble', 'spyropress' ),
        'fa-rouble' => __( 'Rouble', 'spyropress' ),
        'fa-rub' => __( 'Rub', 'spyropress' ),
        'fa-won' => __( 'Won', 'spyropress' ),
        'fa-krw' => __( 'Krw', 'spyropress' ),
        'fa-bitcoin' => __( 'Bitcoin', 'spyropress' ),
        'fa-btc' => __( 'Btc', 'spyropress' ),
        'fa-file' => __( 'File', 'spyropress' ),
        'fa-file-text' => __( 'File Text', 'spyropress' ),
        'fa-sort-alpha-asc' => __( 'Sort Alpha Asc', 'spyropress' ),
        'fa-sort-alpha-desc' => __( 'Sort Alpha Desc', 'spyropress' ),
        'fa-sort-amount-asc' => __( 'Sort Amount Asc', 'spyropress' ),
        'fa-sort-amount-desc' => __( 'Sort Amount Desc', 'spyropress' ),
        'fa-sort-numeric-asc' => __( 'Sort Numeric Asc', 'spyropress' ),
        'fa-sort-numeric-desc' => __( 'Sort Numeric Desc', 'spyropress' ),
        'fa-thumbs-up' => __( 'Thumbs Up', 'spyropress' ),
        'fa-thumbs-down' => __( 'Thumbs Down', 'spyropress' ),
        'fa-youtube-square' => __( 'Youtube Square', 'spyropress' ),
        'fa-youtube' => __( 'Youtube', 'spyropress' ),
        'fa-xing' => __( 'Xing', 'spyropress' ),
        'fa-xing-square' => __( 'Xing Square', 'spyropress' ),
        'fa-youtube-play' => __( 'Youtube Play', 'spyropress' ),
        'fa-dropbox' => __( 'Dropbox', 'spyropress' ),
        'fa-stack-overflow' => __( 'Stack Overflow', 'spyropress' ),
        'fa-instagram' => __( 'Instagram', 'spyropress' ),
        'fa-flickr' => __( 'Flickr', 'spyropress' ),
        'fa-adn' => __( 'Adn', 'spyropress' ),
        'fa-bitbucket' => __( 'Bitbucket', 'spyropress' ),
        'fa-bitbucket-square' => __( 'Bitbucket Square', 'spyropress' ),
        'fa-tumblr' => __( 'Tumblr', 'spyropress' ),
        'fa-tumblr-square' => __( 'Tumblr Square', 'spyropress' ),
        'fa-long-arrow-down' => __( 'Long Arrow Down', 'spyropress' ),
        'fa-long-arrow-up' => __( 'Long Arrow Up', 'spyropress' ),
        'fa-long-arrow-left' => __( 'Long Arrow Left', 'spyropress' ),
        'fa-long-arrow-right' => __( 'Long Arrow Right', 'spyropress' ),
        'fa-apple' => __( 'Apple', 'spyropress' ),
        'fa-windows' => __( 'Windows', 'spyropress' ),
        'fa-android' => __( 'Android', 'spyropress' ),
        'fa-linux' => __( 'Linux', 'spyropress' ),
        'fa-dribbble' => __( 'Dribbble', 'spyropress' ),
        'fa-skype' => __( 'Skype', 'spyropress' ),
        'fa-foursquare' => __( 'Foursquare', 'spyropress' ),
        'fa-trello' => __( 'Trello', 'spyropress' ),
        'fa-female' => __( 'Female', 'spyropress' ),
        'fa-male' => __( 'Male', 'spyropress' ),
        'fa-gittip' => __( 'Gittip', 'spyropress' ),
        'fa-sun-o' => __( 'Sun Outline', 'spyropress' ),
        'fa-moon-o' => __( 'Moon Outline', 'spyropress' ),
        'fa-archive' => __( 'Archive', 'spyropress' ),
        'fa-bug' => __( 'Bug', 'spyropress' ),
        'fa-vk' => __( 'Vk', 'spyropress' ),
        'fa-weibo' => __( 'Weibo', 'spyropress' ),
        'fa-renren' => __( 'Renren', 'spyropress' ),
        'fa-pagelines' => __( 'Pagelines', 'spyropress' ),
        'fa-stack-exchange' => __( 'Stack Exchange', 'spyropress' ),
        'fa-arrow-circle-o-right' => __( 'Arrow Circle Outline Right', 'spyropress' ),
        'fa-arrow-circle-o-left' => __( 'Arrow Circle Outline Left', 'spyropress' ),
        'fa-toggle-left' => __( 'Toggle Left', 'spyropress' ),
        'fa-caret-square-o-left' => __( 'Caret Square Outline Left', 'spyropress' ),
        'fa-dot-circle-o' => __( 'Dot Circle Outline', 'spyropress' ),
        'fa-wheelchair' => __( 'Wheelchair', 'spyropress' ),
        'fa-vimeo-square' => __( 'Vimeo Square', 'spyropress' ),
        'fa-turkish-lira' => __( 'Turkish Lira', 'spyropress' ),
        'fa-try' => __( 'Try', 'spyropress' ),
        'fa-plus-square-o' => __( 'Plus Square Outline', 'spyropress' ),
        'fa-soundcloud' => __( 'Sound Cloud', 'spyropress' ),
        'fa-xing ' => __( 'Xing ', 'spyropress' ),
        'fa-lastfm' => __( 'Last Fm', 'spyropress' ),
     );
}

function spyropress_get_options_social() {
    return array(
        'dribbble' => __( 'Dribbble', 'spyropress' ),
        'dropbox' => __( 'Dropbox', 'spyropress' ),
        'envelope' => __( 'Envelope', 'spyropress' ),
        'facebook' => __( 'FaceBook', 'spyropress' ),
        'foursquare' => __( 'Foursquare', 'spyropress' ),
        'github' => __( 'Github ', 'spyropress' ),
        'google-plus' => __( 'Google+', 'spyropress' ),
        'instagram' => __( 'Instagram', 'spyropress' ),
        'linkedin' => __( 'Linkedin', 'spyropress' ),
        'maxcdn' => __( 'Maxcdn', 'spyropress' ),
        'pinterest' => __( 'Pinterest', 'spyropress' ),
        'rss' => __( 'Rss', 'spyropress' ),
        'skype' => __( 'Skype', 'spyropress' ),
        'tumblr' => __( 'Tumblr', 'spyropress' ),
        'twitter' => __( 'Twitter', 'spyropress' ),
        'vk' => __( 'Vk', 'spyropress' ),
        'youtube' => __( 'Youtube', 'spyropress' ), 
        'fa-soundcloud' => __( 'Sound Cloud', 'spyropress' ),
        'fa-xing ' => __( 'Xing ', 'spyropress' ),
        'fa-lastfm' => __( 'Last Fm', 'spyropress' )
    );
}

function spyropress_footer_social_icons( $ids = '' ){
    $icons = '';
    foreach( $ids as $id ){
        $url = ( isset( $id['ft_url'] ) )? $id['ft_url'] : '';
        $icons .='<li><a href="'. esc_url( $url ) .'" title="'. $id['network'] .'" target="_blank"><i class="fa fa-'. $id['network'] .' fa-2x"></i></a></li>'; 
    }
    
    return '<ul>'. $icons .'</ul>';
}
                