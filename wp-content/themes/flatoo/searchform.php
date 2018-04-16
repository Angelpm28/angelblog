<?php
$translate['search-placeholder'] = get_setting( 'translate' ) ? get_setting( 'search-placeholder', 'Search..' ) : __( 'Search..', 'spyropress' );
?>
<form role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <input type="text" name="s" class="search-field" placeholder="<?php echo $translate['search-placeholder'] ?>" value="<?php echo get_search_query(); ?>">
</form>