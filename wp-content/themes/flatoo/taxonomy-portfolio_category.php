<?php 
    get_header('portfolio'); 
    spyropress_before_main_container(); 
?>

        <section id="blog" class="white-background">
            <div class="<?php get_row_class(); ?>">
                <ul class="portfolioContainer row">
                    <?php
                        if( have_posts() ):
                            spyropress_before_loop();
                            while( have_posts() ) {
                                the_post();
                                
                                $image = array(
                                    'post_id' => $post_ID,
                                    'height' => 200,
                                    'crop' => true,
                                    'responsive' => true,
                                    'echo' => false
                                );
                                $image_tag = get_image( $image );
                                
                                $image['type'] = 'src';
                                $image_url = get_image( $image );
                                
                                print '<li class="col-md-6 isotope-item">
                                            <div class="lightCon">
                                                <span class="hoverBox">
                                                	<span class="smallIcon">
                                                        <a rel="alternate" href="'. $image_url .'" title="Project ' . get_the_title( $post_ID ) . '" class="zoom lb lb_warsaw1"><i class="fa fa-search fa-2x"></i></a>
                                                        <a href="' . get_permalink( $post_ID ) . '" title="Project Link ' . get_permalink( $post_ID ) . '" target="_blank" class="linKed"><i class="fa fa-link fa-2x"></i></a>
                                                    </span>
                                                </span>
                                                <img src="'. $image_url .'" alt="" class="img-responsive" >
                                            </div>
                                    </li>';
                                
                            }
                            spyropress_after_loop();
                            wp_pagenavi();
                        else:
                            echo '<h5>Sorry, no posts matched your criteria.</h5>';
                        endif;
                    ?>
                </ul>
            </div>
        </section>

<?php 
    spyropress_after_main_container();
    get_footer(); 
?>