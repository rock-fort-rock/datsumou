<?php
/*
Template Name: リダイレクト用
*/
$status = [
	'id' => 'redirect',
];
if(get_field('redirect_url')){
	$url = parse_url(get_field('redirect_url'));
	// print_r($url);
	$para = '';
	if(!empty($_SERVER['QUERY_STRING'])){//URLにパラメータあり
		if(!empty($url['query'])){//設定リンクにパラメータあり
			$para = '?'.$url['query'].'&'.$_SERVER['QUERY_STRING'];
		}else{
			$para = '?'.$_SERVER['QUERY_STRING'];
		}
	}else{//URLにパラメータなし
		if(!empty($url['query'])){//設定リンクにパラメータあり
			$para = '?'.$url['query'];
		}
	}
	$redirect = $url['scheme'] . '://' . $url['host'] . $url['path'] . $para;

	//header("Location: $redirect");
}
?>
<?php get_header(); ?>

<?php /*
<div class="mainContents">
	<section class="contentBlock">
		<?php the_title(); ?>
		<?php the_post(); the_content(); ?>
		<?php
		// $imgObj = get_field('redirect_image');
		// $img = $imgObj['sizes']['medium'];
		?>
	</section>
</div>

<?php get_footer(); ?>

*/ ?>
