<?php
/*
Template Name: パターン作成事業->グレーディング
*/
?>
<?php
$status = [
	'id' => 'pattern',
	'description' => 'レギュラーサイズはもちろん、イレギュラーサイズ(ラージ、トール、スモール)のグレーディングに経験と自信があります。<br>さまざまな体型の方に、立体的にフィットするようにサイズ展開いたします。',
	'localPage' => 'grading',
];
?>
<?php get_header(); ?>
<?php
$gradingArray = [];
while(the_repeater_field('grading')){
	$gradeTemp = [];
	$gradeTemp['title'] =  get_sub_field('grading_title');
	$gradeTemp['desc'] =  get_sub_field('grading_desc');

	$gradeImageArray = [];
	while(the_repeater_field('grading_image')){
		$gradePhotoTemp = [];
		$imgMainObj = get_sub_field('grading_image_main');
		$gradePhotoTemp['main'] = $imgMainObj['sizes']['medium_large'];
		$gradePhotoTemp['caption'] = get_sub_field('grading_image_caption');
		$imgThumbObj = get_sub_field('grading_image_thumbnail');
		$gradePhotoTemp['thumb'] = $imgThumbObj['sizes']['medium'];

		array_push($gradeImageArray, $gradePhotoTemp);
	}
	$gradeTemp['photo'] = $gradeImageArray;
	array_push($gradingArray, $gradeTemp);
}
// print_r($gradingArray);
?>


		<div class="contents">
			<div class="breadcrumb">
				<ul>
					<li><a href="/">HOME</a></li><li><a href="/pattern/">パターン作成事業</a></li><li>グレーディング</li>
				</ul>
			</div>

			<div class="textHeader">
				<div class="textHeader__inner">
					<h2 class="textHeader__page">グレーディング</h2>
					<h1 class="textHeader__desc">レギュラーサイズはもちろん、イレギュラーサイズ(ラージ、トール、スモール)のグレーディングに経験と自信があります。<br>さまざまな体型の方に、<br class="visible-sp">立体的にフィットするようにサイズ展開いたします。</h1>
				</div>
			</div>

			<div class="columnTwo">
				<?php get_template_part('pattern/local-navi'); ?>
				<div class="mainContents">
					<div class="grade contentBlock">
						<div class="grade__inner grade__inner--regular contentInner">
							<h2 class="subTitle visible-sp">通常グレード</h2>

							<div class="grade__image">
								<img src="/images/pattern/regular_grade.jpg" alt="通常グレード">
							</div>
							<div class="grade__text">
								<h2 class="subTitle visible-pc">通常グレード</h2>
								<p>自社で作成したパターンはもちろん、支給されたマスターパターンのデータ修正（紙で頂いてデータ入力からの作業も可能です）生地データを加味しての収縮対応等のひと手間を加え工業用のパターンを完成させ、グレーディングを行います。グレーディングしたパターンで、各サイズのマーキング(型入れ)まで一貫して作業いたします。</p>
								<p>またマスターパターンがラージサイズの場合は、特に立体感を意識した特別なグレーディングを行います。</p>
							</div>
						</div>
					</div>
					<div class="grade contentBlock">
						<div class="grade__inner grade__inner--large contentInner">
							<h2 class="subTitle visible-sp">レギュラーサイズからラージサイズへのグレーディング</h2>

							<div class="grade__image">
								<img src="/images/pattern/large_grade.jpg" alt="レギュラーサイズからラージサイズへのグレーディング">
							</div>
							<div class="grade__text">
								<h2 class="subTitle visible-pc">レギュラーサイズからラージサイズへのグレーディング</h2>
								<div class="paragraph">レディース(ヤング・ミッシー・ミセス)洋服全般</div>
								<div class="paragraph">
									<h3 class="sub2Title">立体的なシルエット</h3>
									<p>従来の丈と巾だけ伸ばしたグレードではなく、加えて胸の高さや体の厚みを出す事によって、従来の平面的なシルエットではない立体的なシルエットを作る事が可能になりました。同じサイズでも細く見える効果があります。</p>
								</div>
								<div class="paragraph">
									<h3 class="sub2Title">着心地の良さ</h3>
									<p>体型分析に基づいた計算式を基本にしているので、より体型にあった着心地の良い服になります。<br>体型に合ったシルエットに変えることによって、不要な余り分がなくなり、必要なところには適度なゆとりが生まれるので着心地感もＵＰします。</p>
								</div>
								<div class="paragraph">
									<h3 class="sub2Title">レギュラーサイズと同じバランス</h3>
									<p>ラージサイズになってサイズが大きく変化してもレギュラーサイズのバランスを崩さず、レギュラーサイズと同じように見える服になります。</p>
								</div>
							</div>
						</div>
					</div>

					<div class="gradeSample contentBlock">
						<div class="contentInner">
							<?php foreach($gradingArray as $value): ?>
							<div class="gradeSample__inner">
								<div class="gradeSample__image swiper-withT">
									<div class="gradeSample__imageMain swiper-container swiper-main">
										<ul class="swiper-wrapper">
											<?php foreach($value['photo'] as $image): ?>
											<li class="swiper-slide"><figure><img src="<?php echo $image['main']; ?>"><figcaption><?php echo $image['caption']; ?></figcaption></figure></li>
											<?php endforeach; ?>
										</ul>
									</div>
									<div class="gradeSample__imageThumb swiper-thumb">
										<ul>
											<?php foreach($value['photo'] as $image): ?>
											<li><img src="<?php echo $image['thumb']; ?>"></li>
											<?php endforeach; ?>
											<!-- <li class="active"><img src="/images/pattern/thumb01_f.jpg"></li>
											<li><img src="/images/pattern/thumb01_s.jpg"></li>
											<li><img src="/images/pattern/thumb01_b.jpg"></li> -->
										</ul>
									</div>
								</div>
								<div class="gradeSample__text">
									<div class="sub2Title"><?php echo $value['title']; ?></div>
									<div class="gradeSample__desc">
										<?php echo $value['desc']; ?>
									</div>
								</div>
							</div>
							<?php endforeach; ?>


							<!-- <div class="gradeSample__inner">
								<div class="gradeSample__image swiper-withT">
									<div class="gradeSample__imageMain swiper-container swiper-main">
										<ul class="swiper-wrapper">
											<li class="swiper-slide"><figure><img src="/images/pattern/samplegrade01_f.jpg"><figcaption>正面</figcaption></figure></li>
											<li class="swiper-slide"><figure><img src="/images/pattern/samplegrade01_s.jpg"><figcaption>側面</figcaption></figure></li>
											<li class="swiper-slide"><figure><img src="/images/pattern/samplegrade01_b.jpg"><figcaption>背面</figcaption></figure></li>
										</ul>
									</div>
									<div class="gradeSample__imageThumb swiper-thumb">
										<ul>
											<li class="active"><img src="/images/pattern/thumb01_f.jpg"></li>
											<li><img src="/images/pattern/thumb01_s.jpg"></li>
											<li><img src="/images/pattern/thumb01_b.jpg"></li>
										</ul>
									</div>
								</div>
								<div class="gradeSample__text">
									<div class="sub2Title">事例1</div>
									<div class="gradeSample__desc">
										<p>左側がレギュラーサイズ、右側が立体グレーディングで作ったラージサイズです。<br>
										前後から見るとサイズ差程には大きさの違いは感じられないと思います。しかし横からの写真では、胸の高さや体の厚みを出した立体的なシルエットになっている事が分かります。<br>体形に合った立体的なラージサイズの服は、着心地がよく細く見える効果があります。</p>
									</div>
								</div>
							</div>

							<div class="gradeSample__inner">
								<div class="gradeSample__image swiper-withT">
									<div class="gradeSample__imageMain swiper-container swiper-main">
										<ul class="swiper-wrapper">
											<li class="swiper-slide"><figure><img src="/images/pattern/samplegrade01_f.jpg"><figcaption>正面</figcaption></figure></li>
											<li class="swiper-slide"><figure><img src="/images/pattern/samplegrade01_s.jpg"><figcaption>側面</figcaption></figure></li>
											<li class="swiper-slide"><figure><img src="/images/pattern/samplegrade01_b.jpg"><figcaption>背面</figcaption></figure></li>
										</ul>
									</div>
									<div class="gradeSample__imageThumb swiper-thumb">
										<ul>
											<li class="active"><img src="/images/pattern/thumb01_f.jpg"></li>
											<li><img src="/images/pattern/thumb01_s.jpg"></li>
											<li><img src="/images/pattern/thumb01_b.jpg"></li>
										</ul>
									</div>
								</div>
								<div class="gradeSample__text">
									<div class="sub2Title">事例2</div>
									<div class="gradeSample__desc">
										<p>この商品も横から見たときに胸の高さや体の厚みがしっかり出ています。ラージサイズですが、胸は高く、ウエストは細くメリハリがあるので視覚効果で細く見える服になっています。</p>
										<p>以上の様に立体グレーディングによって作られた服は、ラージサイズの体型に合わせて作られているので、ラージサイズを最初からメイクした時と同じように、着心地が良く細く見える服になります。</p>
									</div>
								</div>
							</div> -->
						</div>
					</div>

					<div class="otherSize contentBlock">
						<div class="contentInner">
							<h2 class="subTitle">その他のサイズのグレーディング</h2>
							<p>ラージサイズ以外にも様々な体型の方のグレーディングにも対応いたします。</p>
							<div class="otherSize__inner">
								<h3 class="otherSize__title sub2Title">トールサイズへのグレーディング</h3>
								<div class="otherSize__desc">身長165cmより大きい方に向けて<br class="visible-pc">グレーディングいたします</div>
								<div class="otherSize__image"><img src="/images/pattern/tallsize.png" alt="Tall 165cm～"></div>
							</div>
							<div class="otherSize__inner">
								<h3 class="otherSize__title sub2Title">スモールサイズへのグレーディング</h3>
								<div class="otherSize__desc">身長153cmより小さい方に向けて<br class="visible-pc">グレーディングいたします</div>
								<div class="otherSize__image"><img src="/images/pattern/smallsize.png" alt="Small ～153cm"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php get_template_part('pattern/footer-link'); ?>
		</div>

<?php get_footer(); ?>