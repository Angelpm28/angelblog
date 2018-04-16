<?php  if ( ! defined('ETHEME_FW')) exit('No direct script access allowed');

    /**
     * ReduxFramework Theme Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        global $et_options;

        $et_options = array(
            'main_layout' => 'wide',
            'header_type' => 'xstore',
            'header_full_width' => '1',
            'header_color' => 'white',
            'header_overlap' => '1',
            'top_bar' => '1',
            'top_bar_color' => 'white',
            'logo_width' => '200',
            'top_links' => '1',
            'search_form' => '1',
            'breadcrumb_type' => 'default',
            'breadcrumb_size' => 'small',
            'breadcrumb_effect' => 'none',
            'breadcrumb_bg' =>
                array (
                    'background-color' => '#d64444',
                ),
            'breadcrumb_color' => 'white',
            'activecol' => '#d64444',
            'blog_hover' => 'default',
            'blog_byline' => '1',
            'read_more' => '1',
            'views_counter' => '1',
            'blog_sidebar' => 'right',
            'excerpt_length' => '25',
            'post_template' => 'default',
            'blog_featured_image' => '1',
        );
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "et_options";

    if(!function_exists('etheme_redux_header_types')) {
        function etheme_redux_header_types($opt_name) {

            Redux::setSection( $opt_name, array(
                'title' => 'Header Type',
                'id' => 'general-header',
                'icon' => 'el-icon-cog',
                'subsection' => true,
                'fields' => array (
                    array (
                        'id' => 'header_type',
                        'type' => 'image_select',
                        'title' => 'Header Type',
                        'options' => array (
                            'xstore' => array (
                                'title' => 'Variant xstore',
                                'img' => ETHEME_CODE_IMAGES . 'headers/xstore.jpg',
                            ),
                            'xstore2' => array (
                                'title' => 'Variant xstore2',
                                'img' => ETHEME_CODE_IMAGES . 'headers/xstore2.jpg',
                            ),
                            'center' => array (
                                'title' => 'Variant center',
                                'img' => ETHEME_CODE_IMAGES . 'headers/center.jpg',
                            ),
                            'standard' => array (
                                'title' => 'Variant standard',
                                'img' => ETHEME_CODE_IMAGES . 'headers/standard.jpg',
                            ),
                            'center2' => array (
                                'title' => 'Variant center2',
                                'img' => ETHEME_CODE_IMAGES . 'headers/center2.jpg',
                            ),
                        ),
                        'default' => 'xstore'
                    ),
                ),
            ) );
        }
    }

    if(!function_exists('etheme_redux_theme_options')) {
        function etheme_redux_theme_options($opt_name) {
            Redux::setSection( $opt_name, array(
                'title' => 'Content',
                'id' => 'style-content',
                'icon' => 'el-icon-picture',
                'subsection' => true,
                'fields' => array (
                    array (
                        'id' => 'dark_styles',
                        'type' => 'switch',
                        'title' => 'Dark version',
                    ),
                    array (
                        'id' => 'activecol',
                        'type' => 'color',
                        'title' => 'Main Color',
                        'default' => '#d64444'
                    ),
                    array (
                        'id' => 'background_img',
                        'type' => 'background',
                        'output' => 'body',
                        'title' => 'Site Background',
                    ),

                    array (
                        'id' => 'container_bg',
                        'type' => 'color_rgba',
                        'title' => 'Container Background Color',
                        'output' => array(
                            'background-color' =>'.select2-results, .select2-drop, .select2-container .select2-choice, .form-control, .page-wrapper, .cart-popup-container, select, .quantity input[type="number"], .emodal, input[type="text"], input[type="email"], input[type="password"], input[type="tel"], textarea, #searchModal, .quick-view-popup, #etheme-popup'
                        )
                    ),
                ),
            ));

            
            Redux::setSection( $opt_name, array(
                'title' => 'Navigation',
                'id' => 'style-nav',
                'icon' => 'el-icon-picture',
                'subsection' => true,
                'fields' => array (
                    array (
                        'id' => 'menu_align',
                        'type' => 'select',
                        'title' => 'Menu links align',
                        'options' => array (
                            'center' => 'Center',
                            'left' => 'Left',
                            'right' => 'Right',
                        ),
                        'default' => 'center'
                    ),
                ),
            ));


            Redux::setSection( $opt_name, array(
                'title' => 'Footer',
                'id' => 'style-footer',
                'subsection' => true,
                'icon' => 'el-icon-cog',
                'fields' => array (
                    array (
                        'id' => 'footer_color',
                        'type' => 'select',
                        'title' => 'Footer text color scheme',
                        'options' => array (
                            'light' => 'Light',
                            'dark' => 'Dark',
                        ),
                        'default' => 'light'
                    ),
                    array (
                        'id' => 'footer-links',
                        'type' => 'link_color',
                        'title' => 'Footer Links',
                        'output' => array('.footer a, .vc_wp_posts .widget_recent_entries li a')
                    ),
                    array (
                        'id' => 'footer_bg_color',
                        'type' => 'background',
                        'title' => 'Footer Background Color',
                        'output' => array(
                            'background' => 'footer.footer'
                        )
                    ),
                ),
            ));

            Redux::setSection( $opt_name, array(
                'title' => 'Copyrights',
                'id' => 'style-copyrights',
                'subsection' => true,
                'icon' => 'el-icon-cog',
                'fields' => array (
                    array (
                        'id' => 'copyrights_color',
                        'type' => 'select',
                        'title' => 'Copyrights text color scheme',
                        'options' => array (
                            'light' => 'Light',
                            'dark' => 'Dark',
                        ),
                        'default' => 'light'
                    ),
                    array (
                        'id' => 'copyrights-links',
                        'type' => 'link_color',
                        'title' => 'Copyrights Links',
                        'output' => array('.footer-bottom a')
                    ),
                    array (
                        'id' => 'copyrights_bg_color',
                        'type' => 'background',
                        'title' => 'Copyrights Background Color',
                        'output' => array(
                            'background' => '.footer-bottom'
                        )
                    ),
                ),
            ));
            
            Redux::setSection( $opt_name, array(
                'title' => 'Custom CSS',
                'id' => 'style-custom_css',
                'icon' => 'el-icon-css',
                'subsection' => true,
                'fields' => array (
                    array (
                        'id' => 'custom_css',
                        'type' => 'ace_editor',
                        'mode' => 'css',
                        'title' => 'Global Custom CSS',
                    ),
                    array (
                        'id' => 'custom_css_desktop',
                        'type' => 'ace_editor',
                        'mode' => 'css',
                        'title' => 'Custom CSS for desktop',
                    ),
                    array (
                        'id' => 'custom_css_tablet',
                        'type' => 'ace_editor',
                        'mode' => 'css',
                        'title' => 'Custom CSS for tablet',
                    ),
                    array (
                        'id' => 'custom_css_wide_mobile',
                        'type' => 'ace_editor',
                        'mode' => 'css',
                        'title' => 'Custom CSS for mobile landscape',
                    ),
                    array (
                        'id' => 'custom_css_mobile',
                        'type' => 'ace_editor',
                        'mode' => 'css',
                        'title' => 'Custom CSS for mobile',
                    ),
                ),
            ));

            Redux::setSection( $opt_name, array(
                'title' => 'Typography',
                'id' => 'typography',
                'icon' => 'el-icon-font',
            ));

            Redux::setSection( $opt_name, array(
                'title' => 'Page',
                'id' => 'typography-page',
                'icon' => 'el-icon-font',
                'subsection' => true,
                'fields' => array(
                    array (
                        'id' => 'sfont',
                        'type' => 'typography',
                        'title' => 'Body Font',
                        'output' => 'body, .quantity input[type="number"], .quantity input[type="number"]::-webkit-inner-spin-button, .quantity input[type="number"]::-webkit-inner-spin-button',
                        'text-align' => false,
                        'text-transform' => true,
                    ),
                    array (
                        'id' => 'headings',
                        'type' => 'typography',
                        'title' => 'Headings',
                        'output' => 'h1, h2, h3, h4, h5, h6, .title h3, blockquote',
                        'text-align' => false,
                        'font-size' => false,
                        'text-transform' => true,
                    ),
                )
            ));


            Redux::setSection( $opt_name, array(
                'title' => 'Navigation',
                'id' => 'typography-menu',
                'icon' => 'el-icon-font',
                'subsection' => true,
                'fields' => array(
                    array (
                        'id' => 'menu_level_1',
                        'type' => 'typography',
                        'title' => 'Menu first level font',
                        'output' => '.menu-wrapper .menu > li > a',
                        'text-align' => false,
                        'text-transform' => true,
                    ),
                    array (
                        'id' => 'menu_level_2',
                        'type' => 'typography',
                        'title' => 'Menu second level',
                        'output' => '.item-design-mega-menu .nav-sublist-dropdown .item-level-1 > a',
                        'text-align' => false,
                        'text-transform' => true,
                    ),
                    array (
                        'id' => 'menu_level_3',
                        'type' => 'typography',
                        'title' => 'Menu third level',
                        'output' => '.item-design-dropdown .nav-sublist-dropdown ul > li > a, .item-design-mega-menu .nav-sublist-dropdown .item-link',
                        'text-align' => false,
                        'text-transform' => true,
                    ),
                )
            ));


        }
    }

    if(!function_exists('etheme_redux_theme_options_dummy')) {
        function etheme_redux_theme_options_dummy($opt_name) {

            Redux::setSection( $opt_name, array(
                'title' => 'Dummy content',
                'id' => 'import-dummy',
                'subsection' => true,
                'icon' => 'el-icon-inbox',
                'fields' => array (
                    array(
                        'id'         => 'dummy-content',
                        'type'       => 'dummy_content',
                        'title'      => 'Install Dummy content'
                    ),
                )
            ));

        }
    }