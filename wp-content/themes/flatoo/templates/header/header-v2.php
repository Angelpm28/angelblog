<div class="home">

<?php if( $images = get_setting_array( 'slides' ) ) : ?>

<!--banner start-->

<div class="banner row" id="banner">

      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 noPadd" style="height:100%">

        <!--background slide show start-->

        <ul class="cb-slideshow slides">

            <?php

                $delay = 15; 

                $counter = 1;

                foreach( $images as $image ){

                    if( $counter == 1 ):

                        $style = 'background-image: url('. $image['slide'] .')';

                        $counter++;

                    else:

                        $style = 'background-image: url('. $image['slide'] .');

                                	 -webkit-animation-delay: '. $delay .'s;

                                	 -moz-animation-delay: '. $delay .'s;

                                	 -o-animation-delay: '. $delay .'s;

                                	 -ms-animation-delay: '. $delay .'s;

                                	 animation-delay: '. $delay .'s;';

                        $delay +=15;

                    endif;

                    echo '<li><span style="'. $style .'"></span></li>';       

                    

                }

                                 

            ?>

        </ul>

        <!--background slide show end-->

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