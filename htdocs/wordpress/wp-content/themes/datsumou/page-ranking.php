<?php
/*
Template Name: サロンランキング
*/
$status = [
	'id' => 'ranking',
];
?>
<?php
if(!is_amp()){
	get_header();
}
?>
<?php
$headerObj = get_field('ranking_headerImage');
// $headerImage = ($headerObj)?$headerObj['sizes']['large']:'/assets/images/result_header.jpg';
$headerImage = $headerObj['sizes']['large'];

$headerObjPc = get_field('ranking_headerImage_pc');
// $headerImagePc = ($headerObjPc)?$headerObjPc['sizes']['large']:'/assets/images/result_header_wide.jpg';
$headerImagePc = $headerObjPc['sizes']['large'];
?>

<div class="mainContents">
	<?php get_template_part('categoryNavi'); ?>
	<section class="resultHeader">
		<?php if($headerImage): ?>
			<?php if(is_amp()): ?>
			<amp-img src="<?php echo $headerImagePc; ?>" width="958" height="358" layout="responsive"></amp-img>
			<?php else: ?>
			<picture>
				<source media="(max-width: 768px)" srcset="<?php echo $headerImage; ?>">
				<img src="<?php echo $headerImagePc; ?>">
			</picture>
			<?php endif; ?>
		<?php endif; ?>
	</section>

	<?php
	global $salonPosts;
	$salonPosts = get_field('ranking'); ?>
	<?php get_template_part('ranking'); ?>
</div>

<?php
if(!is_amp()){
	get_footer();
}
?>
