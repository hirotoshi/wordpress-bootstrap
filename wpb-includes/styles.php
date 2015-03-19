<?php

// enqueue styles
if( !function_exists("wp_bootstrap_theme_styles") ) {  
    function wp_bootstrap_theme_styles() { 
        global $CSS_VERSION;

        wp_register_style( 'wpbs-style', 
            get_stylesheet_directory_uri() . '/style.css', array(), $CSS_VERSION, 'all' );
        wp_enqueue_style( 'wpbs-style' );

        wp_register_style( 'font-awesome', get_stylesheet_directory_uri() . '/bower_components/font-awesome/css/font-awesome.css', array(),  '1.0', 'all' );
        wp_enqueue_style( 'font-awesome' );
    }
}
add_action( 'wp_enqueue_scripts', 'wp_bootstrap_theme_styles' );
