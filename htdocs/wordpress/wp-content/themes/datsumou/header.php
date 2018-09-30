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
			<?php $ele = (is_home())?'h1':'div'; ?><<?php echo $ele; ?> class="gHeader__logo"><a href="/"><img src="/assets/images/logo.png" alt="ツルツル全身脱毛診断メーカー"></a></<?php echo $ele; ?>>
			<div class="gHeader__subNavi">
				<ul class="visible-pc">
					<?php if($newsPost->publish >= 1): ?><li><a href="/news/">ニュース</a></li><?php endif; ?>
					<li><a href="/company/">会社概要</a></li>
					<li><a href="/access/">アクセス</a></li>
				</ul>
				<div class="gHeader__cvn gHeader__gNavi__button"><a href="/contact/"><span class="icon icon-mail"></span><span class
					="visible-pc">お問い合わせ</span><span class="visible-sp">お問合せ</span></a>	</div>
			</div>
			<nav class="gHeader__gNavi">
				<div class="gHeader__gNavi__menu gHeader__gNavi__button visible-sp"><span class="icon icon-menu"></span><span>メニュー</span></div>
				<div class="gHeader__gNavi__wrapper">
					<ul class="gHeader__gNavi__inner">
						<li<?php setCurrent('about'); ?>><a href="/about/">ルックモードについて</a></li>
						<li<?php setCurrent('oemodm'); ?>><a href="/oem-odm/" class="hasSubmenu">OEM・ODM事業</a>
							<ul class="gHeader__gNavi__submenu visible-sp">
								<li><a href="/oem-odm/">OEM・ODM事業 TOP</a></li>
								<li><a href="/oem-odm/equipment/">設備・スタッフ</a></li>
								<li><a href="/oem-odm/flow/">お取引の流れ</a></li>
								<li><a href="/oem-odm/client/">主要お取引先</a></li>
								<li><a href="/oem-odm/faq/">よくあるご質問</a></li>
							</ul>
						</li>
						<li<?php setCurrent('pattern'); ?>><a href="/pattern/" class="hasSubmenu">パターン作成事業</a>
							<ul class="gHeader__gNavi__submenu visible-sp">
								<li><a href="/pattern/">パターン作成事業 TOP</a></li>
								<li><a href="/pattern/design/">パターン設計</a></li>
								<li><a href="/pattern/grading/">グレーディング</a></li>
								<li><a href="/pattern/flow/">お取引の流れ</a></li>
								<li><a href="/pattern/price/">価格表</a></li>
								<li><a href="/pattern/faq/">よくあるご質問</a></li>
							</ul>
						</li>
						<li<?php setCurrent('flow'); ?>><a href="/flow/" class="hasSubmenu">お取引の流れ</a>
							<ul class="gHeader__gNavi__submenu visible-sp">
								<li><a href="/flow/">お取引の流れ TOP</a></li>
								<li><a href="/flow/oem-odm/">OEM・ODM</a></li>
								<li><a href="/flow/pattern/">パターン作成</a></li>
							</ul>
						</li>

						<li<?php setCurrent('faq'); ?>><a href="/faq/"><span class="icon icon-question visible-sp"></span>よくあるご質問</a></li>
						<?php if($newsPost->publish >= 1): ?><li class="visible-sp"><a href="/news/"><span class="icon icon-news"></span>ニュース</a></li><?php endif; ?>	
						<li class="visible-sp"><a href="/company/"><span class="icon icon-company"></span>会社概要</a></li>
						<li class="visible-sp"><a href="/access/"><span class="icon icon-marker"></span>アクセス</a></li>
						<li class="visible-sp"><a href="/contact/"><span class="icon icon-mail"></span>お問い合わせ</a></li>
					</ul>
				</div>
			</nav>
	</header>
	<div class="contents">
		<div class="gNavi">Global Navi</div>
