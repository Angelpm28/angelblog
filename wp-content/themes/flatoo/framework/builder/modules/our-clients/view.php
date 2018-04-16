<?php

if( empty( $clients ) ) return;

echo '<div id="our_clients" class="clearfix">';

    if( $title ) echo '<h1>' . $title . '</h1>';
    
    echo '<div class="images clearfix">';
        
        foreach( $clients as $client )
            echo '<span><img alt="" src="' . $client['logo'] . '"></span>';
            
    echo '</div>';

echo '</div>';
?>