<?php

if( !get_setting( 'related_portfolio_enable', false ) ) return;

$limit = get_setting( 'related_portfolio_number', 4 );
$related_by = get_setting( 'related_portfolio_by' );

global $post;
$args = array(
    'post__not_in'      => array( $post->ID ),
    'posts_per_page'    => $limit,
    'ignore_sticky_posts'  => 1,
    'post_type'         => 'portfolio'
);

// by tags
if( 'portfolio_service' == $related_by ) {
    $tags = wp_get_post_terms( $post->ID, 'portfolio_service' );
    if ( $tags ) {
        $tag_ids = array();
        foreach( $tags as $individual_tag )
            $tag_ids[] = $individual_tag->term_id;
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'portfolio_service',
                'field' => 'id',
                'terms' => $tag_ids
            )
        );
    }
}
// by category
elseif( 'portfolio_category' == $related_by ) {
    $categories = wp_get_post_terms( $post->ID, 'portfolio_category' );
    if ( $categories ) {
        $category_ids = array();
        foreach( $categories as $individual_category )
            $category_ids[] = $individual_category->term_id;
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'portfolio_category',
                'field' => 'id',
                'terms' => $category_ids
            )
        );
    }
}

$my_query = new wp_query( $args );
if( $my_query->have_posts() ) {
?>
<div class="work-items">
    <h3><?php echo get_setting( 'related_portfolio_title' , 'Related Portfolios' ) ?></h3>
    <hr class="fancy-hr" />
    <?php
        while( $my_query->have_posts() ) {
            $my_query->the_post();
        
            $image = array(
                'echo' => false,
                'width' => 255,
                'height' => 236,
                'responsive' => true,
                'crop' => true,
                'class' => 'img-responsive'
            );
            $image_tag = get_image( $image );
            $image_url = get_image( array( 'width' => 9999, 'type' => 'src', 'echo' => false ) );
            
     ?>
            <div class="col-md-3 work-item">
                <div class="lightCon">
                    <span class="hoverBox">
                    	<span class="smallIcon">
                            <a rel="lightbox-demo" href="<?php echo $image_url ?>" title="Project <?php echo get_the_title( $post_ID ); ?>" class="zoom lb lb_warsaw1"><i class="fa fa-search fa-2x"></i></a>
                            <a href="<?php echo get_permalink(); ?>" title="Project Link <?php echo get_permalink(); ?>" <?php if( get_setting( 'enable_tab' ) )echo'target="_blank"';?> class="linKed"><i class="fa fa-link fa-2x"></i></i></a>
                        </span>
                    </span>
                    <img src="<?php echo $image_url ?>" alt="" class="img-responsive" >
                </div>
            </div>
       
    <?php
        }
    ?>
    
    </div>

<?php
}
wp_reset_query();
?>
