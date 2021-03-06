<?php

/**
 * Staff Component
 * 
 * @package		SpyroPress
 * @category	Components
 */

class SpyropressStaff extends SpyropressComponent {

    private $path;
    
    function __construct() {

        $this->path = dirname(__FILE__);
        add_action( 'spyropress_register_taxonomy', array( $this, 'register' ) );
        add_filter( 'builder_include_modules', array( $this, 'register_module' ) );
    }

    function register() {

        // Init Post Type
        $args = array(
            'title'     => __( 'Enter name here..', 'spyropress' ),
            'public'    => false,
            'supports'  => array( 'title', 'thumbnail' ),
            'menu_icon' => 'dashicons-admin-users'
        );
        $post = new SpyropressCustomPostType( 'Staff', 'staff', $args );

        // Add Taxonomy
        $post->add_taxonomy( 'Department' );
        $post->add_taxonomy( 'Position', '', '', array( 'hierarchical' => false ) );
        
        // Add Meta Boxes
        $meta_fields['staff'] = array(
            array(
                'label' => __( 'Staffs', 'spyropress' ),
                'type' => 'heading',
                'slug' => 'staff'
            ),

            array(
                'label' => 'Qualification',
                'id' => 'qualification',
                'type' => 'text'
            ),

            array(
                'label' => 'Phone',
                'id' => 'phone',
                'type' => 'text'
            ),

            array(
                'label' => 'Email',
                'id' => 'email',
                'type' => 'text'
            ),

            array(
                'label' => __( 'Social', 'spyropress' ),
                'type' => 'repeater',
                'id' => 'socials',
                'item_title' => 'network',
                'fields' => array(
                    array(
                        'label' => __( 'Network', 'spyropress' ),
                        'id' => 'network',
                        'type' => 'select',
                        'options' => array(
                            'delicious' => __( 'Delicious', 'spyropress' ),
                            'deviantart' => __( 'Deviantart', 'spyropress' ),
                            'digg' => __( 'Digg', 'spyropress' ),
                            'facebook' => __( 'Facebook', 'spyropress' ),
                            'flickr' => __( 'Flickr', 'spyropress' ),
                            'gtalk' => __( 'Gtalk', 'spyropress' ),
                            'lastfm' => __( 'Lastfm', 'spyropress' ),
                            'linkedin' => __( 'Linkedin', 'spyropress' ),
                            'myspace' => __( 'Myspace', 'spyropress' ),
                            'picasa' => __( 'Picasa', 'spyropress' ),
                            'reddit' => __( 'Reddit', 'spyropress' ),
                            'rss' => __( 'Rss', 'spyropress' ),
                            'skype' => __( 'Skype', 'spyropress' ),
                            'stumbleupon.' => __( 'Stumbleupon', 'spyropress' ),
                            'technorati' => __( 'Technorati', 'spyropress' ),
                            'twitter' => __( 'Twitter', 'spyropress' ),
                            'tumblr' => __( 'Tumblr', 'spyropress' ),
                            'vimeo' => __( 'Vimeo', 'spyropress' ),
                            'youtube' => __( 'Youtube', 'spyropress' ),
                        )
                    ),
        
                    array(
                        'label' => __( 'URL', 'spyropress' ),
                        'id' => 'url',
                        'type' => 'text',
                    )
                )
        	)
        );

        $post->add_meta_box( 'staff_info', __( 'Mate Information', 'spyropress' ), $meta_fields, '_mate_info', false );
    }
    
    function register_module( $modules ) {

        $modules[] = $this->path . '/module/staff.php';

        return $modules;
    }
}

/**
 * Init the Component
 */
new SpyropressStaff();
?>