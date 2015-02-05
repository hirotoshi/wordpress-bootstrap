<!--ぱんくず -->
<ol class="breadcrumb">
	<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"> 
		<a href="<?php echo home_url(); ?>" itemprop="url"> <span itemprop="title">ホーム</span> </a>
	</li>
	<?php $postcat = get_the_category(); ?>
	<?php $catid = $postcat[0]->cat_ID; ?>
	<?php $allcats = array($catid); ?>
	<?php 
while(!$catid==0) {
	$mycat = get_category($catid);
	$catid = $mycat->parent;
	array_push($allcats, $catid);
}
array_pop($allcats);
$allcats = array_reverse($allcats);
?>
<?php foreach($allcats as $catid): ?>
<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb"> <a href="<?php echo get_category_link($catid); ?>" itemprop="url"> <span itemprop="title"><?php echo get_cat_name($catid); ?></span> </a></li>
<?php endforeach; ?>
</ol>
<!--/ ぱんくず -->


