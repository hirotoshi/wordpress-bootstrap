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
        query_posts('p='.$popular->id);
        the_post();
        get_template_part( 'content');
    }

    /*
    echo '<div class="nav-more">';
    echo '<a class="btn btn-primary" href="/populars" >';
    if ( $title ) {
        echo $title .'を';    
    }
    echo 'もっと見る</a>';
    echo '</div>';
     */
    echo '</div>';
}
add_filter( 'wpp_custom_html', 'wpb_custom_popular_html' ,10, 2);

