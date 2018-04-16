<?php

// title, icon, content, url_text, url, link_url
if ( $content ) {
    $url_text = ( $url_text ) ? $url_text : 'Buy Now';
    $url = ( $link_url ) ? get_permalink( $link_url ) : $url;

    if ( $url ) $url = ' <a href="' . $url . '">' . $url_text . '<span></span></a>';
}

if( $icon )
    $icon = '<img alt="" src="' . $icon . '">';

echo $before_widget;
    echo '<h2>' . $icon . '<span>' . $title . '</span></h2>';
    echo wpautop( $content );
    echo $url;
echo $after_widget;
?>