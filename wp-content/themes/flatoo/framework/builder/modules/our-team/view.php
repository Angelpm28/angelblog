<?php

if( empty( $mates ) ) return;

echo '<ul class="thumbnails">';
    foreach( $mates as $mate ) {
        
        $socials = '';
        if( !empty( $mate['socials'] ) ) {
            $socials .= '<div class="social-links">';
            foreach( $mate['socials'] as $item ) {
                $socials .= '<a href="' . $item['link'] . '"><span class="sosa">&#x' . $item['network'] . ';</span></a>';
            }
            $socials .= '</div>';
        }
        
        echo '
        <li class="span3">
            <div class="thumbnail hover about-profile">
                <img src="' . $mate['picture'] . '" alt="Pic" class="img-circle" />
                <h3>' . $mate['fname'] . ' <span>' . $mate['lname'] . '</span></h3>
                <h5>' . $mate['designation'] . '</h5>
                <p>' . $mate['content'] . '</p>
                ' . $socials . '
            </div>
        </li>';
    }
echo '</ul>';
?>