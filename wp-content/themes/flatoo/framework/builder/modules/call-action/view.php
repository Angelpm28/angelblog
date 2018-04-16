<div id="introduction">
	<div class="container">
		<div class="<?php get_row_class(); ?>">
			<div class="span9">
			<?php
                if ( !empty( $title ) ) echo '<h1>' . $title . '</h1>';
                
                if ( !empty( $sub_title ) ) echo '<p>' . $sub_title . '</p>';
            ?>
			</div>
			<div class="span3 button">
			<?php
            $url_text = ( $url_text ) ? $url_text : 'Buy Now';
            $url = ( $link_url ) ? get_permalink( $link_url ) : $url;
            if ( $url ) echo '<a href="' . $url . '" class="btn"><i class="icon-white icon-shopping-cart"></i> ' . $url_text . '</a>';
            ?>
			</div>
		</div>
	</div>
</div>