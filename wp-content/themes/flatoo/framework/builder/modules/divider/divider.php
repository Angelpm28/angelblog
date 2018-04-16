<?php

/**
 * Module: Divider 
 * Separate sections of the layout.
 *
 * @author 		SpyroSol
 * @category 	BuilderModules
 * @package 	Spyropress
 */

class Spyropress_Module_Divider extends SpyropressBuilderModule {

    public function __construct() {

        // Widget variable settings
        $this->description = __('Separate sections of the layout.', 'spyropress');
        $this->id_base = 'spyropress_divider';
        $this->name = __('Divider', 'spyropress');
        
        $this->fields = array(
            array(
                'type' => 'info',
                'desc' => __( 'No option for seperator', 'spyropress' )
            )
        );
        $this->create_widget();

    }

    function widget($args, $instance) {
        // outputs the content of the widget
        extract($instance);
        
        echo '<div class="sep-border"></div> <!-- Separator -->';
    }

}
spyropress_builder_register_module('Spyropress_Module_Divider');