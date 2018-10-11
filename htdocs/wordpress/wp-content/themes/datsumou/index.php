<?php
$status = [
	'id' => 'home',
];
?>
<?php get_header(); ?>
<div class="mainContents">
	<section class="contentBlock">
		<div style="background-color: #ededed; height: 0; padding-top: 60%"></div>
	</section>
	<?php $salonPosts = get_field('ranking_top', 'option'); ?>
	<?php get_template_part('ranking'); ?>
</div>

<?php get_footer(); ?>
