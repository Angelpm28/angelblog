<?php
/**
 * Border OptionType
 *
 * @author 		SpyroSol
 * @category 	UI
 * @package 	Spyropress
 */

function spyropress_ui_border($item, $id, $value, $is_widget = false, $is_builder = false) {
    
    ob_start();
    
    /* setting default values */
    $cp_style = '';
    $defaults = array(
        'top' => '0px',
        'top-color' => '',
        'top-style' => '',
        
        'right' => '0px',
        'right-color' => '',
        'right-style' => '',
        
        'bottom' => '0px',
        'bottom-color' => '',
        'bottom-style' => '',
        
        'left' => '0px',
        'left-color' => '',
        'left-style' => '',        
    );
    $value = wp_parse_args( $value, $defaults );
        
    /* getting values */
    $top_color_style = $bottom_color_style = $left_color_style = $right_color_style = '';
    if( $value['top-color'] )
        $top_color_style = sprintf(' style="background:%1$s;border-color:%1$s"', $value['top-color']);
    if( $value['bottom-color'] )
        $bottom_color_style = sprintf(' style="background:%1$s;border-color:%1$s"', $value['bottom-color']);
    if( $value['left-color'] )
        $left_color_style = sprintf(' style="background:%1$s;border-color:%1$s"', $value['left-color']);
    if( $value['right-color'] )
        $right_color_style = sprintf(' style="background:%1$s;border-color:%1$s"', $value['right-color']);
?>
    <div id="<?php esc_attr_e( $id ); ?>" <?php echo  build_section_class( 'section-border section-full', $item ); ?>>
        <?php build_heading( $item, $is_widget ); ?>
        <?php build_description( $item ); ?>
        <div class="controls">
            <div class="row-fluid pb10">
                <div class="span6">
                    <strong class="sub"><?php _e( 'Top Border:', 'spyropress' ); ?></strong>
                    <div class="range-slider pb10">
                        <strong class="sub"><?php _e( 'Width:', 'spyropress' ); ?> <span><?php esc_attr_e( $value['top'] ); ?></span></strong>
                        <div id="<?php esc_attr_e( $id ); ?>-top" class="slider"></div>
                        <input type="hidden" name="<?php esc_attr_e( $item['name'] ); ?>[top]" id="<?php esc_attr_e( $id ); ?>-top-value" value="<?php esc_attr_e( $value['top'] ); ?>" />
                    </div>
                    <br />
                    <div class="row-fluid">
                        <div class="span6">
                            <select class="chosen" name="<?php esc_attr_e( $item['name'] ); ?>[top-style]" id="<?php esc_attr_e( $id ); ?>-top-style">
                            <?php
                                foreach ( spyropress_panel_border_styles() as $key => $style )
                                    render_option(esc_attr( $key ), esc_html( $style ), array( $value['top-style'] ));
                            ?>
                            </select>
                        </div>
                        <div class="span6">
                            <div class="color-picker clearfix">
                                <input type="text" class="field" name="<?php esc_attr_e( $item['name'] ); ?>[top-color]" id="<?php esc_attr_e( $id ); ?>-top-colorpicker" value="<?php esc_attr_e( $value['top-color'] ); ?>" />
                                <div class="color-box"><div<?php echo $top_color_style; ?>></div></div>
                            </div>
                        </div>
                    </div>                
                </div>
                <div class="span6">
                    <strong class="sub"><?php _e( 'Bottom Border:', 'spyropress' ); ?></strong>
                    <div class="range-slider pb10">
                        <strong class="sub"><?php _e( 'Width:', 'spyropress' ); ?> <span><?php esc_html_e( $value['bottom'] ); ?></span></strong>
                        <div id="<?php esc_attr_e( $id ); ?>-bottom" class="slider"></div>
                        <input type="hidden" name="<?php esc_attr_e( $item['name'] ); ?>[bottom]" id="<?php esc_attr_e( $id ); ?>-bottom-value" value="<?php esc_attr_e( $value['bottom'] ); ?>" />
                    </div>
                    <br />
                    <div class="row-fluid">
                        <div class="span6">
                            <select class="chosen" name="<?php esc_attr_e( $item['name'] ); ?>[bottom-style]" id="<?php esc_attr_e( $id ); ?>-bottom-style">
                            <?php
                                foreach ( spyropress_panel_border_styles() as $key => $style )
                                    render_option(esc_attr( $key ), esc_html( $style ), array( $value['bottom-style'] ));
                            ?>
                            </select>
                        </div>
                        <div class="span6">
                            <div class="color-picker clearfix">
                                <input type="text" class="field" name="<?php esc_attr_e( $item['name'] ); ?>[bottom-color]" id="<?php esc_attr_e( $id ); ?>-bottom-colorpicker" value="<?php esc_attr_e( $value['bottom-color'] ); ?>" />
                                <div class="color-box"><div<?php print $bottom_color_style; ?>></div></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br />
            <div class="row-fluid">
                <div class="span6">
                    <strong class="sub"><?php _e( 'Left Border:', 'spyropress' ); ?></strong>
                    <div class="range-slider pb10">
                        <strong class="sub"><?php _e( 'Width:', 'spyropress' ); ?> <span><?php esc_html_e( $value['left'] ); ?></span></strong>
                        <div id="<?php esc_attr_e( $id ); ?>-left" class="slider"></div>
                        <input type="hidden" name="<?php esc_attr_e( $item['name'] ); ?>[left]" id="<?php esc_attr_e( $id ); ?>-left-value" value="<?php esc_attr_e( $value['left'] ); ?>" />
                    </div>
                    <br />
                    <div class="row-fluid">
                        <div class="span6">
                            <select class="chosen" name="<?php esc_attr_e( $item['name'] ); ?>[left-style]" id="<?php esc_attr_e( $id ); ?>-left-style">
                            <?php
                                foreach ( spyropress_panel_border_styles() as $key => $style )
                                    render_option(esc_attr( $key ), esc_html( $style ), array( $value['left-style'] ));
                            ?>
                            </select>
                        </div>
                        <div class="span6">
                            <div class="color-picker clearfix">
                                <input type="text" class="field" name="<?php esc_attr_e( $item['name'] ); ?>[left-color]" id="<?php esc_attr_e( $id ); ?>-left-colorpicker" value="<?php esc_attr_e( $value['left-color'] ); ?>" />
                                <div class="color-box"><div<?php print $left_color_style; ?>></div></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="span6">
                    <strong class="sub"><?php _e( 'Right Border:', 'spyropress' ); ?></strong>
                    <div class="range-slider pb10">
                        <strong class="sub"><?php _e( 'Width:', 'spyropress' ); ?> <span><?php esc_html_e( $value['right'] ); ?></span></strong>
                        <div id="<?php esc_attr_e( $id ); ?>-right" class="slider"></div>
                        <input type="hidden" name="<?php esc_attr_e( $item['name'] ); ?>[right]" id="<?php esc_attr_e( $id ); ?>-right-value" value="<?php esc_attr_e( $value['right'] ); ?>" />
                    </div>
                    <br />
                    <div class="row-fluid">
                        <div class="span6">
                            <select class="chosen" name="<?php esc_attr_e( $item['name'] ); ?>[right-style]" id="<?php esc_attr_e( $id ); ?>-right-style">
                            <?php
                                foreach ( spyropress_panel_border_styles() as $key => $style )
                                    render_option(esc_attr( $key ), esc_html( $style ), array( $value['right-style'] ));
                            ?>
                            </select>
                        </div>
                        <div class="span6">
                            <div class="color-picker clearfix">
                                <input type="text" class="field" name="<?php esc_attr_e( $item['name'] ); ?>[right-color]" id="<?php esc_attr_e( $id ); ?>-right-colorpicker" value="<?php esc_attr_e( $value['right-color'] ); ?>" />
                                <div class="color-box"><div<?php print $right_color_style; ?>></div></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>                
<?php
    
    /* content */
    $ui_content = ob_get_clean();
    /* js */
    $slider_top     = str_replace('px', '', $value['top']);
    $slider_bottom  = str_replace('px', '', $value['bottom']);
    $slider_left    = str_replace('px', '', $value['left']);
    $slider_right   = str_replace('px', '', $value['right']);
    
    $border['colorpicker'] = array(
        $id.'-top-colorpicker',
        $id.'-bottom-colorpicker',
        $id.'-left-colorpicker',
        $id.'-right-colorpicker',
    );
    $border['slider'] = array (
        "#{$id}-top"   => array ( 'value' => (int)$slider_top ),
        "#{$id}-bottom"  => array ( 'value' => (int)$slider_bottom ),
        "#{$id}-left"  => array ( 'value' => (int)$slider_left ),
        "#{$id}-right"  => array ( 'value' => (int)$slider_right )
    );
    
    $js = "panelUi.bind_border( '{$id}', ".json_encode($border).");";
    
    if($is_widget)  {
        if(!$is_builder)
            add_jquery_ready($js);
        else
            $ui_content .= sprintf( '<script type="text/javascript">%2$s//<![CDATA[%2$s %1$s %2$s//]]>%2$s</script>', $js, "\n" );
        return $ui_content;
    }
    else {
        echo $ui_content;
        add_jquery_ready($js);
    }
}

function spyropress_widget_border( $item, $id, $value, $is_builder = false ) {
    return spyropress_ui_border( $item, $id, $value, true, $is_builder );
}

/**
 * Border Styles
 */
function spyropress_panel_border_styles() {
    return array(
        ''          => '',
        'none'      => __( 'None', 'spyropress' ),
        'dotted'    => __( 'Dotted', 'spyropress' ),
        'dashed'    => __( 'Dashed', 'spyropress' ),
        'double'    => __( 'Double', 'spyropress' ),
        'groove'    => __( 'Groove', 'spyropress' ),
        'hidden'    => __( 'Hidden', 'spyropress' ),
        'inset'     => __( 'Inset', 'spyropress' ),
        'outset'    => __( 'Outset', 'spyropress' ),
        'ridge'     => __( 'Ridge', 'spyropress' ),
        'solid'     => __( 'Solid', 'spyropress' )
    );
}
?>