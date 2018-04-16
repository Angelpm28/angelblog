<?php  if ( ! defined('ETHEME_FW')) exit('No direct script access allowed');

// **********************************************************************// 
// ! Title
// **********************************************************************// 

function etheme_title_shortcode($atts, $content) {
    $output = $style1 = $style2 = '';
    extract(shortcode_atts(array(
    	'subtitle' => '',
    	'title' => 'Title',
    	'divider' => '',
    	'title_color' => '',
    	'subtitle_color' => '',
    	'align' => 'center',
    	'design' => 1,
        'class'  => '',
    ), $atts));
    
    if($title_color != '') {
	    $style1 = ' style="color:'.$title_color.';"';
    }
    
    if($subtitle_color != '') {
	    $style2 = ' style="color:'.$subtitle_color.';"';
    }
    
    if($subtitle != '') {
	    $subtitle = '<h3'.$style2.'>' . $subtitle . '</h3>';
    }
    
    if($divider != '') {
	    $divider = '<hr class="divider ' . $divider . '">';
    }
    
    if($align != '') {
	    $class .= ' title-' . $align . '';
    }

    $class .= ' design-'.$design;

    $output .= ' <div class="title ' . $class . '">';
	    $output .= $subtitle;
	    $output .= '<h2'.$style1.'>'.$title.'</h2>';
	    $output .= $divider;
    $output .= '</div>';
    
    return $output;
}

// **********************************************************************// 
// ! Register New Element: title
// **********************************************************************//
add_action( 'init', 'etheme_register_vc_title');
if(!function_exists('etheme_register_vc_title')) {
	function etheme_register_vc_title() {
		if(!function_exists('vc_map')) return;
	    $params = array(
	      'name' => '[8THEME] Title with text',
	      'base' => 'title',
		  'icon' => ETHEME_CODE_IMAGES . 'vc/el-title.png',
	      'category' => 'Eight Theme',
	      'params' => array(
	        array(
	          "type" => "textfield",
	          "heading" => "Title",
	          "param_name" => "title"
	        ),
	        array(
	          "type" => "colorpicker",
	          "heading" => "Title color",
	          "param_name" => "title_color"
	        ),
	        array(
	          "type" => "textfield",
	          "heading" => "Subtitle text",
	          "param_name" => "subtitle"
	        ),
	        array(
	          "type" => "colorpicker",
	          "heading" => "Subtitle color",
	          "param_name" => "subtitle_color"
	        ),
	        array(
	          "type" => "dropdown",
	          "heading" => esc_html__("Divider", 'xstore'),
	          "param_name" => "divider",
	          "value" => array( 
	          	"", 
	          	__("Short", 'xstore') => "short", 
	          	__("Wide", 'xstore') => "wide"
	          )
	        ),
	        array(
	          "type" => "dropdown",
	          "heading" => esc_html__("Design", 'xstore'),
	          "param_name" => "design",
	          "value" => array( "", 
	          	__("Design 1", 'xstore') => 1, 
	          	__("Design 2", 'xstore') => 2
          		)
	        ),
	        array(
	          "type" => "dropdown",
	          "heading" => esc_html__("Text align", 'xstore'),
	          "param_name" => "align",
	          "value" => array( 
	          	"", 
	          	__("Left", 'xstore') => "left", 
	          	__("Center", 'xstore') => "center", 
	          	__("Right", 'xstore') => "right"
	          )
	        ),
	        array(
	          "type" => "textfield",
	          "heading" => esc_html__("Extra Class", 'xstore'),
	          "param_name" => "class",
	          "description" => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'xstore')
	        )
	      )
	
	    );  
	
	    vc_map($params);
	}
}
