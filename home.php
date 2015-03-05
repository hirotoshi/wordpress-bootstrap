<?php get_header(); ?>

<div id="content" class="clearfix row">

	<div id="main" class="col-sm-8 clearfix" role="main">
		<?php if ( is_active_sidebar( 'top' ) ) : ?>
		<?php dynamic_sidebar( 'top' ); ?>
		<?php else : ?>
		<?php endif ?>
	</div> <!-- end #main -->
	<?php get_sidebar(); // sidebar 1 ?>


</div> <!-- end #content -->

<?php get_footer(); ?>
