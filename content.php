<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<a class="" href="<?= get_permalink() ?>">
		<div class="media">
			<div class="media-left">
				<?php if ( has_post_thumbnail() ): // サムネイルを持っているときの処理 ?>
				<?php the_post_thumbnail( 'thumb100', array('class'=>'media-image') ); ?>
				<?php else: // サムネイルを持っていないときの処理 ?>
				<img class="media-object" src="<?php echo get_template_directory_uri(); ?>/images/no-img.png" alt="no image" title="no image" width="100" height="100" />
				<?php endif; ?>
			</div>
			<div class="media-body">
				<div class="media-heading">
					<h4 class="entry-title"><? the_title() ?></h4>
				</div>
				<p class="desc">
				<?= strip_tags( get_the_excerpt(30) ); ?>
				</p>
				<!--
			<a class="btn btn-default more-link" href="<?= get_permalink() ?>">
			<?php _e('Read more &raquo;','wpbootstrap') ?>
			</a>
				-->
			</div>
		</div>
	</a>
</article>


