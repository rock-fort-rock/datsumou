<?php
//インポート用CSV
// wordpress読みこみ
require_once('../../../../wp-load.php');
$post_type = 'column';
$query = array(
			'numberposts' => -1,
			'post_status' => array( 'publish', 'draft', 'future', 'private' ),
			'post_type' => $post_type
		);

$fileName = $post_type . "_" . date("YmdHis") . ".csv";
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename=' . $fileName);
echo displayList(get_posts($query));

?>
<?php
function displayList($posts){

	global $wpdb, $post_type;

	$listArray = array();
	$dateArray = array();

	foreach($posts as $post) :
		//2019の20はパーマリンク設定でつける。でないとアーカイブページとみなされリライトされて404に。。
		$date = mysql2date('ymd', $post->post_date);
		array_push($dateArray, $date);
		$countValue = array_count_values($dateArray);
		if ($countValue[$date] == 1) {
			$count = 1;
		}else{
			$count = $countValue[$date];
		}
		// echo sprintf('%03d', $count);
		$postArray = array();
		$postArray['post_id'] = $post->ID;
		$postArray['post_name'] = $date.sprintf('%03d', $count);
		// $postArray['post_type'] = $post_type;
		$postArray['post_type'] = 'post';
		$postArray['post_title'] = '"'.$post->post_title.'"';
		$postArray['post_category'] = '';

		$listArray[] = $postArray;
	endforeach;
	// exit();



	$hArray = array(
		"post_id",
		"post_name",
		"post_type",
		"post_title",
		"post_category",
		);

	$h = '"' . implode('","', $hArray) . '"' . "\n";
	// echo $h;


	// $csv_data = mb_convert_encoding($h, 'SJIS-win', 'UTF-8');
	$csv_data = $h;
	foreach($listArray as $value){
		$data = implode(",", $value);
		// $csv_data .= mb_convert_encoding($data, 'SJIS-win', 'UTF-8');
		$csv_data .= $data;
		$csv_data .= "\n";
	}
	// print_r($csv_data);
	return $csv_data;
}
?>
