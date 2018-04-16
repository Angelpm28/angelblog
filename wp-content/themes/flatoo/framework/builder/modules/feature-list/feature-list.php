<?php

/**
 * Module: Feature List
 *
 * @author 		SpyroSol
 * @category 	SpyropressBuilderModules
 * @package 	Spyropress
 */

class Spyropress_Module_Feature_List extends SpyropressBuilderModule {

    public function __construct() {

        /* Widget variable settings. */

        $this->cssclass = 'feature';
        $this->description = __( 'Feature content module.', 'spyropress' );
        $this->id_base = 'feature';
        $this->name = __( 'Feature', 'spyropress' );
        
        // Fields
        $this->fields = array(
            
            array(
                'label' => __( 'Title', 'spyropress' ),
                'id' => 'title',
                'type' => 'text',
            ),
            
            array(
                'label' => __( 'Teaser', 'spyropress' ),
                'id' => 'teaser',
                'type' => 'textarea',
                'rows' => 5
            ),
            
            array(
                'label' => __( 'Icon', 'spyropress' ),
                'id' => 'icon',
                'type' => 'select',
                'options' => spyropress_get_feature_icons()
            )
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
spyropress_builder_register_module( 'Spyropress_Module_Feature_List' );