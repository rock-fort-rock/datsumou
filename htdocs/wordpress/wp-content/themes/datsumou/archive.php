<?php
$status = [
	'id' => 'column',
];
?>
<?php get_header(); ?>

<?php
$term = $wp_query->queried_object;
// print_r($term);
$termSlug = $term->slug;
$title = (!empty($term))?$term->name:'コラム一覧';
?>

<div class="mainContents">
	<section class="contentBlock">
		<h1 class="archiveTitle"><?php echo $title; ?></h1>

		<?php
		$terms = get_terms('category');

		// print_r($terms);
		?>

		<div class="categorySelectWrapper">
			<div class="categorySelect">
				<select onChange="location.href=value;">
					<option selected>カテゴリ選択</option>
					<?php
						$parent_terms = get_terms('category', array('parent' => 0) );
						foreach($parent_terms as $parent_value):
					?>
					<optgroup label="<?php echo $parent_value->name; ?>">
						<?php $parent_url = ($parent_value->description)?$parent_value->description:esc_url( get_category_link( $parent_value->term_id ) ); ?>
						<option value="<?php echo $parent_url; ?>"><?php echo $parent_value->name; ?>一覧</option>
						<?php
							$parent_id = $parent_value->term_id;
							$child_terms = get_terms( 'category', array('parent' => $parent_id) );
							foreach($child_terms as $child_value):
							$child_url = ($child_value->description)?$child_value->description:esc_url( get_category_link( $child_value->term_id ) );
						?>
						<option value="<?php echo $child_url; ?>"><?php echo $child_value->name; ?></option>
						<?php endforeach; ?>
					</optgroup>
					<?php endforeach; ?>
				</select>
			</div>
		</div>

		<?php if(have_posts()): ?>
		<?php while(have_posts()): the_post(); ?>
		<?php
		$the_terms = get_the_category($post->ID);
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
							<ul class="category">
								<?php
								$category_name = $the_terms[0]->name;
								$parent_name = get_category( $the_terms[0]->parent )->name;
								?>
								<li><?php echo $parent_name; ?></li><li><?php echo $category_name; ?></li>
							</ul>
							<?php endif; ?>
							<!-- <div class="author"><?php the_author(); ?></div> -->
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
	</section>
</div>

<?php get_footer(); ?>
