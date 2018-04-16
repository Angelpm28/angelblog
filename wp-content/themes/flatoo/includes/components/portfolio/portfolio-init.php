<?php

/**
 * Portfolio Component
 * 
 * @package		SpyroPress
 * @category	Components
 */

class SpyropressPortfolio extends SpyropressComponent {

    private $path;
    
    function __construct() {

        $this->path = dirname(__FILE__);
        add_action( 'spyropress_register_taxonomy', array( $this, 'register' ) );
        add_filter( 'builder_include_modules', array( $this, 'register_module' ) );
    }

    function register() {

        // Init Post Type
        $args = array(
            'supports'      => array( 'title', 'editor', 'thumbnail', 'comments', 'revisions' ),
            'rewrite' => array( 'slug' => get_setting( 'portfolio-slug', 'portfolio' ) ),
            'menu_icon'     => 'dashicons-portfolio'
        );
        $post = new SpyropressCustomPostType( __( 'Portfolio', 'spyropress' ), '', $args );
        
        // Add Taxonomy
        $post->add_taxonomy( __( 'Category', 'spyropress' ), 'portfolio_category', __( 'Portfolio Categories', 'spyropress' ), array( 'hierarchical' => true ) );
        
        // Add Meta Boxes
        $meta_fields['portfolio'] = array(
            array(
                'label' => __( 'Portfolio', 'spyropress' ),
                'type' => 'heading',
                'slug' => 'portfolio'
            ),
            
    
            array(
                'label' => __( 'Project URL', 'spyropress' ),
                'id' => 'project_url',
                'type' => 'text',
                'desc' => __('Project Live Preview URL' , 'spyropress'),
                'std' => '#'
            ),
            
            array(
                'label' => __( 'Project Details', 'spyropress' ),
                'type' => 'repeater',
                'id' => 'details',
                'item_title' => 'title',
                'fields' => array(
                    array(
                        'label' => __( 'Title', 'spyropress' ),
                        'id' => 'title',
                        'type' => 'text',
                    )
                )
            ),
            
            array(
                'label' => __( 'Display','spyropress' ),
                'id' => 'display',
                'desc' => __( 'Select the option to display','spyropress' ),
                'class' => 'enable_changer section-full',
                'type' => 'select',
                'options' => array( 'gallery' => 'Gallery', 'video' => 'Video' )
            ),

            array(
                'label' => __( 'Video','spyropress' ),
                'id' => 'video',
                'desc' => __( 'This enable you to embed videos into your portfolio pages.','spyropress' ),
                'class' => 'display video',
                'type' => 'textarea',
                'rows' =>  3
            ),

            array(
                'label' => __( 'Gallery','spyropress' ),
                'id' => 'gallery',
                'desc' => __( 'Set up your gallery.','spyropress' ),
                'class' => 'display gallery',
                'type' => 'gallery'
            ),
        );
        
        $post->add_meta_box( 'portfolio', __( 'Portfolio Details', 'spyropress' ), $meta_fields, '_portfolio_details', false );
    }
    
    function register_module( $modules ) {

        $modules[] = $this->path . '/module/module.php';

        return $modules;
    }
}

/**
 * Init the Component
 */
new SpyropressPortfolio();