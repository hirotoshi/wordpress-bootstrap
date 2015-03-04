<footer class="footer" role="contentinfo">

	<div id="inner-footer" class="clearfix">
		<hr />
		<div id="widget-footer" class="clearfix row">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer') ) : ?>
			<?php endif; ?>
		</div>


		<div class="attribute">
			<h4>
				<a href="<?= home_url() ?>">
					<?php bloginfo('description'); ?>
				</a>
			</h4>
			<p class="copy">
			<small>
				<?php the_date('Y');?>
				&copy;
				<?php bloginfo('name');?>.
				All Rights Reserved.
			</small>
			</p>
		</div>
	</div> <!-- end #inner-footer -->

</footer> <!-- end footer -->

</div> <!-- end #container -->

<div id="totop" class="totop">
	<a id="totop" class="totop btn btn-default" href="#"><i class="fa fa-caret-up"></i>トップへ</a>
</div>

<!--[if lt IE 7 ]>
	<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
	<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
	<![endif]-->

	<?php wp_footer(); // js scripts are inserted using this function ?>


	</body>

	</html>
