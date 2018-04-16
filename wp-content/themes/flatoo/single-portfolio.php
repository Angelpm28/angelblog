<?php 

    $translate['project-detail'] = get_setting( 'translate' ) ? get_setting( 'project-detail', 'Project Details' ) : __( 'Project Details', 'spyropress' );
    $translate['Launch-project'] = get_setting( 'translate' ) ? get_setting( 'Launch-project', 'Launch Project' ) : __( 'Launch Project', 'spyropress' );

    get_header('portfolio'); 

    spyropress_before_main_container(); 

 ?>    

     <section class="white-background portfolio">

	   <div class="<?php get_row_class(); ?>">

             <?php 

                spyropress_before_loop(); 

                  

                    while( have_posts() ) {

                        the_post();

                        spyropress_before_post();

                        

                        $data = get_post_meta( get_the_ID(), '_portfolio_details', true );

                        //project details points.

                        if( isset( $data['details'] ) && !empty( $data['details'] ) ):

                            $details_points = '';

                            foreach ( $data['details'] as $detail )

                                $details_points .= '<li>'. $detail['title'] .'</li>';

                        

                            $details_points = '<ul>'. $details_points .'</ul>';

                        endif;

                        

                        //project launch link.

                        if( isset( $data['project_url'] ) && !empty( $data['project_url'] ) )

                            $project_url = $data['project_url'];

                                        

                            if( isset($data['gallery']) && !empty ($data['gallery']) &&  $data['display'] == 'gallery' ) {

                                $ids = explode( ',', str_replace( array( '[gallery ids=', ']', '"' ), '', $data['gallery'] ) );

                                

                                if ( !empty( $ids ) ) {

                                    

                                        echo '<div id="main-slider" class="flexslider"><ul class="slides">';

                                            

                                            foreach( $ids as $id ) {

                                                

                                                $image_url = get_image( array(

                                                        'attachment' => $id,

                                                        'class' => 'img-responsive',

                                                        'echo' => false        

                                                ));

                                                

                                                echo '<li>' . $image_url . '</li>';

                                               

                                               

                                             } 

                                        echo '</ul></div>'; 

                                }

                            
                             }elseif( isset($data['video']) && !empty ($data['video']) &&  $data['display'] == 'video' ) {

                                echo wp_oembed_get( $data['video'] );

                             }elseif( has_post_thumbnail() ) {

                                echo '<div class="thumb">'. get_image( array( 'echo' => false, 'class' => 'img-responsive' ) ). '</div>';

                             }

                                  

                        ?>

                        <div class="spacer-lg"></div>

                        <div class="row">

                			<div class="col-md-9">

                				<h3><?php the_title(); ?></h3>

                				<?php the_content(); ?>

                			</div>

                			<div class="col-md-3">

                				<div class="visible-sm visible-xs spacer-lg"></div>

                                <?php if( $details_points ): ?>

                				    <h3><?php echo $translate['project-detail']; ?></h3>

                				    <div class="list">

                					   <?php echo $details_points; ?>

                				    </div>

                                <?php 
                                    endif; 
                                    if( get_setting( 'lunch_portfolio_enable' ) )$target = 'target="_blank"';
                                    
                                    if( !get_setting( 'lunch_project_btn' ) )
                                        print '<a href="'. esc_url( $project_url ). '" class="btn btn-default btn-danger" '. $target .'>'. $translate['Launch-project'] .'</a>';
                                
                                ?>

                			</div>

                		</div>

                        <hr class="fancy-hr" />

                  <?php 

                        

                        get_template_part( 'templates/related','works' ); 
                        
                        if( get_setting('enable_comment') )
                        	comments_template( '', true );   

                    }

                    spyropress_after_post(); 

                 ?>

            </div>

    </section>

</div>

<?php      

    spyropress_after_main_container(); 

    get_footer(); 

?>    
