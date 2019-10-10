<?php
/*
Template Name: 脱毛サロン一覧
*/
?>

<?php
if(!is_amp()){
	get_header();
}
?>
<div class="mainContents">
	<section class="contentBlock">
		<section class="pageHeader">
			<div class="pageTitle">脱毛サロン一覧</div>
			<?php if(get_post_thumbnail_id($post->ID)): ?>
			<section class="pageContentEyecatch">
			<?php if(is_amp()): ?>
				<?php
					$eyecatchId = get_post_thumbnail_id($post->ID);
					$eyecatch = wp_get_attachment_image_src( $eyecatchId, 'large' );
					$eyecatchSrc = $eyecatch[0];
					$eyecatchWidth = $eyecatch[1];
					$eyecatchHeight = $eyecatch[2];
				?>
				<amp-img src="<?php echo $eyecatchSrc; ?>" width="<?php echo $eyecatchWidth; ?>" height="<?php echo $eyecatchHeight; ?>" layout="responsive"></amp-img>
			<?php else: ?>
				<img src="<?php the_post_thumbnail_url('large'); ?>">
			<?php endif; ?>
			</section>
			<?php endif; ?>
		</section>





			<?php if(!is_amp()): ?>
			<?php
				$headlineArray = [];
				$block1 = get_field('datsumosalon_block');
				if($block1){
					foreach($block1 as $value){
						array_push($headlineArray, $value['datsumosalon_headline']);
					}
				}
				array_push($headlineArray, '美容脱毛を施術できる有名サロン一覧', '医療脱毛を施術できる有名サロン一覧');
				$block2 = get_field('datsumosalon_block2');
				if($block2){
					foreach($block2 as $value){
						array_push($headlineArray, $value['datsumosalon_headline2']);
					}
				}
				array_push($headlineArray, 'みんなに人気のオススメサロン5選');
				// print_r($headlineArray);
			?>
			<section class="pageContentBlock">
				<div class="contentInner">
					<div class="tableofcontents">
						<div class="title">目次</div><!--<span class="displayToggle">[表示]</span>-->
						<ul>
							<?php for($i=0; $i<count($headlineArray); $i++): ?>
								<li class="main"><a href="#<?php echo $headlineArray[$i]; ?>" class="scroll"><?php echo $headlineArray[$i]; ?></a></li>
							<?php endfor; ?>
						</ul>
					</div>
				</div>
			</section>
			<?php endif; ?>

			<?php if(have_rows('datsumosalon_block')): ?>
			<!-- <div class="pageContent"> -->
			<?php while(have_rows('datsumosalon_block')): the_row(); ?>
			<section class="pageContentBlock" id="<?php the_sub_field('datsumosalon_headline'); ?>">
				<div class="contentInner">
					<h1 class="pageContentTitle"><?php the_sub_field('datsumosalon_headline'); ?></h1>
					<div class="pageContentBody">
						<?php the_sub_field('datsumosalon_content'); ?>
					</div>
				</div>
			</section>
			<?php endwhile; ?>
			<!-- </div> -->
			<?php endif; ?>



			<section class="pageContentBlock" id="美容脱毛を施術できる有名サロン一覧">
				<div class="contentInner">
					<h1 class="pageContentTitle">美容脱毛を施術できる有名サロン一覧</h1>
					<div class="pageContentBody">
						<?php if(have_rows('datsumosalon_beauty')): ?>
							<ul class="datsumosalonList">
								<?php while(have_rows('datsumosalon_beauty')): the_row(); ?>
								<li>
									<?php
										$logoObj = get_sub_field('datsumosalon_beauty_logo');
										$logo = $logoObj['sizes']['medium_large'];
										$link = get_sub_field('datsumosalon_beauty_link');
									?>
									<?php if($link): ?>
									<a href="<?php echo $link; ?>">
									<?php endif; ?>
										<h3 class="datsumosalonName">
											<?php the_sub_field('datsumosalon_beauty_name'); ?>
										</h3>
										<div class="datsumosalonContainer">
											<div class="datsumosalonLogo">
											<?php if(is_amp()): ?>
												<amp-img src="<?php echo $logo; ?>" width="500" height="300" layout="responsive"></amp-img>
											<?php else: ?>
												<img src="<?php echo $logo; ?>">
											<?php endif; ?>
											</div>
											<div class="datsumosalonDescription">
												<?php the_sub_field('datsumosalon_beauty_description'); ?>
											</div>
										</div>
									<?php if($link): ?>
									</a>
									<?php endif; ?>
								</li>
								<?php endwhile; ?>
							</ul>
						<?php endif; ?>
					</div>
				</div>
			</section>

			<section class="pageContentBlock" id="医療脱毛を施術できる有名サロン一覧">
				<div class="contentInner">
					<h1 class="pageContentTitle">医療脱毛を施術できる有名サロン一覧</h1>
					<div class="pageContentBody">
						<?php if(have_rows('datsumosalon_medical')): ?>
							<ul class="datsumosalonList">
								<?php while(have_rows('datsumosalon_medical')): the_row(); ?>
								<li>
									<?php
										$logoObj = get_sub_field('datsumosalon_medical_logo');
										$logo = $logoObj['sizes']['medium_large'];
										$link = get_sub_field('datsumosalon_medical_link');
									?>
									<?php if($link): ?>
									<a href="<?php echo $link; ?>">
									<?php endif; ?>
										<h3 class="datsumosalonName">
											<?php the_sub_field('datsumosalon_medical_name'); ?>
										</h3>
										<div class="datsumosalonContainer">
											<div class="datsumosalonLogo">
											<?php if(is_amp()): ?>
												<amp-img src="<?php echo $logo; ?>" width="500" height="300" layout="responsive"></amp-img>
											<?php else: ?>
												<img src="<?php echo $logo; ?>">
											<?php endif; ?>
											</div>
											<div class="datsumosalonDescription">
												<?php the_sub_field('datsumosalon_medical_description'); ?>
											</div>
										</div>
									<?php if($link): ?>
									</a>
									<?php endif; ?>
								</li>
								<?php endwhile; ?>
							</ul>
						<?php endif; ?>
					</div>
				</div>
			</section>

			<?php if(have_rows('datsumosalon_block2')): ?>
			<!-- <div class="pageContent"> -->
			<?php while(have_rows('datsumosalon_block2')): the_row(); ?>
			<section class="pageContentBlock" id="<?php the_sub_field('datsumosalon_headline2'); ?>">
				<div class="contentInner">
					<h1 class="pageContentTitle"><?php the_sub_field('datsumosalon_headline2'); ?></h1>
					<div class="pageContentBody">
						<?php the_sub_field('datsumosalon_content2'); ?>
					</div>
				</div>
			</section>
			<?php endwhile; ?>
			<!-- </div> -->
			<?php endif; ?>

			<section class="pageContentBlock" id="みんなに人気のオススメサロン5選">
				<div class="contentInner">
					<h1 class="pageContentTitle">みんなに人気のオススメサロン5選</h1>
				</div>
			<?php
			global $salonPosts;
			$salonPosts = get_field('treeatment_ranking'); ?>
			<?php get_template_part('ranking'); ?>
			</section>

			<section class="pageContentBlock">
				<div class="contentInner">
					<?php the_field('treatmentList_footerText'); ?>
				</div>
			</section>

	</section>
</div>

<?php
if(!is_amp()){
	get_footer();
}
?>
