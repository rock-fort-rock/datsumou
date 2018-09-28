<?php
/*
Template Name: パターン作成事業->パターン設計
*/
?>
<?php
$status = [
	'id' => 'pattern',
	'description' => 'デザインイメージと素材イメージから、お客様の要望する着心地を考慮し、丁寧に形にしていきます。',
	'localPage' => 'design',
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
?>
		<div class="contents">
			<div class="breadcrumb">
				<ul>
					<li><a href="/">HOME</a></li><li><a href="/pattern/">パターン作成事業</a></li><li>パターン設計</li>
				</ul>
			</div>

			<div class="textHeader">
				<div class="textHeader__inner">
					<h2 class="textHeader__page">パターン設計</h2>
					<h1 class="textHeader__desc">デザインイメージと素材イメージから、<br class="visible-sp">お客様の要望する着心地を考慮し、丁寧に形にしていきます。</h1>
				</div>
			</div>

			<div class="columnTwo">
				<?php get_template_part('pattern/local-navi'); ?>
				<div class="mainContents">
					<div class="contentBlock">
						<div class="contentInner">
							<h2 class="subTitle">レディース(ヤング・ミッシー・ミセス)洋服全般</h2>
							
							<div class="ladies paragraph">
								<?php if( get_field('slide') ): ?>
								<div class="ladies__image">
									<div class="swiper-container">
										<ul class="swiper-wrapper">
											<?php while( the_repeater_field('slide') ):; ?>
											<?php
											$imgObj = get_sub_field('slide_image');
											$img = $imgObj['sizes']['medium_large'];
											?>
											<li class="swiper-slide"><img src="<?php echo $img; ?>"></li>
											<?php endwhile; ?>
										</ul>
										<div class="swiper-pagination"></div>
										<div class="swiper-button-prev"></div>
										<div class="swiper-button-next"></div>
									</div>
								</div>
								<?php endif; ?>

								<div class="ladies__text">
									<p>ルックグループで培った経験をもとに、フォーマルからカジュアルまで、OEM先のさまざまな要望に応えるパターンを作成しています。</p>
									<p>各年代に合わせた、着心地の良いパターン、布帛、カットソー、それぞれ素材特性に合わせた縫いやすいパターンを作成いたします。</p>
									<p>ラージサイズ専門ブランドで培ったノウハウがあり、ラージサイズでも綺麗に見えて、着心地の良いパターンを作成いたします。</p>
								</div>
							</div>

							<div class="paragraph">
								<h3 class="sub2Title">パターン依頼について</h3>
								<p>デザイン画・イラストはもちろん写真、古着等の見本サンプルなどのイメージと参考素材をご提示頂ければパターン作成が可能です。</p>
							</div>

							<div class="paragraph">
								<h3 class="sub2Title">トワルチェックをご要望のお客様</h3>
								<p>トワルチェックの方法ですが、近郊(弊社～１時間位)であれば直接伺い打ち合わせさせて頂きます。<br>また弊社にお越しいただいてのチェックもOKです。宅配便による配送でのトワルチェックにも対応いたします。</p>
							</div>

						</div>
					</div>
					<div class="equipment contentBlock">
						<div class="contentInner">
							<h2 class="subTitle">主な設備</h2>
							<h3 class="sub2Title">CAD・CAM設備</h3>
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
				</div>
			</div>
			<?php get_template_part('pattern/footer-link'); ?>
		</div>

<?php get_footer(); ?>