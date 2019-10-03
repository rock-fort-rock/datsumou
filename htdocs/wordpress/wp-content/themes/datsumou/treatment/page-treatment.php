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
		<div class="contentInner">
			<div class="pageTitle">施術箇所一覧</div>

			<!-- <h2 class="pageHeadline1">当サイトについて</h2> -->

			<section class="pageContentBlock">
				<div class="treatmentParts">
					<input id="frontTab" type="radio" name="tabItem" checked>
				  <label class="tabItem" for="frontTab">正面</label>
				  <input id="backTab" type="radio" name="tabItem">
				  <label class="tabItem" for="backTab">背面</label>
				  <input id="vioTab" type="radio" name="tabItem">
				  <label class="tabItem" for="vioTab">VIO</label>

					<div class="tabContent frontContent">
					  <img src="/assets/images/treatment/front.jpg" alt="正面" class="illust">
						<ul class="otherBtn">
							<li data-target="backTab">
								<img src="/assets/images/treatment/btn_back.png" alt="背面">
							</li>
							<li data-target="vioTab">
								<img src="/assets/images/treatment/btn_vio.png" alt="VIO">
							</li>
						</ul>
					</div>
					<div class="tabContent backContent">
					  <img src="/assets/images/treatment/back.jpg" alt="背面" class="illust">
						<ul class="otherBtn">
							<li data-target="frontTab">
								<img src="/assets/images/treatment/btn_front.png" alt="正面">
							</li>
							<li data-target="vioTab">
								<img src="/assets/images/treatment/btn_vio.png" alt="VIO">
							</li>
						</ul>
					</div>
					<div class="tabContent vioContent">
					  <img src="/assets/images/treatment/vio.jpg" alt="VIO" class="illust">
						<ul class="otherBtn">
							<li data-target="frontTab">
								<img src="/assets/images/treatment/btn_front.png" alt="正面">
							</li>
							<li data-target="backTab">
								<img src="/assets/images/treatment/btn_back.png" alt="背面">
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
								<img src="<?php echo $partsImgObj['sizes']['medium']; ?>" class="thumb">
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
				<h1 class="pageContentTitle"><?php the_sub_field('treatmentList_headline'); ?></h1>
				<div class="pageContentBody">
					<?php the_sub_field('treatmentList_content'); ?>
				</div>
			</section>
			<?php endwhile; ?>
			<!-- </div> -->
			<?php endif; ?>

			<section class="pageContentBlock">
				<h1 class="pageContentTitle">みんなに人気のオススメサロン5選</h1>
			<?php
			global $salonPosts;
			$salonPosts = get_field('treeatment_ranking'); ?>
			<?php get_template_part('ranking'); ?>
			</section>

			<section class="pageContentBlock">
				<?php the_field('treatmentList_footerText'); ?>
			</section>

		</div>
	</section>
</div>

<?php
if(!is_amp()){
	get_footer();
}
?>
