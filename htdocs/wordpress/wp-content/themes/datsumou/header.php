<?php
global $status;
$headerImgObj = get_field('option_headerBanner', 'option');
$headerBanner = $headerImgObj['sizes']['medium_large'];
$headerBannerLink = get_field('option_headerBannerLink', 'option');

// $headerImgObj = get_field('option_naviBanner_image', 'option');
$naviBanner = [];
while(the_repeater_field('option_naviBanner', 'option')){
	$naviImgObj = get_sub_field('option_naviBanner_image');
	$tempNaviBanner['image'] = $naviImgObj['sizes']['medium_large'];
	$tempNaviBanner['link'] = get_sub_field('option_naviBanner_link');
	array_push($naviBanner, $tempNaviBanner);
}
// print_r($naviBanner);
?>
<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="format-detection" content="telephone=no">
<meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no, maximum-scale=1.0, minimum-scale=1.0">
<?php /*all in one seo packを2.9にアップデートするとトップページに反映されなくなるので注意*/ ?>
<?php wp_head(); ?>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KVVHX8W');</script>
<!-- End Google Tag Manager -->
<?php /*<link rel="shortcut icon" href="/images/favicon.ico">
<link rel="apple-touch-icon-precomposed" href="/images/apple-touch-icon.png">*/ ?>
</head>

<body id="<?php echo $status['id']; ?>">
	<header class="gHeader">
		<?php $ele = (is_home())?'h1':'div'; ?><<?php echo $ele; ?> class="gHeaderLogo"><a href="/"><img src="/assets/images/logo.png" alt="ツルツル！全身脱毛診断メーカー"></a></<?php echo $ele; ?>>

		<?php if($headerBanner): ?>
		<div class="gHeaderBanner"><a href="<?php echo $headerBannerLink; ?>" target="_blank"><img src="<?php echo $headerBanner; ?>"></a></div>
		<?php endif; ?>
		<div class="hamburger"><img src="/assets/images/hamburger.svg"></div>
		<!-- <ul class="snsLink">
			<li><a href="#"><img src="/assets/images/icon_line.png" alt="LINE"></a></li>
			<li><a href="#"><img src="/assets/images/icon_facebook.png" alt="facebook"></a></li>
			<li><a href="#"><img src="/assets/images/icon_twitter.png" alt="Twitter"></a></li>
			<li><a href="#"><img src="/assets/images/icon_instagram.png" alt="Instagram"></a></li>
		</ul> -->
	</header>
	<div class="contents">
		<div class="gNavi">
			<div class="gNaviClose">×</div>
			<div class="gNaviContainer">
				<div class="gNaviSect">
					<div class="gNaviHeadline">目的別検索</div>
					<ul class="gNaviMenu">
						<li><a href="/ranking/price/">とにかく安いサロンを探す</a></li>
						<li><a href="/ranking/reserve/">予約がとりやすいサロンを探す</a></li>
						<li><a href="/ranking/student/">学生おすすめサロンを探す</a></li>
						<li><a href="/ranking/result/">早く結果がでるサロンを探す</a></li>
					</ul>
				</div>
				<div class="gNaviSect">
					<div class="gNaviHeadline">脱毛サロン一覧</div>
					<?php
					$salonArg = array(
						'post_type' => 'salon',
						'posts_per_page'   => -1,
					);
					$salonPosts = get_posts($salonArg);
					// print_r($salonPosts);
					?>
					<ul class="gNaviMenu">
						<?php foreach($salonPosts as $value): ?>
						<li><a href="<?php the_permalink($value->ID); ?>"><?php echo $value->post_title; ?></a></li>
						<?php endforeach; ?>
					</ul>
				</div>
				<?php if($naviBanner): ?>
				<div class="gNaviSect">
					<div class="gNaviHeadline">脱毛サロンお役立ち情報</div>
					<ul class="gNaviBanner">
						<?php foreach($naviBanner as $value): ?>
						<li><a href="<?php echo $value['link']; ?>" target="_blank"><img src="<?php echo $value['image']; ?>"></a></li>
						<?php endforeach; ?>
					</ul>
				</div>
				<?php endif; ?>
				<div class="gNaviSect">
					<div class="gNaviHeadline">脱毛診断メーカー最新の記事</div>
					<?php
					$columnArg = array(
						'post_type' => 'column',
						'posts_per_page'   => 5,
					);
					$columnPosts = get_posts($columnArg);
					// print_r($columnPosts);
					?>
					<ul class="gNaviMenu noneArrow">
						<?php foreach($columnPosts as $value): ?>
						<li><a href="<?php echo get_permalink($value->ID); ?>"><?php echo $value->post_title; ?></a></li>
						<?php endforeach; ?>
					</ul>
					<div class="readMore"><a href="/column/">もっと記事を読む</a></div>
				</div>
				<div class="gNaviSect">
					<div class="gNaviHeadline">当サイトについて</div>
					<ul class="gNaviMenu borderBottom">
						<li><a href="/company/">運営者情報</a></li>
						<li><a href="/research/">調査概要</a></li>
						<li><a href="/privacy/">プライバシーポリシー</a></li>
					</ul>
				</div>
				<div class="gNaviSect">
					<div class="gNaviFooter onlySmall">
						<!-- <ul class="snsLink">
							<li><a href="#"><img src="/assets/images/icon_line.png" alt="LINE"></a></li>
							<li><a href="#"><img src="/assets/images/icon_facebook.png" alt="facebook"></a></li>
							<li><a href="#"><img src="/assets/images/icon_twitter.png" alt="Twitter"></a></li>
							<li><a href="#"><img src="/assets/images/icon_instagram.png" alt="Instagram"></a></li>
						</ul> -->
						<div class="copyright">©ツルツル全身脱毛診断メーカー</div>
					</div>
				</div>
			</div>
			<div class="gNaviBg"></div>
		</div>
