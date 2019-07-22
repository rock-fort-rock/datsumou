<?php
$status = [
	'id' => 'newsDetail',
];
?>
<?php
if(!is_amp()){
	get_header();
}
?>

<?php
the_post();
$terms = get_terms('news_category');
// print_r($terms);

$the_terms = get_the_terms($post->ID, 'news_category' );
?>
<div class="mainContents" data-id="<?php echo $post->ID; ?>">
	<section class="contentBlock">
		<?php if(!is_amp()): ?>
		<div class="categorySelectWrapper">
			<div class="categorySelect">
				<select onChange="location.href=value;">
					<option selected>カテゴリ選択</option>
					<?php foreach($terms as $value): ?>
					<option value="/column/column_category/<?php echo $value->slug; ?>/"><?php echo $value->name; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<?php endif; ?>

		<header class="entryHeader">
			<h1 class="entryTitle"><?php the_title(); ?></h1>
			<div class="entryAttribute">
				<div class="date"><?php the_time('Y年m月d日'); ?></div>
				<?php if($the_terms): ?>
				<ul class="category"><?php foreach($the_terms as $value): ?><li><a href="/column/column_category/<?php echo $value->slug; ?>/"><?php echo $value->name; ?></a></li><?php endforeach; ?></ul>
				<?php endif; ?>
			</div>
		</header>

		<div class="contentInner">
			<?php if(is_amp()): ?>
			<ul class="snsShare">
				<li class="facebook">
					<amp-social-share data-param-app_id="1267141240122059" type="facebook"></amp-social-share>
				</li>
				<li class="twitter">
					<amp-social-share data-param-text="<?php the_title(); ?>" type="twitter"></amp-social-share>
				</li>
				<li class="hatena">
					<amp-social-share	type="hatena_bookmark" layout="container"	data-share-endpoint="<?php the_permalink(); ?>"></amp-social-share>
				</li>
				<li class="line">
					<amp-social-share type="line"></amp-social-share>
				</li>
			</ul>
			<?php else: ?>
			<ul class="snsShare">
				<li class="facebook">
					<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><img src="/assets/images/icon_facebook.svg"></a>
				</li>
				<li class="twitter">
					<a href="http://twitter.com/intent/tweet?text=<?php the_title(); ?>%0D%0A&amp;url=<?php the_permalink(); ?>" target="_blank"><img src="/assets/images/icon_twitter.svg"></a>
				</li>
				<li class="hatena">
					<a href="http://b.hatena.ne.jp/add?url=<?php the_permalink(); ?>" target="_blank"><img src="/assets/images/icon_hatena.svg"></a>
				</li>
				<li class="line">
					<a href="line://msg/text/<?php the_title(); ?>%0D%0A<?php the_permalink(); ?>" target="_blank"><img src="/assets/images/icon_line.svg"></a>
				</li>
			</ul>
			<?php endif; ?>


			<div class="entryBody">
				<section class="entryBlock">
					<?php if(is_amp()): ?>
					<?php echo convertImgToAmpImg(apply_filters('the_content',get_the_content())); ?>
					<?php else: ?>
						<?php the_content(); ?>
					<?php endif; ?>

				</section>
			</div>
		</div>
	</section>
</div>

<?php
if(!is_amp()){
	get_footer();
}
?>
