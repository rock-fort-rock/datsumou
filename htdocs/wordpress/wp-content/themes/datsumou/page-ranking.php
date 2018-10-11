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
	<section class="contentBlock">
		<div style="background-color: #ededed; height: 0; padding-top: 40%"></div>
	</section>
	<?php $salonPosts = get_field('ranking'); ?>
	<?php get_template_part('ranking'); ?>
</div>

<?php get_footer(); ?>