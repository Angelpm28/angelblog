<?php

/**
 * Module: Service List
 *
 * @author 		SpyroSol
 * @category 	SpyropressBuilderModules
 * @package 	Spyropress
 */

class Spyropress_Module_Service_List extends SpyropressBuilderModule {

    /**
     * Constructor
     */
    public function __construct() {

        $this->path = dirname(__FILE__);
        // Widget variable settings
        $this->cssclass = 'module-service-list';
        $this->description = __( 'Display a list of services.', 'spyropress' );
        $this->id_base = 'service_list';
        $this->name = __( 'Service List', 'spyropress' );
        
        // Fields
        $this->fields = array (
            
            array(
                'label' => __( 'Service', 'spyropress' ),
                'id' => 'mates',
                'type' => 'repeater',
                'item_title' => 'heading',
                'fields' => array(
                    array(
                        'label' => __( 'Heading', 'spyropress' ),
                        'id' => 'heading',
                        'type' => 'text'
                    ),
                    
                    array(
                        'label' => __( 'Sub-Heading', 'spyropress' ),
                        'id' => 'sub_heading',
                        'type' => 'text'
                    ),
                    
                    array(
                        'label' => __( 'Sub-Title', 'spyropress' ),
                        'id' => 'sub_title',
                        'type' => 'text'
                    ),
        
                    array(
                        'label' => __( 'Teaser', 'spyropress' ),
                        'id' => 'content',
                        'type' => 'textarea',
                        'rows' => 4
                    ),
                    
                    array(
                        'label' => __( 'Button Text', 'spyropress' ),
                        'id' => 'btn_text',
                        'type' => 'text',
                        'std' => 'Learn More'
                    ),
                    
                    array(
                        'label' => __( 'Button URL', 'spyropress' ),
                        'id' => 'btn_url',
                        'type' => 'text',
                        'std' => '#'
                    ),
                )
            ),
        );
        
        $this->create_widget();
    }

    function widget( $args, $instance ) {
        
        // extracting info
        extract( $args ); extract( $instance );
        include $this->get_view();
    }

}

spyropress_builder_register_module( 'Spyropress_Module_Service_List' );