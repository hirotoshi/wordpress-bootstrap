<?php


// 抜粋の長さを変更する
function wpb_excerpt_length( $length ) {
    return 36;	
}	
add_filter( 'excerpt_length', 'wpb_excerpt_length', 999 );

// 文末文字を変更する
function wpb_excerpt_more($more) {
    return ' ... ';
}
add_filter('excerpt_more', 'wpb_excerpt_more');


