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
		<?php $ele = (is_home())?'h1':'div'; ?><<?php echo $ele; ?> class="gHeaderLogo"><a href="/"><img src="/assets/images/logo.png" alt="ツルツル全身脱毛診断メーカー"></a></<?php echo $ele; ?>>
		<div class="hamburger"><img src="/assets/images/hamburger.svg"></div>
	</header>
	<div class="contents">
		<div class="gNavi">
			<div class="gNaviClose">×</div>
			<div class="gNaviContainer">
				<div class="gNaviSect">
					<div class="gNaviHeadline">目的別検索</div>
					<ul class="gNaviMenu">
						<li><a href="#">とにかく安いサロンを探す</a></li>
						<li><a href="#">予約がとりやすいサロンを探す</a></li>
						<li><a href="#">学生おすすめサロンを探す</a></li>
						<li><a href="#">早く結果がでるサロンを探す</a></li>
					</ul>
				</div>
				<div class="gNaviSect">
					<div class="gNaviHeadline">目的別検索</div>
					<ul class="gNaviMenu">
						<li><a href="#">とにかく安いサロンを探す</a></li>
						<li><a href="#">予約がとりやすいサロンを探す</a></li>
						<li><a href="#">学生おすすめサロンを探す</a></li>
						<li><a href="#">早く結果がでるサロンを探す</a></li>
					</ul>
				</div>
				<div class="gNaviSect">
					<div class="gNaviHeadline">目的別検索</div>
					<ul class="gNaviMenu">
						<li><a href="#">とにかく安いサロンを探す</a></li>
						<li><a href="#">予約がとりやすいサロンを探す</a></li>
						<li><a href="#">学生おすすめサロンを探す</a></li>
						<li><a href="#">早く結果がでるサロンを探す</a></li>
					</ul>
				</div>
				<div class="gNaviSect">
					<div class="gNaviHeadline">目的別検索</div>
					<ul class="gNaviMenu">
						<li><a href="#">とにかく安いサロンを探す</a></li>
						<li><a href="#">予約がとりやすいサロンを探す</a></li>
						<li><a href="#">学生おすすめサロンを探す</a></li>
						<li><a href="#">早く結果がでるサロンを探す</a></li>
					</ul>
				</div>
			</div>
			<div class="gNaviBg"></div>
		</div>
