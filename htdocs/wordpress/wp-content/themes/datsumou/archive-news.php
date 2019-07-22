<?php
$status = [
	'id' => 'news',
];
?>
<?php get_header(); ?>

<div class="mainContents">
	<section class="contentBlock">
		<h1 class="archiveTitle">お知らせ一覧</h1>

		<?php /*
		<?php
		$terms = get_terms('news_category');
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
		*/ ?>

		<?php if(have_posts()): ?>
		<?php while(have_posts()): the_post(); ?>
		<article class="entry">
			<div class="contentInner">
				<a href="<?php the_permalink(); ?>">
					<div class="textBlock">
						<div class="entryAttribute">
							<div class="date"><?php the_time('Y年m月d日'); ?></div>
						</div>
						<h2 class="entryTitle"><?php the_title(); ?></h2>
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

	</section>
</div>

<?php get_footer(); ?>
