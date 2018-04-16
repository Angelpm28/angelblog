<?php

    $translate['translate-home'] = get_setting( 'translate' ) ? get_setting( 'translate-home', 'Home' ) : __( 'Home', 'spyropress' );

    $translate['blog-title'] = get_setting( 'translate' ) ? get_setting( 'blog-title', 'Blog' ) : __( 'Blog', 'spyropress' );

?>
<div class="menu">
    <div class="navbar-wrapper">
        <div class="container">
          <div class="navwrapper">
            <div class="navbar navbar-inverse navbar-static-top">
              <div class="container">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="#">Menu</a>
                </div>
                <?php
                    $args = array(
                        'container' => 'div',
                        'container_class' => 'navbar-collapse collapse',
                        'menu_class' => 'nav navbar-nav',
                        'menu_id' => '',
                        'echo' => false
                    );
                    $url = is_front_page() ? '#' : home_url('/#'); 
                    $menu = spyropress_get_nav_menu( $args  , 'primary' );
                    echo str_replace( '#HOME_URL#', $url, $menu );
                ?>  
              </div>
            </div> 
          </div><!-- End Navbar -->
      </div>
    </div>
</div>
<div class="blogcontent  " style="text-align: center;">
    <div class="container">
      <h1><?php echo $translate['blog-title']; ?></h1>
      <ol class="breadcrumb"> 
        <?php 
        if( function_exists( 'bcn_display_list' ) ) {
            $breadcrumbs = bcn_display_list(true); 
            echo $breadcrumbs = str_replace( 'current_item' , 'current-page' ,   $breadcrumbs );
        }
        ?> 
        </ol> 
    </div>
</div>