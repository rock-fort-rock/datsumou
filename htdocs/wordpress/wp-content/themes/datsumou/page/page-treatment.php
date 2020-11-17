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
	<?php get_template_part('categoryNavi'); ?>
	<section class="contentBlock">
		<!-- <div class="archiveTitle"><?php the_title(); ?></div> -->
		<div class="categorySelectWrapper">
			<div class="categorySelect">
				<?php
					$current_url =  get_pagenum_link(get_query_var('page'));
				// print_r($current_url);
					outputCategorySelect($current_url);
				?>
			</div>
		</div>
		<!-- <section class="pageHeader">
			<div class="pageTitle">施術箇所一覧</div>
		</section> -->

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
					  <img src="/assets/images/treatment/front.jpg?2" alt="正面" class="illust">
						<?php endif; ?>

						<ul class="leftBtn">
							<li class="partsItem">
								<a href="/treatment/face/">顔脱毛</a>
							</li>
							<li class="partsItem">
								<a href="/treatment/breast/">胸脱毛</a>
							</li>
							<li class="partsItem">
								<a href="/treatment/arm/">腕脱毛</a>
							</li>
							<li class="partsItem">
								<a href="/treatment/thigh/">太もも脱毛</a>
							</li>
						</ul>
						<ul class="rightBtn">
							<li class="partsItem">
								<a href="/treatment/neck/">首脱毛</a>
							</li>
							<li class="partsItem">
								<a href="/treatment/underarm/">脇脱毛</a>
							</li>
							<li class="partsItem">
								<a href="/treatment/belly/">お腹脱毛</a>
							</li>
							<li class="partsItem">
								<a href="/treatment/leg/">脚脱毛</a>
							</li>
						</ul>
						<ul class="bottomBtn">
							<li class="partsItem">
								<a href="/treatment/all/">全身脱毛</a>
							</li>
						</ul>
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
					  <img src="/assets/images/treatment/back.jpg?2" alt="背面" class="illust">
						<?php endif; ?>
						<ul class="leftBtn -back">
							<li class="partsItem">
								<a href="/treatment/back/">背中脱毛</a>
							</li>
						</ul>
						<ul class="rightBtn -back">
							<li class="partsItem">
								<a href="/treatment/ass/">お尻脱毛</a>
							</li>
						</ul>
						<ul class="bottomBtn">
							<li class="partsItem">
								<a href="/treatment/all/">全身脱毛</a>
							</li>
						</ul>
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
					  <img src="/assets/images/treatment/vio.jpg?3" alt="VIO" class="illust">
						<?php endif; ?>

						<ul class="vioBtn">
							<li class="partsItem">
								<a href="/treatment/vio/">Vライン</a>
							</li>
							<li class="partsItem">
								<a href="/treatment/vio/">Iライン</a>
							</li>
							<li class="partsItem">
								<a href="/treatment/vio/">Oライン</a>
							</li>
						</ul>
						<ul class="bottomBtn">
							<li class="partsItem">
								<a href="/treatment/all/">全身脱毛</a>
							</li>
						</ul>
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
							  
								<img src="/assets/images/dummy.gif" data-normal="<?php echo $partsImgObj['sizes']['medium']; ?>" class="thumb lazy">
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
						<?php if(is_amp()): ?>
							<?php
							$content = convert_content_to_amp_sample(get_sub_field('treatmentList_content'));
							echo convertImgToAmpImg($content);
							?>
						<?php else: ?>
							<?php the_sub_field('treatmentList_content'); ?>
						<?php endif; ?>
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
