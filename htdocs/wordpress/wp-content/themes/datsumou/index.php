<?php
$status = [
	'id' => 'home',
	'description' => '',
];
?>
<?php get_header(); ?>
aaa
<?php get_footer(); ?>
<?php exit(); ?>


<?php
$topArg = array(
	'post_type' => 'top',
	'posts_per_page'   => 1,
);
$topPosts = get_posts($topArg);
$id = $topPosts[0]->ID;
$video = get_field('home_video', $id);

$heroArray = [];
while(the_repeater_field('home_visual', $id)){
	$heroTemp = [];
	$imgPcObj = get_sub_field('home_visual_pcImage', $id);
	$heroTemp['imgPc'] = $imgPcObj['sizes']['large'];
	$imgSpObj = get_sub_field('home_visual_spImage', $id);
	$heroTemp['imgSp'] = $imgSpObj['sizes']['medium_large'];
	$heroTemp['copy'] =  get_sub_field('home_visual_copy', $id);
	$layout =  get_sub_field('home_visual_copyLayout', $id);
	$heroTemp['copylayout'] =  ($layout == '左寄せ')?'left':'right';
	$heroTemp['btnText'] =  get_sub_field('home_visual_btnText', $id);
	$heroTemp['link'] =  get_sub_field('home_visual_link', $id);

	array_push($heroArray, $heroTemp);
}
// print_r($heroArray);


$newsArg = array(
	'post_type' => 'news',
	'posts_per_page'   => 3,
);
$newsPosts = get_posts($newsArg);
$newsArray = [];
foreach($newsPosts as $value){
	$newsTemp = [];
	$id = $value->ID;
	$newsTemp['title'] = get_the_title($value->ID);
	$newsTemp['date'] = get_the_time('Y年m月d日', $value->ID);
	$newsTemp['new'] = is_new_post(get_the_time('Y-m-d H:i:s', $value->ID));
	$newsTemp['link'] = get_the_permalink($value->ID);

	array_push($newsArray, $newsTemp);
}
?>

		<div class="contents">
			<?php if($video): ?>
			<div class="video">
				<video playsinline loop muted class="visible-pc">
					<source src="/images/home/video.mp4">
				</video>
				<video autoplay playsinline loop muted class="visible-sp">
					<source src="/images/home/video_mobile.mp4?0">
				</video>
				<div class="video__scroll en">SCROLL<span class="icon-arrowT"></span></div>
				<div class="video__overlay"></div>
			</div>
			<?php endif; ?>


			<div class="homeContainer">

			<?php if($heroArray): ?>
			<div class="heroPanel swiper-container">
				<div class="heroPanel__wrapper swiper-wrapper">
					<?php foreach($heroArray as $value): ?>
					<div class="heroPanel__slide swiper-slide">
						<?php if($value['link']): ?><a href="<?php echo $value['link']; ?>"><?php endif; ?>
							<picture>
							<source media="(max-width: <?php echo $breakpoint; ?>)" srcset="<?php echo $value['imgSp']; ?>">
							<img src="<?php echo $value['imgPc']; ?>">
							</picture>
							<div class="heroPanel__textBlock heroPanel__textBlock--<?php echo $value['copylayout']; ?>">
							<h2 class="heroPanel__catch"><?php echo $value['copy']; ?></h2>
							<span class="textButton textButton--borderless visible-sp"><?php echo $value['btnText']; ?></span>
							</div>
						<?php if($value['link']): ?></a><?php endif; ?>
					</div>
					<?php endforeach; ?>
				</div>
				<div class="swiper-pagination"></div>
			</div>
		<?php endif; ?>

			<div class="induction">
				<div class="oem-odmBlock contentBlock">
					<div class="contentInner contentInner--wide">
						<div class="induction__textBlock">
							<h2 class="subTitle">OEM・ODM事業</h2>
							<p>半世紀にわたり培ってきた経験とノウハウを生かし、布帛・ニット・カットソー全般において、ご満足いただける商品を作ります。<br>
							ご要望によって、フォーマルからカジュアルまで幅広いテイストの商品に対応し、企画から生産、納品までトータルでサポートさせて頂きます。</p>
							<a href="/oem-odm/" class="textButton">詳しくみる</a>
						</div>
						<div class="induction__photoBlock">
							<h2 class="en">OEM/ODM</h2>
							<a href="/oem-odm/"><img src="/images/home/oemodm.jpg" alt="OEM・ODM事業"></a>
						</div>
					</div>
				</div>

				<div class="patternBlock contentBlock">
					<div class="contentInner contentInner--wide">
						<div class="induction__textBlock">
							<h2 class="subTitle">パターン作成事業</h2>
							<p>ルックグループで培った技術をもとに、他OEM先のパターンを作成しています。 <br>各年代に合わせた着心地の良いパターン、素材に合わせた縫いやすいパターンを作成いたします。</p>
							<a href="/pattern/" class="textButton">詳しくみる</a>
						</div>
						<div class="induction__photoBlock">
							<h2 class="en">PATTERN</h2>
							<a href="/pattern/"><img src="/images/home/pattern.jpg" alt="パターン作成事業"></a>
						</div>
					</div>
				</div>
			</div>

			<?php if($newsArray): ?>
			<div class="news">
				<div class="contentInner contentInner--wide">
					<div class="news__title"><h2 class="subTitle">ニュース</h2></div>
					<dl class="news__list">
						<?php foreach($newsArray as $value): ?>
						<dt<?php if($value['new'])echo ' class="new"'; ?>><?php echo $value['date']; ?></dt>
						<dd><a href="<?php echo $value['link']; ?>"><?php echo $value['title']; ?></a></dd>
						<?php endforeach; ?>
						<!-- <dt>2018年01月01日</dt>
						<dd><a href="#">株式会社ルックは、フランスのライフスタイルブランド『BENSIMON』の独占輸入販売をスタートいたします。</a></dd>
						<dt>2018年01月01日</dt>
						<dd><a href="#">【新ブランド】株式会社ルックは、2017年春夏からナショナルブランド「filage」を⽴ち上げます</a></dd> -->
					</dl>
				</div>
			</div>
			<?php endif; ?>

			</div>

		</div>

<?php get_footer(); ?>
