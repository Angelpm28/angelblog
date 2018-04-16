<?php

/**
 * Page Component
 * 
 * @package		SpyroPress
 * @category	Components
 */

class SpyropressPage extends SpyropressComponent {

    private $path;
    
    function __construct() {

        $this->path = dirname(__FILE__);
        add_action( 'spyropress_register_taxonomy', array( $this, 'register' ) );
    }

    function register() {

        // Init Post Type
        $post = new SpyropressCustomPostType( 'Page' );
        
        $menus = wp_get_nav_menus();
        $menu_options = array();

        if ( isset( $menus ) && count( $menus ) > 0 ) {
            foreach ( $menus as $menu ) {
                $menu_options[$menu->term_id] = $menu->name;
            }
        }
        
        // Add Meta Boxes
        $meta_fields['options'] = array(
            
            array(
                'label' => __( 'Slider', 'spyropress' ),
                'type' => 'heading',
                'slug' => 'options'
            ),
            
            array(
                'label' => __( 'Header', 'spyropress' ),
                'type' => 'sub_heading',
            ),
            
            array(
                'label' => __( 'Header Type', 'spyropress' ),

                'id' => 'top_header',

                'type' => 'select',

                'options' => array(
    
                    'default' => __( 'Default', 'spyropress' ),
    
                    'breadcrum' => __( 'Breadcrum', 'spyropress' )

                ),'std' => 'default'

            )
            
            
        );
        
        $post->add_meta_box( 'page_options', __( 'Page Options', 'spyropress' ), $meta_fields, '_page_options', false, 'normal', 'high' );
    }
}

/**
 * Init the Component
 */
new SpyropressPage();
?>