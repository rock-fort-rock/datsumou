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

			<section class="pageContentBlock">
				<div class="contentInner">
					<h1 class="pageContentTitle"><?php the_title(); ?>を施術した後のアフターケア</h1>
					<div class="pageContentBody">
						<div class="partsImageSet">
							<div class="textBlock">
								<?php the_field('treatmentDetail_aftercare'); ?>
							</div>
							<div class="imageBlock">
								<?php if(is_amp()): ?>
									<amp- src="/assets/images/treatment/aftercare.png" width="360" height="360" layout="responsive"></amp-img>
								<?php else: ?>
									<img src="/assets/images/treatment/aftercare.png">
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="pageContentBlock">
				<div class="contentInner">
					<h1 class="pageContentTitle"><?php the_title(); ?>を施術する前の注意点</h1>
					<div class="pageContentBody">
						<div class="partsImageSet">
							<div class="textBlock">
								<?php the_field('treatmentDetail_attention'); ?>
							</div>
							<div class="imageBlock">
								<?php if(is_amp()): ?>
									<amp- src="/assets/images/treatment/attention.png" width="360" height="360" layout="responsive"></amp-img>
								<?php else: ?>
									<img src="/assets/images/treatment/attention.png">
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="pageContentBlock">
				<div class="contentInner">
					<h1 class="pageContentTitle"><?php the_title(); ?>は美容脱毛と医療脱毛どちらがおすすめ？</h1>
					<div class="pageContentBody">
						<div class="partsImageSet">
							<div class="textBlock">
								<?php the_field('treatmentDetail_beautymedical'); ?>
							</div>
							<div class="imageBlock">
								<?php if(is_amp()): ?>
									<amp- src="/assets/images/treatment/beautymedical.png" width="360" height="360" layout="responsive"></amp-img>
								<?php else: ?>
									<img src="/assets/images/treatment/beautymedical.png">
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="pageContentBlock">
				<div class="contentInner">
					<h1 class="pageContentTitle"><?php the_title(); ?>に関するお悩み解決</h1>
					<div class="pageContentBody">
					</div>
				</div>
			</section>

			<section class="pageContentBlock">
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

						<?php if(is_amp()): ?>
							<ul class="review">
								<?php
								$count = count($review);
								?>
								<?php for($i=0; $i<$count; $i++): ?>
								<li>
									<div class="avatar"><amp-img src="<?php echo $review[$i]['avatar']; ?>" width="60" height="60"></amp-img></div>
									<div class="comment"><?php echo $review[$i]['comment']; ?></div>
								</li>
								<?php endfor; ?>
							</ul>
						<?php else: ?>
							<ul class="review">
								<?php
								$count = count($review);
								$init = 3;
								?>
								<?php for($i=0; $i<min($count, $init); $i++): ?>
								<li>
									<div class="avatar"><img src="<?php echo $review[$i]['avatar']; ?>"></div>
									<div class="comment"><?php echo $review[$i]['comment']; ?></div>
								</li>
								<?php endfor; ?>
							</ul>
						<?php endif; ?>
					</div>
				</div>
			</section>

			<?php if(have_rows('treatmentList_block')): ?>
			<!-- <div class="pageContent"> -->
			<?php while(have_rows('treatmentList_block')): the_row(); ?>
			<section class="pageContentBlock">
				<div class="contentInner">
					<h1 class="pageContentTitle"><?php the_sub_field('treatmentList_headline'); ?></h1>
					<div class="pageContentBody">
						<?php the_sub_field('treatmentList_content'); ?>
					</div>
				</div>
			</section>
			<?php endwhile; ?>
			<!-- </div> -->
			<?php endif; ?>

			<section class="pageContentBlock">
				<div class="contentInner">
					<h1 class="pageContentTitle"><?php the_title(); ?>にオススメのサロン5選</h1>
				</div>
			<?php
			global $salonPosts;
			$salonPosts = get_field('treeatment_ranking'); ?>
			<?php get_template_part('ranking'); ?>
			</section>

			<section class="pageContentBlock">
				<div class="contentInner">
					<h1 class="pageContentTitle">その他の施術箇所</h1>
					<ul class="partsList">
						<?php while(have_rows('optionParts_list', 'option')): the_row(); $partsImgObj = get_sub_field('optionParts_list_image'); ?>
							<?php
								$url = get_sub_field('optionParts_list_link');
								if(mb_substr($url, -1) == '/'){
									$url = substr($url, 0, -1);//最後の「/」削除
								}
								$folder = end(explode("/", $url));
							 ?>
							 <?php if($post->post_name !== $folder): ?>
							<li>
								<a href="<?php the_sub_field('optionParts_list_link'); ?>" class="inner">
									<img src="<?php echo $partsImgObj['sizes']['medium']; ?>" class="thumb">
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
