<?php

if( empty( $number ) ) return;

echo $before_widget;
if ( $title )
    echo $before_title . $title . $after_title;
    
    $comments = get_comments( apply_filters( 'widget_comments_args', array( 'number' => $number, 'status' => 'approve', 'post_status' => 'publish' ) ) );
	if ( $comments ) {
	   
       echo '<ul>';
       
            foreach ( (array) $comments as $comment) {
                
                echo'<li>' . get_avatar( $comment, 54 ) . sprintf(_x('%2$s <span><em>by</em> %1$s</span>', 'widgets'), get_comment_author(), '<a href="' . esc_url( get_comment_link($comment->comment_ID) ) . '">' . get_the_title($comment->comment_post_ID) . '</a>') . '<div class="clearfix"></div></li>';
                
            }
            
       echo '</ul>';
	}
    
    echo $after_widget;	
?>