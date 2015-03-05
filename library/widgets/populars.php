<?php
/**
 *  人気の投稿
 **/


/*
 *  * Display the title and the publish date
 *   */
function wpb_custom_popular_post( $post_html, $p, $instance ){    
    $id = $p->id;
    $url = get_the_permalink($id);
    $thumbnail = get_the_post_thumbnail( $id ,'thumb100', array('class' => 'img-thumbnail') );

    return '<div class="col-xs-12 col-sm-6">' . 
        '<div class="panel panel-default panel-popular" >' .
$post_html.
        '</div></div>';

}
add_filter( 'wpp_post', 'wpb_custom_popular_post', 10, 3 );



