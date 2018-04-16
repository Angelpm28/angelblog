<?php
//check
if ( empty( $experiences ) )return;

    
echo $before_widget;

    foreach( $experiences as $experience ){
        
        echo '<div class="row workDetails">';
            if( $experience['date'] )
                echo '<div class="col-xs-12 col-sm-3 col-md-2 col-lg-2">
                    	<div class="workYear">'. $experience['date'] .'</div>
                     </div>';
        	
            echo '<div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 rightArea">
                    <div class="arrowpart"></div>
                    <div class="exCon">';
                        if( $experience['title'] )echo '<h4>'. $experience['title']  .'</h4>';
                        if( $experience['sub_title'] )echo '<h5>'. $experience['sub_title']  .'</h5>';
        	            if( $experience['content'] )echo '<p>'. $experience['content'] .'</p>';
            
                    echo '</div>';
            echo '</div>';
        echo '</div>';
    }

echo $after_widget;
?>