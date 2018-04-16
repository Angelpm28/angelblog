<?php
    spyropress_before_post();
    spyropress_before_post_content();
?>
<div class="post <?php if( is_sticky() )echo "sticky"; ?>">
    <h2 class="no-bottom-margin"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <hr class="fancy-hr" />
    <div class="post-meta">
        <div class="post-meta-date"><i class="fa fa-clock-o"></i> <?php echo get_the_date(); ?> </div>
        <div class="post-meta-category"><i class="fa fa-folder-open"></i> <?php the_category( ', ') ?></div>
        <?php the_tags( '<div class="post-meta-tags"><i class="fa fa-tags"></i> ', ', ', '</div>' ); ?>
        <div class="post-meta-comments"><i class="fa fa-comment"></i><?php comments_popup_link( '0 Comments' ); ?></div>
    </div>
    <div id="main-slider" class="flexslider">
      <ul class="slides">
          <?php
            $attachments = get_children( array(
                'post_parent'       => get_the_ID(),
                'post_status'       => 'inherit',
                'post_type'         => 'attachment',
                'post_mime_type'    => 'image',
                'orderby'           => 'date',
                'order'             => 'ASC'
            ) );
            
                if ( empty( $attachments ) ) return '';
                $remaining = array_splice( $attachments, 2 );
            
                foreach( $attachments as $attachment ) {
                    $id = $attachment->ID;
                    //image arrgument.
                    $arg = array(
                        'attachment' => $id,
                        'class' => 'img-responsive',
                        'echo' => false,
                        'type' => 'url',
                    );
                    
                    echo '<li>' . get_image( $arg ) . '</li>';
                    
                 } 
                 if( !empty( $remaining ) ) {
            
                    foreach( $remaining as $attachment ) {
                        $id = $attachment->ID;
                        $image = get_image( array(
                            'attachment' => $id,
                            'echo' => false,
                            'width' => 999,
                            'responsive' => true,
                            'link_class' => 'fancybox-media'
                        ));
                        
                        echo '<li>' . get_image( $arg ) . '</li>';
                    
                }
             } 
          ?>
       
      </ul>
    </div>
    <?php is_single() ? the_content() : spyropress_the_content(); ?>
</div>      
<?php                
    spyropress_after_post_content();
    spyropress_after_post();
?>