<?php

/**
 * Module: Our Team
 *
 * @author 		SpyroSol
 * @category 	BuilderModules
 * @package 	Spyropress
 */

class Spyropress_Module_Our_Team extends SpyropressBuilderModule {

    /**
     * Constructor
     */
    public function __construct() {

        $this->path = dirname(__FILE__);
        // Widget variable settings
        $this->cssclass = 'module-our-team';
        $this->description = __( 'Display a list of team.', 'spyropress' );
        $this->id_base = 'spyropress_our_team';
        $this->name = __( 'Our Team', 'spyropress' );
        
        // Fields
        $this->fields = array (
            
            array(
                'label' => __( 'Mate', 'spyropress' ),
                'id' => 'mates',
                'type' => 'repeater',
                'item_title' => 'fname',
                'fields' => array(
                    array(
                        'label' => __( 'First Name', 'spyropress' ),
                        'id' => 'fname',
                        'type' => 'text'
                    ),
                    
                    array(
                        'label' => __( 'Last Name', 'spyropress' ),
                        'id' => 'lname',
                        'type' => 'text'
                    ),
                    
                    array(
                        'label' => __( 'Designation', 'spyropress' ),
                        'id' => 'designation',
                        'type' => 'text'
                    ),
                    
                    array(
                        'label' => __( 'Upload Picture', 'spyropress' ),
                        'id' => 'picture',
                        'type' => 'upload'
                    ),
        
                    array(
                        'label' => __( 'About', 'spyropress' ),
                        'id' => 'content',
                        'type' => 'textarea',
                        'rows' => 6
                    ),
                    
                    array(
                		'label' => __( 'Social', 'spyropress' ),
                		'type' => 'repeater',
                        'id' => 'socials',
                        'item_title' => 'network',
                        'fields' => array(
                            array(
                                'label' => __( 'Sociable Icon', 'spyropress' ),
                                'id' => 'network',
                                'type' => 'select',
                                'options' => array(
                                    '0076' => __( 'Facebook', 'spyropress' ),
                                    '0077' => __( 'Flickr', 'spyropress' ),
                                    '0106' => __( 'Google+', 'spyropress' ),
                                    '0107' => __( 'Instagram', 'spyropress' ),
                                    '0105' => __( 'Linkedin', 'spyropress' ),
                                    '0074' => __( 'Twitter', 'spyropress' ),
                                    '0078' => __( 'vimeo', 'spyropress' )
                                )
                            ),
                
                            array(
                                'label' => __( 'URL', 'spyropress' ),
                                'id' => 'link',
                                'type' => 'text',
                            )
                        )
                	),
                )
            ),
        );
        
        $this->create_widget();
    }

    function widget( $args, $instance ) {
        
        // extracting info
        extract( $args ); extract( $instance );
        $template = isset( $instance['template'] ) ? $instance['template'] : '';
        include $this->get_view( $template );
    }

}

spyropress_builder_register_module( 'Spyropress_Module_Our_Team' );

?>