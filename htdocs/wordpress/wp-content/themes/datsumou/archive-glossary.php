<?php get_header(); ?>
<?php
$allTerms = get_terms('glossarycat', array('hide_empty'=> 0));
// print_r($allTerms);
?>
<div class="mainContents">
	<section class="contentBlock">
		<div class="contentInner">
			<h1 class="pageTitle">用語集</h1>

			<ul class="glossaryNavi">
				<?php foreach($allTerms as $value): ?>
					<li>
						<a href="/glossarycat/<?php echo $value->slug; ?>/"><?php echo $value->name; ?></a>
					</li>
				<?php endforeach; ?>
				<!-- <li class="glossaryNavi__item glossaryNavi__item--wide">
					<a href="#">アルファベット・数字</a>
				</li> -->
			</ul>

			<ul class="glossaryList">
				<?php foreach($allTerms as $value): ?>
				<?php
					$args = array(
						'posts_per_page' => 3,
						'post_type' => 'glossary',
						'tax_query' => array(
							array(
								'taxonomy' => 'glossarycat',
								'field' => 'slug',
								'terms' => $value->slug
							)
						),
					);
					$groupPosts = get_posts($args);
					// print_r($groupPosts);
				?>
				<li>
					<div class="catTitle"><?php echo $value->name; ?></div>
					<?php if(!empty($groupPosts)): ?>
						<ul class="wordList">
							<?php foreach($groupPosts as $word): ?>
							<li class="wordItem">
								<div class="word"><?php echo $word->post_title; ?></div>
								<div class="description">
									<?php echo $word->post_content; ?>
								</div>
							</li>
							<?php endforeach; ?>
						</ul>
						<div class="buttonContainer">
							<a href="/glossarycat/<?php echo $value->slug; ?>/">もっと見る</a>
						</div>
					<?php else: ?>
						<p>
							用語がありません。
						</p>
					<?php endif; ?>
				</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</section>
</div>
<?php get_footer(); ?>
