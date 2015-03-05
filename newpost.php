<div class="media-list">
  <?php
if ( !isset($count) ) {
    $count = 5;
}
$args = array(
    'posts_per_page' => $count,
);
$st_query = new WP_Query($args);
?>
<?php if( $st_query->have_posts() ): ?>
  <?php while ($st_query->have_posts()) : $st_query->the_post(); ?>
    <?php get_template_part( 'content' ); ?>
  <?php endwhile; ?>
  <?php else: ?>
  <p>新しい記事はありません</p>
  <?php endif; ?>
  <?php wp_reset_postdata(); ?>
</div>
