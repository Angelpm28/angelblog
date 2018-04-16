<?php

/**
 * FAQ Component
 * 
 * @package		SpyroPress
 * @category	Components
 */

class SpyropressFaq extends SpyropressComponent {

    private $path;
    
    function __construct() {

        $this->path = dirname(__FILE__);
        add_action( 'spyropress_register_taxonomy', array( $this, 'register' ) );
        //add_action( 'spyropress_register_widgets', array( $this, 'register_widget' ) );
    }

    function register() {

        // Init Post Type
        $args = array(
            'supports' => array( 'title', 'editor' ),
            'title' => __( 'Enter question here', 'spyropress' ),
            'has_archive'   => false,
            'exclude_from_search' => true
        );
        $post = new SpyropressCustomPostType( __( 'FAQ', 'spyropress' ), 'faq', $args );
        
        // Add Taxonomy
        $post->add_taxonomy( 'FAQ Category', 'faq_category', 'Categories', array( 'hierarchical' => true ) );
        
        // Add Meta Boxes
        $meta_fields['faq'] = array(
            array(
                'label' => 'FAQ',
                'type' => 'heading',
                'slug' => 'faq'
            ),
            
            array(
                'label' => 'Question',
                'id' => 'question',
                'type' => 'editor',
                'rows' => 10
            ),
            
            array(
                'label' => 'Answer',
                'id' => 'answer',
                'type' => 'editor',
                'rows' => 10
            )
        );
        
        $post->add_meta_box( 'faq_info', 'FAQ', $meta_fields, false, false );
    }
    
    function register_widget( $widgets ) {
        
        $widgets[] = $this->path . '/widget';
        
        return $widgets;
    }
}

/**
 * Init the Component
 */
new SpyropressFaq();

?>