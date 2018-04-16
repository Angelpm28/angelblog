<?php

/**
 * Module: About Me
 * A lightweight, flexible component to showcase intro
 *
 * @author 		SpyroSol
 * @category 	SpyropressBuilderModules
 * @package 	Spyropress
 */

class Spyropress_Module_About_Me extends SpyropressBuilderModule {

    public function __construct() {

        // Widget variable settings        
        $this->description = __( 'Biography', 'spyropress' );
        $this->id_base = 'about_me';
        $this->name = __( 'About Me', 'spyropress' );
        
        // Fields
        $this->fields = array(
                
            array(
                'label' => __( 'Full Name', 'spyropress' ),
                'id' => 'full_name',
                'type' => 'text'
            ),
            
            array(
                'label' => __( 'Designation', 'spyropress' ),
                'id' => 'designation',
                'type' => 'text'
            ),
            
            array(
                'label' => __( 'Image', 'spyropress' ),
                'id' => 'image',
                'type' => 'upload'
            ),
            
            
            array(
                'label' => __( 'About yourself', 'spyropress' ),
                'id' => 'about',
                'type' => 'editor',
                'rows' => 10
            ),
            
            array(
                'label' => __( 'Button Text', 'spyropress' ),
                'id' => 'button',
                'type' => 'text',
            ),
            
            array(
                'label' => __( 'Button Link', 'spyropress' ),
                'id' => 'link',
                'type' => 'text',
            ),
        );

        $this->create_widget();
    }

    function widget( $args, $instance ) {

        // extracting info
        extract( $args ); extract( $instance );
        // get view to render
        include $this->get_view();
    }

}
spyropress_builder_register_module( 'Spyropress_Module_About_Me' );