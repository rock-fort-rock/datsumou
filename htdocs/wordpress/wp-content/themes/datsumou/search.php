<?php
$status = [
	'id' => 'column',
];
?>
<?php	get_header();　?>
<div class="mainContents">
	<?php get_template_part('categoryNavi'); ?>
	<section class="contentBlock">
		<h1 class="archiveTitle">"<?php echo get_search_query(); ?>"の検索結果</h1>


		<?php if(have_posts()): ?>
		<?php while(have_posts()): the_post(); ?>
		<?php
		$the_terms = get_the_category($post->ID);
		$raw_lede = strip_tags(get_field('column_lede'));
		$num = 60;
		$lede = mb_substr($raw_lede, 0, $num);
		if(mb_strlen($raw_lede) > $num){
			$lede .= '…' ;
		}
		?>
		<article class="entry search">
			<div class="contentInner">
				<a href="<?php the_permalink(); ?>">
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
						<div class="entryLede">
							<?php echo $lede; ?>
						</div>
					</div>
				</a>
			</div>
		</article>
		<?php endwhile; ?>

		<?php else: ?>
		<p style="text-align: center;">ページが見つかりませんでした。</p>
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

<?php /*
<main class="mainContainer">
	<section class="contents">
		<section class="contents__main">
			<div class="contents__mainInner">
				<header class="pageHeader">
					<div class="pageHeader__title">
						"<?php echo get_search_query(); ?>"の検索結果
						<span class="pageHeader__titleEn">SEARCH</span>
					</div>
				</header>

				<section class="contentBlock">
						<?php if(have_posts()): ?>
						<ul class="articleList articleList--large">
						<?php while(have_posts()): the_post(); ?>
							<?php
								$eyecatchId = get_post_thumbnail_id();
								$eyecatch = wp_get_attachment_image_src( $eyecatchId, 'medium_large' );
								$eyecatchSrc = $eyecatch[0];
								$the_terms = get_the_category();
								if($the_terms){
									$termArray = [];
									foreach($the_terms as $termObj){
											array_push($termArray, $termObj->name);
									}
									$termsStr = implode(', ',$termArray);
								}
							?>
							<li class="articleList__item">
								<a href="<?php the_permalink(); ?>" class="articleList__inner">
				          <div class="articleList__image">
				            <img src="<?php echo $eyecatchSrc; ?>">
				          </div>
									<div class="articleList__text">
										<h2 class="articleList__title"><?php the_title(); ?></h2>
										<!-- <div class="articleList__lead">
											リード文が入ります。リード文が入ります。リード文が入ります。リード文が入ります。リード文が入ります。リード文が入ります。
										</div> -->
					          <div class="articleList__info">
											<div class="articleList__category">
					              <span class="Icon -tag"></span><?php echo $termsStr; ?>
					            </div>
					            <!-- <div class="articleList__date">
					              <?php the_time('Y.m.d'); ?>
					            </div> -->
					          </div>
									</div>
				        </a>
							</li>
						<?php endwhile; ?>
						</ul>
						<?php else: ?>
							<p class="-center">記事が見つかりません。</p>
						<?php endif; ?>

						<div class="paginationWrapper">
						<?php the_posts_pagination( array(
							'screen_reader_text' => ' ',
							'mid_size' => 2,
							'prev_text' => __( '&laquo;', 'textdomain' ),
							'next_text' => __( '&raquo;', 'textdomain' ),
						) ); ?>
						</div>
				</section>
			</div>
		</section>

		<section class="contents__side">
			<?php get_template_part( 'sidebar' ); ?>
		</section>
	</section>
</main>
*/ ?>
<?php get_footer();　?>
