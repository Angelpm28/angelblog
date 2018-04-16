<?php
/**
 * Theme Options
 *
 * @author 		SpyroSol
 * @category 	Admin
 * @package 	Spyropress
 */

global $spyropress_theme_settings;

$spyropress_theme_settings['general'] = array(

	array(
        'label' => __( 'General Settings', 'spyropress' ),
        'type' => 'heading',
        'slug' => 'generalsettings',
        'icon' => 'module-icon-general'
    ),

    array(
		'label' => __( 'Custom Logo', 'spyropress' ),
        'desc' => __( 'Upload a logo for your site or specify an image URL directly.', 'spyropress' ),
		'id' => 'logo',
        'type' => 'upload'
	),

    array(
		'label' => __( 'Custom Favicon', 'spyropress' ),
        'desc' => __( 'Upload a favicon for your site or specify an icon URL directly.<br/>Accepted formats: ico, png, gif<br/>Dimension: 16px x 16px.', 'spyropress' ),
		'id' => 'custom_favicon',
        'type' => 'upload'
	),

    array(
		'label' => __( 'Apple Touch Icon (small)', 'spyropress' ),
        'desc' => __( 'Upload apple favicon.<br/>Accepted formats: png<br/>Dimension: 57px x 57px.', 'spyropress' ),
		'id' => 'apple_small',
        'type' => 'upload'
	),

    array(
		'label' => __( 'Apple Touch Icon (medium)', 'spyropress' ),
        'desc' => __( 'Upload apple favicon.<br/>Accepted formats: png<br/>Dimension: 72px x 72px.', 'spyropress' ),
		'id' => 'apple_medium',
        'type' => 'upload'
	),

    array(
		'label' => __( 'Apple Touch Icon (large)', 'spyropress' ),
        'desc' => __( 'Upload apple favicon.<br/>Accepted formats: png<br/>Dimension: 114px x 114px.', 'spyropress' ),
		'id' => 'apple_large',
        'type' => 'upload'
	),

    array(
        'label' => __( 'Tracking Code', 'spyropress' ),
        'type' => 'sub_heading',
        'desc' => __( 'Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.','spyropress' ),
    ),

    array(
        'class' => 'section-full',
		'id' => 'tracking_code',
        'type' => 'textarea'
	)

); // End General Settings

$spyropress_theme_settings['header'] = array(

    array(
        'label' => __( 'Header Customization', 'spyropress' ),
        'type' => 'heading',
        'slug' => 'header',
        'icon' => 'module-icon-layout'
    ),

    array(
        'label' => __( 'Header Styles', 'spyropress' ),
        'id' => 'header_style',
        'type' => 'radio_img',
        'class' => 'full-width enable_changer',
        'options' => array(
            'v1' => array( 'img' => assets_img() . 'framework_assets/header-v1.png' ),
            'v2' => array( 'img' => assets_img() . 'framework_assets/header-v2.png' ),
            'v3' => array( 'img' => assets_img() . 'framework_assets/header-v3.png' ),
        ),
        'std' => 'v1'
    ),
    
    array(
	'label' => __( 'Sticky Header', 'spyropress' ),
	'id' => 'sticky',
        'type' => 'checkbox',
        'options' => array(
            '1' => __( 'Sticky Enable/Disable Header.', 'spyropress' ),
        )
    ),

    array(
        'label' => __( 'Image', 'spyropress' ),
        'id' => 'grid_images',
        'class' => 'header_style v1 section-full',
        'type' => 'repeater',
        'fields' => array(
            array(
            	'id' => 'image',
            	'type' => 'upload'
            )
        )
    ),
    
    array(
        'label' => __( 'Slide Image', 'spyropress' ),
        'id' => 'slides',
        'class' => 'header_style v2 section-full',
        'type' => 'repeater',
        'fields' => array(
            array(
            	'id' => 'slide',
            	'type' => 'upload'
            )
        )
    ),
    
    array(
        'label' => __( 'Image', 'spyropress' ),
        'class' => 'header_style v3 section-full',
        'id' => 'image',
       	'type' => 'background'
    ),

    array(
        'label' => __( 'Top Bar Settings', 'spyropress' ),
        'type' => 'sub_heading'
    ),
    
    array(
		'label' => __( 'Top Bar', 'spyropress' ),
		'id' => 'top_bar',
        'type' => 'checkbox',
        'options' => array(
            '1' => __( 'Dissable Top Bar.', 'spyropress' ),
        )
	),

    array(
        'label' => __( 'Teaser Title', 'spyropress' ),
        'type' => 'text',
        'class' => 'section-full',
        'id' => 'topbar_teaser_title',
    ),
    
    array(
        'label' => __( 'Teaser', 'spyropress' ),
        'class' => 'section-full',
        'type' => 'textarea',
        'id' => 'topbar_teaser',
        'std' => 'Get in touch!',
        'rows' => 5
    ),

); // End Header


$spyropress_theme_settings['layout'] = array(

    array(
        'label' => __( 'Layout Options', 'spyropress' ),
        'type' => 'heading',
        'slug' => 'layout',
        'icon' => 'module-icon-layout'
    ),

    array(
        'label' => __( 'Theme Layout', 'spyropress' ),
        'id' => 'theme_layout',
        'type' => 'radio_img',
        'desc' => __( 'Select which layout you want for theme.', 'spyropress' ),
		'options' => array(
            'full' => array(
                'title' => __( 'Full Layout', 'spyropress' ),
                'img' => get_panel_img_path( 'layouts/full.png' )
            ),
            'fixed' => array(
                'title' => __( 'Fixed Layout', 'spyropress' ),
                'img' => get_panel_img_path( 'layouts/full.png' )
            )
		)
    ),

    array(
		'label' => __( 'Reponsive Layout', 'spyropress' ),
		'id' => 'responsive-layout',
        'type' => 'checkbox',
        'options' => array(
            '1' => __( 'Activate responsive layout.', 'spyropress' ),
        )
	),

    array(
        'label' => __( 'Custom CSS', 'spyropress' ),
        'type' => 'sub_heading'
    ),

    array(
        'id' => 'custom_css_textarea',
        'type' => 'textarea',
        'rows' => 12,
        'class' => 'section-full'
    )

); // End Layout Options


$spyropress_theme_settings['footer'] = array(

    array(
        'label' => __( 'Footer Customization', 'spyropress' ),
        'type' => 'heading',
        'slug' => 'footer',
        'icon' => 'module-icon-footer'
    ),

    array(

		'id' => 'copyright_disable',

        'type' => 'checkbox',

        'desc' => __( 'Disable footer bar.', 'spyropress' ),

        'options' => array(

            '1' => __( 'Disable footer bar', 'spyropress' ),

        )

	),
   

    array(

		'label' => __( 'Footer Social Icons', 'spyropress' ),

        'type' => 'sub_heading'

	),

    

    array(

        'id' => 'footer_social',

        'type' => 'repeater',

        'item_title' => 'network',

        'fields' => array(

            array(

            	'label' => 'URL',

            	'id' => 'ft_url',

            	'type' => 'text'

            ),

            

            array(

                'label' => 'Network',

                'id' => 'network',

                'type' => 'select',

                'options' => spyropress_get_options_social()

            )

        )

    )


); // END FOOTER

$spyropress_theme_settings['post'] = array(

    array(
        'label' => __( 'Post Options', 'spyropress' ),
        'type' => 'heading',
        'slug' => 'post',
        'icon' => 'module-icon-post'
    ),

    array(
		'label' => __( 'Excerpt Settings', 'spyropress' ),
		'type' => 'sub_heading'
	),

    array(
        'label' => __( 'Length by', 'spyropress' ),
        'id' => 'excerpt_by',
        'type' => 'select',
        'options' => array (
            '' => '',
            'words' => __( 'Words', 'spyropress' ),
            'chars' => __( 'Character', 'spyropress' ),
        ),
        'std' => 'words'
	),

    array(
		'label' => __( 'Length', 'spyropress' ),
        'desc' => __( 'Set the length of excerpt.', 'spyropress' ),
		'id' => 'excerpt_length',
        'type' => 'text',
        'std' => 30
	),

    array(
		'label' => __( 'Ellipsis', 'spyropress' ),
        'desc' => __( 'This is the description field, again good for additional info.', 'spyropress' ),
		'id' => 'excerpt_ellipsis',
        'type' => 'text',
        'std' => '&hellip;'
	),

    array(
		'label' => __( 'Before Text', 'spyropress' ),
        'desc' => __( 'This is the description field, again good for additional info.', 'spyropress' ),
		'id' => 'excerpt_before_text',
        'type' => 'text',
        'std' => '<p>'
	),

    array(
		'label' => __( 'After Text', 'spyropress' ),
        'desc' => __( 'This is the description field, again good for additional info.', 'spyropress' ),
		'id' => 'excerpt_after_text',
        'type' => 'text',
        'std' => '</p>'
	),

    array(
		'label' => __( 'Read More', 'spyropress' ),
		'id' => 'excerpt_link_to_post',
        'type' => 'checkbox',
        'options' => array(
            1 => __( 'Enable or disable Read more link.', 'spyropress' ),
        ),
        'std' => 1
	),

    array(
		'label' => __( 'Link Text', 'spyropress' ),
        'desc' => __( 'A text for Read More button.', 'spyropress' ),
		'id' => 'excerpt_link_text',
        'type' => 'text',
        'std' => __( 'Read more', 'spyropress' )
	),

    array(
		'label' => __( 'Author Box', 'spyropress' ),
        'desc' => __( 'A box to display about author on single page.', 'spyropress' ),
		'type' => 'sub_heading'
	),

    array(
        'desc' => __( 'A box to display about author.', 'spyropress' ),
		'id' => 'meta_authorbox',
        'type' => 'checkbox',
        'options' => array(
            1 => __( 'Enable author box.', 'spyropress' ),
        ),
        'std' => '1'
	),

    array(
		'label' => __( 'Author Title', 'spyropress' ),
        'desc' => __( 'Write the title.', 'spyropress' ),
		'id' => 'authorbox_title',
        'type' => 'text',
        'std' => __( 'About the Author', 'spyropress' )
	),

    array(
		'label' => __( 'Author Name Prefix', 'spyropress' ),
        'desc' => __( 'The prefix display before author name.', 'spyropress' ),
		'id' => 'authorbox_prefix',
        'type' => 'text'
	),

    array(
		'label' => __( 'Related Posts', 'spyropress' ),
        'desc' => __( 'Show related posts on single page.', 'spyropress' ),
		'type' => 'sub_heading'
	),

    array(
		'id' => 'related_enable',
        'type' => 'checkbox',
        'options' => array(
            1 => __( 'Enable related posts.', 'spyropress' ),
        ),
        'std' => '1'
	),

    array(
		'label' => __( 'Related Posts Title', 'spyropress' ),
        'desc' => __( 'Write the title.', 'spyropress' ),
		'id' => 'related_title',
        'type' => 'text',
        'std' => __( 'Related Posts', 'spyropress' )
	),

    array(
		'label' => __( 'Number Of Posts', 'spyropress' ),
        'desc' => __( 'Set the number of related post.', 'spyropress' ),
		'id' => 'related_number',
        'type' => 'range_slider',
        'max' => '20',
        'min' => '1',
        'std' => 4
	),

    array(
		'label' => __( 'Related Posts By', 'spyropress' ),
        'desc' => __( 'Choose the tag or category to show related post.', 'spyropress' ),
        'id' => 'related_by',
		'type' => 'select',
		'options' => array(
            'tags' => __( 'Tags', 'spyropress' ),
            'category' => __( 'Category', 'spyropress' )
        ),
		'std' => 'tags'
	),

    array(
		'label' => __( 'Excerpt Word Count', 'spyropress' ),
        'desc' => __( 'Set the length of word for related post.', 'spyropress' ),
		'id' => 'related_number_excerpt',
        'type' => 'range_slider',
        'max' => '80',
        'min' => '1',
        'std' => 10
	)

); // End Blog Settings

$spyropress_theme_settings['portfolio'] = array(

    array(
        'label' => __( 'Portfolio Options', 'spyropress' ),
        'type' => 'heading',
        'slug' => 'portfolio',
        'icon' => 'module-icon-post'
    ),
    
    array(
		'id' => 'portfolio-slug',
		'type' => 'text',
		'label' => __( 'Single item slug', 'spyropress' ),
		'desc' => __('<b>Important:</b> Do not use characters not allowed in links. <br /><br />Must be different from the Portfolio site title chosen above, eg. "portfolio-item". After change please go to "Settings &raquo; Permalinks" and click [Save changes] button.', 'spyropress' ),
		'std' => 'portfolio',
	),
	
	array(
		'label' => __( 'Comments', 'spyropress' ),
		'type' => 'sub_heading'
	),
	
	
	array(
		'id' => 'enable_comment',
        'type' => 'checkbox',
        'options' => array(
            1 => __( 'Enable comments.', 'spyropress' ),
        )
	),



    array(
		'label' => __( 'Related Work', 'spyropress' ),
		'type' => 'sub_heading'
	),

    array(
		'id' => 'related_portfolio_enable',
        'type' => 'checkbox',
        'options' => array(
            1 => __( 'Enable related work.', 'spyropress' ),
        )
	),
    
    array(
		'id' => 'enable_tab',
        'type' => 'checkbox',
        'options' => array(
            '1' => __( 'Enable Open New Window', 'spyropress' ),
        )
	),

    array(
		'label' => __( 'Related Title', 'spyropress' ),
        'desc' => __( 'Write the title.', 'spyropress' ),
		'id' => 'related_portfolio_title',
        'type' => 'text',
        'std' => 'Related Portfolios'
	),

    array(
		'label' => __( 'Number Of items', 'spyropress' ),
        'desc' => __( 'Set the number of related post.', 'spyropress' ),
		'id' => 'related_portfolio_number',
        'type' => 'range_slider',
        'max' => '20',
        'min' => '1',
        'std' => 4
	),

    array(
		'label' => __( 'Related Work By', 'spyropress' ),
        'desc' => __( 'Choose the tag or category to show related portfolio.', 'spyropress' ),
        'id' => 'related_portfolio_by',
		'type' => 'select',
		'options' => array(
            'portfolio_service' => __( 'Services', 'spyropress' ),
            'portfolio_category' => __( 'Category', 'spyropress' )
        ),
		'std' => 'portfolio_category'
	),
    
    array(
        'desc' => __( 'Disable single portfolio Launch Project Link button.', 'spyropress' ),
		'id' => 'lunch_project_btn',
        'type' => 'checkbox',
        'options' => array(
            1 => __( 'Disable Launch Project Link button', 'spyropress' ),
        )
	),
    
    array(
        'desc' => __( 'Enable single portfolio Launch Project Link on new window.', 'spyropress' ),
		'id' => 'lunch_portfolio_enable',
        'type' => 'checkbox',
        'options' => array(
            1 => __( 'Enable Launch Project Link on new window', 'spyropress' ),
        ),
        'std' => '1'
	),
    

); // End Blog Settings

$spyropress_theme_settings['translate'] = array(

	array(
        'label' => __( 'Translate', 'spyropress' ),
        'type' => 'heading',
        'slug' => 'translate',
        'icon' => 'module-icon-docs'
    ),

    array(
		'label' => __( 'General', 'spyropress' ),
		'type' => 'sub_heading'
	),

    array(
        'desc' => __( 'Turn it off if you want to use .mo .po files for more complex translation.', 'spyropress' ),
		'id' => 'translate',
        'type' => 'checkbox',
        'options' => array(
            1 => __( 'Enable Translate', 'spyropress' ),
        ),
        'std' => '1'
	),

    array(
		'label' => __( 'Home', 'spyropress' ),
        'desc' => __( 'Breadcrumb and Menu', 'spyropress' ),
		'id' => 'translate-home',
        'type' => 'text',
        'std' => 'Home'
	),

    array(
		'label' => __( 'Portfolio', 'spyropress' ),
        'desc' => __( 'Portfolio Archive', 'spyropress' ),
		'id' => 'portfolio-title',
        'type' => 'text',
        'std' => 'Portfolio'
	),

    array(
		'label' => __( 'Search Placeholder', 'spyropress' ),
        'desc' => __( 'Search widget', 'spyropress' ),
		'id' => 'search-placeholder',
        'type' => 'text',
        'std' => 'Search..'
	),

    array(
		'label' => __( 'Blog & Archives', 'spyropress' ),
		'type' => 'sub_heading'
	),

    array(
		'id' => 'translate-comment',
		'type' => 'text',
		'label' => __('Comment', 'spyropress'),
		'desc' => __('Text to display when there is one comment', 'spyropress'),
		'std' => 'Comment'
	),

	array(
		'id' => 'translate-comments',
		'type' => 'text',
		'label' => __('Comments', 'spyropress'),
		'desc' => __('Text to display when there are more than one comments', 'spyropress'),
		'std' => 'Comments'
	),

	array(
		'id' => 'translate-comments-off',
		'type' => 'text',
		'label' => __('Comments closed', 'spyropress'),
		'desc' => __('Text to display when comments are disabled', 'spyropress'),
		'std' => 'Comments are closed.'
	),

     array(
		'id' => 'comment-reply',
		'type' => 'text',
		'label' => __('Reply', 'spyropress'),
		'desc' => __('Text to display on comment Reply Button', 'spyropress'),
		'std' => 'Reply'
	),

    array(
		'label' => __( 'Blog', 'spyropress' ),
        'desc' => __( 'Blog', 'spyropress' ),
		'id' => 'blog-title',
        'type' => 'text',
        'std' => 'Blog'
	),

    array(
		'label' => __( 'Category', 'spyropress' ),
        'desc' => __( 'Archive', 'spyropress' ),
		'id' => 'cat-title',
        'type' => 'text',
        'std' => '<span>Category:</span> %s'
	),

    array(
		'label' => __( 'Tag', 'spyropress' ),
        'desc' => __( 'Archive', 'spyropress' ),
		'id' => 'tag-title',
        'type' => 'text',
        'std' => '<span>Tag:</span> %s'
	),

    array(
		'label' => __( 'Day', 'spyropress' ),
        'desc' => __( 'Archive', 'spyropress' ),
		'id' => 'day-title',
        'type' => 'text',
        'std' => '<span>Daily:</span> %s'
	),

    array(
		'label' => __( 'Month', 'spyropress' ),
        'desc' => __( 'Archive', 'spyropress' ),
		'id' => 'month-title',
        'type' => 'text',
        'std' => '<span>Monthly:</span> %s'
	),

    array(
		'label' => __( 'Year', 'spyropress' ),
        'desc' => __( 'Archive', 'spyropress' ),
		'id' => 'year-title',
        'type' => 'text',
        'std' => '<span>Yearly:</span> %s'
	),

    array(
		'label' => __( 'Archive', 'spyropress' ),
        'desc' => __( 'Archive', 'spyropress' ),
		'id' => 'archive-title',
        'type' => 'text',
        'std' => 'Archives'
	),

    array(
		'label' => __( 'Search', 'spyropress' ),
        'desc' => __( 'Search result page', 'spyropress' ),
		'id' => 'search-title',
        'type' => 'text',
        'std' => 'Search results: <span>%s</span>'
	),
    
    array(
		'label' => __( 'Portfolio', 'spyropress' ),
		'type' => 'sub_heading'
	),
    
    array(
		'id' => 'portfolio-title',
		'type' => 'text',
		'label' => __('Reply', 'spyropress'),
		'desc' => __('Portfolio Breadcrum title', 'spyropress'),
		'std' => 'Portfolio'
	),
    
    array(
		'id' => 'project-detail',
		'type' => 'text',
		'label' => __('Project Detail', 'spyropress'),
		'desc' => __('Project Details Text', 'spyropress'),
		'std' => 'Project Details'
	),
    
    array(
		'id' => 'Launch-project',
		'type' => 'text',
		'label' => __('Lunch Project', 'spyropress'),
		'desc' => __('Lunch Project Text', 'spyropress'),
		'std' => 'Lunch Project'
	),
    array(
		'label' => __( 'Error 404', 'spyropress' ),
		'type' => 'sub_heading'
	),

    array(
		'label' => __( 'Title', 'spyropress' ),
        'desc' => __( 'Ooops... Error 404', 'spyropress' ),
		'id' => 'error-404-title',
        'type' => 'text',
        'std' => 'Ooops... Error 404'
	),

    array(
		'label' => __( 'Subtitle', 'spyropress' ),
        'desc' => __( 'We are sorry, but the page you are looking for does not exist.', 'spyropress' ),
		'id' => 'error-404-subtitle',
        'type' => 'text',
        'std' => 'We are sorry, but the page you are looking for does not exist.'
	),

    array(
		'label' => __( 'Text', 'spyropress' ),
        'desc' => __( 'Please check entered address and try again or', 'spyropress' ),
		'id' => 'error-404-text',
        'type' => 'text',
        'std' => 'Please check entered address and try again or'
	),

    array(
		'label' => __( 'Button', 'spyropress' ),
        'desc' => __( 'Go To Homepage button', 'spyropress' ),
		'id' => 'error-404-btn',
        'type' => 'text',
        'std' => 'go to homepage'
	),

);

$spyropress_theme_settings['plugins'] = array(

	array(
        'label' => __( 'Settings', 'spyropress' ),
        'type' => 'heading',
        'slug' => 'plugins',
        'icon' => 'module-icon-general'
    ),

    array(
		'label' => __( 'Email Settings', 'spyropress' ),
		'type' => 'sub_heading'
	),

    array(
		'label' => __( 'Sender Name', 'spyropress' ),
        'desc' => __( 'For example sender name is "WordPress".', 'spyropress' ),
		'id' => 'mail_from_name',
        'type' => 'text'
	),

    array(
		'label' => __( 'Sender Email Address', 'spyropress' ),
        'desc' => __( 'For example sender email address is wordpress@yoursite.com.', 'spyropress' ),
		'id' => 'mail_from_email',
        'type' => 'text'
	),

    

    array(
		'label' => __( 'WP-Pagenavi', 'spyropress' ),
		'type' => 'toggle'
	),

    array(
		'label' => __( 'Text For Number Of Pages', 'spyropress' ),
		'type' => 'text',
        'id' => 'pagination_pages_text',
        'desc' =>   '%CURRENT_PAGE% - ' . __( 'The current page number.', 'spyropress' ) .
                    '<br />%TOTAL_PAGES% - ' . __( 'The total number of pages.', 'spyropress' ),
        'std' => __( 'Page %CURRENT_PAGE% of %TOTAL_PAGES%', 'spyropress' ),
	),

    array(
		'label' => __( 'Text For Current Page', 'spyropress' ),
		'type' => 'text',
        'id' => 'pagination_current_text',
        'desc' => '%PAGE_NUMBER% - '.__( 'The page number.', 'spyropress' ),
        'std' => '%PAGE_NUMBER%'
	),

    array(
		'label' => __( 'Text For Page', 'spyropress' ),
		'type' => 'text',
        'id' => 'pagination_page_text',
        'desc' => '%PAGE_NUMBER% - ' .__( 'The page number.', 'spyropress' ),
        'std' => '%PAGE_NUMBER%'
	),

    array(
		'label' => __( 'Text For First Page', 'spyropress' ),
		'type' => 'text',
        'id' => 'pagination_first_text',
        'desc' => '%TOTAL_PAGES% - ' .__( 'The total number of pages.', 'spyropress' ),
        'std' => '&laquo; First'
	),

    array(
		'label' => __( 'Text For Last Page', 'spyropress' ),
		'type' => 'text',
        'id' => 'pagination_last_text',
        'desc' => '%TOTAL_PAGES% - ' .__( 'The total number of pages.', 'spyropress' ),
        'std' => 'Last &raquo;'
	),

    array(
		'label' => __( 'Text For Previous Page', 'spyropress' ),
		'type' => 'text',
        'id' => 'pagination_prev_text',
        'std' => '&laquo;'
	),

    array(
		'label' => __( 'Text For Next Page', 'spyropress' ),
		'type' => 'text',
        'id' => 'pagination_next_text',
        'std' => '&raquo;'
	),

    array(
		'label' => __( 'Text For Previous &hellip;', 'spyropress' ),
		'type' => 'text',
        'id' => 'pagination_dotleft_text',
        'std' => '&hellip;'
	),

    array(
		'label' => __( 'Text For Next &hellip;', 'spyropress' ),
		'type' => 'text',
        'id' => 'pagination_dotright_text',
        'std' => '&hellip;'
    ),

    array(
        'label' => __( 'Page Navigation Text', 'spyropress' ),
        'type' => 'sub_heading',
        'desc' => __( 'Leaving a field blank will hide that part of the navigation.', 'spyropress' ),
    ),

    array(
		'label' => __( 'Always Show Page Navigation', 'spyropress' ),
		'type' => 'checkbox',
        'id' => 'pagination_always_show',
        'options' => array(
            1 => __( 'Show navigation even if there\'s only one page.', 'spyropress' ),
        )
    ),

    array(
		'label' => __( 'Number Of Pages To Show', 'spyropress' ),
		'type' => 'text',
        'id' => 'pagination_num_pages',
        'std' => 5
    ),

    array(
		'label' => __( 'Number Of Larger Page Numbers To Show', 'spyropress' ),
		'type' => 'text',
        'id' => 'pagination_num_larger_page_numbers',
        'desc' => __( 'Larger page numbers are in addition to the normal page numbers. They are useful when there are many pages of posts.', 'spyropress' ),
        'std' => 3
    ),

    array(
		'label' => __( 'Show Larger Page Numbers In Multiples Of', 'spyropress' ),
		'type' => 'text',
        'id' => 'pagination_larger_page_numbers_multiple',
        'desc' => __( 'For example, if mutiple is 5, it will show: 5, 10, 15, 20, 25', 'spyropress' ),
        'std' => 10
    ),

    array(
		'type' => 'toggle_end'
	),

); // END PLUGINS

$spyropress_theme_settings['separator'] = array(

	array ( 'type' => 'separator' )

); // END Separator

$spyropress_theme_settings['import'] = array(

	array (
        'label' => __( 'Import / Export', 'spyropress' ),
        'type' => 'heading',
        'slug' => 'import-export',
        'icon' => 'module-icon-import'
    ),
    
    array(
        'type' => 'import_dummy'
	),

    array(
        'type' => 'import'
	),

    array(
        'type' => 'export'
	),
); // END Import/Export

$spyropress_theme_settings['support'] = array(

	array (
        'label' => __( 'Support', 'spyropress' ),
        'type' => 'heading',
        'slug' => 'support',
        'icon' => 'module-icon-support'
    ),

    array(
		'id' => 'admin/docs-support.php',
        'type' => 'include'
	)

); // END Separator
?>