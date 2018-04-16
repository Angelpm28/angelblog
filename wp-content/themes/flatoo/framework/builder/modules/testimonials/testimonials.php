<?php

/**
 * Module: Testimonials
 *
 * @author 		SpyroSol
 * @category 	SpyropressBuilderModules
 * @package 	Spyropress
 */

class Spyropress_Module_Testimonials extends SpyropressBuilderModule {

    public function __construct() {

        // Widget variable settings.

        $this->cssclass = 'testimonials';
        $this->description = __( 'Testimonials.', 'spyropress' );
        $this->id_base = 'testimonial';
        $this->name = __( 'Testimonials', 'spyropress' );

        // Fields
        $this->fields = array(
            array(
                'label' => __( 'Testimonial', 'spyropress' ),
                'id' => 'content',
                'type' => 'textarea',
                'rows' => 4
            ),
            
            array(
                'label' => __( 'Author Name', 'spyropress' ),
                'id' => 'author',
                'type' => 'text'
            ),
            
            array(
                'label' => __( 'Website', 'spyropress' ),
                'id' => 'website',
                'type' => 'text'
            ),
            
            array(
                'label' => __( 'Image', 'spyropress' ),
                'id' => 'image',
                'type' => 'upload'
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
spyropress_builder_register_module( 'Spyropress_Module_Testimonials' );
?>