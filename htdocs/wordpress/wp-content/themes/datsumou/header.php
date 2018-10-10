<?php
global $status;
$newsPost = wp_count_posts( 'news' );
?>
<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="format-detection" content="telephone=no">
<meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no, maximum-scale=1.0, minimum-scale=1.0">
<?php /*<title><?php wp_title("|", true, "right");?><?php bloginfo('name'); ?></title>*/ ?>
<?php wp_head(); ?>
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
<link rel="shortcut icon" href="/images/favicon.ico">
<link rel="apple-touch-icon-precomposed" href="/images/apple-touch-icon.png">
</head>

<body id="<?php echo $status['id']; ?>">
	<header class="gHeader">
		<?php $ele = (is_home())?'h1':'div'; ?><<?php echo $ele; ?> class="gHeaderLogo"><a href="/"><img src="/assets/images/logo.png" alt="ツルツル！全身脱毛診断メーカー"></a></<?php echo $ele; ?>>

		<?php 
		$imgObj = get_field('option_headerBanner', 'option');
		$headerBanner = $imgObj[sizes][medium_large];
		$headerBannerLink = get_field('option_headerBannerLink', 'option');
		if($headerBanner):
		?>
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
						<li><a href="/salon/price/">とにかく安いサロンを探す</a></li>
						<li><a href="/salon/reserve/">予約がとりやすいサロンを探す</a></li>
						<li><a href="/salon/student/">学生おすすめサロンを探す</a></li>
						<li><a href="/salon/result/">早く結果がでるサロンを探す</a></li>
					</ul>
				</div>
				<div class="gNaviSect">
					<div class="gNaviHeadline">脱毛サロン一覧</div>
					<ul class="gNaviMenu">
						<li><a href="#">コロリー</a></li>
						<li><a href="#">ミュゼプラチナム</a></li>
						<li><a href="#">銀座カラー</a></li>
						<li><a href="#">キレイモ</a></li>
						<li><a href="#">脱毛ラボ</a></li>
					</ul>
				</div>
				<div class="gNaviSect">
					<div class="gNaviHeadline">脱毛サロンお役立ち情報</div>
					aaa
				</div>
				<div class="gNaviSect">
					<div class="gNaviHeadline">脱毛診断メーカー最新の記事</div>
					<ul class="gNaviMenu noneArrow">
						<li><a href="#">コロリーコロリーコロリーコロリーコロリーコロリーコロリーコロリーコロリーコロリー</a></li>
						<li><a href="#">ミュゼプラチナムミュゼプラチナムミュゼプラチミュゼプラチナム</a></li>
						<li><a href="#">銀座カラー銀座カラー銀座カラー</a></li>
						<li><a href="#">キレイモ</a></li>
						<li><a href="#">脱毛ラボ</a></li>
					</ul>
					<div class="readMore"><a href="#">もっと記事を読む</a></div>
				</div>
				<div class="gNaviSect">
					<div class="gNaviHeadline">当サイトについて</div>
					<ul class="gNaviMenu borderBottom">
						<li><a href="#">運営会社</a></li>
						<li><a href="#">調査概要</a></li>
						<li><a href="#">プライバシーポリシー</a></li>
					</ul>
				</div>
			</div>
			<div class="gNaviBg"></div>
		</div>
