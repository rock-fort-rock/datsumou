<?php
	// function getCount(){
	// 	return
	// }
	$areaTerm = get_category_by_slug("area");
	$areaID = $areaTerm->term_id;

	$exclude_empty = [];
	$args = array(
		'taxonomy' => 'category',
		'parent' => $areaID,
		'hide_empty' => false,
	);
	foreach (get_terms($args) as $value) {
		$temp = [];
		$temp['slug'] = $value->slug;
		$temp['name'] = $value->name;
		$temp['count'] = $value->count;
		array_push($exclude_empty, $temp);
	}
	// print_r($exclude_empty);
	function checkEmpty($exclude_empty, $slug){
		$index = array_search($slug, array_column($exclude_empty, 'slug'));
	  if($index !== false){
			$name = $exclude_empty[$index]['name'];
			if($exclude_empty[$index]['count'] > 0){
		  	return '<a href="/area/'.$slug.'/">'.$name.'</a>';
			}else{
				return $name;
			}
	  }else{
			return 'check slug';
		}
	}

 ?>
<section class="areaIndex">
	<div class="contentInner">
		<!-- <h1 class="areaTitle">エリアから探す</h1> -->
		<div class="region">
			<h2 class="regionName">北海道・東北地方</h2>
			<ul class="prefectures">
				<li>
					<?php echo checkEmpty($exclude_empty, 'hokkaido'); ?>
				</li>
				<li>
					<?php echo checkEmpty($exclude_empty, 'aomori'); ?>
				</li>
				<li>
					<?php echo checkEmpty($exclude_empty, 'iwate'); ?>
				</li>
				<li>
					<?php echo checkEmpty($exclude_empty, 'akita'); ?>
				</li>
				<li>
					<?php echo checkEmpty($exclude_empty, 'miyagi'); ?>
				</li>
				<li>
					<?php echo checkEmpty($exclude_empty, 'yamagata'); ?>
				</li>
				<li>
					<?php echo checkEmpty($exclude_empty, 'fukushima'); ?>
				</li>
			</ul>
		</div>
		<div class="region">
			<h2 class="regionName">関東地方</h2>
			<ul class="prefectures">
				<li>
					<?php echo checkEmpty($exclude_empty, 'tokyo'); ?>
				</li>
				<li>
					<?php echo checkEmpty($exclude_empty, 'kanagawa'); ?>
				</li>
				<li>
					<?php echo checkEmpty($exclude_empty, 'chiba'); ?>
				</li>
				<li>
					<?php echo checkEmpty($exclude_empty, 'saitama'); ?>
				</li>
				<li>
					<?php echo checkEmpty($exclude_empty, 'ibaraki'); ?>
				</li>
				<li>
					<?php echo checkEmpty($exclude_empty, 'tochigi'); ?>
				</li>
				<li>
					<?php echo checkEmpty($exclude_empty, 'gunma'); ?>
				</li>
			</ul>
		</div>

		<div class="region">
			<h2 class="regionName">甲信越・北陸地方</h2>
			<ul class="prefectures">
				<li>
					<?php echo checkEmpty($exclude_empty, 'yamanashi'); ?>
				</li>
				<li>
					<?php echo checkEmpty($exclude_empty, 'nagano'); ?>
				</li>
				<li>
					<?php echo checkEmpty($exclude_empty, 'niigata'); ?>
				</li>
				<li>
					<?php echo checkEmpty($exclude_empty, 'toyama'); ?>
				</li>
				<li>
					<?php echo checkEmpty($exclude_empty, 'ishikawa'); ?>
				</li>
				<li>
					<?php echo checkEmpty($exclude_empty, 'fukui'); ?>
				</li>

			</ul>
		</div>

		<div class="region">
			<h2 class="regionName">東海地方</h2>
			<ul class="prefectures">
				<li>
					<?php echo checkEmpty($exclude_empty, 'aichi'); ?>
				</li>
				<li>
					<?php echo checkEmpty($exclude_empty, 'shizuoka'); ?>
				</li>
				<li>
					<?php echo checkEmpty($exclude_empty, 'gifu'); ?>
				</li>
				<li>
					<?php echo checkEmpty($exclude_empty, 'mie'); ?>
				</li>
			</ul>
		</div>

		<div class="region">
			<h2 class="regionName">関西地方</h2>
			<ul class="prefectures">
				<li>
					<?php echo checkEmpty($exclude_empty, 'osaka'); ?>
				</li>
				<li>
					<?php echo checkEmpty($exclude_empty, 'hyogo'); ?>
				</li>
				<li>
					<?php echo checkEmpty($exclude_empty, 'kyoto'); ?>
				</li>
				<li>
					<?php echo checkEmpty($exclude_empty, 'shiga'); ?>
				</li>
				<li>
					<?php echo checkEmpty($exclude_empty, 'nara'); ?>
				</li>
				<li>
					<?php echo checkEmpty($exclude_empty, 'wakayama'); ?>
				</li>
			</ul>
		</div>

		<div class="region">
			<h2 class="regionName">中国地方</h2>
			<ul class="prefectures">
				<li>
					<?php echo checkEmpty($exclude_empty, 'okayama'); ?>
				</li>
				<li>
					<?php echo checkEmpty($exclude_empty, 'hiroshima'); ?>
				</li>
				<li>
					<?php echo checkEmpty($exclude_empty, 'shimane'); ?>
				</li>
				<li>
					<?php echo checkEmpty($exclude_empty, 'tottori'); ?>
				</li>
				<li>
					<?php echo checkEmpty($exclude_empty, 'yamaguchi'); ?>
				</li>
			</ul>
		</div>

		<div class="region">
			<h2 class="regionName">四国地方</h2>
			<ul class="prefectures">
				<li>
					<?php echo checkEmpty($exclude_empty, 'ehime'); ?>
				</li>
				<li>
					<?php echo checkEmpty($exclude_empty, 'kagawa'); ?>
				</li>
				<li>
					<?php echo checkEmpty($exclude_empty, 'kochi'); ?>
				</li>
				<li>
					<?php echo checkEmpty($exclude_empty, 'tokushima'); ?>
				</li>
			</ul>
		</div>

		<div class="region">
			<h2 class="regionName">九州・沖縄地方</h2>
			<ul class="prefectures">
				<li>
					<?php echo checkEmpty($exclude_empty, 'fukuoka'); ?>
				</li>
				<li>
					<?php echo checkEmpty($exclude_empty, 'saga'); ?>
				</li>
				<li>
					<?php echo checkEmpty($exclude_empty, 'nagasaki'); ?>
				</li>
				<li>
					<?php echo checkEmpty($exclude_empty, 'oita'); ?>
				</li>
				<li>
					<?php echo checkEmpty($exclude_empty, 'kumamoto'); ?>
				</li>
				<li>
					<?php echo checkEmpty($exclude_empty, 'miyazaki'); ?>
				</li>
				<li>
					<?php echo checkEmpty($exclude_empty, 'kagoshima'); ?>
				</li>
				<li>
					<?php echo checkEmpty($exclude_empty, 'okinawa'); ?>
				</li>

			</ul>
		</div>
	</div>
</section>
