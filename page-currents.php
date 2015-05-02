<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
    'paged' => $paged,
    'posts_per_page' => 10,
    'meta_key' => 'start_date',
);

$wp_query = new WP_Query($args);

include('views/page-currents.phtml');
