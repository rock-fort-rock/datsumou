<?php
global $status;
$headerImgObj = get_field('option_headerBanner', 'option');
$headerBanner = $headerImgObj['sizes']['medium_large'];
$headerBannerLink = get_field('option_headerBannerLink', 'option');
$headerBannerJs = get_field('option_headerBannerJs', 'option');

// $headerImgObj = get_field('option_naviBanner_image', 'option');
$naviBanner = [];
while(the_repeater_field('option_naviBanner', 'option')){
	$naviImgObj = get_sub_field('option_naviBanner_image');
	$tempNaviBanner['image'] = $naviImgObj['sizes']['medium_large'];
	$tempNaviBanner['link'] = get_sub_field('option_naviBanner_link');
	array_push($naviBanner, $tempNaviBanner);
}
// print_r($naviBanner);

//cookie
$readidStr = '';//既読記事ID　文字列
$readidArray = [];//既読記事ID　配列


/*お知らせ機能停止中 2020.0
---------------------------------------------
//お知らせ詳細
if(is_singular('news')){
	//削除
	// setcookie("read","",time()-1, '/');
	// echo $_COOKIE["read"];
	// exit();

	//cookieあり
	if($_COOKIE["read"]){
		$readidStr = $_COOKIE["read"];
		$readidArray = explode(',', $readidStr);
		if (array_search($post->ID, $readidArray) === false){//初見
		  $readidStr .= ',' . $post->ID;
		}
	}
	//cookieなし
	else{
		$readidStr = $post->ID;
	}
	array_push($readidArray, $post->ID);
	setcookie("read", $readidStr, time()+60*60*24*7, '/');
}else{
	if($_COOKIE["read"]){
		$readidStr = $_COOKIE["read"];
		$readidArray = explode(',', $readidStr);
	}
}

$argCamp = array(
	'post_type' => 'news',
	'posts_per_page' => '-1',
	'news_category' => 'キャンペーン',
);
$newsCampPage = get_posts($argCamp);

$num = 10 - count($newsCampPage);
$arg = array(
	'post_type' => 'news',
	'posts_per_page' => $num,
	'tax_query' => array(
		 array(
		 'taxonomy' => 'news_category',//タクソノミーcatの
		 'field' => 'slug',
		 'terms' => 'キャンペーン',
		 'operator' => 'NOT IN',
		 ),
	 )
);
$newsPage = get_posts($arg);

$newsidArray = [];//新着記事ID　配列
foreach($newsCampPage as $value){
	array_push($newsidArray, $value->ID);
}
foreach($newsPage as $value){
	array_push($newsidArray, $value->ID);
}
// print_r($newsidArray);
// print_r($readidArray);

$unread = 0;
//新着記事IDが既読記事IDになければカウント
foreach($newsidArray as $value){
	if(array_search($value, $readidArray) === false){
		// echo "未読" . $value;
		$unread++;
	}
}
---------------------------------------------*/
?>
<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="format-detection" content="telephone=no">
<meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no, maximum-scale=1.0, minimum-scale=1.0">
<?php wp_head(); ?>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KVVHX8W');</script>
<!-- End Google Tag Manager -->
<!-- Global site tag (gtag.js) - Google Ads: 780014460 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-780014460"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-780014460');
</script>
<?php if(is_singular('salon')): ?>
<script>
  gtag('event', 'page_view', {
    'send_to': 'AW-780014460',
    'user_id': 'replace with value'
  });
</script>
<?php endif; ?>
<?php if(is_single() && get_field('column_js')): ?>
<?php the_field('column_js'); ?>
<?php endif; ?>
</head>

<body id="<?php echo $status['id']; ?>">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KVVHX8W"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
	<header class="gHeader">
		<?php $ele = (is_home())?'h1':'div'; ?><<?php echo $ele; ?> class="gHeaderLogo"><a href="/"><img src="/assets/images/logo.png" alt="全身脱毛サロンの比較サイト「脱毛診断メーカー だつもう」"></a></<?php echo $ele; ?>>

		<?php if($headerBannerJs): ?>
		<div class="gHeaderBanner"><?php echo $headerBannerJs; ?></div>
		<?php elseif($headerBanner): ?>
		<div class="gHeaderBanner"><a href="<?php echo $headerBannerLink; ?>" target="_blank"><img src="<?php echo $headerBanner; ?>"></a></div>
		<?php endif; ?>
		<div class="hamburger"><img src="/assets/images/hamburger.svg"><?php if($unread > 0)echo '<span class="newsIcon">' . $unread . '</span>'; ?></div>
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
				<div class="keywordSearch">
					<form action="<?php echo esc_url( home_url('/') ); ?>" method="get" autocomplete="off">
						<input type="text" name="s" value="" placeholder="キーワード検索">
						<!-- <span class="keywordSearchIcon"><img src="/assets/images/icon_facebook.svg"></span> -->
						<button><img src="/assets/images/icon_search.svg"></button>
					</form>
				</div>
				<?php /*
				<?php if(wp_count_posts('news')->publish > 0): ?>
				<div class="gNaviSect">
					<div class="newsInfo">お知らせ<?php if($unread > 0)echo '<span class="newsIcon">' . $unread . '</span>'; ?></div>
				</div>
				<?php endif; ?>
				*/ ?>

				<div class="gNaviSect">
					<div class="gNaviHeadline">目的別検索</div>
					<?php
					$get_page_id = get_page_by_path("ranking");
					$ranking_id = $get_page_id->ID;
					$arg = array(
						'post_type' => 'page',
						'posts_per_page' => '-1',
						'post_parent' => $ranking_id,
						'orderby' => 'menu_order',
						'order' => 'ASC'
					);
					$rankingPage = get_posts($arg);
					?>
					<ul class="gNaviMenu">
						<?php foreach($rankingPage as $value): if(get_field('ranking_navi', $value->ID)):?>
							<li><a href="<?php the_permalink($value->ID); ?>"><?php echo $value->post_title; ?></a></li>
						<?php endif; endforeach; ?>
					</ul>
				</div>
				<div class="gNaviSect">
					<div class="gNaviHeadline">脱毛サロン一覧</div>
					<?php
					$salonArg = array(
						'post_type' => 'salon',
						'meta_key' => 'salon_hideindex',
						'meta_value' => 'show',
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
						<li><a href="<?php echo $value['link']; ?>" target="_blank">
							<!-- <img src="/assets/images/dummy.gif" data-normal="<?php echo $value['image']; ?>" class="lazy"> -->
							<img src="<?php echo $value['image']; ?>">
						</a></li>
						<?php endforeach; ?>
					</ul>
				</div>
				<?php endif; ?>
				<div class="gNaviSect">
					<div class="gNaviHeadline">脱毛診断メーカー最新の記事</div>
					<?php
					$columnArg = array(
						'post_type' => 'post',
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
					<!-- <div class="readMore"><a href="/archive/">もっと記事を読む</a></div> -->
				</div>
					<div class="gNaviSect">
					<div class="gNaviHeadline">エリア別で脱毛サロンを探す！</div>
					<ul class="gNaviMenu borderBottom">
						<li><a href="https://datumow.com/area/tokyo/">東京都</a></li>
						<li><a href="https://datumow.com/area/hokkaido/">北海道</a></li>
						<li><a href="https://datumow.com/area/miyagi/">宮城県</a></li>
						<li><a href="https://datumow.com/area/kanagawa/">神奈川県</a></li>
						<li><a href="https://datumow.com/area/aichi/">愛知県</a></li>
						<li><a href="https://datumow.com/area/osaka/">大阪府</a></li>
						<li><a href="https://datumow.com/area/fukuoka/">福岡県</a></li>
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
						<div class="copyright">© 2020 全身脱毛診断メーカー：だつもぅ</div>
					</div>
				</div>
			</div>
			<div class="gNaviBg"></div>
		</div>

		<?php /*
		<div class="newsNavi">
			<div class="newsNaviClose"></div>
			<div class="newsNaviInner">
				<ul class="newsNaviList">
					<?php foreach($newsCampPage as $value): ?>
					<li class="campaign<?php if(array_search($value->ID, $readidArray) !== false)echo ' read'; ?>">
						<a href="<?php echo get_permalink($value->ID); ?>">
							<div class="date"><?php echo get_the_time('Y年m月d日', $value->ID); ?></div>
							<h2 class="entryTitle"><?php echo get_the_title($value->ID); ?></h2>
						</a>
					</li>
					<?php endforeach; ?>
					<?php foreach($newsPage as $value): ?>
					<li<?php if(array_search($value->ID, $readidArray) !== false)echo ' class="read"'; ?>>
						<a href="<?php echo get_permalink($value->ID); ?>">
							<div class="date"><?php echo get_the_time('Y年m月d日', $value->ID); ?></div>
							<h2 class="entryTitle"><?php echo get_the_title($value->ID); ?></h2>
						</a>
					</li>
					<?php endforeach; ?>
				</ul>
				<div class="newsNaviAll">
					<a href="/news/">すべて見る</a>
				</div>
			</div>
		</div>
*/ ?>
