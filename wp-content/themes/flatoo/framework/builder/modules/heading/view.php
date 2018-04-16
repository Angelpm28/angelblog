<?php  
echo $before_widget;
   $class = ( isset( $color ) )? $color : 'heading-white';
   echo '<div class="'. $class .'">';
     if( $heading ) printf( '<%1$s class="title">%2$s</%1$s>',$html_tag, $heading );
     if( $sub_heading ) echo '<p>'. $sub_heading .'</p>';          
   echo '</div>';
       
echo $after_widget;
?>