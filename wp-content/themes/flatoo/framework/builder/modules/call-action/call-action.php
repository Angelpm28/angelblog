<?php

/**
 * Module: Call of Action
 * A lightweight, flexible component to showcase key content on your site.
 *
 * @author 		SpyroSol
 * @category 	SpyropressBuilderModules
 * @package 	Spyropress
 */

class Spyropress_Module_Call_Action extends SpyropressBuilderModule {

    public function __construct() {

        // Widget variable settings
        $this->description = __( 'Call of Actin', 'spyropress' );
        $this->id_base = 'call_action';
        $this->name = __( 'Call of Action', 'spyropress' );
        
        // Fields
        $this->fields = array(
            
            array(
                'label' => __( 'Title', 'spyropress' ),
                'id' => 'title',
                'type' => 'text',
            ),
            
            array(
                'label' => __( 'Sub Title', 'spyropress' ),
                'id' => 'sub_title',
                'type' => 'text'
            )
        );
        
        $this->fields = spyropress_get_options_link( $this->fields );

        $this->create_widget();
    }

    function widget( $args, $instance ) {

        // extracting info
        $style = '';
        extract( $args ); extract( $instance );
        // get view to render
        include $this->get_view( $style );
    }

}
spyropress_builder_register_module( 'Spyropress_Module_Call_Action' );