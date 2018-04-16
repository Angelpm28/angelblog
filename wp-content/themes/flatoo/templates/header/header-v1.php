<div id="home">

<?php if( $images = get_setting_array( 'grid_images' ) ) : ?>

<!--banner start-->

<div class="banner row" id="banner">

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 noPadd">

        <!--slider start-->

        <div id="ri-grid" class="ri-grid ri-grid-size-2"> <img class="ri-loading-image" src="<?php assets_img_e(); ?>loading.gif" alt="image not found"/>

            <ul class="cb-slideshow">

                <?php 

                    foreach( $images as $image )

                        echo '<li><a href="#"><img src="'. $image['image'] .'" alt="image not found"/></a></li>';  

                ?>

            </ul>

        </div>

        <!--slider end-->

    </div>

</div>

<!--banner end-->

<?php 

   

    if( !get_setting( 'top_bar') ):

?>



<div class="bannerText container">

    <?php 

        if( $title  = get_setting( 'topbar_teaser_title' ) )

            echo '<h1>'. $title .'</h1>';

            

        if( $teaser = get_setting( 'topbar_teaser' ) ) 

            echo '<h2>'. $teaser .'</h2>';   

    ?>	

</div>

<?php endif; 

 endif; 
?>



<!--menu start-->

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

<!--menu end-->
</div>