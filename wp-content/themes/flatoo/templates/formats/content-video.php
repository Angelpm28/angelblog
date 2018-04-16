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
    <?php
        $video = get_post_meta( get_the_ID(), '_format_video_embed', true );
        echo wp_oembed_get( $video );
    ?>
    <?php is_single() ? the_content() : spyropress_the_content(); ?>
</div>      
<?php                
    spyropress_after_post_content();
    spyropress_after_post();
?>