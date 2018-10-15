<?php
/*
Template Name: サロンランキング
*/
$status = [
	'id' => 'ranking',
];
?>
<?php get_header(); ?>
<?php
$headerObj = get_field('ranking_headerImage');
// $headerImage = ($headerObj)?$headerObj['sizes']['large']:'/assets/images/result_header.jpg';
$headerImage = $headerObj['sizes']['large'];

$headerObjPc = get_field('ranking_headerImage_pc');
// $headerImagePc = ($headerObjPc)?$headerObjPc['sizes']['large']:'/assets/images/result_header_wide.jpg';
$headerImagePc = $headerObjPc['sizes']['large'];
?>

<div class="mainContents">
	<section class="resultHeader">
		<?php if($headerImage): ?>
		<picture>
			<source media="(max-width: 768px)" srcset="<?php echo $headerImage; ?>">
			<img src="<?php echo $headerImagePc; ?>">
		</picture>
		<?php endif; ?>
	</section>

	<?php $salonPosts = get_field('ranking'); ?>
	<?php get_template_part('ranking'); ?>
</div>

<?php get_footer(); ?>