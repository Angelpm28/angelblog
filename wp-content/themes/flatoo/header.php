<?php
/*
 * Core Spyropress header template
 *
 * Customise this in your child theme by:
 * - Using hooks and your own functions
 * - Using the 'header-content' template part
 * - For example 'header-content-category.php' for category view or 'header-content.php' (fallback if location specific file not available)
 * - Copying this file to your child theme and customising - it will over-ride this file
 *
 * @package Spyropress
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie ie6 no-js" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 no-js" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 no-js" lang="en"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 no-js" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->

<head>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> data-sticky="<?php echo get_setting('sticky'); ?>">
<?php spyropress_wrapper(); ?>
    <?php spyropress_before_header(); ?>
    <!-- header -->
     <header id="header">
     <?php
        spyropress_before_header_content();
        $options = get_post_meta( get_the_ID(), '_page_options', true );
        spyropress_before_header_content();
        
        if( isset( $options['top_header'] ) && 'breadcrum' == $options['top_header'] ){
           get_template_part( 'templates/blog', 'top' ); 
        }else{
           $version = isset( $_GET['header'] ) ? $_GET['header'] :  get_setting( 'header_style', 'v1' ); 
           get_template_part( 'templates/header/header', $version ); 
        }     
        spyropress_after_header_content();
     ?>
     </header>
     <!-- /header -->
    <?php spyropress_after_header(); ?>