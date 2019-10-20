<?php
/*
Template Name: 施術箇所詳細
*/
?>

<?php
if(!is_amp()){
	get_header();
}
?>
<div class="mainContents">
	<section class="contentBlock">
		<div class="archiveTitle"><?php the_title(); ?></div>
		<div class="categorySelectWrapper">
			<div class="categorySelect">
				<?php outputCategorySelect(); ?>
			</div>
		</div>
		<!-- <div class="pageHeader">
			<div class="pageTitle">施術箇所一覧</div>
		</div> -->
			<section class="pageHeader">
				<div class="treatmentDetailHeader">
					<h1 class="title"><?php the_title(); ?>とは</h1>
					<div class="body">
						<?php if(is_amp()): ?>
							<?php
								$eyecatchId = get_post_thumbnail_id($post->ID);
								$eyecatch = wp_get_attachment_image_src( $eyecatchId, 'medium' );
								$eyecatchSrc = $eyecatch[0];
								$eyecatchWidth = $eyecatch[1];
								$eyecatchHeight = $eyecatch[2];
							?>
							<amp-img src="<?php echo $eyecatchSrc; ?>" width="<?php echo $eyecatchWidth; ?>" height="<?php echo $eyecatchHeight; ?>" layout="responsive"></amp-img>
						<?php else: ?>
							<img src="<?php the_post_thumbnail_url('medium'); ?>">
						<?php endif; ?>

						<div class="description">
							<?php the_field('treatmentDetail_lede'); ?>
						</div>
					</div>
				</div>
			</section>

			<?php if(!is_amp()): ?>
			<section class="pageContentBlock">
				<div class="contentInner">
					<div class="tableofcontents">
						<div class="title">目次</div><!--<span class="displayToggle">[表示]</span>-->
						<ul>
							<li class="main"><a href="#aftercare" class="scroll"><?php the_title(); ?>を施術した後のアフターケア</a></li>
							<li class="main"><a href="#attention" class="scroll"><?php the_title(); ?>を施術する前の注意点</a></li>
							<li class="main"><a href="#beautymedical" class="scroll"><?php the_title(); ?>は美容脱毛と医療脱毛どちらがおすすめ？</a></li>
							<li class="main"><a href="#solution" class="scroll"><?php the_title(); ?>に関するお悩み解決</a></li>
							<li class="main"><a href="#comment" class="scroll"><?php the_title(); ?>を経験した人のコメント</a></li>
							<li class="main"><a href="#recommendsalon" class="scroll"><?php the_title(); ?>にオススメのサロン5選</a></li>
							<li class="main"><a href="#relatedentry" class="scroll"><?php the_title(); ?>の関連記事</a></li>
							<li class="main"><a href="#otherparts" class="scroll">その他の施術箇所</a></li>
						</ul>
					</div>
				</div>
			</section>
			<?php endif; ?>


			<section class="pageContentBlock" id="aftercare">
				<div class="contentInner">
					<h1 class="pageContentTitle"><?php the_title(); ?>を施術した後のアフターケア</h1>
					<div class="pageContentBody">
						<div class="partsImageSet">
							<div class="textBlock">
								<?php the_field('treatmentDetail_aftercare'); ?>
							</div>
							<div class="imageBlock">
								<?php if(is_amp()): ?>
									<amp-img src="/assets/images/treatment/aftercare.png" width="360" height="360" layout="responsive"></amp-img>
								<?php else: ?>
									<img src="/assets/images/treatment/aftercare.png">
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="pageContentBlock" id="attention">
				<div class="contentInner">
					<h1 class="pageContentTitle"><?php the_title(); ?>を施術する前の注意点</h1>
					<div class="pageContentBody">
						<div class="partsImageSet">
							<div class="textBlock">
								<?php the_field('treatmentDetail_attention'); ?>
							</div>
							<div class="imageBlock">
								<?php if(is_amp()): ?>
									<amp-img src="/assets/images/treatment/attention.png" width="360" height="360" layout="responsive"></amp-img>
								<?php else: ?>
									<img src="/assets/images/treatment/attention.png">
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="pageContentBlock" id="beautymedical">
				<div class="contentInner">
					<h1 class="pageContentTitle"><?php the_title(); ?>は美容脱毛と医療脱毛どちらがおすすめ？</h1>
					<div class="pageContentBody">
						<div class="partsImageSet">
							<div class="textBlock">
								<?php the_field('treatmentDetail_beautymedical'); ?>
							</div>
							<div class="imageBlock">
								<?php if(is_amp()): ?>
									<amp-img src="/assets/images/treatment/beautymedical.png" width="360" height="360" layout="responsive"></amp-img>
								<?php else: ?>
									<img src="/assets/images/treatment/beautymedical.png">
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="pageContentBlock" id="solution">
				<div class="contentInner">
					<h1 class="pageContentTitle"><?php the_title(); ?>に関するお悩み解決</h1>
					<div class="pageContentBody">
						<?php if(is_amp()): ?>
							<?php
							$content = convert_content_to_amp_sample(get_field('treatmentDetail_solution'));
							echo convertImgToAmpImg($content);
							?>
						<?php else: ?>
							<?php the_field('treatmentDetail_solution'); ?>
						<?php endif; ?>
					</div>
				</div>
			</section>

			<section class="pageContentBlock" id="comment">
				<div class="contentInner">
					<h1 class="pageContentTitle"><?php the_title(); ?>を経験した人のコメント</h1>
					<div class="pageContentBody">
						<ul class="review">
						<?php while(have_rows('treatmentDetail_review')): the_row(); ?>
							<li>
								<?php
									$imgObj = get_sub_field('treatmentDetail_review_avatar');
									$avatar = $imgObj['sizes']['thumbnail'];
								?>
								<div class="avatar">
								<?php if(is_amp()): ?>
									<amp-img src="<?php echo $avatar; ?>" width="60" height="60"></amp-img>
								<?php else: ?>
									<img src="<?php echo $avatar; ?>">
								<?php endif; ?>
								</div>
								<div class="comment"><?php the_sub_field('treatmentDetail_review_comment'); ?></div>
							</li>
						<?php endwhile; ?>
						</ul>
					</div>
				</div>
			</section>


			<section class="pageContentBlock" id="recommendsalon">
				<div class="contentInner">
					<h1 class="pageContentTitle"><?php the_title(); ?>にオススメのサロン5選</h1>
				</div>
			<?php
			global $salonPosts;
			$salonPosts = get_field('treeatment_ranking'); ?>
			<?php get_template_part('ranking'); ?>
			</section>

			<section class="pageContentBlock" id="relatedentry">
				<div class="contentInner">
					<h1 class="pageContentTitle"><?php the_title(); ?>の関連記事</h1>
					<?php
					$cat_id = get_field('treatmentDetail_category');//単一選択
					if($cat_id):
					?>
					<div class="pageContentBody">
						<div class="recommend">
							<?php

							$args = array(
								'post_type' => 'column', // 投稿タイプpostに変更!!!!!!!!!!!!!!!!!!!!!!!!!※もっとみるも
								// 'category' => $cat_id,

								'tax_query' => array(
						        array(
						            'taxonomy' => 'column_category',
						            'field' => 'id',
						            'terms' => $cat_id,
						            'operator' => 'IN'
						        ),
						    ),
								'posts_per_page' => 5,
							);
							$related_posts = get_posts($args);
							$related_postsID = [];
							foreach ($related_posts as $value) {
								array_push($related_postsID, $value->ID);
							}
							// print_r($related_postsID);
							// echo '<br>';
							if(get_field('treatmentdetail_categoryfixgroup')['post']){
								$fix_postObj = get_field('treatmentdetail_categoryfixgroup')['post'];
								$pos = array_search($fix_postObj->ID, $related_postsID);
								if($pos !== false){//指定記事が最新５件に含まれてれば削除
									array_splice($related_postsID, $pos, 1);
								}elseif(count($related_postsID)==5){//なければ最後のを削除 最新が5件に見たなければそのまま
									array_pop($related_postsID);
								}
								$order = get_field('treatmentdetail_categoryfixgroup')['order'] - 1;
								array_splice($related_postsID, $order, 0, $fix_postObj->ID);
								// print_r($related_postsID);
							}

							$recommend = [];
							foreach($related_postsID as $postID){
								$recoTemp['link'] = get_the_permalink($postID);
								$recoTemp['title'] = get_the_title($postID);
								$recoTemp['date'] = get_the_time('Y年m月d日', $postID);
								$raw_lede = strip_tags(get_field('column_lede', $postID));
								$num = 60;
								$lede = mb_substr($raw_lede, 0, $num);
								if(mb_strlen($raw_lede) > $num){
									$lede .= '…' ;
								}
								$recoTemp['lede'] = $lede;

								$eyecatchId = get_post_thumbnail_id($postID);
								$eyecatch = wp_get_attachment_image_src( $eyecatchId, 'medium_large' );
								$recoTemp['eyecatchSrc'] = $eyecatch[0];
								$recoTemp['eyecatchWidth'] = $eyecatch[1];
								$recoTemp['eyecatchHeight'] = $eyecatch[2];

								array_push($recommend, $recoTemp);
							}

							// print_r($recommend);
							?>

							<?php foreach($recommend as $value): ?>
							<article class="entry">
									<a href="<?php echo $value['link']; ?>">
										<div class="imageBlock">
											<?php if(is_amp()): ?>
											<amp-img src="<?php echo $value['eyecatchSrc']; ?>" width="<?php echo $value['eyecatchWidth']; ?>" height="<?php echo $value['eyecatchHeight']; ?>" layout="responsive"></amp-img>
											<?php else: ?>
											<img src="<?php echo $value['eyecatchSrc']; ?>">
										<?php endif; ?>
										</div>
										<div class="textBlock">
											<div class="entryAttribute">
												<div class="date"><?php echo $value['date']; ?></div>
											</div>
											<h2 class="entryTitle"><?php echo $value['title']; ?></h2>
											<div class="entryLede exceptSmall">
												<?php echo $value['lede']; ?>
											</div>
										</div>
									</a>
							</article>
							<?php endforeach; ?>
							<div class="viewMore">
								<?php
									$term_link = get_term_link($cat_id, 'column_category');
									// $term_link = get_category_link( $cat_id[0] );
								?>
								<a href="<?php echo esc_url( $term_link ); ?>">もっとみる</a>
							</div>
						</div>
					</div>
					<?php endif; ?>
				</div>
			</section>

			<section class="pageContentBlock" id="otherparts">
				<div class="contentInner">
					<h1 class="pageContentTitle">その他の施術箇所</h1>
					<ul class="partsList">
						<?php while(have_rows('optionParts_list', 'option')): the_row(); $partsImgObj = get_sub_field('optionParts_list_image'); ?>
							<?php
								$url = get_sub_field('optionParts_list_link');
								if(mb_substr($url, -1) == '/'){
									$url = substr($url, 0, -1);//最後の「/」削除
								}
								$folderArray = explode("/", $url);
								$folder = end($folderArray);//最下層のフォルダ名
							 ?>
							 <?php if($post->post_name !== $folder): ?>
							<li>
								<a href="<?php the_sub_field('optionParts_list_link'); ?>" class="inner">
									<?php if(is_amp()): ?>
										<amp-img src="<?php echo $partsImgObj['sizes']['medium']; ?>" width="360" height="360" layout="responsive" class="thumb"></amp-img>
									<?php else: ?>
										<img src="<?php echo $partsImgObj['sizes']['medium']; ?>" class="thumb">
									<?php endif; ?>
									<p>
										<?php the_sub_field('optionParts_list_text'); ?>
									</p>
								</a>
							</li>
							<?php endif; ?>
						<?php endwhile; ?>
					</ul>
				</div>
			</section>

	</section>
</div>

<?php
if(!is_amp()){
	get_footer();
}
?>
