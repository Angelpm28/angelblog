<?php

/**
 * Module: Education
 *
 * @author 		SpyroSol
 * @category 	SpyropressBuilderModules
 * @package 	Spyropress
 */

class Spyropress_Module_Education extends SpyropressBuilderModule {

    public function __construct() {

        // Widget variable settings

        $this->description = __( 'Display list of Education.', 'spyropress' );
        $this->id_base = 'education';
        $this->name = __( 'Education', 'spyropress' );
        
        // Fields
        $this->fields = array(
            
            array(
                'label' => __( 'Education', 'spyropress' ),
                'id' => 'educations',
                'type' => 'repeater',
                'item_title' => 'title',
                'fields' => array(
                    
                    array(
                        'label' => __( 'Title', 'spyropress' ),
                        'id' => 'title',
                        'type' => 'text',
                    ),
                    
                    array(
                        'label' => __( 'Sub Title', 'spyropress' ),
                        'id' => 'sub_title',
                        'type' => 'text',
                    ),
                    
                    array(
                        'label' => __( 'Description', 'spyropress' ),
                        'id' => 'content',
                        'type' => 'textarea',
                        'rows' => 5
                    ),
                    
                    array(
                        'label' => __( 'Date', 'spyropress' ),
                        'id' => 'date',
                        'type' => 'text',
                    ),
                
                )
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
spyropress_builder_register_module( 'Spyropress_Module_Education' );

?>