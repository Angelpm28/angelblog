<?php

/**
 * Module: Callout
 * Display a headline, (optional) image and brief text with a link.
 *
 * @author 		SpyroSol
 * @category 	BuilderModules
 * @package 	Spyropress
 */

class Spyropress_Module_Callout extends SpyropressBuilderModule {

    public function __construct() {

        $this->path = dirname(__FILE__);
        // Widget variable settings.
        $this->cssclass = 'module-callout';
        $this->description = __( 'Display custom text with a link.', 'spyropress' );
        $this->id_base = 'spyropress_callout';
        $this->name = __( 'Callout', 'spyropress' );

        // Fields
        $this->fields = array(

            array(
                'label' => __( 'Content', 'spyropress' ),
                'id' => 'content',
                'type' => 'textarea',
                'rows' => 5
            ),

            array(
                'label' => __( 'Link Text', 'spyropress' ),
                'id' => 'url_text',
                'type' => 'text'
            ),
            
            array(
                'label' => __( 'Custom URL', 'spyropress' ),
                'id' => 'url',
                'type' => 'text'
            ),

            array(
                'label' => __( 'Link to Post/Page', 'spyropress' ),
                'id' => 'link_url',
                'type' => 'custom_post',
                'post_type' => array( 'post', 'page' )
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

spyropress_builder_register_module( 'Spyropress_Module_Callout' );

?>