<?php
if (function_exists('wpp_get_mostpopular')) {
	$cats = array();
	$categories = get_the_category(); 
	foreach ( $categories as $cat ) {
		$cats[] = $cat->term_id;
	}
	$args = array(
		'pid' => get_the_ID(),
		'cat' => implode(',',$cats),
		'range' => 'daily',
		'title_length' => 30,
		'limit' => 4,
		'post_type' => 'post',
		'order_by' => 'views',
		'stats_comments' => 0,
		'stats_views' => 0,
		'thumbnail_selection' => 'usergenerated',
	);
	wpp_get_mostpopular($args);
}
?>

