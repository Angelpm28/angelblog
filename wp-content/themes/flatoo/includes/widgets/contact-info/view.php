<?php

echo $before_widget;

if ( '' != $title )
    echo $before_title . $title . $after_title;

if ( '' != $about )
    echo '<p>' . $about . '</p>';
    
echo '<address>';

    if ( $name ) echo '<strong>' . $name . '</strong><br/>';
    if ( $address ) echo $address . '<br/>';
    if ( $city ) echo $city;
    if ( $state ) echo ', ' . $state;
    if ( $zip ) echo ' ' . $zip;
    echo '<br/>';

    if ( $phone ) echo '<abbr title="Phone">P:</abbr> ' . $phone . '<br/>';
    if ( $email ) echo '<abbr title="Email">E:</abbr> <a href="mailto:' . $email . '">' . $email . '</a><br/>';

echo '</address>';

echo $after_widget;

?>