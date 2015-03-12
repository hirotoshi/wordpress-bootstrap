<?php get_header(); ?>

<div id="content" class="clearfix row">

	<div id="main" class="col col-md-8 clearfix" role="main">

		<div class="page-header">
			<h1 class="headline">
				<?php echo esc_attr(get_search_query()); ?> の検索結果
			</h1>
		</div>

		<?php if (have_posts()) : ?>
		<div class="media-list">
			<?php while (have_posts()) : the_post(); ?>
			<section class="post_content">
				<?php get_template_part( 'content'); ?>
			</section> <!-- end article section -->
			<?php endwhile; ?>	
			<?php wp_bootstrap_page_navi(); // use the page navi function ?>
			<!-- this area shows up if there are no results -->
		</div>
		<?php else : ?>

			<div id="post-not-found">
				<section class="post_content">
					<p class="alert alert-warning"><?php _e("Sorry, but the requested resource was not found on this site.", "wpbootstrap"); ?></p>
				</section>
				<footer>

					<div class="center">
						別のキーワードで探す
						<?php get_search_form() ?>
					</div>
				</footer>
			</div>

		<?php endif; ?>

	</div> <!-- end #main -->

	<?php get_sidebar(); // sidebar 1 ?>

</div> <!-- end #content -->

<?php get_footer(); ?>
