<?php
/*
Template Name: AMPストーリー用bookend
*/
if($_GET[id]){
	$id = $_GET[id];
	$title = get_the_title($id);
	$eyecatchId = get_post_thumbnail_id($id);
	$eyecatch = wp_get_attachment_image_src( $eyecatchId, 'large' );
	$eyecatchSrc = $eyecatch[0];
	$url = get_the_permalink($id);
}else{
	echo 'パラメーターが無効です';
	exit();
}

$array = [
  "bookendVersion" => "v1.0",
	"shareProviders" => [
		[
			"provider" => "twitter",
			"text" => $title
		],
		[
			"provider" => "facebook",
      "app_id" => "1267141240122059"
		]
	],
	"components" => [
		[
			"type" => "heading",
			"text" => "コラム記事を読む"
		],
		[
			"type" => "landscape",
      "title" => $title,
			"url" => $url,
      "image" => $eyecatchSrc
		]
	]
];
echo json_encode($array);
exit();


/*
{
  "bookendVersion": "v1.0",
  "shareProviders": [
    {
      "provider": "twitter",
      "text": "This is custom share text that I would like for the Twitter platform"
    },
    {
      "provider": "facebook",
      "app_id": "1267141240122059"
    }
  ],
  "components": [
    {
      "type": "heading",
      "text": "コラム記事"
    },
    {
      "type": "landscape",
      "title": "This is India an the best places you should go",
      "url": "http://example.com/article.html",
      "image": "http://placehold.it/256x128"
    }
  ]
}
*/
