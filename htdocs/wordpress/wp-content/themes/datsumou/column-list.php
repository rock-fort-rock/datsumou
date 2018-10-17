<?php
$terms = get_terms('column_category');
// print_r($terms);
?>

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

<?php if(have_posts()): ?>
<?php while(have_posts()): the_post(); ?>
<?php
$the_terms = get_the_terms($post->ID, 'column_category' );
$raw_lede = strip_tags(get_field('column_lede'));
$num = 80;
$lede = mb_substr($raw_lede, 0, $num);
if(mb_strlen($raw_lede) > $num){
	$lede .= '…' ;
}
?>
<article class="entry">
	<div class="contentInner">
		<a href="<?php the_permalink(); ?>">
			<div class="imageBlock">
				<img src="<?php the_post_thumbnail_url('medium'); ?>">
			</div>
			<div class="textBlock">
				<div class="entryAttribute">
					<div class="date"><?php the_time('Y年m月d日'); ?></div>
					<?php if($the_terms): ?>
					<ul class="category"><?php foreach($the_terms as $value): ?><li><?php echo $value->name; ?></li><?php endforeach; ?></ul>
					<?php endif; ?>
					<div class="author"><?php the_author(); ?></div>
				</div>
				<h2 class="entryTitle"><?php the_title(); ?></h2>
				<div class="entryLede exceptSmall">
					<?php echo $lede; ?>
				</div>
			</div>
		</a>
	</div>
</article>
<?php endwhile; ?>

<?php else: ?>
<p style="text-align: center;">記事が存在しません。</p>
<?php endif; ?>

<div class="paginationWrapper">
<?php the_posts_pagination( array(
	'screen_reader_text' => 'PAGE NAVI',
	'mid_size' => 2,
	'prev_text' => __( '&laquo;', 'textdomain' ),
	'next_text' => __( '&raquo;', 'textdomain' ),
) ); ?>
</div>