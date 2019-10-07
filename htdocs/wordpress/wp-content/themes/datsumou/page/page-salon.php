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
		</section>

			<!-- <h2 class="pageHeadline1">当サイトについて</h2> -->


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
