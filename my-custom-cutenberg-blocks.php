<?php
/*
Plugin Name:  My custom cutenberg blocks
Plugin URI:   https://developer.wordpress.org/plugins/the-basics/
Description:  WP cutenberg blocks
Version:      0.1
Author:       Ronny Freites
Author URI:   https://profiles.wordpress.org/spocck
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  my-custom-cutenberg-blocks
Domain Path:  /languages
*/

//Exit if accessed directly
defined('ABSPATH') || exit;

if (function_exists('the_gutenberg_project')) :
    if (!function_exists('register_my_custom_cutenberg_blocks')) :

        function register_my_custom_cutenberg_blocks() {
            //Register the block building script
            wp_register_script( 
                'my-custom-cutenberg-blocks-myfirstblock-editor',
                plugins_url('/blocks/myfirstblock/editor-script.js', __FILE__), 
                array('wp-blocks', 'wp-element') //Required dependencies
            );

            //Register editor only block css
            wp_register_style(
                'my-custom-cutenberg-blocks-myfirstblock-editor',
                plugins_url('/blocks/myfirstblock/editor-style.css', __FILE__),
                array('wp-edit-blocks'), //Required dependencies
                filemtime( plugin_dir_path( __FILE__ ) . '/blocks/myfirstblock/style.css' )
            );

            //Register the global block css
            wp_register_style(
                'my-custom-cutenberg-blocks-myfirstblock',
                plugins_url('/blocks/myfirstblock/style.css', __FILE__),
                array('wp-edit-blocks'), //Required dependencies
                filemtime( plugin_dir_path( __FILE__ ) . '/blocks/myfirstblock/style.css' )
            );

            //Register the block type
            register_block_type('my-custom-cutenberg-blocks/myfirstblock', array(
                'editor_script' => 'my-custom-cutenberg-blocks-myfirstblock-editor',
                'editor_style'  => 'my-custom-cutenberg-blocks-myfirstblock-editor',
                'style'         => 'my-custom-cutenberg-blocks-myfirstblock'
            ));
        }

        //WP Hook
        add_action( 'init', 'register_my_custom_cutenberg_blocks' );
    endif;
endif;