<?php

add_action( 'wp_head', 'wpb_ogp_output' );

function wpb_ogp_sitename() {
    return get_bloginfo('name'); 
}

function wpb_ogp_title() { 
    $sitename = get_bloginfo('name');
    if ( is_front_page() || is_home() ) {
        return $sitename;
    } elseif ( is_singular() ) {
        return get_the_title() . ' - ' . $sitename;
    } elseif ( is_search() ) {
        return wp_title( '-', false, 'right' );
    } else {
        return __( 'Archive of: ') . wp_title( '-', false, 'right' );
    }
}

function wpb_ogp_type() { 
    if ( is_home() ) {
        return 'blog';
    } elseif ( is_front_page() ) {
        return 'website';		
    } else {
        return 'article';
    }
}

function wpb_ogp_url() {
    if ( is_single() ) {
        return get_permalink();
    } elseif ( is_front_page() ) {
        return home_url();
    } elseif ( is_home() ) {
        if ( $blog_page = get_option( 'page_for_posts' ) ) {
            return get_permalink( $blog_page );
        } else {
            return home_url();
        }
    }
}

function wpb_ogp_img() { 
    $og_img = '';
    $user_set_image = get_option( 'wpb_ogp_image' );
    if ( is_singular() && !is_front_page() && !is_home() ) {

        if ( has_post_thumbnail() ) {
            $ogimage_id  = get_post_thumbnail_id();
            $ogimage_url = wp_get_attachment_image_src( $ogimage_id,'full', true ); 
            $og_img = $ogimage_url[0]; 
        } else {
            $id = get_the_ID();
            $attachments = get_children( array( 
                'post_parent'    => $id , 
                'post_type'      => 'attachment' , 
                'post_mime_type' => 'image' , 
                'orderby'        => 'menu_order' , 
            ) );
            foreach ( $attachments as $attachment ) {
                $image_src = wp_get_attachment_image_src( $attachment->ID, 'full', true );
                $og_img     = ( isset($image_src[0]) ? $image_src[0] : '' );
                break;
            }

            if ( '' == $og_img ) {
                global $post;
                if ( preg_match_all('/<img .*src=[\'"]([^\'"]+)[\'"]/', $post->post_content, $matches, PREG_SET_ORDER) ) {
                    $og_img = $matches[0][1];
                }

            }
        }
    }
    if ( '' == $og_img ) {
        $og_img = $user_set_image;
    }
    return $og_img;
}

function wpb_ogp_locale() {
    $og_locale = get_locale();
    if ( 'ja' == $og_locale ) {
        $og_locale = 'ja_JP';
    } elseif ( 'th' == $og_locale ) {
        $og_locale = 'th_TH';
    }
    return $og_locale;
}

function wpb_ogp_description() { 
    if ( is_singular() && !is_front_page() && !is_home() ) {

        global $post;

        $description    = $post->post_content;
        $description    = wp_strip_all_tags( $description );
        $description    = strip_shortcodes( $description );
        $og_description = wp_trim_words( $description, 55, '' );

    } else {
        $og_description = get_bloginfo( 'description' );
    }

    return $og_description;
}



function wpb_ogp_output () {

    // remove ogp tags by jetpack plugin
    add_filter( 'jetpack_enable_opengraph', '__return_false', 11 );

    // og:site_name
    $og_sitename = $sitename = wpb_ogp_sitename();

    // og:title
    $og_title = wpb_ogp_title();

    // og:type
    $og_type = wpb_ogp_type();

    // og:url
    $og_url = wpb_ogp_url();

    // og:img
    $og_img = wpb_ogp_img();

    // og:locale
    $og_locale = wpb_ogp_locale();

    // og:description
    $og_description = wpb_ogp_description();


    // META
    $meta = '';

    // description
    $meta .= '<meta name="description" itemprop="description" content="'. esc_attr($og_description).'" />' . "\n";

    // facebook 
    $facebook_user_id =  get_option('facebook_user_id');
    if($facebook_user_id || $facebook_user_id !== ''){
        $meta .= '<meta property="og:admins" content="'.esc_html($facebook_user_id).'" />' . "\n";  
    }

    $facebook_app_id =  get_option('facebook_app_id');
    if($facebook_app_id || $facebook_app_id !== ''){
        $meta .= '<meta property="og:app_id" content="'.esc_html($facebook_app_id).'" />' . "\n";  
    }

    // let's out put the meta tags.
    $ogp_tags = array(
        'og:title'       => $og_title,
        'og:type'        => $og_type,
        'og:url'         => $og_url,
        'og:image'       => $og_img,
        'og:site_name'   => $og_sitename,
        'og:locale'      => $og_locale,
        'og:description' => $og_description,
    );

    //ogp meta    
    foreach ( $ogp_tags as $property => $content ) {
        if ( '' != $content ) {
            $meta .= '<meta property="'. $property .'" content="'. esc_attr( $content ) .'" />'."\n";
        }
    }

    // google plus
    $google_publisher = get_option('google_publisher');
    if ( !empty($google_publisher) ) {
        $meta .= '<link href="https://plus.google.com/'. esc_attr($google_publisher ) .'" rel="publisher" />' . "\n";
    }

    //twitter  
    $twitter_id = get_option('twitter_id');
    if (!empty($twitter_id)) {
        $twitter_card_type = get_option('twitter_card_type','summary');
        $twitter_tags = array(
            'twitter:card' => $twitter_card_type,
            'twitter:site' => '@'. $twitter_id,
            'twitter:creator' => '@'.$twitter_id,
            'twitter:url' => $og_url,
            'twitter:title' => $og_title,
            'twitter:description' => $og_description,
            'twitter:image' => $og_img,
        );
        //ogp meta    
        foreach ( $twitter_tags as $property => $content ) {
            if ( '' != $content ) {
                $meta .= '<meta property="'. $property .'" content="'. esc_attr( $content ) .'" />'."\n";
            }
        }
    }





    echo $meta;
}


