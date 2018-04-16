<?php

/**
 * Pricing Table Component
 *
 * @package		SpyroPress
 * @category	Components
 */


class SpyropressPricingTable extends SpyropressComponent {

    private $path;

    function __construct() {

        $this->path = dirname(__FILE__);
        add_action( 'spyropress_register_taxonomy', array( $this, 'register' ) );
        add_shortcode( 'pricing_table',  array( $this, 'shortcode_handler' ) );
    }

    function register() {

        // Init Post Type
        $args = array(
            'public' => false,
            'show_in_admin_bar' => true,
            'supports' => array( 'title' ),
            'has_archive' => false,
            'query_var' => false,
            'menu_icon' => 'dashicons-media-spreadsheet'
        );
        $post_type = new SpyropressCustomPostType( __( 'Pricing Table', 'spyropress' ), 'pricingtable', $args );

        // Shortcode Meta Box
        $instructions = '<p>' . __( 'Display price table anywhere into your posts, pages, custom post types or widgets by using the shortcode below:', 'spyropress' ) . '</p>';
        $instructions .= '<p><code>[pricing_table id={post_id}]</code></p>';

        $sc_fields['shortcode'] = array(
            array(
                'label' => __( 'Shortcode', 'spyropress' ),
                'type' => 'heading',
                'slug' => 'shortcode'
            ),

            array(
                'id' => 'instruction_info',
                'type' => 'raw_info',
                'function' => array( $this, 'set_post_id' ),
                'desc' => $instructions,
            ),

            array(
                'id' => 'template',
                'label' => __( 'Columns', 'spyropress' ),
                'type' => 'select',
                'class' => 'section-full',
                'options' => array(
                    4 => __( '3 Columns', 'spyropress' ),
                    3 => __( '4 Columns', 'spyropress' ),
                ),
                'std' => 3
            ),
            
            array(
                'label' => __( 'Currency', 'spyropress' ),
                'id' => 'currency',
                'class' => 'section-full',
                'std' => '$'
            ),
            
            array(
                'id' => 'button_text',
                'label' => __( 'Button Text', 'spyropress' ),
                'type' => 'text',
                'class' => 'section-full',
                'std' => 'Select Plan'
            ),
        );

        $post_type->add_meta_box( 'shortcode', __( 'Shortcode & General Settings', 'spyropress' ), $sc_fields, false, false, 'side' );

        // Add Meta Boxes
        $meta_fields['table'] = array(
            array(
                'label' => __( 'Table', 'spyropress' ),
                'type' => 'heading',
                'slug' => 'table'
            ),

            array(
                'label' => __( 'Table', 'spyropress' ),
                'type' => 'repeater',
                'id' => 'tables',
                'item_title' => 'title',
                'hide_label' => true,
                'fields' => array(

                    array(
                        'id' => 'recommended',
                        'type' => 'checkbox',
                        'options' => array(
                            '1' => 'Recommended'
                        )
                    ),

                    array(
                        'label' => __( 'Title', 'spyropress' ),
                        'id' => 'title',
                        'type' => 'text'
                    ),

                    array( 'type' => 'row' ),

                        array( 'type' => 'col', 'size' => 6 ),

                            array(
                                'label' => __( 'Price', 'spyropress' ),
                                'id' => 'price',
                                'type' => 'text'
                            ),

                            array(
                                'label' => __( 'Button Text', 'spyropress' ),
                                'id' => 'text',
                                'type' => 'text'
                            ),

                        array( 'type' => 'col_end' ),

                        array( 'type' => 'col', 'size' => 6 ),

                            array(
                                'label' => __( 'Currency', 'spyropress' ),
                                'id' => 'currency',
                                'type' => 'text'
                            ),

                            array(
                                'label' => __( 'Button URL', 'spyropress' ),
                                'id' => 'url',
                                'type' => 'text'
                            ),

                        array( 'type' => 'col_end' ),

                    array( 'type' => 'row_end' ),

                    array(
                        'label' => __( 'Description', 'spyropress' ),
                        'id' => 'description',
                        'type' => 'textarea',
                        'rows' => 4
                    ),

                    array(
                        'label' => __( 'Features', 'spyropress' ),
                        'type' => 'repeater',
                        'id' => 'features',
                        'item_title' => 'title',
                        'fields' => array(
                            array(
                                'label' => __( 'Title', 'spyropress' ),
                                'id' => 'title',
                                'type' => 'text'
                            )
                        )
                    )
                )
            )
        );

        $post_type->add_meta_box( 'tables', __( 'Tables', 'spyropress' ), $meta_fields, false, false );
    }

    /**
     * Callback for post_ID for instruction box
     */
    function set_post_id( $output ) {
        global $post;
        return str_replace( '{post_id}', $post->ID, $output );
    }

    /**
     * Shortcode handler
     */
    function shortcode_handler( $atts, $content = '' ) {

        // check
        if( ! isset( $atts['id'] ) || empty( $atts['id'] ) ) return;

        $slider_id = $atts['id'];

        // get slider meta
        $meta = get_post_custom( $slider_id );

        // get slider type
        $columns = maybe_unserialize( $meta['tables'][0] );
        if( empty( $columns ) ) return;

        // get template
        $template = 'pricing';
        if( isset( $meta['template'] ) )
            $template = maybe_unserialize( $meta['template'][0] );

        $func = "render_table_design_$template";
        return $this->{$func}( $columns );
    }

    function render_table_design_pricing( $columns ) {
        $tables = '';
        foreach( $columns as $column ) {

            $class = 'span3 pricing-table-column';
            if( isset( $column['recommended'] ) )
                $class .= ' special most-popular';

            $features = '';
            foreach( $column['features'] as $feature ) {
                $features .= '<li>' . $feature['title'] . '</li>';
            }

            $tables .= '
            <div class="' . $class . '">
                <span class="featured-icon"></span>
                <h3>' . $column['title'] . '</h3>
                <div class="pricing">
                    <p>' . $column['currency'] . $column['price'] . '</p>
                    <span>' . $column['description'] . '</span>
                </div> <!-- end pricing -->
                <ul>' . $features . '</ul>
                <div class="cta-area">
                    <a href="' . $column['url'] . '" class="button">
                        ' . $column['text'] . ' <i class="icon-chevron-right"></i>
                    </a>
                </div>
			</div> <!-- end span3 -->';
        }
        return '<div class="row">' . $tables . '</div>';
    }

    function render_table_design_banner( $columns ) {
        $tables = '';
        foreach( $columns as $column ) {

            $class = 'product-header-pricing clearfix';

            $features = '';
            foreach( $column['features'] as $feature ) {
                $features .= '<p>' . $feature['title'] . '</p>';
            }

            $tables .= '
            <div class="' . $class . '">
                <div class="header-pricing">
                    <h3>' . $column['title'] . '</h3>
                    <p>' . $column['currency'] . $column['price'] . '</p>
                    <span>' . $column['description'] . '</span>
                </div>
                <div class="header-cta">
                    <a href="' . $column['url'] . '" class="big-button">' . $column['text'] . ' <i class="icon-chevron-right"></i></a>
                    ' . $features . '
                </div>
            </div>';
        }
        return $tables;
    }

    function register_module( $modules ) {

        $modules[] = $this->path . '/module/price-table.php';

        return $modules;
    }
}

/**
 * Init the Component
 */
new SpyropressPricingTable();