<?php
ini_set( 'display_errors', 1 ); 
$contentArray = [];
while(the_repeater_field('news')){
	$temp = [];
	$imgObj = get_sub_field('news_image');
	$temp['img'] = $imgObj['sizes']['medium_large'];
	if($temp['img']){
		//ベーシック認証下
		if(isset($_SERVER['PHP_AUTH_PW'])){
			$protcol = ($_SERVER['HTTPS'])?'https://':'http://';
			$path = str_replace($protcol, $protcol.'look:mode@', $temp['img']);
			$size = getimagesize($path);
		}else{
			$size = getimagesize($temp['img']);
		}
		$temp['width'] =  $size[0];
	}
	$temp['text'] =  get_sub_field('news_text');
	array_push($contentArray, $temp);
}
// print_r($contentArray);

$description;
foreach($contentArray as $value){
	$description .= strip_tags($value['text']);
}
$description = str_replace(array("\r\n", "\r", "\n"), '', $description);
$description = mb_substr($description, 0, 60) . '…';


$status = [
	'id' => 'others',
	'description' => $description,
];
?>
<?php get_header(); ?>
		<div class="contents">
			<div class="breadcrumb">
				<ul>
					<li><a href="/">HOME</a></li><li><a href="/news/">ニュース</a></li><li><?php the_title(); ?></li>
				</ul>
			</div>

			<div class="textHeader">
				<div class="textHeader__inner">
					<h2 class="textHeader__page">ニュース</h2>
				</div>
			</div>

			<div class="mainContents">
				<div class="newsDetail contentBlock">
					<div class="contentInner">
						<h1 class="subTitle"><?php the_title(); ?></h1>
						<div class="newsDetail__date"><?php the_time('Y年m月d日'); ?></div>
						<div class="newsDetail__body">
							<?php foreach($contentArray as $value): ?>
								<div class="paragraph">
									<?php if($value['img']): ?>
									<p><img src="<?php echo $value['img']; ?>" class="eyecatch" style="width:<?php echo round($value['width']*0.6); ?>px;"></p>
									<?php endif; ?>
									<?php echo $value['text']; ?>
								</div>
							<?php endforeach; ?>
						</div>

						<div class="newsDetail__button"><a href="/news/" class="backButton">ニュース一覧へ戻る</a></div>
					</div>
				</div>
			</div>
		</div>

<?php get_footer(); ?>