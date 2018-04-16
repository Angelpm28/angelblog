<div class="row aboutme">

	<div class=" col-xs-12 col-sm-12 col-md-7 col-lg-7">

        <?php



            if( $full_name ) echo '<h3>' . $full_name . '</h3>';

            

            if( $designation ) echo '<h4 class="subHeading">' . $designation . '</h4>';

            

            echo do_shortcode( wpautop( $about ) );

            if( $button )echo '<a href="'. esc_url( $link ) .'" class="bntDownload">'. $button .'</a>'

        ?>

    </div>

    <?php if( $image ) : ?>

        <div class=" col-xs-12 col-sm-12 col-md-4 col-lg-4 col-md-offset-1 col-lg-offset-1 proPic">

        	<img src="<?php echo $image; ?>" alt="" class="img-circle topmar">

        </div>

    <?php endif; ?>

    

</div>