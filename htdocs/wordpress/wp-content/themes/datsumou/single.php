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
the_post();
$terms = get_terms('category');
$the_terms = get_the_terms($post->ID, 'category' );
// print_r($terms);
// exit();

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
<div class="mainContents" data-id="<?php echo $post->ID; ?>">
	<?php get_template_part('categoryNavi'); ?>
	<section class="contentBlock">
		<?php if(!is_amp()): ?>
		<div class="categorySelectWrapper">
			<div class="categorySelect">
				<?php
					$category_id = $the_terms[0]->term_id;
					// $category_url = ($the_terms[0]->description)?$the_terms[0]->description:esc_url( get_category_link( $the_terms[0]->term_id ) );
					$category_url = (get_field('category_url','category_'.$category_id))?get_field('category_url','category_'.$category_id):esc_url( get_category_link( $the_terms[0]->term_id ) );
					// print_r($category_url);
					outputCategorySelect($category_url);
				?>
			</div>
		</div>
		<?php endif; ?>

		<header class="entryHeader">
			<h1 class="entryTitle"><?php the_title(); ?></h1>
			<div class="entryAttribute">
				<div class="date"><?php the_time('Y年m月d日'); ?></div>
				<?php if($the_terms): ?>
				<ul class="category">
					<?php
					$category_name = $the_terms[0]->name;
					// $parent_url = (get_category( $the_terms[0]->parent )->description)?get_category( $the_terms[0]->parent )->description:esc_url(get_category_link( $the_terms[0]->parent ));
					$parent_id = $the_terms[0]->parent;
					$parent_url = (get_field('category_url','category_'.$parent_id))?get_field('category_url','category_'.$parent_id):esc_url(get_category_link( $the_terms[0]->parent ));
					$parent_name = get_category( $the_terms[0]->parent )->name;
					?>
					<li><a href="/">TOP</a></li><li><a href="<?php echo $parent_url; ?>"><?php echo $parent_name; ?></a></li><li><a href="<?php echo $category_url; ?>"><?php echo $category_name; ?></a></li>
				</ul>
				<?php endif; ?>
				<?php /*<div class="author"><?php the_author(); ?></div>*/ ?>
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
<?php /*
<?php for($n=0; $n<count($block[$i]['contents']); $n++): ?>
<?php if($block[$i]['contents'][$n]['column_headline2']): ?>
<li class="sub"><a href="#<?php echo 'index'.($i+1).'-'.($n+1); ?>" class="scroll"><?php echo $block[$i]['contents'][$n]['column_headline2']; ?></a></li>
<?php endif; ?>
<?php endfor; ?>
*/ ?>
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
							<?php echo customImg($block[$i]['contents'][$n]['column_contents']); ?>
							<?php //echo $block[$i]['contents'][$n]['column_contents']; ?>
						<?php endif; ?>
					</div>
					<?php endfor; ?>


				</section>
				<?php endfor; ?>

				<?php //the_content();//「Native Lazy」本文中の画像のみなら対応可 ?>

				<?php
				$exclusionID = explode(",", get_field('optionTemplate_exclusion', 'option'));
				$exclusion = array_search($post->ID, $exclusionID);
				if($exclusion === false): ?>
				<div class="entryTemplate">
					<?php if(is_amp()): ?>
					<?php
						$content = get_field('optionTemplate_contents', 'option');;
						echo convertImgToAmpImg($content);
					?>
					<?php else: ?>
						<?php the_field('optionTemplate_contents', 'option'); ?>
					<?php endif; ?>
				</div>
				<?php endif; ?>

				<?php if(get_the_author_meta('user_description'))://プロフィール情報に記載があれば表示 ?>
				<div class="userProfile">
					<h3 class="userProfileTitle">この記事を書いた人</h3>
					<div class="userProfileInner">
						<?php
							$author_img = get_avatar( get_the_author_meta('id'), 300 );
							$imgtag= '/<img.*?src=(["\'])(.+?)\1.*?>/i';
							if(preg_match($imgtag, $author_img, $imgurl)){
								$authorimg = $imgurl[2];
								// print_r($imgurl);
							}
							// echo $authorimg;
						?>
						<div class="userProfileAvator">
							<?php if(is_amp()): ?>
								<amp-img src="<?php echo $authorimg; ?>" width="300" height="300" layout="responsive"></amp-img>
							<?php else: ?>
								<?php //echo $author_img; ?>
								<img data-normal="<?php echo $authorimg; ?>" src="/assets/images/dummy.gif" class="lazy">
							<?php endif; ?>
						</div>
						<div class="userProfileInfo">
							<h3 class="userProfileName"><?php the_author(); ?></h3>
							<div class="userProfileDesc">
								<?php the_author_meta('user_description'); ?>
							</div>
							<?php if(get_the_author_meta('user_url')): ?>
							<div class="userProfileSite">
								<a href="<?php the_author_meta('user_url'); ?>" target="_blank"><?php the_author_meta('user_url'); ?></a>
							</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</section>
</div>
<?php
if(!is_amp()){
	get_footer();
}
?>
