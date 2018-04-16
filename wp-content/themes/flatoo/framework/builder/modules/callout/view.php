<?php

// $title, $content, $image, $url, $link_url, $url_text, $image_align, $image_width, $image_height

$data = array();
if( $title )
    $data['title'] = '<h4 class="media-heading">'.do_shortcode($title).'</h4>';
if( $content ) {
    $url_text = ($url_text) ? $url_text : 'Learn More';
    $url = ($link_url) ? get_permalink($link_url) : $url;
    
    if($url)
        $url = ' <a href="'.$url.'">'.$url_text.'</a>';
    $data['content'] = '<p>'.$content.$url.'</p>';
}

if( !$image_align ) $image_align = 'left';

if( $image ) {
    $data['image'] = get_image(array(
        'src' => $image,
        'width' => ($image_width) ? $image_width : 120,
        'height' => ($image_height) ? $image_height : false,
        'return' => true,
        'before' => '<div class="img-frame pull-'.$image_align.'">',
        'after' => '</div>'
    ));
}

//template
$tmpl = '{image}<div class="media-body">{title}{content}</div>';

if( $image_align == 'after')
    $tmpl = '<div class="media-body">{title}{image}{content}</div>';
    
echo $before_widget;
    echo token_repalce($tmpl, $data);
echo $after_widget;
?>