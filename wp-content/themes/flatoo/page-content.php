<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php
        spyropress_before_post_content();
        spyropress_the_content();
        wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'spyropress' ), 'after' => '</div>' ) );
        spyropress_after_post_content();
    ?>
</div>