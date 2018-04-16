<?php

/**
 * Module: Skills
 *
 * @author 		SpyroSol
 * @category 	SpyropressBuilderModules
 * @package 	Spyropress
 */

class Spyropress_Module_Skills extends SpyropressBuilderModule {

    /**
     * Constructor
     */
    public function __construct() {

        $this->path = dirname(__FILE__);
        // Widget variable settings
        $this->cssclass = 'module-skills';
        $this->description = __( 'Display a skill.', 'spyropress' );
        $this->id_base = 'spyropress_skills';
        $this->name = __( 'Skill', 'spyropress' );
        
        // Fields
        $this->fields = array (
            
            array(
                'label' => __( 'Number of Columns', 'spyropress' ),
                'id' => 'columns',
                'type' => 'range_slider',
                'std' => 3,
                'max' => 4
            ),
            
            array(
                'label' => __( 'Skill', 'spyropress' ),
                'id' => 'skills',
                'type' => 'repeater',
                'item_title' => 'title',
                'fields' => array(
                
                    array(
                        'label' => __( 'Label', 'spyropress' ),
                        'id' => 'title',
                        'type' => 'text'
                    ),
                    
                    array(
                        'label' => __( 'Percentage', 'spyropress' ),
                        'id' => 'percentage',
                        'type' => 'range_slider',
                    ),
                    
                    array(
                        'label' => __( 'Description', 'spyropress' ),
                        'id' => 'content',
                        'type' => 'textarea',
                        'rows' => 4
                    ),
                   
                )           
            )
            
        );
        
        $this->create_widget();
    }

    function widget( $args, $instance ) {
        
        // extracting info
        extract( $args ); extract( $instance );
        
        include $this->get_view();
    }
    
    function skill_item_generator( $item, $atts ){
        
        //return content.
        return
        '<div class="' . $atts['column_class'] . '">
        	<div class=" col-xs-12 col-sm-6 col-md-6 col-lg-6 skills">
            	
                <span class="chart skilBg" data-percent="'. $item['percentage'] .'">
                    <span class="percent"></span>
                </span>
                
            	<h4>'. $item['title'] .'</h4>
                <p>'. $item['content'] .'</p>
            </div>
        </div>';
    }

}

spyropress_builder_register_module( 'Spyropress_Module_Skills' );

?>