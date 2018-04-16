<?php $image = get_setting_array( 'image' );



    if( isset( $image ) && !empty(  $image )):

        

        $style = '';

        $value = $image;

        $img = '';

        $bg = array();



        if ( isset( $value['background-color'] ) )

            $bg[] = $value['background-color'];



        if ( isset( $value['background-pattern'] ) )

            $img = $value['background-pattern'];

        elseif ( isset( $value['background-image'] ) )

            $img = $value['background-image'];

        if ( $img )

            $bg[] = 'url(\'' . $img . '\')';



        if ( isset( $value['background-repeat'] ) )

            $bg[] = $value['background-repeat'];



        if ( isset( $value['background-attachment'] ) )

            $bg[] = $value['background-attachment'];



        if ( isset( $value['background-position'] ) )

            $bg[] = $value['background-position'];



        $style .= ( !empty( $bg ) ) ? ' background: ' . join( ' ', $bg ) . ';' : '';

        $style .= ' background-size: 100% auto;';

        $style .= ' width: 100%; height: 100%';

        

        

        if( !empty( $style ) )

            $style = 'style="' . $style . '"';



?>
<div id="home">
    <!--banner start-->

    <div class="banner row" id="banner">

          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 noPadd" style="height:100%">

            <!--background slide show start-->

            <div class="bannerPart"> <div <?php echo $style; ?>></div> </div>

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