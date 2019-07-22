<?php get_header(); ?>
<?php
	$term = $wp_query->queried_object;
	// print_r($term);
	$termSlug = $term->slug;
	$title = $term->name;

	$allTerms = get_terms('glossarycat', array('hide_empty'=> 0));
	// print_r($terms);
?>
<div class="mainContents">
	<section class="contentBlock">
		<div class="contentInner">
			<h1 class="pageTitle">用語集</h1>

			<ul class="glossaryNavi">
				<?php foreach($allTerms as $value): ?>
					<li class="glossaryNavi__item">
						<a href="/glossarycat/<?php echo $value->slug; ?>/"><?php echo $value->name; ?></a>
					</li>
				<?php endforeach; ?>
				<!-- <li class="glossaryNavi__item glossaryNavi__item--wide">
					<a href="#">アルファベット・数字</a>
				</li> -->
			</ul>

	    <ul class="glossaryList">
				<li>
					<div class="catTitle"><?php echo $title; ?></div>


					<?php if(have_posts()): ?>
					<ul class="wordList">
						<?php while(have_posts()): the_post(); ?>
						<li class="wordItem">
							<div class="word"><?php the_title(); ?></div>
							<div class="description">
								<?php the_content(); ?>
							</div>
						</li>
						<?php endwhile; ?>
					</ul>
	        <?php else: ?>
					<p>
						用語がありません。
					</p>
	        <?php endif; ?>
				</li>
			</ul>

		</div>
	</section>
</div>

<?php get_footer(); ?>
