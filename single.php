<?php get_header(); ?>
<div id="content" class="clearfix row">
	<div id="main" class="col-md-8 clearfix" role="main">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
			<div class="post-inner">
				<header>
					<?php get_template_part('breadcrumbs'); ?>

					<div class="post-header">
						<h1 class="single-title" itemprop="headline"><?php the_title(); ?></h1>
					</div>
					<p class="post-meta">
					<span class="kdate"><i class="fa fa-calendar"></i>&nbsp;
						<time class="entry-date" datetime="<?php the_time('c') ;?>">
							<?php the_time('Y/m/d') ;?>
						</time>
						&nbsp;
						<?php if ($mtime = get_the_time('Y/m/d')) : ?>
						<i class="fa fa-repeat"></i>&nbsp;
						<time class="updated">
							<?php echo $mtime; ?>
						</time>
						<?php endif ?>
					</span> 
					</p>
				</header> <!-- end article header -->
				<section class="post-content clearfix" itemprop="articleBody">
					<?php the_content(); ?>
					<?php wp_link_pages(); ?>
				</section> <!-- end article section -->
				<footer>
					<p class="hidden author"><?php the_author(); ?></p>
					<hr />
					<?php get_template_part('sns'); ?>
					<hr />

					<?php if ( is_active_sidebar('post-bottom') ): ?>
					<?php dynamic_sidebar( 'post-bottom' ); ?>
					<?php endif ?>

					<h4 class="widget-title headline-sub">関連記事</h4>
					<?php get_template_part('relative-posts'); ?>

					<?php if ( get_the_tags() ) :?>
					<hr />
					<div class="widget widget-post-bottom">
						<h4 class="widget-title">関連キーワード</h4>
						<?php the_tags('<p class="tags"><span class="label label-default"><i class="fa fa-tag"></i>', 
						'</span>&nbsp;<span class="label label-default"><i class="fa fa-tag"></i>', '</span></p>'); ?>
					</div>
					<?php endif ?>

				</footer> <!-- end article footer -->
			</div>
		</article> <!-- end article -->
		<?php comments_template('',true); ?>
		<?php endwhile; ?>			
		<?php else : ?>
		<article id="post-not-found">
			<header>
				<h1><?php _e("Not Found", "wpbootstrap"); ?></h1>
			</header>
			<section class="post_content">
				<p><?php _e("Sorry, but the requested resource was not found on this site.", "wpbootstrap"); ?></p>
			</section>
			<footer>
				<?php dynamic_sidebar( 'post-bottom' ); ?>
			</footer>
		</article>
		<?php endif; ?>
	</div> <!-- end #main -->
	<?php get_sidebar(); // sidebar 1 ?>
</div> <!-- end #content -->
<?php get_footer(); ?>
