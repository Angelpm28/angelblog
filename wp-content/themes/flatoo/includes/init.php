<?php

/**
 * Init Theme Related Settings
 */

/** Internal Settings **/
require_once 'version.php';

/**
 * Required and Recommended Plugins
 */
function spyropress_register_plugins() {

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(

        // Wordpress SEO
        array(
            'name'      => 'WordPress SEO by Yoast',
            'slug'      => 'wordpress-seo',
            'required'  => false,
        ),

        // Contact Form 7
        array(
            'name'      => 'Contact Form 7',
            'slug'      => 'contact-form-7',
            'required'  => false,
        ),
        
        // Breadcrumb
        array(
            'name'      => 'Breadcrumb NavXT',
            'slug'      => 'breadcrumb-navxt',
            'required'  => true,
            'source'    => get_template_directory() . '/includes/plugins/breadcrumb-navxt.zip'
        ),
        
        array(
            'name' => 'Post Format UI',
            'required' => true,
            'slug' => 'wp-post-formats-develop',
            'source' => include_path() . 'plugins/wp-post-formats-develop.zip'
        ),
        
        array(
            'name' => 'Envato Toolkit Master',
            'required' => false,
            'slug' => 'envato-wordpress-toolkit-master',
            'source' => include_path() . 'plugins/envato-wordpress-toolkit-master.zip'
        )
    );

     tgmpa( $plugins, array(
        'parent_slug' => 'spyropress'
    ) );
}
add_action( 'tgmpa_register', 'spyropress_register_plugins' );

/**
 * Add modules and tempaltes to SpyroBuilder
 */
function spyropress_register_builder_modules( $modules ) {

    $path = dirname(__FILE__);

    $modules[] = 'modules/about-me/about-me.php';
    $modules[] = 'modules/heading/heading.php';
    $modules[] = 'modules/skills/skills.php';
    $modules[] = 'modules/experience/experience.php';
    $modules[] = 'modules/contact-info/contact.php';
    $modules[] = 'modules/gmap/gmap.php';

    return $modules;
}
add_filter( 'builder_include_modules', 'spyropress_register_builder_modules' );

/**
 * Define the row wrapper html
 */
function spyropress_row_wrapper( $row_ID, $row ) {
    
    // CssClass
    $section_class = array();
    if( isset( $row['options']['custom_container_class'] ) && !empty( $row['options']['custom_container_class'] ) )
        $section_class[] = $row['options']['custom_container_class'];
    if( isset( $row['options']['skin'] ) && !empty( $row['options']['skin'] ) )
        $section_class[] = $row['options']['skin'];

    $row_html = sprintf( '
        <section id="%1$s" class="%2$s">
            <div class="%3$s">
                %4$s
            </div>
        </section>', $row_ID, spyropress_clean_cssclass( $section_class ), get_row_class( true ), builder_render_frontend_columns( $row['columns'] )
    );

    return $row_html;
}
add_filter( 'spyropress_builder_row_wrapper', 'spyropress_row_wrapper', 10, 2 );

/**
 * Include Widgets
 */
function spyropress_register_widgets( $widgets ) {
    
    $path = dirname(__FILE__) . '/widgets/';

    $custom = array(
       //$path . 'text/text.php',
       //$path . 'photostream/photostream.php',
       $path . 'recent-comments/recent-comments.php',
       $path . 'recent-posts/recent-posts.php'
    );

    return array_merge( $widgets, $custom );
}
add_filter( 'spyropress_register_widgets', 'spyropress_register_widgets' );

/**
 * Unregister Widgets
 */
function spyropress_unregister_widgets( $widgets ) {
    
    $custom = array(
        //'WP_Widget_Archives',
        //'WP_Widget_Calendar',
        //'WP_Widget_Categories',
        //'WP_Widget_Recent_Comments',
        //'WP_Nav_Menu_Widget',
        //'WP_Widget_Links',
        //'WP_Widget_Meta',
        //'WP_Widget_Pages',
        //'WP_Widget_Recent_Posts',
        //'WP_Widget_RSS',
        //'WP_Widget_Search',
        //'WP_Widget_Tag_Cloud',
        //'WP_Widget_Text'
    );

    return array_merge( $widgets, $custom );
}
add_filter( 'spyropress_unregister_widgets', 'spyropress_unregister_widgets' );

/**
 * Comment Callback
 */
if( !function_exists( 'spyropress_comment' ) ) :
function spyropress_comment( $comment, $args, $depth ) {
    $translate['comment-reply'] = get_setting( 'translate' ) ? get_setting( 'comment-reply', 'Reply' ) : __( 'Reply', 'spyropress' );
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'spyropress' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'spyropress' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
	?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
    <!-- avatar -->
	<div class="comment-avatar">
		<?php
            $avatar_size = 60;
            echo wp_kses( get_avatar( $comment, $avatar_size ), array( 'img' => array( 'src' => array(), 'alt' => array(), 'height' => array(), 'width' => array() ) ) );
        ?>
	</div>

	<!-- comment content -->
	<div class="comment-body">
		
		<!-- author and date -->
		<div class="comment-meta">
			<cite><?php comment_author_link(); ?></cite>
			<?php printf( __( '<span>%1$s at %2$s</span>', 'spyropress' ), get_comment_date(), get_comment_time() ) ?>
		</div>
	
		<?php if ( $comment->comment_approved == '0' ) { ?>
            <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'spyropress' ); ?></em><br />
        <?php
            }
            comment_text();
        ?>
		<?php
            echo str_replace( 'comment-reply-link', 'button-dark reply', get_comment_reply_link( array_merge( $args, array(
                'depth' => $depth,
                'reply_text' => $translate['comment-reply'],
                'max_depth' => $args['max_depth'],
            ) ) ) );
        ?>		
	</div>
	<?php
			break;
	endswitch;
}
endif;

/**
 * Pagination Defaults
 */
function spyropress_pagination_defaults( $defaults = array() ) {
    $defaults['container'] = 'div';
    $defaults['style'] = 'simple';
    $defaults['container_class'] = 'pagination';
    $defaults['options']['pages_text'] = '';
    
    return $defaults;
}
add_filter( 'spyropress_pagination_defaults', 'spyropress_pagination_defaults' );

/**
 * oEmbed Modifier
 */
function oembed_modifier( $html ) {
    
    $html = preg_replace( '/(width|height|frameborder)="\d*"\s/', "", $html );
    
    if( is_str_contain( 'video-container', $html ) ) return $html;
    
    return '<div class="video-container">' . $html . '</div>';
}
add_filter( 'embed_oembed_html', 'oembed_modifier', 10 );
add_filter( 'oembed_result', 'oembed_modifier', 10 );