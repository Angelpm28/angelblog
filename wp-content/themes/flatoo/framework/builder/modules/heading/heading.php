<?php

/**
 * Module: Heading
 * Add headings into the page layout wherever needed.
 *
 * @author 		SpyroSol
 * @category 	BuilderModules
 * @package 	Spyropress
 */

class Spyropress_Module_Heading extends SpyropressBuilderModule {

    public function __construct() {

        // Widget variable settings
        $this->cssclass = 'module-heading';
        $this->description = __( 'Add headings into the page layout wherever needed.', 'spyropress' );
        $this->id_base = 'spyropress_heading';
        $this->name = __( 'Heading', 'spyropress' );

        // Fields
        $this->fields = array(

            array(
                'label' => __( 'Heading Color', 'spyropress' ),
                'id' => 'color',
                'type' => 'select',
                'options' => array(
                    'heading-red' => __( 'Red Color', 'spyropress' ),
                    'heading-white' => __( 'White Color', 'spyropress' ),
                ),'std' => 'heading-white'
            
            ),
            
            array(
                'label' => __( 'Heading Text', 'spyropress' ),
                'id' => 'heading',
                'type' => 'text',
            ),
            
            
            array(
                'label' => __( 'HTML Tag', 'spyropress' ),
                'id' => 'html_tag',
                'type' => 'select',
                'options' => array(
                    'h1' => __( 'H1', 'spyropress' ),
                    'h2' => __( 'H2', 'spyropress' ),
                    'h3' => __( 'H3', 'spyropress' ),
                    'h4' => __( 'H4', 'spyropress' ),
                    'h5' => __( 'H5', 'spyropress' ),
                    'h6' => __( 'H6', 'spyropress' )
                ),
                'std' => 'h1'
            ),
            
            array(
                'label' => __( 'Sub Heading', 'spyropress' ),
                'id' => 'sub_heading',
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

spyropress_builder_register_module( 'Spyropress_Module_Heading' );