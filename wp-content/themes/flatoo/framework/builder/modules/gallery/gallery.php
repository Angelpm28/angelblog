<?php

/**
 * Module: Gallery
 * Gallery Builder
 *
 * @author 		SpyroSol
 * @category 	BuilderModules
 * @package 	Spyropress
 */

class Spyropress_Module_Gallery extends SpyropressBuilderModule {

    /**
     * Constructor
     */
    public function __construct() {

        // Widget variable settings
        $this->cssclass = 'gallery';
        $this->description = __( 'Gallery Builder', 'spyropress' );
        $this->id_base = 'gallery';
        $this->name = __( 'Gallery', 'spyropress' );

        // Fields
        $this->fields = array (

            array(
                'label' => __( 'No of Columns', 'spyropress' ),
                'id' => 'cols',
                'type' => 'range_slider',
                'min' => 2,
                'max' => 4,
                'std' => 4
            ),

            array(
                'id' => 'photos',
                'label' => __( 'Photos', 'spyropress' ),
                'type' => 'repeater',
                'fields' => array(
                    array(
                        'label' => __( 'Photo - Thumbnail', 'spyropress' ),
                        'id' => 'thumb',
                        'type' => 'upload'
                    ),
                    
                    array(
                        'label' => __( 'Photo - Large', 'spyropress' ),
                        'id' => 'large',
                        'type' => 'upload'
                    )
                )
            )
        );

        $this->create_widget();
    }

    function widget( $args, $instance ) {

        // extracting info
        $title = '';
        extract( $args ); extract( $instance );

        include $this->get_view();
    }

}

spyropress_builder_register_module( 'Spyropress_Module_Gallery' );