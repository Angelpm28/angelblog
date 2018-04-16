<?php

/**
 * Contact Info Widget
 * Quickly add contact info to your sidebar e.g. address, phone, email.
 *
 * @package		SpyroPress
 * @category	Widgets
 * @author		SpyroSol
 */

class SpyroPress_Widget_Contact extends SpyropressWidget {

    private static $counter = 1;

    /**
     * Constructor
     */
    function __construct() {

        // Widget variable settings.
        $this->cssclass = 'contact-info';
        $this->description = __( 'Quickly add contact info to your sidebar e.g. address, phone, email.', 'spyropress' );
        $this->id_base = 'spyropress_contact';
        $this->name = __( 'Spyropress: Contact Info', 'spyropress' );

        $this->fields = array(

            array(
                'label' => __( 'Title', 'spyropress' ),
                'id' => 'title',
                'type' => 'text',
            ),
            
            array(
                'label' => __( 'About', 'spyropress' ),
                'id' => 'about',
                'type' => 'textarea',
                'rows' => 4
            ),
            
            array(
                'label' => __( 'Company Name', 'spyropress' ),
                'id' => 'name',
                'type' => 'text',
            ),
            array(
                'label' => __( 'Address', 'spyropress' ),
                'id' => 'address',
                'type' => 'text',
            ),
            array(
                'label' => __( 'City', 'spyropress' ),
                'id' => 'city',
                'type' => 'text',
            ),
            array(
                'label' => __( 'State', 'spyropress' ),
                'id' => 'state',
                'type' => 'text',
            ),
            array(
                'label' => __( 'Zip', 'spyropress' ),
                'id' => 'zip',
                'type' => 'text',
            ),
            
            array(
                'label' => __( 'Phone', 'spyropress' ),
                'id' => 'phone',
                'type' => 'text',
            ),
            
            array(
                'label' => __( 'Email', 'spyropress' ),
                'id' => 'email',
                'type' => 'text',
            )
        );

        $this->create_widget();
    }

    function widget( $args, $instance ) {

        // extracting info
        extract( $args ); extract( spyropress_clean_array( $instance ) );

        // get view to render
        include $this->get_view();
    }
} // class SpyroPress_Widget_Contact

register_widget( 'SpyroPress_Widget_Contact' );
?>