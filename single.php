<?php get_header(); ?>
<div id="content" class="clearfix row">
	<div id="main" class="col-sm-8 clearfix" role="main">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
			<div class="post-inner">
				<header>
					<?php get_template_part('breadcrumbs'); ?>
					
					<div class="page-header">
						<h1 class="single-title" itemprop="headline"><?php the_title(); ?></h1>
					</div>
					<p class="meta">
					<span class="kdate"><i class="fa fa-calendar"></i>&nbsp;
						<time class="entry-date" datetime="<?php the_time('c') ;?>">
							<?php the_time('Y/m/d') ;?>
						</time>
						&nbsp;
						<?php if ($mtime = get_the_time('Y/m/d')) : ?>
						<i class="fa fa-repeat"></i>&nbsp;
						<?php echo $mtime; ?>
						<?php endif ?>
					</span> 
					</p>
				</header> <!-- end article header -->
				<section class="post_content clearfix" itemprop="articleBody">
					<?php the_content(); ?>
					<?php wp_link_pages(); ?>
				</section> <!-- end article section -->
				<footer>
					<h4>関連キーワード</h4>
          <?php the_tags('<p class="tags"><span class="label label-default"><i class="fa fa-tag"></i>', 
'</span>&nbsp;<span class="label label-default"><i class="fa fa-tag"></i>', '</span></p>'); ?>
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
			</footer>
		</article>
		<?php endif; ?>
	</div> <!-- end #main -->
	<?php get_sidebar(); // sidebar 1 ?>
</div> <!-- end #content -->
<?php get_footer(); ?>
