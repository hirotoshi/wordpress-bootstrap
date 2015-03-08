<?php get_header(); ?>

<div id="content" class="clearfix row">

	<div id="main" class="col-sm-8 clearfix" role="main">
		<?php if ( is_active_sidebar( 'top' ) ) : ?>
		<?php dynamic_sidebar( 'top' ); ?>
		<?php else : ?>
		<div class="media-list">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<section class="post_content">
				<?php get_template_part( 'content'); ?>
			</section> <!-- end article section -->
			<?php endwhile; ?>	
            <?php endif ?>
		</div>


		<?php endif ?>
	</div> <!-- end #main -->
	<?php get_sidebar(); // sidebar 1 ?>


</div> <!-- end #content -->

<?php get_footer(); ?>
