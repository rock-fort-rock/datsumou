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
<?php /*<title><?php wp_title("|", true, "right");?><?php bloginfo('name'); ?></title>*/ ?>
<?php wp_head(); ?>
<?php /*
<meta name="keywords" content="">
<meta name="description" content="<?php
if($status['description']){
	echo $status['description'];
}else{
	if(!is_home()){
		echo get_the_title().'｜';
	}
	echo get_bloginfo( 'description' );
}
?>">
*/ ?>
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
		<ul class="snsLink">
			<li><a href="#"><img src="/assets/images/icon_line.png" alt="LINE"></a></li>
			<li><a href="#"><img src="/assets/images/icon_facebook.png" alt="facebook"></a></li>
			<li><a href="#"><img src="/assets/images/icon_twitter.png" alt="Twitter"></a></li>
			<li><a href="#"><img src="/assets/images/icon_instagram.png" alt="Instagram"></a></li>
		</ul>
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
					$wsalonArg = array(
						'post_type' => 'salon',
						'posts_per_page'   => -1,
					);
					$salonPosts = get_posts($wsalonArg);
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
					<ul class="gNaviMenu noneArrow">
						<li><a href="#">コロリーコロリーコロリーコロリーコロリーコロリーコロリーコロリーコロリーコロリー</a></li>
						<li><a href="#">ミュゼプラチナムミュゼプラチナムミュゼプラチミュゼプラチナム</a></li>
						<li><a href="#">銀座カラー銀座カラー銀座カラー</a></li>
						<li><a href="#">キレイモ</a></li>
						<li><a href="#">脱毛ラボ</a></li>
					</ul>
					<div class="readMore"><a href="/column/">もっと記事を読む</a></div>
				</div>
				<div class="gNaviSect">
					<div class="gNaviHeadline">当サイトについて</div>
					<ul class="gNaviMenu borderBottom">
						<li><a href="#">運営会社</a></li>
						<li><a href="#">調査概要</a></li>
						<li><a href="#">プライバシーポリシー</a></li>
					</ul>
				</div>
				<div class="gNaviSect">
					<div class="gNaviFooter onlySmall">
						<ul class="snsLink">
							<li><a href="#"><img src="/assets/images/icon_line.png" alt="LINE"></a></li>
							<li><a href="#"><img src="/assets/images/icon_facebook.png" alt="facebook"></a></li>
							<li><a href="#"><img src="/assets/images/icon_twitter.png" alt="Twitter"></a></li>
							<li><a href="#"><img src="/assets/images/icon_instagram.png" alt="Instagram"></a></li>
						</ul>
						<div class="copyright">©ツルツル全身脱毛診断メーカー</div>
					</div>
				</div>
			</div>
			<div class="gNaviBg"></div>
		</div>
