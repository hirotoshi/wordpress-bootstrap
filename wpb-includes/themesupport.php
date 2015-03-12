<?php

// Add WP 3+ Functions & Theme Support
if( !function_exists( "wp_bootstrap_theme_support" ) ) {  
  function wp_bootstrap_theme_support() {
    add_theme_support( 'post-thumbnails' );      // wp thumbnails (sizes handled in functions.php)
    set_post_thumbnail_size( 825, 510, true );
    add_image_size('thumb80',80,80,true);
    add_image_size('thumb100',100,100,true);
    add_image_size('thumb150',150,150,true);

    add_theme_support( 'custom-background' );  // wp custom background
    add_theme_support( 'automatic-feed-links' ); // rss


    // Add post format support - if these are not needed, comment them out
    add_theme_support( 'post-formats',      // post formats
      array( 
//        'aside',   // title less blurb
//        'gallery', // gallery of images
//        'link',    // quick link to other site
//        'image',   // an image
//        'quote',   // a quick quote
//        'status',  // a Facebook like status update
//        'video',   // video 
//        'audio',   // audio
//        'chat'     // chat transcript 
      )
    );  

    add_theme_support( 'menus' );            // wp menus

    //カスタムヘッダー
    $args = array(
        'width'         => 640,
        'height'        => 200,
        'flex-height' => true,
        //'default-image' => get_template_directory_uri() . '/images/stinger3.png',
    );
    add_theme_support( 'custom-header', $args );

  }
}
// launching this stuff after theme setup
add_action( 'after_setup_theme','wp_bootstrap_theme_support' );


