<?php
$status = [
	'id' => 'home',
	'description' => '',
];
?>
<?php get_header(); ?>


<?php /*
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
*/
?>

<div class="mainContents">
	<section class="contentBlock">
		<header class="salonHeader">
			<img src="/assets/images/icon_ranking1.png" alt="人気サロン第1位" class="rankIcon best3">
			<h2 class="salonName">コロリー</h2>
		</header>
		<div class="contentInner">
			aaaa
		</div>
	</section>

</div>

<?php get_footer(); ?>
