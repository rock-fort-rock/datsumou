<?php
/*
Template Name: グノシーフィード
*/
?>
<?php
// print_r($aioseop_options);
$name = $aioseop_options['aiosp_home_title'];
$url = get_bloginfo( 'url' );
$home_description = $aioseop_options['aiosp_home_description'];
$logo_square = $url.'/assets/images/feed_logo_square.png';
$logo_wide = $url.'/assets/images/feed_logo_wide.png';
$args = array(
  'post_type' => 'post',
  'posts_per_page'=> 20,
);
$posts_array = get_posts($args);
// $lastBuildDate = (object) array(
// 	'date' => $posts_array[0]->post_date,
// 	'timezone_type' => 3,
//   'timezone' => UTC
// );
$date = get_lastpostmodified( 'GMT' );
$lastBuildDate = mysql2date( 'D, d M Y H:i:s +0900', $date, false);
foreach($posts_array as $value){
	// print_r($value);
	$the_terms = get_the_terms($value->ID, 'category' );
	$categoryArray = [];
	$categoryArray[] = get_category( $the_terms[0]->parent )->name;
	$categoryArray[] = $the_terms[0]->name;
	$category = implode(",", $categoryArray);

	$title = (!empty(get_post_custom($value->ID)['_aioseop_title'][0]))?get_post_custom($value->ID)['_aioseop_title'][0]:$value->post_title;
	$description = (!empty(get_post_custom($value->ID)['_aioseop_title'][0]))?get_post_custom($value->ID)['_aioseop_description'][0]:strip_tags(get_field('column_lede', $value->ID));

  //制御文字削除　0x08が入ってることが
  $description = preg_replace('/[\x00-\x09\x0B\x0C\x0E-\x1F\x7F]/', '', $description);

	$block = [];
	while(the_repeater_field('column_block', $value->ID)){
		$tempBlock['headline'] = get_sub_field('column_headline', $value->ID);
		$tempBlock['contents'] = get_sub_field('column_paragraph', $value->ID);
		array_push($block, $tempBlock);
	}
	// print_r($block);
	$contents = '';
	$contents .= get_field('column_lede', $value->ID);
	// print_r($contents);
	// echo '----------------'."\n";

	// $contents = '<p>半袖やノースリーブを着る時や、電車やバスでつり革につかまる時など、意外と見られている<span style="background-color: #ffff99;"><strong>脇</strong></span>。気づくと、<strong>黒くぶつぶつができてしまっている！</strong>とお悩みの方も少なくありません。実は、脇にできてしまったぶつぶつは、自己処理が原因でできてしまった場合が多いです。今回は、<span style="background-color: #ffff99;"><strong>脇のぶつぶつの原因や解消方法</strong></span>についてご紹介します。</p>';

	// $contents = 'そのような力を';

	for($i=0; $i<count($block); $i++){
		// $contents .= '<section class="entryBlock">';
			if($block[$i]['headline']){
				$contents .= '<h2 class="cotentTitle">'.$block[$i]['headline'].'</h2>';
			}

			for($n=0; $n<count($block[$i]['contents']); $n++){
				$contents .= '<div class="paragraph">';
					if($block[$i]['contents'][$n]['column_headline2']){
						$contents .= '<h3>'.$block[$i]['contents'][$n]['column_headline2'].'</h3>';
					}
					$contents .= $block[$i]['contents'][$n]['column_contents'];
				$contents .= '</div>';
			}
		// $contents .= '</section>';
	}

	$script = '/<script.*?>.*?<\/script>/mis';
	$contents = preg_replace($script, '', $contents);
	$svg = '/<svg.*?>.*?<\/svg>/mis';
	$contents = preg_replace($svg, '', $contents);
  //制御文字削除　0x08が入ってることが
  $contents = preg_replace('/[\x00-\x09\x0B\x0C\x0E-\x1F\x7F]/', '', $contents);


	$eyecatchId = get_post_thumbnail_id($value->ID);
	$eyecatch = wp_get_attachment_image_src( $eyecatchId, 'large' );
	$eyecatchSrc = $eyecatch[0];
	// print_r(get_post_mime_type($eyecatchId));

	$tag = "<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-100809971-7', 'auto');
	ga('set', 'appName', 'newspass');
	ga('set', 'referrer', 'https://newspass.jp');
	ga('set', 'location', 'http://foo.com/article/123456/');
	ga('send', 'pageview');
	</script>";

	$tag_gn = "<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-100809971-7', 'auto');
	ga('set', 'appName', 'gunosy');
	ga('set', 'referrer', 'https://gunosy.com');
	ga('set', 'location', 'http://foo.com/article/123456/');
	ga('send', 'pageview');
	</script>";

	$itemStr .= '<item>'."\n";
  $itemStr .= '<title><![CDATA['.$title.']]></title>'."\n";
  $itemStr .= '<link>'.get_permalink($value->ID).'</link>'."\n";
	$itemStr .= '<guid>'.$value->post_name.'</guid>'."\n";
	$itemStr .= '<gnf:category>column</gnf:category>'."\n";
	$itemStr .= '<gnf:keyword>'.$category.'</gnf:keyword>'."\n";
	$itemStr .= '<description><![CDATA['.$description.']]></description>'."\n";
	$itemStr .= '<content:encoded><![CDATA['.$contents.']]></content:encoded>'."\n";
	$itemStr .= '<media:status state="active" />'."\n";
	$itemStr .= '<pubDate>'.mysql2date( 'D, d M Y H:i:s +0900', $value->post_date, false).'</pubDate>'."\n";
	$itemStr .= '<dc:creator>'.get_userdata($value->post_author)->display_name.'</dc:creator>'."\n";
	$itemStr .= '<gnf:modified>'.mysql2date( 'D, d M Y H:i:s +0900', $value->post_modified, false).'</gnf:modified>'."\n";
	$itemStr .= '<enclosure url="'.$eyecatchSrc.'" type="'.get_post_mime_type($eyecatchId).'" length="0" />'."\n";
	$itemStr .= '<gnf:analytics><![CDATA['. $tag .']]></gnf:analytics>'."\n";
	$itemStr .= '<gnf:analytics_gn><![CDATA['. $tag_gn .']]></gnf:analytics_gn>'."\n";

  $itemStr .= '</item>'."\n";
}
// print_r($itemStr);

header("Content-Type: application/rss+xml; charset=UTF-8");
$xml_text = <<<XML
<?xml version="1.0" encoding="utf-8" ?>
<rss version="2.0" xmlns:gnf="http://assets.gunosy.com/media/gnf" xmlns:content="http://purl.org/rss/1.0/modules/content/" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:media="http://search.yahoo.com/mrss/"  >
	<channel>
		<title><![CDATA[{$name}]]></title>
		<link>{$url}</link>
		<language>ja</language>
		<description><![CDATA[{$home_description}]]></description>
		<copyright>全身脱毛診断メーカー：だつもぅ</copyright>
		<image>
			<url>{$logo_square}</url>
			<title><![CDATA[{$name}]]></title>
			<link>$url</link>
		</image>
		<gnf:wide_image_link>{$logo_wide}</gnf:wide_image_link>
		<lastBuildDate>{$lastBuildDate}</lastBuildDate>
		{$itemStr}
	</channel>
</rss>
XML;

$xml = new SimpleXMLElement($xml_text);

echo $xml->asXML();
?>
