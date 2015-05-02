<?php
/**
 *  人気の投稿
 **/


/*
 *  * Display the title and the publish date
 *   */
/*
function wpb_custom_popular_post( $post_html, $p, $instance ){    

    query_posts('id='.$p->id);
    the_post();
    get_template_part( 'content');

}
add_filter( 'wpp_post', 'wpb_custom_popular_post', 10, 3 );
*/

function wpb_custom_popular_html( $populars, $instance ) {

    $title = $instance['title'];

    echo '<div class="media-list">';
    foreach( $populars as $popular ) {
        if ( $popular->id  ) { 
            $wp_query = new WP_Query( array( 'p' => $popular->id) );
            if ( !$wp_query->have_posts() ) { 
                $wp_query = new WP_Query( array( 'page_id' => $popular->id ) );
            }
            if ( $wp_query->have_posts() ) {
                $wp_query->the_post();
                get_template_part( 'content');
            }
        }
    }
    echo '</div>';

    //postを元に戻す
    wp_reset_query();
}
add_filter( 'wpp_custom_html', 'wpb_custom_popular_html' ,10, 2);

