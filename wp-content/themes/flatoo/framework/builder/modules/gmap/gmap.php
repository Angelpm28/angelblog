<?php

/**
 * Module: Gmap
 * Add google map into the page layout wherever needed.
 *
 * @author 		SpyroSol
 * @category 	BuilderModules
 * @package 	Spyropress
 */

class Spyropress_Module_Gmap extends SpyropressBuilderModule {

    public function __construct() {

        // Widget variable settings
        $this->description = __( 'Add google map markers work with google map row only.', 'spyropress' );
        $this->id_base = 'gmap_markers';
        $this->name = __( 'Google Map Markers', 'spyropress' );

        // Fields
        $this->fields = array(
                    
            array(
                'label' => __( 'Address', 'spyropress' ),
                'id' => 'address',
                'type' => 'textarea',
                'rows' => 3
            )            
           
        );

        $this->create_widget();
    }

    function widget( $args, $instance ) {
        
        extract( $args ); extract( $instance );
        
        //check
        if( empty( $address ) )return;
        
        //content.
        echo '<div class="mapArea take-out">
        	       <iframe class="google-map"  src="https://maps.google.com/maps?hi=en&q='. $address .'&ie=UTF8&t=roadmap&z=10&iwloc=B&output=embed"></iframe>
              </div>';

    }
}

spyropress_builder_register_module( 'Spyropress_Module_Gmap' );