<?php
/*
Template Name: 施術箇所一覧
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
			<div class="pageTitle">施術箇所一覧</div>
		</section>

			<!-- <h2 class="pageHeadline1">当サイトについて</h2> -->

			<section class="pageContentBlock">
				<div class="treatmentParts">
					<input id="frontTab" type="radio" name="tabItem" checked>
				  <label class="tabItem" for="frontTab">正面</label>
				  <input id="backTab" type="radio" name="tabItem">
				  <label class="tabItem" for="backTab">背面</label>
				  <input id="vioTab" type="radio" name="tabItem">
				  <label class="tabItem" for="vioTab">VIO</label>

					<?php
						if(is_amp()){
							$btnFront = '<amp-img src="/assets/images/treatment/btn_front.png" alt="正面" width="100" height="100" layout="responsive"></amp-img>';
							$btnBack = '<amp-img src="/assets/images/treatment/btn_back.png" alt="背面" width="100" height="100" layout="responsive"></amp-img>';
							$btnVIO = '<amp-img src="/assets/images/treatment/btn_vio.png" alt="VIO" width="100" height="100" layout="responsive"></amp-img>';
						}else{
							$btnFront = '<img src="/assets/images/treatment/btn_front.png" alt="正面">';
							$btnBack = '<img src="/assets/images/treatment/btn_back.png" alt="背面">';
							$btnVIO = '<img src="/assets/images/treatment/btn_vio.png" alt="VIO">';
						}

					?>
					<div class="tabContent frontContent">
						<?php if(is_amp()): ?>
						<amp-img src="/assets/images/treatment/front.jpg" alt="正面" width="780" height="912" layout="responsive" class="illust"></amp-img>
						<?php else: ?>
					  <img src="/assets/images/treatment/front.jpg" alt="正面" class="illust">
						<?php endif; ?>
						<ul class="otherBtn">
							<li data-target="backTab">
								<?php echo $btnBack; ?>
							</li>
							<li data-target="vioTab">
								<?php echo $btnVIO; ?>
							</li>
						</ul>
					</div>
					<div class="tabContent backContent">
						<?php if(is_amp()): ?>
						<amp-img src="/assets/images/treatment/back.jpg" alt="背面" width="780" height="912" layout="responsive" class="illust"></amp-img>
						<?php else: ?>
					  <img src="/assets/images/treatment/back.jpg" alt="背面" class="illust">
						<?php endif; ?>

						<ul class="otherBtn">
							<li data-target="frontTab">
								<?php echo $btnFront; ?>
							</li>
							<li data-target="vioTab">
								<?php echo $btnVIO; ?>
							</li>
						</ul>
					</div>
					<div class="tabContent vioContent">
						<?php if(is_amp()): ?>
						<amp-img src="/assets/images/treatment/vio.jpg" alt="VIO" width="780" height="912" layout="responsive" class="illust"></amp-img>
						<?php else: ?>
					  <img src="/assets/images/treatment/vio.jpg" alt="VIO" class="illust">
						<?php endif; ?>
						<ul class="otherBtn">
							<li data-target="frontTab">
								<?php echo $btnFront; ?>
							</li>
							<li data-target="backTab">
								<?php echo $btnBack; ?>
							</li>
						</ul>
					</div>
				</div>
			</section>

			<section class="pageContentBlock">
				<ul class="partsList">
					<?php while(have_rows('optionParts_list', 'option')): the_row(); $partsImgObj = get_sub_field('optionParts_list_image'); ?>
						<li>
							<a href="<?php the_sub_field('optionParts_list_link'); ?>" class="inner">
								<?php if(is_amp()): ?>
								<amp-img src="<?php echo $partsImgObj['sizes']['medium']; ?>" width="100" height="100" layout="responsive" class="thumb"></amp-img>
								<?php else: ?>
							  <img src="<?php echo $partsImgObj['sizes']['medium']; ?>" class="thumb">
								<?php endif; ?>
								<p>
									<?php the_sub_field('optionParts_list_text'); ?>
								</p>
							</a>
						</li>
					<?php endwhile; ?>
				</ul>
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
