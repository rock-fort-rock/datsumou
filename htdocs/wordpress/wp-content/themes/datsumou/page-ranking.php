<?php
/*
Template Name: サロンランキング
*/
$status = [
	'id' => 'ranking',
];
?>
<?php get_header(); ?>

<div class="mainContents">
	<section class="resultHeader">
		<picture>
			<source media="(max-width: 768px)" srcset="/assets/images/result_header.jpg">
			<img src="/assets/images/result_header_wide.jpg">
		</picture>
	</section>
	<?php $salonPosts = get_field('ranking'); ?>
	<?php get_template_part('ranking'); ?>
</div>

<?php get_footer(); ?>