<?php

// enqueue styles
if( !function_exists("wp_bootstrap_theme_styles") ) {  
    function wp_bootstrap_theme_styles() { 
        // This is the compiled css file from LESS - this means you compile the LESS file locally and put it in the appropriate directory if you want to make any changes to the master bootstrap.css.
        //wp_register_style( 'wpbs', get_template_directory_uri() . '/library/dist/css/styles.7b6e3480.min.css', array(), '1.0', 'all' );
        //wp_enqueue_style( 'wpbs' );

        // For child themes
        wp_register_style( 'wpbs-style', get_stylesheet_directory_uri() . '/style.css', array(), '1.0', 'all' );
        wp_enqueue_style( 'wpbs-style' );

        wp_register_style( 'font-awesome', get_stylesheet_directory_uri() . '/bower_components/font-awesome/css/font-awesome.css', array(), '1.0', 'all' );
        wp_enqueue_style( 'font-awesome' );
    }
}
add_action( 'wp_enqueue_scripts', 'wp_bootstrap_theme_styles' );
