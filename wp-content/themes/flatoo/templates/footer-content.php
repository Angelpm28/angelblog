<?php if( get_setting('copyright_disable') )return; ?>
<div class="footer">
	<div class="container">
    	
        <?php 
            if( $footer_social =  get_setting_array( 'footer_social' ) )
                echo spyropress_footer_social_icons( $footer_social );
        ?>
        
    </div>
</div>