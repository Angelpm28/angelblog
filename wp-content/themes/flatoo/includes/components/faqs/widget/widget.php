<?php

/**
 * FAQs
 * Display FAQs. 
 *     
 * @package		SpyroPress
 * @category	Widgets
 * @author		SpyroSol
 */
class SpyroPress_Widget_Faqs extends SpyropressWidget {

    function __construct() {
        
        // Widget variable settings
        $this->id_base = 'spyropress_faqs';
        $this->name = __( 'SpyroPress: FAQs', 'spyropress' );
        $this->cssclass = 'widget_faqs';
        $this->description = __( 'A widget to display faqs.', 'spyropress' );
        
        $this->fields = array(
        
        );
        
        $this->create_widget();
    }
}

register_widget( 'SpyroPress_Widget_Faqs' );
?>