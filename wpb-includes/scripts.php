<?php

// enqueue javascript
if( !function_exists( "wp_bootstrap_theme_js" ) ) {  
    function wp_bootstrap_theme_js(){
        global $JS_VERSION;

        if ( !is_admin() ){
            if ( is_singular() AND comments_open() AND ( get_option( 'thread_comments' ) == 1) ) 
                wp_enqueue_script( 'comment-reply' );
        }

        wp_register_script( 'bootstrap', 
            get_template_directory_uri() . '/bower_components/bootstrap/dist/js/bootstrap.js', 
            array('jquery'), 
            '1.2' , true);

        wp_register_script( 'wpbs-js', 
            get_template_directory_uri() . '/library/dist/js/scripts.min.js',
            //get_template_directory_uri() . '/library/js/scripts.js',
            array('bootstrap'), 
            $JS_VERSION , true);

        wp_register_script( 'modernizr', 
            get_template_directory_uri() . '/bower_components/modernizer/modernizr.js', 
            array('jquery'), 
            '1.2' , true);

        wp_enqueue_script( 'bootstrap' );
        wp_enqueue_script( 'wpbs-js' );
        wp_enqueue_script( 'modernizr' );

    }
}
add_action( 'wp_enqueue_scripts', 'wp_bootstrap_theme_js' );

