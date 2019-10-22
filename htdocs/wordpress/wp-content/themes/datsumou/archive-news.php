<?php
$status = [
	'id' => 'news',
];
?>
<?php get_header(); ?>

<?php
$term = $wp_query->queried_object;
// print_r($term);
$termSlug = $term->slug;
$title = (!empty($term))?$term->name:'お知らせ一覧';
?>

<div class="mainContents">
	<?php get_template_part('categoryNavi'); ?>
	<section class="contentBlock">
		<h1 class="archiveTitle"><?php echo $title; ?></h1>

		<?php
		$terms = get_terms('news_category');
		// print_r($terms);
		?>
		<div class="categorySelectWrapper">
			<div class="categorySelect">
				<select onChange="location.href=value;">
					<option selected>カテゴリ選択</option>
					<option value="/news/">全て</option>
					<?php foreach($terms as $value): ?>
					<option value="/news/news_category/<?php echo $value->slug; ?>/"><?php echo $value->name; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>

		<?php if(have_posts()): ?>
		<?php while(have_posts()): the_post(); ?>
		<article class="entry news">
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
