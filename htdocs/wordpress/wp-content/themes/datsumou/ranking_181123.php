<?php
global $salonPosts;
$salonArray = [];
foreach($salonPosts as $value){
	$salonTemp = [];
	$id = $value['salon']->ID;

	$salonTemp['title'] = get_the_title($id);
	$banner = get_field('salon_banner', $id);
	$bannerObj = $banner['salon_banner_image'];
	$salonTemp['bannerImage'] = $bannerObj['sizes']['medium_large'];
	$salonTemp['bannerUrl'] = $banner['salon_banner_url'];

	$assessment = get_field('salon_assessment', $id);
	$salonTemp['assessTotal'] = $assessment['salon_assessment_total'];
	$salonTemp['assessPrice'] = $assessment['salon_assessment_price'];
	$salonTemp['assessService'] = $assessment['salon_assessment_service'];
	$salonTemp['assessReserve'] = $assessment['salon_assessment_reserve'];
	$salonTemp['assessCare'] = $assessment['salon_assessment_care'];

	$point = [];
	while(the_repeater_field('salon_point', $id)){
		$point[] = get_sub_field('salon_point_catch');
	}
	$salonTemp['point'] = $point;

	$salonTemp['description'] = get_field('salon_description', $id);
	$salonTemp['price'] = get_field('salon_price', $id);
	$salonTemp['campaign'] = get_field('salon_campaign', $id);

	$info = get_field('salon_info', $id);
	$salonTemp['info'] = $info['salon_info_item'];

	$infoReview['salon_info_item_name'] = 'クチコミ';
	$infoReview['salon_info_item_content'] = $info['salon_info_rating'];
	array_unshift($salonTemp['info'], $infoReview);

	$review = [];
	while(the_repeater_field('salon_review', $id)){
		$reviewObj = get_sub_field('salon_review_avatar');
		$reviewTemp['avatar'] = $reviewObj['sizes']['thumbnail'];
		$reviewTemp['comment'] = get_sub_field('salon_review_comment');
		array_push($review, $reviewTemp);
	}
	$salonTemp['review'] = $review;

	$salonTemp['number'] = get_field('salon_number', $id);
	$salonTemp['officialsite'] = get_field('salon_officialsite', $id);
	$salonTemp['permalink'] = get_the_permalink($id);

	array_push($salonArray, $salonTemp);
}
?>

<?php $salonNum = 1; foreach($salonArray as $value): ?>
<section class="contentBlock">
	<header class="salonHeader">
		<?php if(is_amp()): ?>
			<amp-img src="/assets/images/icon_ranking<?php echo $salonNum; ?>.png" alt="人気サロン第<?php echo $salonNum; ?>位" class="rankIcon" width="112" height="90"></amp-img>
		<?php else: ?>
			<img src="/assets/images/icon_ranking<?php echo $salonNum; ?>.png" alt="人気サロン第<?php echo $salonNum; ?>位" class="rankIcon">
		<?php endif; ?>
		<h2 class="salonName"><?php echo $value['title']; ?></h2>
	</header>
	<div class="salonBody">
		<div class="salonInfo">
			<div class="leftBlock">
				<?php if($value['bannerUrl']): ?>
				<div class="paragraph salonInfoBanner">
					<a href="<?php echo $value['bannerUrl']; ?>" target="_blank">
						<?php if(is_amp()): ?>
						<amp-img src="<?php echo $value['bannerImage']; ?>" width="800" height="667" layout="responsive"></amp-img>
						<?php else: ?>
						<img src="<?php echo $value['bannerImage']; ?>">
						<?php endif; ?>
					</a>
				</div>
				<?php endif; ?>
				<div class="paragraph salonInfoAssess">
					<?php if(is_amp()): ?>
						<!-- <h3 class="salonContentTitle">評価</h3> -->
						<div class="contentInner">
							<table class="assessList">
								<tr>
									<th>総合評価</th>
									<td>
										<?php for($i=0; $i<$value['assessTotal']; $i++): ?>
										<span class="rating">★</span>
										<?php endfor; ?>
									</td>
								</tr>
								<tr>
									<th>価格</th>
									<td>
										<?php for($i=0; $i<$value['assessPrice']; $i++): ?>
										<span class="rating">★</span>
										<?php endfor; ?>
									</td>
								</tr>
								<tr>
									<th>接客・雰囲気</th>
									<td>
										<?php for($i=0; $i<$value['assessService']; $i++): ?>
										<span class="rating">★</span>
										<?php endfor; ?>
									</td>
								</tr>
								<tr>
									<th>予約のしやすさ</th>
									<td>
										<?php for($i=0; $i<$value['assessReserve']; $i++): ?>
										<span class="rating">★</span>
										<?php endfor; ?>
									</td>
								</tr>
								<tr>
									<th>アフターケア</th>
									<td>
										<?php for($i=0; $i<$value['assessCare']; $i++): ?>
										<span class="rating">★</span>
										<?php endfor; ?>
									</td>
								</tr>
							</table>
						</div>
					<?php else: ?>
						<canvas class="radarChart" data-total="<?php echo $value['assessTotal']; ?>" data-price="<?php echo $value['assessPrice']; ?>" data-service="<?php echo $value['assessService']; ?>" data-reserve="<?php echo $value['assessReserve']; ?>" data-care="<?php echo $value['assessCare']; ?>"></canvas>
					<?php endif; ?>
				</div>
				<?php if($value['price']): ?>
				<div class="paragraph exceptSmall">
					<h3 class="salonContentTitle">料金</h3>
					<div class="contentInner"><?php echo $value['price']; ?></div>
				</div>
				<?php endif; ?>
				<?php if($value['campaign']): ?>
				<div class="paragraph exceptSmall">
					<h3 class="salonContentTitle">キャンペーン</h3>
					<div class="contentInner"><?php echo $value['campaign']; ?></div>
				</div>
				<?php endif; ?>
			</div>
			<div class="rightBlock">
				<div class="salonInfoPoint">
					<div class="pointFrame">
						<ul>
							<?php foreach($value['point'] as $point): ?>
							<li><?php echo $point; ?></li>
							<?php endforeach; ?>
						</ul>
						
					</div>
				</div>
				<div class="paragraph">
					<div class="contentInner">
						<?php echo $value['description']; ?>
					</div>
				</div>
				<?php if($value['price']): ?>
				<div class="paragraph onlySmall">
					<h3 class="salonContentTitle">料金</h3>
					<div class="contentInner"><?php echo $value['price']; ?></div>
				</div>
				<?php endif; ?>
				<?php if($value['campaign']): ?>
				<div class="paragraph onlySmall">
					<h3 class="salonContentTitle">キャンペーン</h3>
					<div class="contentInner"><?php echo $value['campaign']; ?></div>
				</div>
				<?php endif; ?>
				<div class="paragraph salonInfoOverview">
					<div class="salonContentTitle">サロン情報</div>
					<div class="contentInner">
						<table>

							<?php
							$col = 4;
							$n = (count($value['info'])%$col != 0)?(floor(count($value['info'])/$col)+1)*$col:count($value['info']);
							?>

							<?php for($i=0; $i<$n/$col; $i++): ?>
							<tr>
								<?php for($a=$i*$col; $a<($i+1)*$col; $a++): ?>
									<?php //print_r($value['info']); ?>
								<th><?php echo $value['info'][$a]['salon_info_item_name']; ?></th>
								<?php endfor; ?>
							</tr>
							<tr>
								<?php for($a=$i*$col; $a<($i+1)*$col; $a++): ?>
								<td>
								<?php if($a == 0): ?>
									<?php for($star=0; $star<$value['info'][$a]['salon_info_item_content']; $star++): ?>
									<span class="rating">★</span>
									<?php endfor; ?>
								<?php else: ?>
									<?php echo $value['info'][$a]['salon_info_item_content']; ?>
								<?php endif; ?>	
								</td>
								<?php endfor; ?>
							</tr>
							<?php endfor; ?>
						</table>
					</div>
				</div>
			</div>
		</div>

		<div class="paragraph salonReview">
			<div class="salonContentTitle">みんなのクチコミ</div>
			<div class="contentInner">
				<?php if(is_amp()): ?>
					<ul class="review">
						<?php 
						$count = count($value['review']);
						?>
						<?php for($i=0; $i<$count; $i++): ?>
						<li>
							<div class="avatar"><amp-img src="<?php echo $value['review'][$i]['avatar']; ?>" width="60" height="60"></amp-img></div>
							<div class="comment"><?php echo $value['review'][$i]['comment']; ?></div>
						</li>
						<?php endfor; ?>
					</ul>
				<?php else: ?>
					<ul class="review">
						<?php 
						$count = count($value['review']);
						$init = 3;
						?>
						<?php for($i=0; $i<min($count, $init); $i++): ?>
						<li>
							<div class="avatar"><img src="<?php echo $value['review'][$i]['avatar']; ?>"></div>
							<div class="comment"><?php echo $value['review'][$i]['comment']; ?></div>
						</li>
						<?php endfor; ?>
					</ul>
					<?php if($count > $init): ?>
					<div class="viewMore"><span>もっとみる</span></div>
					<ul class="review reviewMore even">
						<?php for($i=$init; $i<$count; $i++): ?>
						<li>
							<div class="avatar"><img src="<?php echo $value['review'][$i]['avatar']; ?>"></div>
							<div class="comment"><?php echo $value['review'][$i]['comment']; ?></div>
						</li>
						<?php endfor; ?>
					</ul>
					<?php endif; ?>
				<?php endif; ?>
			</div>
		</div>

		<div class="paragraph">
			<div class="contentInner">
				<div class="ctaBlock">
					<div class="numberOfPeople">当サイトから<span class="num"><strong><?php echo $value['number']; ?></strong>名</span>がキレイになりました！</div>
					<ul>
						<li class="official">
							<a href="<?php echo $value['officialsite']; ?>" target="_blank">
								<?php if(is_amp()): ?>
								<amp-img src="/assets/images/btn_officialsite.png" alt="公式サイトを見る" width="214" height="47"></amp-img>
								<?php else: ?>
								<img src="/assets/images/btn_officialsite.png" alt="公式サイトを見る">
								<?php endif; ?>
							</a>
						</li>
						<li class="detail">
							<a href="<?php echo $value['permalink']; ?>">
								<?php if(is_amp()): ?>
								<amp-img src="/assets/images/btn_detail.png" alt="詳細を見る" width="114" height="47"></amp-img>
								<?php else: ?>
								<img src="/assets/images/btn_detail.png" alt="詳細を見る">
								<?php endif; ?>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
<?php $salonNum++; ?>
<?php endforeach; ?>