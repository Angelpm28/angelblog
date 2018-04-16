<?php  if ( ! defined('ETHEME_FW')) exit('No direct script access allowed');

// **********************************************************************// 
// ! Update element: Posts Grid
// **********************************************************************//
add_action( 'init', 'etheme_register_vc_posts_grid');
if(!function_exists('etheme_register_vc_posts_grid')) {
	function etheme_register_vc_posts_grid() {
		if(!function_exists('vc_map')) return;

        /*vc_add_param( 'vc_basic_grid', array(
            'type' => 'checkbox',
            'heading' => esc_html__( 'Full Width', 'xstore' ),
            'param_name' => 'full_width',
            'value' => array( esc_html__( 'Yes, please', 'xstore' ) => 'yes' )
        ) ); */

        vc_add_param( 'vc_basic_grid', array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Posts design', 'xstore' ),
            'param_name' => 'design',
            'value' => array( 
                esc_html__( 'Default', 'xstore' ) => 'default',
                esc_html__( 'Design 1', 'xstore' ) => '1',
                esc_html__( 'Design 2', 'xstore' ) => '2',
                esc_html__( 'Portfolio', 'xstore' ) => '4'
            )
        ) ); 

        vc_add_param( 'vc_masonry_grid', array(
            'type' => 'dropdown',
            'heading' => esc_html__( 'Posts design', 'xstore' ),
            'param_name' => 'design',
            'value' => array( 
                esc_html__( 'Default', 'xstore' ) => 'default',
                esc_html__( 'Design 1', 'xstore' ) => '1',
                esc_html__( 'Design 2', 'xstore' ) => '2',
                esc_html__( 'Portfolio', 'xstore' ) => '4'
            )
        ) ); 


	}
}
