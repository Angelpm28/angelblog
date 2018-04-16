<?php

if( empty( $mates ) ) return;

echo '<ul class="slides thumbnails">';
    foreach( $mates as $mate ) {
        
        echo '
        <li class="span3">
          <div class="thumbnail hover"><span class="sosa bg">&#x' . $mate['icon'] . ';</span>
            <h3><span>' . $mate['heading'] . '</span> ' . $mate['sub_heading'] . '</h3>
            <h5>' . $mate['sub_title'] . '</h5>
            <p>' . $mate['content'] . '</p>
            <a href="' . $mate['btn_url'] . '" class="btn">' . $mate['btn_text'] . '</a></div>
        </li>';
    }
echo '</ul>';
?>