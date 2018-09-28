<?php
/*
Template Name: OEM・ODM事業->設備・スタッフ
*/
?>
<?php
$status = [
	'id' => 'oemodm',
	'description' => 'ルックモードの主な設備、縫製仕様、スタッフを紹介します。',
	'localPage' => 'equipment',
];
?>
<?php get_header(); ?>

<?php
$equipmentArray = [];
while(the_repeater_field('equipment')){
	$equipTemp = [];
	$imgObj = get_sub_field('equipment_image');
	$equipTemp['img'] = $imgObj['sizes']['medium_large'];
	$equipTemp['title'] =  get_sub_field('equipment_title');
	$equipTemp['desc'] =  get_sub_field('equipment_desc');
	array_push($equipmentArray, $equipTemp);
}

$galleryArray = [];
while(the_repeater_field('gallery')){
	$galleryTemp = [];
	$galleryTemp['title'] =  get_sub_field('gallery_title');
	$galleryTemp['lede'] =  get_sub_field('gallery_lede');

	$galleryPhotoTemp = [];
	while(the_repeater_field('gallery_photo')){
		$imgObj = get_sub_field('gallery_photo_img');
		$galleryPhotoTemp[] = $imgObj['sizes']['medium_large'];
	}
	$galleryTemp['photo'] = $galleryPhotoTemp;
	array_push($galleryArray, $galleryTemp);
}
// print_r($galleryArray);
?>
		<div class="contents">
			<div class="breadcrumb">
				<ul>
					<li><a href="/">HOME</a></li><li><a href="/oem-odm/">OEM・ODM事業</a></li><li>設備・スタッフ</li>
				</ul>
			</div>

			<div class="textHeader">
				<div class="textHeader__inner">
					<h2 class="textHeader__page">設備・スタッフ</h2>
					<h1 class="textHeader__desc">ルックモードの主な設備、縫製仕様、スタッフを紹介します。</h1>
				</div>
			</div>

			<div class="columnTwo">
				<?php get_template_part('oem-odm/local-navi'); ?>
				<div class="mainContents">

					<div class="equipment contentBlock">
						<div class="contentInner">
							<h2 class="subTitle">設備</h2>
							<?php if($equipmentArray): ?>
							<ul class="equipment__list">
								<?php foreach($equipmentArray as $value): ?>
								<li>
									<div class="equipment__photo"><img src="<?php echo $value['img']; ?>" alt="<?php echo $value['title']; ?>"></div>
									<div class="equipment__text">
										<div class="equipment__name"><?php echo $value['title']; ?></div>
										<?php if($value['desc']): ?><div class="equipment__desc"><?php echo $value['desc']; ?></div><?php endif; ?>
									</div>
								</li>
							<?php endforeach; ?>
							</ul>
							<?php endif; ?>
						</div>
					</div>

					<!-- <div>aa</div> -->

					<div class="gallery contentBlock">
						<div class="contentInner">
							<?php foreach($galleryArray as $value): ?>
							<div class="gallery__set">
								<h2 class="gallery__title subTitle visible-sp"><?php echo $value['title']; ?></h2>
								<div class="gallery__photo">
									<div class="swiper-container">
										<ul class="swiper-wrapper">
											<?php foreach($value['photo'] as $img): ?>
											<li class="swiper-slide"><img src="<?php echo $img; ?>"></li>
											<?php endforeach; ?>
										</ul>
										<div class="swiper-pagination"></div>
										<div class="swiper-button-prev"></div>
										<div class="swiper-button-next"></div>
									</div>
								</div>
								<div class="gallery__text">
									<h2 class="gallery__title subTitle visible-pc"><?php echo $value['title']; ?></h2>
									<div class="gallery__desc"><?php echo $value['lede']; ?></div>
								</div>
							</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
			<?php get_template_part('oem-odm/footer-link'); ?>
		</div>

<?php get_footer(); ?>