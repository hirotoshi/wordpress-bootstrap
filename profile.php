<?php
global $widget_profile_text;
$twitter_url = null;
$gplus_url = null;
$facebook_url = get_option('facebook_page_url');
$feed_url = home_url().'/feed';
$feedly_url = 'http://www.feedly.com/home#subscription/feed/'.$feed_url;

if ( $twitter_id = get_option('twitter_id') ) {
    $twitter_url = 'https://twitter.com/'.$twitter_id ;
}
if ( $google_publisher = get_option('google_publisher' ) ) {
	$gplus_url = 'https://plus.google.com/'. $google_publisher ;
}
?>
<div class="media widget-profile">
<div class="media-left navigator"><a href="/about"><img class="media-object" src="<?php echo get_option('wpb_navigator_image')?>" alt=""></a></div>
	<div class="media-body">
        <a href="/about">
        <div class="balloon-left"><?php echo $widget_profile_text ?></div>
        </a>
		<div class="clearfix"></div>
		<div class="profile-sns">
			<?php if ( $twitter_url ) : ?>
			<div>
				<a href="https://twitter.com/<?= $twitter_id ?>" class="twitter-follow-button" data-show-count="false" data-lang="ja" data-size="large">@<?= $twitter_id ?>さんをフォロー</a>
			</div>
			<?php endif ?>
			<!--
			<?php if ( $facebook_url ) : ?>
			<a href="<?php echo $facebook_url ?>">
        <img src="<?php echo get_template_directory_uri() ?>/images/icons/facebook.png" width="48px">
			</a>
			<?php endif ?>
			<?php if ( $gplus_url ) : ?>
			<div>
				<a href="<?php echo $gplus_url ?>">
					<img src="<?php echo get_template_directory_uri() ?>/images/icons/gplus.png" width="48px">
				</a>
			</div>
			<?php endif ?>
			<div>
			<a href="<?php echo $feedly_url ?>">
        <img src="<?php echo get_template_directory_uri() ?>/images/icons/feedly.png" height="48px">
			</a>
			</div>
			-->
		</div>
		<div class="clearfix"></div>
	</div>
</div>
