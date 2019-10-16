<?php
$uri =  $_SERVER["REQUEST_URI"];
$uriArray = explode("/", $uri);
$pos = array_search('column', $uriArray);
//columnが含まれている場合は次の値（投稿ID）を取得してリダイレクト
if($pos !== false){
	$id = $uriArray[$pos + 1];
	$redirect = get_permalink($id);
	header('Location:' . $redirect);
	exit;
}
?>
<?php get_header(); ?>
<div class="mainContents">
	<section class="contentBlock">
		<div class="contentInner">
			<h1 class="pageTitle">ページが見つかりません</h1>

			<p>お探しのページは削除されたか、存在しない可能性があります。</p>
			<a href="/">» TOPへ戻る</a></p>

		</div>
	</section>
</div>

<?php get_footer(); ?>
