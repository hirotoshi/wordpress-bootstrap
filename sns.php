<div class="sns">
	<ul class="snsb clearfix">
		<?php if ( is_mobile() ) : ?>
		<li style="width:120px">
			<a href="http://line.me/R/msg/text/?<?php the_title(); ?>%0D%0A<?php the_permalink();  ?>?utm_source=line&utm_medium=app&utm_campaign=sns" class="ga-event" data-category="share" data-action="click" data-label="line">
				<img src="http://i0.wp.com/pon3.info/wp-content/uploads/2014/09/linebutton_80.png?h=60" style="width:123px; height:30px"  alt="LINEで送る" />
			</a>
		</li>
		<?php endif ?>

		<li style="width:120px">
			<a href="https://twitter.com/share" class="twitter-share-button"  data-size="large">Tweet</a>
		</li>
		<li>
			<div class="fb-like" data-href="<?php the_permalink() ?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
		</li>

		<li>
			<div class="g-plusone"></div>
		</li>


		<li>

			<a href="http://b.hatena.ne.jp/entry/" class="hatena-bookmark-button" data-hatena-bookmark-layout="standard-noballoon" data-hatena-bookmark-lang="ja" title="このエントリーをはてなブックマークに追加"><img src="http://b.st-hatena.com/images/entry-button/button-only@2x.png" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" /></a>
		</li>

	</ul>
</div>
