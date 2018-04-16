<?php



/**

 * Text and Photo Widget

 * Display static text and photo.

 *

 * @package		SpyroPress

 * @category	Widgets

 * @author		SpyroSol

 */



class Spyropress_Widget_Recent_Comments extends SpyropressWidget {



    /**

     * Constructor

     */

    function __construct() {



        // Widget variable settings.

        $this->cssclass = 'widget_recent_comments';

        $this->description = __( 'The most recent comments.', 'spyropress' );

        $this->id_base = 'spyropress_recent_comments';

        $this->name = __( 'ThemeSquared: Recent Comments', 'spyropress' );



        $this->fields = array(

            array(

                'label' => __( 'Title', 'spyropress' ),

                'id' => 'title',

                'type' => 'text',

            ),

            array(

                'label' => __( 'Title', 'spyropress' ),

                'id' => 'number',

                'type' => 'range_slider',
                
                'max' => 50

            ),

        );



        $this->create_widget();

    }



    function widget( $args, $instance ) {



        // extracting info

        extract( $args );

        extract( spyropress_clean_array( $instance ) );



        // get view to render

        include $this->get_view();

    }

} // class SpyroPress_Widget_TabWidget



register_widget( 'Spyropress_Widget_Recent_Comments' );





