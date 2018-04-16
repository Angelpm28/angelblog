<?php

/**
 * Module: Icon Teaser
 * Display a brief text with a link and use hundreds of built-in icons
 *
 * @author 		SpyroSol
 * @category 	BuilderModules
 * @package 	Spyropress
 */

class Spyropress_Module_Icon_Teaser extends SpyropressBuilderModule {

    /**
     * Constructor
     */
    public function __construct() {

        // Widget variable settings
        $this->path = dirname(__FILE__);
        $this->cssclass = 'module-icon-teaser';
        $this->description = __( 'Display a brief text with a link and use of icons.', 'spyropress' );
        $this->id_base = 'spyropress_icon_teaser';
        $this->name = __( 'Icon Teaser', 'spyropress' );

        // Fields
        $this->fields = array (
            
            array(
                'label' => __( 'Title', 'spyropress' ),
                'id' => 'title',
                'type' => 'text'
            ),
            
            array(
                'label' => __( 'Upload Icon', 'spyropress' ),
                'id' => 'icon',
                'type' => 'upload'
            ),

            array(
                'label' => __( 'Content', 'spyropress' ),
                'id' => 'content',
                'type' => 'textarea',
                'rows' => 6
            ),
        );
        
        $this->fields = spyropress_get_options_link( $this->fields );
        
        $this->create_widget();
    }

    function widget( $args, $instance ) {
        
        $defaults = array(
            'url_text' => 'Read More',
            'url' => '#'
        );
        // extracting info
        extract( $args ); extract( wp_parse_args( spyropress_clean_array( $instance ), $defaults ) );

        include $this->get_view();
    }

}
spyropress_builder_register_module( 'Spyropress_Module_Icon_Teaser' );