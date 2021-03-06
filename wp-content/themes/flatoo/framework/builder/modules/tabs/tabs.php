<?php

/**
 * Module: Tabs
 *
 * @author 		SpyroSol
 * @category 	SpyropressBuilderModules
 * @package 	Spyropress
 */

class Spyropress_Module_Tabs extends SpyropressBuilderModule {

    public function __construct() {

        $this->path = dirname(__FILE__);
        // Widget variable settings
        $this->description = __( 'Tab Builder.', 'spyropress' );
        $this->id_base = 'tab';
        $this->name = __( 'Tabs', 'spyropress' );

        // Fields
        $this->fields = array(
            array(
                'label' => __( 'Tab', 'spyropress' ),
                'id' => 'tabs',
                'type' => 'repeater',
                'item_title' => 'title',
                'fields' => array(
                    
                    array(
                        'label' => __( 'Title', 'spyropress' ),
                        'id' => 'title',
                        'type' => 'text'
                    ),
                    
                    array(
                        'label' => __( 'Tab Bucket', 'spyropress' ),
                        'id' => 'bucket',
                        'type' => 'select',
                        'desc' => 'If you want to use html instead of plain text.',
                        'options' => spyropress_get_buckets()
                    ),
                    
                    array(
                        'label' => __( 'Content', 'spyropress' ),
                        'id' => 'content',
                        'type' => 'textarea',
                        'rows' => 7
                    ),
                )
            )
        );

        $this->create_widget();
    }

    function widget( $args, $instance ) {

        // extracting info
        extract( $args ); extract( $instance );
        $template = isset( $instance['template'] ) ? $instance['template'] : '';
        // get view to render
        include $this->get_view( $template );
    }

}
spyropress_builder_register_module( 'Spyropress_Module_Tabs' );
?>