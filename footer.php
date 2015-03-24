<footer class="footer" role="contentinfo">

	<div id="inner-footer" class="clearfix">
		<hr class="hidden-xs" />
		<div id="widget-footer" class="clearfix row">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer') ) : ?>
			<?php endif; ?>
		</div>

	</div> <!-- end #inner-footer -->

</footer> <!-- end footer -->

</div> <!-- end #container -->

<div class="attribute copyright">
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

<div id="totop" class="totop">
	<a id="totop" class="totop btn btn-default" href="#"><i class="fa fa-caret-up"></i>トップへ</a>
</div>

<!--[if lt IE 7 ]>
	<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
	<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
	<![endif]-->

	<?php wp_footer(); // js scripts are inserted using this function ?>

<!-- twitter -->
<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
<!-- facebook -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.0";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!-- google+ -->
<script src="https://apis.google.com/js/platform.js" async defer>
{lang: 'ja'}
</script>

<!-- hatena bookmark -->
<script type="text/javascript" src="http://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async    "></script>
<!-- mixi platform -->
<script type="text/javascript">(function(d) {var s = d.createElement('script'); s.type = 'text/javascript'; s.async = true;s.src = '//static.mixi.jp/js/plugins.js#lang=ja';d.getElementsByTagName('head')[0].appendChild(s);})(document);</script>

	</body>

	</html>
