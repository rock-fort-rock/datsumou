<?php
$status = [
	'id' => 'columnDetail',
];
?>
<?php
if(!is_amp()){
	get_header();
}
?>

<?php
$terms = get_terms('column_category');
// print_r($terms);

$the_terms = get_the_terms($post->ID, 'column_category' );

$block = [];
while(the_repeater_field('column_block')){
	$tempBlock['headline'] = get_sub_field('column_headline');
	$tempBlock['contents'] = get_sub_field('column_paragraph');
	array_push($block, $tempBlock);
}
// print_r($block);

$tocGroup = get_field('column_toc');
$tocHide = $tocGroup['column_toc_hide'];
// print_r($tocHide);
?>
<div class="mainContents">
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
				<div class="author"><?php the_author(); ?></div>
			</div>
			<?php /* シェアボタン
			<?php if(is_amp()): ?>
			<ul class="entryShare">
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
			<ul class="entryShare">
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
			*/ ?>
		</header>

		<div class="contentInner">
			<div class="entryEyecatch">
				<?php
					$eyecatchId = get_post_thumbnail_id($post->ID);
					$eyecatch = wp_get_attachment_image_src( $eyecatchId, 'large' );
					$eyecatchSrc = $eyecatch[0];
					$eyecatchWidth = $eyecatch[1];
					$eyecatchHeight = $eyecatch[2];
					// print_r($eyecatch);
				?>
				<?php if(is_amp()): ?>
					<amp-img src="<?php echo $eyecatchSrc; ?>" width="<?php echo $eyecatchWidth; ?>" height="<?php echo $eyecatchHeight; ?>" layout="responsive"></amp-img>
				<?php else: ?>
					<img src="<?php the_post_thumbnail_url('large'); ?>">
				<?php endif; ?>
			</div>

			<div class="entryBody">
				<section class="entryBlock">
					<?php if(is_amp()): ?>
						<?php echo convertImgToAmpImg(get_field('column_lede')); ?>
					<?php else: ?>
						<?php echo get_field('column_lede'); ?>
					<?php endif; ?>
				</section>

<?php if($tocHide != 1 && !is_amp()): ?>
<section class="entryBlock">
<div class="tableofcontents">
<div class="title">目次</div><span class="displayToggle">[非表示]</span>
<ul>
<?php for($i=0; $i<count($block); $i++): ?>
<?php if($block[$i]['headline']): ?>
<li class="main"><a href="#<?php echo 'index'.($i+1); ?>" class="scroll"><?php echo $block[$i]['headline']; ?></a></li>
<?php endif; ?>
<?php for($n=0; $n<count($block[$i]['contents']); $n++): ?>
<?php if($block[$i]['contents'][$n]['column_headline2']): ?>
<li class="sub"><a href="#<?php echo 'index'.($i+1).'-'.($n+1); ?>" class="scroll"><?php echo $block[$i]['contents'][$n]['column_headline2']; ?></a></li>
<?php endif; ?>
<?php endfor; ?>
<?php endfor; ?>
</ul>
</div>
</section>
<?php endif; ?>

				<?php for($i=0; $i<count($block); $i++): ?>
				<section class="entryBlock">
					<?php if($block[$i]['headline']): ?>
					<h2 class="cotentTitle" id="<?php echo 'index'.($i+1); ?>"><?php echo $block[$i]['headline']; ?></h2>
					<?php endif; ?>

					<?php for($n=0; $n<count($block[$i]['contents']); $n++): ?>
					<div class="paragraph">
						<?php if($block[$i]['contents'][$n]['column_headline2']): ?>
							<h3 id="<?php echo 'index'.($i+1).'-'.($n+1); ?>"><?php echo $block[$i]['contents'][$n]['column_headline2']; ?></h3>
						<?php endif; ?>
						<?php if(is_amp()): ?>
							<?php
							$content = convert_content_to_amp_sample($block[$i]['contents'][$n]['column_contents']);
							// echo convertImgToAmpImg($block[$i]['contents'][$n]['column_contents']);
							echo convertImgToAmpImg($content);
							?>
						<?php else: ?>
							<?php echo $block[$i]['contents'][$n]['column_contents']; ?>
						<?php endif; ?>
					</div>
					<?php endfor; ?>
				</section>
				<?php endfor; ?>

			</div>
		</div>
	</section>
</div>

<?php
if(!is_amp()){
	get_footer();
}
?>
