<?php 
    get_header( 'blog' ); 
    spyropress_before_main_container(); 
?>

    <section id="blog" class="white-background">
        <div class="<?php get_row_class(); ?>">
            <div class="col-md-8" id="posts">
                <?php
                    if( have_posts() ):
                        spyropress_before_loop();
                        while( have_posts() ) {
                            the_post();
                            
                            get_template_part( 'templates/formats/content',get_post_format() );
                            
                        }
                        spyropress_after_loop();
                        wp_pagenavi();
                    else:
                        echo '<h5>Sorry, no posts matched your criteria.</h5>';
                    endif;
                ?>
                
            </div>
            <aside class="col-md-4 sidebar">
                <?php dynamic_sidebar( 'primary' ); ?>
            </aside>
        </div>
    </section>
    
<?php 
    spyropress_after_main_container();
    get_footer(); 
?>
