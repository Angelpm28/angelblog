<?php

if( empty( $photos ) ) return;

$atts = array(
    'callback' => 'generate_gallery_item',
    'row_class' => get_row_class( true ) . ' gallery-row',
    'column_class' => 'image-container',
    'columns' => $cols
);
echo $before_widget . spyropress_column_generator( $atts, $photos ) . $after_widget;

function generate_gallery_item( $item, $atts ) {
    
    return sprintf(
        '<div class="%1$s">
            <a href="%3$s" class="fancybox">
                <img src="%2$s" alt="">
            </a>
        </div>', $atts['column_class'], $item['thumb'], $item['large']
    );
}
?>