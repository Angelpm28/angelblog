<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$l = etheme_page_config();

$layout = $l['product_layout'];

$image_class = 'col-lg-6 col-md-6 col-sm-12';
$infor_class = 'col-lg-6 col-md-6 col-sm-12';

if($layout == 'small') {
    $image_class = 'col-lg-4 col-md-5 col-sm-12';
    $infor_class = 'col-lg-8 col-md-7 col-sm-12';
}

if($layout == 'large') {
    $image_class = 'col-sm-12';
    $infor_class = 'col-lg-6 col-md-6 col-sm-12';
}

if($layout == 'xsmall') {
    $image_class = 'col-lg-9 col-md-8 col-sm-12';
    $infor_class = 'col-lg-3 col-md-4 col-sm-12';
}

if($layout == 'fixed') {
    $image_class = 'col-sm-6'; 
    $infor_class = 'col-lg-3 col-md-3 col-sm-12'; 
}

?>

<?php
	
    $class = 'tabs-'.etheme_get_option('tabs_location');
    $class .= ' single-product-'.$layout;
    $class .= ' reviews-position-'.etheme_get_option('reviews_position');
    if(etheme_get_option('ajax_addtocart')) $class .= ' ajax-cart-enable';
    if(etheme_get_option('single_product_hide_sidebar')) $class .= ' sidebar-mobile-hide';

	/**
	 * woocommerce_before_single_product hook
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }

if(!etheme_get_option('product_name_signle')) {
    $class .= ' hide-product-name';
}

if( etheme_get_option('fixed_images') && $layout != 'fixed' ) {
    $class .= ' product-fixed-images';
}
?>

<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class($class); ?>>

    <div class="row">
        <div class="<?php echo esc_attr( $l['content-class'] ); ?> product-content sidebar-position-<?php echo esc_attr( $l['sidebar'] ); ?>">
            <div class="row">
                <?php if ($layout == 'fixed'): ?>
                    <div class="col-md-3 product-summary-fixed">
                        <div class="fixed-product-block">
                            <div class="fixed-content">
                                <?php if(!etheme_get_option('product_name_signle')):  ?>
                                    <h4 class="title"><?php esc_html_e('Product Information', 'xstore'); ?></h4>
                                <?php endif;
                                    etheme_product_cats();
                                    woocommerce_template_single_title();
                                    woocommerce_template_single_rating();
                                    echo '<hr class="divider short">';
                                    woocommerce_template_single_excerpt();
                                    etheme_size_guide();
                                    if(etheme_get_option('share_icons')): ?>
                                        <div class="product-share">
                                            <?php echo do_shortcode('[share title="'.__('Share Social', 'xstore').'" text="'.get_the_title().'"]'); ?>
                                        </div>
                                    <?php endif;
                                 ?>
                             </div>
                         </div>
                    </div>
                <?php endif ?>
                <div class="<?php echo esc_attr( $image_class ); ?> product-images">
                	<?php
                		/**
                		 * woocommerce_before_single_product_summary hook
                		 *
                		 * @hooked woocommerce_show_product_sale_flash - 10
                		 * @hooked woocommerce_show_product_images - 20
                		 */
                		do_action( 'woocommerce_before_single_product_summary' );
                	?>
                </div><!-- Product images/ END -->
                
                <?php 
                    if($layout == 'large') {
                        ?>
                        </div>
                        <div class="row">
                        <?php
                    } 
                ?>

                <div class="<?php echo esc_attr( $infor_class ); ?> product-information">
                    <div class="product-information-inner <?php if($layout == 'fixed') echo 'fixed-product-block' ?>">
                        <div class="fixed-content">
                            <?php if(!etheme_get_option('product_name_signle') && $layout != 'fixed'):  ?>
                                <h4 class="title"><?php esc_html_e('Product Information', 'xstore'); ?></h4>
                            <?php endif; ?>
                        
                    		<?php
                    			/**
                    			 * woocommerce_single_product_summary hook
                    			 *
                    			 * @hooked woocommerce_template_single_title - 5 
                    			 * @hooked woocommerce_template_single_rating - 10
                    			 * @hooked woocommerce_template_single_price - 10
                    			 * @hooked woocommerce_template_single_excerpt - 20
                    			 * @hooked woocommerce_template_single_add_to_cart - 30
                    			 * @hooked woocommerce_template_single_meta - 40
                    			 * @hooked woocommerce_template_single_sharing - 50
                    			 */
                    			do_action( 'woocommerce_single_product_summary' );
                    		?>
            	           
                    		<?php if(etheme_get_option('share_icons') && $layout != 'fixed'): ?>
                                <div class="product-share">
                                    <?php echo do_shortcode('[share title="'.__('Share Social', 'xstore').'" text="'.get_the_title().'"]'); ?>
                                </div>
                            <?php endif; ?>

                            <?php if(etheme_get_option('product_posts_links')): ?>
                                <?php etheme_project_links(array()); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div><!-- Product information/ END -->
                <?php 
                    if($layout == 'large') {
                        ?>
                            <div class="<?php echo esc_attr( $infor_class ); ?>">
                                <?php do_action( 'woocommerce_after_single_product_summary' ); ?>
                            </div>
                        <?php
                    } 
                ?>
            </div>
            
        </div> <!-- CONTENT/ END -->
        

		<?php if($l['sidebar'] != '' && $l['sidebar'] != 'without' && $l['sidebar'] != 'no_sidebar'): ?>
            <div class="<?php echo esc_attr( $l['sidebar-class'] ); ?> single-product-sidebar sidebar-<?php echo esc_attr( $l['sidebar'] ); ?>">
				<?php etheme_product_brand_image(); ?>
				<?php if(etheme_get_option('upsell_location') == 'sidebar') woocommerce_upsell_display(); ?>
				<?php dynamic_sidebar('single-sidebar'); ?>
			</div>
		<?php endif; ?>
    </div>
            
    <?php
        /**
         * woocommerce_after_single_product_summary hook
         *
         * @hooked woocommerce_output_product_data_tabs - 10
         * @hooked woocommerce_output_related_products - 20 [REMOVED in woo.php]
         */
         if(etheme_get_option('tabs_location') == 'after_content' && $layout != 'large') {
             do_action( 'woocommerce_after_single_product_summary' );
         }
    ?>
    
    <?php if(etheme_get_option('upsell_location') == 'after_content') woocommerce_upsell_display(); ?>
    <?php
		if(etheme_get_custom_field('additional_block') != '') {
			echo '<div class="product-extra-content">';
				etheme_show_block(etheme_get_custom_field('additional_block'));
			echo '</div>';
		}     
    ?>
    <?php if(etheme_get_option('show_related')) woocommerce_output_related_products(); ?>


	<meta itemprop="url" content="<?php the_permalink(); ?>" />

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
