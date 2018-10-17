<?php
$status = [
	'id' => 'columnDetail',
];
?>
<?php get_header(); ?>

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
?>
<div class="mainContents">
	<section class="contentBlock">
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

		<header class="entryHeader">
			<h1 class="entryTitle"><?php the_title(); ?></h1>
			<div class="entryAttribute">
				<div class="date"><?php the_time('Y年m月d日'); ?></div>
				<?php if($the_terms): ?>
				<ul class="category"><?php foreach($the_terms as $value): ?><li><a href="/column/column_category/<?php echo $value->slug; ?>/"><?php echo $value->name; ?></a></li><?php endforeach; ?></ul>
				<?php endif; ?>
				<div class="author"><?php the_author(); ?></div>
			</div>
		</header>

		<div class="contentInner">
			<div class="entryEyecatch"><img src="<?php the_post_thumbnail_url('large'); ?>"></div>

			<div class="entryBody">
				<section class="entryBlock">
					<?php echo get_field('column_lede'); ?>
				</section>
				<section class="entryBlock">
					目次
					<?php for($i=0; $i<count($block); $i++): ?>
					<div class="tableofcontents">
						<div><a href="#<?php echo 'index'.($i+1); ?>" class="scroll"><?php echo $block[$i]['headline']; ?></a></div>
						<?php for($n=0; $n<count($block[$i]['contents']); $n++): ?>
							<?php if($block[$i]['contents'][$n]['column_headline2']): ?>
								<div><a href="#<?php echo 'index'.($i+1).'-'.($n+1); ?>" class="scroll"><?php echo $block[$i]['contents'][$n]['column_headline2']; ?></a></div>
							<?php endif; ?>
						<?php endfor; ?>
					</div>
					<?php endfor; ?>
				</section>

				<?php for($i=0; $i<count($block); $i++): ?>
				<section class="entryBlock">
					<h2 class="cotentTitle" id="<?php echo 'index'.($i+1); ?>"><?php echo $block[$i]['headline']; ?></h2>

					<?php for($n=0; $n<count($block[$i]['contents']); $n++): ?>
					<div class="paragraph">
						<?php if($block[$i]['contents'][$n]['column_headline2']): ?>
							<h3 id="<?php echo 'index'.($i+1).'-'.($n+1); ?>"><?php echo $block[$i]['contents'][$n]['column_headline2']; ?></h3>
						<?php endif; ?>
						<?php echo $block[$i]['contents'][$n]['column_contents']; ?>
					</div>
					<?php endfor; ?>
				</section>
				<?php endfor; ?>

			</div>
		</div>
	</section>
</div>

<?php get_footer(); ?>