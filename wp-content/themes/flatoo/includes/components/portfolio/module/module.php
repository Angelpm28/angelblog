<?php

/**
 * Module: Portfolio
 * Display a list of portfolio
 *
 * @author 		SpyroSol
 * @category 	BuilderModules
 * @package 	Spyropress
 */

class Spyropress_Module_Portfolio extends SpyropressBuilderModule {

    public function __construct() {

        // Widget variable settings.
        $this->path = dirname( __FILE__ );
        $this->cssclass = 'module-portfolio';
        $this->description = __( 'Display a list of portfolio.', 'spyropress' );
        $this->id_base = 'spyropress_portfolio';
        $this->name = __( 'Recent Portfolio', 'spyropress' );

        // Fields
        $this->fields = array(

            array('type' => 'row'),
                array('type' => 'col', 'size' => 6),
                array(
                    'label' => __( 'Number of items per page', 'spyropress' ),
                    'id' => 'limit',
                    'type' => 'range_slider',
                    'max' => 30,
                    'std' => 4
                ),
                
                array(
                    'label' => __( 'Number of Column', 'spyropress' ),
                    'id' => 'columns',
                    'type' => 'range_slider',
                    'max' => 4,
                    'std' => 4
                ),
                
                array(
                    'label' => __( 'All', 'spyropress' ),
                    'id' => 'all',
                    'type' => 'text',
                    'std' => 'All'
                ),
                
                array('type' => 'col_end'),
            
                array('type' => 'col', 'size' => 6),
                array(
                    'label' => __( 'Portfolio Category', 'spyropress' ),
                    'id' => 'cat',
                    'type' => 'multi_select',
                    'options' => spyropress_get_taxonomies( 'portfolio_category' )
                ),
    
                array(
                    'label' => __('Pagination', 'spyropress'),
                    'id' => 'settings',
                    'type' => 'checkbox',
                    'class'=> 'template listing section-full',
                    'desc' => 'Will show pagination if portfolio per page is set.',
                    'options' => array(
                        'filters' => __( 'Enable Filteration ', 'spyropress' ),
                        'light' => __( 'Enable Light Box', 'spyropress' ),
                    ),'std' => 'light'
                ),
                array(
            		'id' => 'enable_tab',
                    'type' => 'checkbox',
                    'options' => array(
                        '1' => __( 'Enable Open New Window', 'spyropress' ),
                    )
            	),
                array(
            		'id' => 'disable_link',
                    'type' => 'checkbox',
                    'options' => array(
                        '1' => __( 'Disable Single Portfolio Link', 'spyropress' ),
                    )
            	),
                array('type' => 'col_end'),
                
            array('type' => 'row_end'),
            
             
        );

        $this->create_widget();
    }

    function widget( $args, $instance ) {
        
        // extracting info
        extract( $args );extract( $instance );

        // get view to render
        include $this->get_view();
    }
    
    function query( $atts, $content = null ) {

        $default = array (
            'post_type' => 'portfolio',
            'limit' => -1,
            'columns' => false,
            'row' => false,
            'pagination' => false,
            'callback' => array( $this, 'generate_portfolio_item' ),
            'item_class' => 'portfolio-entry'
        );
        $atts = wp_parse_args( $atts, $default );
    
        if ( ! empty( $atts['cat'] ) ) {
    
            $atts['tax_query']['relation'] = 'OR';
            if ( ! empty( $atts['cat'] ) ) {
                $atts['tax_query'][] = array(
                    'taxonomy' => 'portfolio_category',
                    'field' => 'slug',
                    'terms' => $atts['cat'],
                    );
                unset( $atts['cat'] );
            }
        }
    
        if ( $content )
            return token_repalce( $content, spyropress_query_generator( $atts ) );
    
        return spyropress_query_generator( $atts );
    }
    
    // Item HTML Generator
    function generate_portfolio_item( $post_ID, $atts ) {
    
        // these arguments will be available from inside $content
        $image = array(
            'post_id' => $post_ID,
            'echo' => false
        );
        $image_tag = get_image( $image );
        
        $image['width'] = 9999;
        $image['type'] = 'src';
        $image_url = get_image( $image );
        $image_light_url = get_image( $image );
        
        // Items Category.
        $terms = get_the_terms( $post_ID, 'portfolio_category' );
        $cats = array();
        if ( !is_wp_error( $terms ) && !empty($terms ) ) {
            foreach ( $terms as $term ) {
                $cats[]= $term->slug;
            }
        }
        
        $tab = ( $atts['enable_tab'] )? 'target="_blank"' : '';
        $post_meta = get_post_meta( $post_ID, '_portfolio_details', true );
        if ( isset( $post_meta['display'] ) && 'video' == $post_meta['display'] && isset( $post_meta['video'] ) && !empty( $post_meta['video'] ) ) {
        	$image_light_url = $post_meta['video'];
        }

        
        
        $light = ( isset( $atts['settings'] ) && in_array( 'light', $atts['settings'] ) );
        $light = ( isset( $light ) && !empty( $light ))? '<a rel="alternate" href="'. $image_light_url .'" title="Project ' . get_the_title( $post_ID ) . '" class="zoom lb lb_warsaw1"><i class="fa fa-search fa-2x"></i></a>': '';
        $link = ( !isset( $atts['disable_link'] ) )? '<a href="' . get_permalink( $post_ID ) . '" title="Project Link ' . get_permalink( $post_ID ) . '"  '. $tab .' class="linKed"><i class="fa fa-link fa-2x"></i></a>' : '';
        // item tempalte
        $item_tmpl = '
        <li class="' . join(' ', $cats) . ' ' . $atts['column_class'] . ' isotope-item">
            <div class="lightCon">
                <span class="hoverBox">
                	<span class="smallIcon">
                        '. $light .'
                        '. $link .'
                    </span>
                </span>
                <img src="'. $image_url .'" alt="" class="img-responsive" >
            </div>
        </li>';
        
        return $item_tmpl;
    }

}

spyropress_builder_register_module( 'Spyropress_Module_Portfolio' );
?>