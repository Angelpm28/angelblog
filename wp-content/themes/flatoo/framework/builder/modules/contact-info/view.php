<?php

echo $before_widget;

if( $title )
    echo '<h4>'. $title .'</h4>';
if ( $address )
    echo '<p> <i class="fa fa-map-marker fa-lg"></i>'. $address .'</p>';
if ( $phone )
    echo '<p> <i class="fa fa-mobile fa-lg"></i>' . $phone . '</p>';
if ( $email )
    echo '<p> <i class="fa fa-envelope-o "></i> <a href="mailto:' . $email . '">' . $email . '</a></p>';
if ( $website )
    echo '<p> <i class="fa fa-link "></i> <a href="' . $website . '">' . $website . '</a></p>';
    
echo $after_widget;

?>