<?php
    $translate['translate-home'] = get_setting( 'translate' ) ? get_setting( 'translate-home', 'Home' ) : __( 'Home', 'spyropress' );
    $translate['search-title'] = get_setting( 'translate' ) ? get_setting( 'search-title', 'Search results: <span>%s</span>' ) : __( 'Search results: <span>%s</span>', 'spyropress' );
    
?>
<div class="page-top">
	<div class="container">
		<!-- Bread Crumbs -->
		<ul class="breadcrumbs">
			<li><?php _e( 'You are here:', 'spyropress' )?></li>
			<li><a href="<?php echo get_home_url(); ?>"><?php echo $translate['translate-home']; ?></a></li>
			<li><a href="#"><?php the_title(); ?></a></li>
		</ul>
		<!-- Title -->
		<h1><?php printf( $translate['search-title'], get_search_query() ); ?></h1>
	</div>
</div>