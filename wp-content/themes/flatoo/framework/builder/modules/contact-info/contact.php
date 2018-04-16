<?php

/**
 * Contact Info
 * Quickly add contact info to your sidebar e.g. address, phone, email.
 *
 * @package		SpyroPress
 * @category	Modules
 * @author		SpyroSol
 */

class SpyroPress_Module_Contact extends SpyropressBuilderModule {

    /**
     * Constructor
     */
    function __construct() {

        // Widget variable settings.
        $this->cssclass = 'contact-info';
        $this->description = __( 'Quickly add contact info to your sidebar e.g. address, phone, email.', 'spyropress' );
        $this->id_base = 'spyropress_contact';
        $this->name = __( 'Contact Info', 'spyropress' );

        $this->fields = array(
            array(
                'label' => __( 'Title', 'spyropress' ),
                'id' => 'title',
                'type' => 'text',
            ),
                
            array( 'type' => 'row' ),

            array( 'type' => 'col', 'size' => 6 ),
            
                array(
                    'label' => __( 'Address', 'spyropress' ),
                    'id' => 'address',
                    'type' => 'textarea',
                    'rows' => 3
                ),
            
                array(
                    'label' => __( 'Phone', 'spyropress' ),
                    'id' => 'phone',
                    'type' => 'text',
                ),
                
            array( 'type' => 'col_end' ),

            array( 'type' => 'col', 'size' => 6 ),
            
                array(
                    'label' => __( 'Email', 'spyropress' ),
                    'id' => 'email',
                    'type' => 'text',
                ),
                
                array(
                    'label' => __( 'Website', 'spyropress' ),
                    'id' => 'website',
                    'type' => 'text',
                ),
                
            array( 'type' => 'col_end' ),

            array( 'type' => 'row_end' )
        );

        $this->create_widget();
    }

    function widget( $args, $instance ) {

        // extracting info
        extract( $args ); extract( spyropress_clean_array( $instance ) );

        // get view to render
        include $this->get_view();
    }

}

spyropress_builder_register_module( 'SpyroPress_Module_Contact' );