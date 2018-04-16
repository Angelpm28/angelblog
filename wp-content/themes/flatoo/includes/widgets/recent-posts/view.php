<?php

if( empty( $number ) ) return;
    
    $r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) );
       
       if ($r->have_posts()) :
       
      $show_date = ( isset( $setting ) && !empty( $setting ) )? true : false;
?>    
    	<?php echo $before_widget; ?>

		<?php if ( $title ) echo $before_title . $title . $after_title; ?>

		<ul>
        
		<?php while ( $r->have_posts() ) : $r->the_post(); ?>
			<li>
                <?php get_image( 'width=54&height=54&crop=1' ); ?>
                <a href="<?php the_permalink() ?>" title="<?php echo esc_attr( get_the_title() ? get_the_title() : get_the_ID() ); ?>"><?php if ( get_the_title() ) the_title(); else the_ID(); ?></a>
                <?php if ( $show_date ) : ?>
                    <span class="post-date"><?php echo get_the_date(); ?></span>
                <?php endif; ?>
                <div class="clearfix"></div>
			</li>
		<?php endwhile; ?>
        
		</ul>

		<?php echo str_replace( '<hr />', '', $after_widget ); ?>

<?php

		// Reset the global $the_post as this query will have stomped on it

		wp_reset_postdata();



		endif;  
?>  
