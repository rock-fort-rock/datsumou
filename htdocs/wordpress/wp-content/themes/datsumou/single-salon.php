<?php
$status = [
	'id' => 'salonDetail',
];
?>
<?php
if(!is_amp()){
	get_header();
}
?>
<?php
$banner = get_field('salon_banner');
$bannerObj = $banner['salon_banner_image'];
$bannerImage = $bannerObj['sizes']['medium_large'];
$bannerUrl = $banner['salon_banner_url'];

$assessment = get_field('salon_assessment');
$assessTotal = $assessment['salon_assessment_total'];
$assessPrice = $assessment['salon_assessment_price'];
$assessService = $assessment['salon_assessment_service'];
$assessReserve = $assessment['salon_assessment_reserve'];
$assessCare = $assessment['salon_assessment_care'];

$point = [];
while(the_repeater_field('salon_point')){
	$point[] = get_sub_field('salon_point_catch');
}

$description = get_field('salon_description');
$price = get_field('salon_price');
$campaign = get_field('salon_campaign');

$infoGroup = get_field('salon_info');
$info = $infoGroup['salon_info_item'];

$infoReview['salon_info_item_name'] = 'クチコミ';
$infoReview['salon_info_item_content'] = $infoGroup['salon_info_rating'];
array_unshift($info, $infoReview);
// print_r($info);

$review = [];
while(the_repeater_field('salon_review')){
	$reviewObj = get_sub_field('salon_review_avatar');
	$reviewTemp['avatar'] = $reviewObj['sizes']['thumbnail'];
	$reviewTemp['comment'] = get_sub_field('salon_review_comment');
	array_push($review, $reviewTemp);
}

$number = get_field('salon_number');
$officialsite = get_field('salon_officialsite');
$experience = get_field('salon_experience');
// $salonTemp['permalink'] = get_the_permalink($id);

?>
<div class="mainContents">
	<section class="contentBlock">
		<?php if(!is_amp()): ?>
		<div class="salonNavi">
			<ul>
				<li><a href="#point" class="scroll">ポイント</a></li>
				<li>
					<div class="onlySmall"><a href="#price" class="scroll">料金</a></div>
					<div class="exceptSmall"><a href="#pricePc" class="scroll">料金</a></div>
				</li>
				<li><a href="#info" class="scroll">サロン情報</a></li>
				<li><a href="#review" class="scroll">クチコミ</a></li>
			</ul>
		</div>
		<?php endif; ?>
		<header class="salonHeader">
			<h2 class="salonName"><?php the_title(); ?></h2>
		</header>
		<div class="salonBody">
			<div class="salonInfo">
				<div class="leftBlock">
					<?php if($bannerUrl): ?>
					<div class="paragraph salonInfoBanner">
						<a href="<?php echo $bannerUrl; ?>" target="_blank">
							<?php if(is_amp()): ?>
							<amp-img src="<?php echo $bannerImage; ?>" width="800" height="680" layout="responsive"></amp-img>
							<?php else: ?>
							<img src="<?php echo $bannerImage; ?>">
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
										<?php for($i=0; $i<$assessTotal; $i++): ?>
										<span class="rating">★</span>
										<?php endfor; ?>
									</td>
								</tr>
								<tr>
									<th>価格</th>
									<td>
										<?php for($i=0; $i<$assessPrice; $i++): ?>
										<span class="rating">★</span>
										<?php endfor; ?>
									</td>
								</tr>
								<tr>
									<th>接客・雰囲気</th>
									<td>
										<?php for($i=0; $i<$assessService; $i++): ?>
										<span class="rating">★</span>
										<?php endfor; ?>
									</td>
								</tr>
								<tr>
									<th>予約のしやすさ</th>
									<td>
										<?php for($i=0; $i<$assessReserve; $i++): ?>
										<span class="rating">★</span>
										<?php endfor; ?>
									</td>
								</tr>
								<tr>
									<th>アフターケア</th>
									<td>
										<?php for($i=0; $i<$assessCare; $i++): ?>
										<span class="rating">★</span>
										<?php endfor; ?>
									</td>
								</tr>
							</table>
						</div>
						<?php else: ?>
						<canvas class="radarChart" data-total="<?php echo $assessTotal; ?>" data-price="<?php echo $assessPrice; ?>" data-service="<?php echo $assessService; ?>" data-reserve="<?php echo $assessReserve; ?>" data-care="<?php echo $assessCare; ?>"></canvas>
						<?php endif; ?>
					</div>
					<div class="paragraph exceptSmall" id="pricePc">
						<h3 class="salonContentTitle">料金</h3>
						<div class="contentInner"><?php echo $price; ?></div>
					</div>
					<?php if($campaign): ?>
					<div class="paragraph exceptSmall">
						<h3 class="salonContentTitle">キャンペーン</h3>
						<div class="contentInner"><?php echo $campaign; ?></div>
					</div>
					<?php endif; ?>
				</div>
				<div class="rightBlock">
					<div class="salonInfoPoint" id="point">
						<div class="pointFrame">
							<ul>
								<?php foreach($point as $value): ?>
								<li><?php echo $value; ?></li>
								<?php endforeach; ?>
							</ul>

						</div>
					</div>
					<div class="paragraph">
						<div class="contentInner">
							<?php echo $description; ?>
						</div>
					</div>

					<?php if(!is_amp()): ?>
					<div class="salonNavi onlySmall">
						<ul>
							<li><a href="#point" class="scroll">ポイント</a></li>
							<li><span>料金</span></li>
							<li><a href="#info" class="scroll">サロン情報</a></li>
							<li><a href="#review" class="scroll">クチコミ</a></li>
						</ul>
					</div>
					<?php endif; ?>
					<div class="paragraph onlySmall" id="price">
						<h3 class="salonContentTitle">料金</h3>
						<div class="contentInner"><?php echo $price; ?></div>
					</div>
					<?php if($campaign): ?>
					<div class="paragraph onlySmall">
						<h3 class="salonContentTitle">キャンペーン</h3>
						<div class="contentInner"><?php echo $campaign; ?></div>
					</div>
					<?php endif; ?>

					<?php if(!is_amp()): ?>
					<div class="salonNavi onlySmall">
						<ul>
							<li><a href="#point" class="scroll">ポイント</a></li>
							<li><a href="#price" class="scroll">料金</a></li>
							<li><span>サロン情報</span></li>
							<li><a href="#review" class="scroll">クチコミ</a></li>
						</ul>
					</div>
					<?php endif; ?>
					<div class="paragraph salonInfoOverview" id="info">
						<div class="salonContentTitle">サロン情報</div>
						<div class="contentInner">
							<table>
								<?php
								$col = 4;
								$n = (count($info)%$col != 0)?(floor(count($info)/$col)+1)*$col:count($info);
								?>

								<?php for($i=0; $i<$n/$col; $i++): ?>
								<tr>
									<?php for($a=$i*$col; $a<($i+1)*$col; $a++): ?>
									<th><?php echo $info[$a]['salon_info_item_name']; ?></th>
									<?php endfor; ?>
								</tr>
								<tr>
									<?php for($a=$i*$col; $a<($i+1)*$col; $a++): ?>
									<td>
									<?php if($a == 0): ?>
										<?php for($star=0; $star<$info[$a]['salon_info_item_content']; $star++): ?>
										<span class="rating">★</span>
										<?php endfor; ?>
									<?php else: ?>
										<?php echo $info[$a]['salon_info_item_content']; ?>
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

			<?php if(!is_amp()): ?>
			<div class="salonNavi onlySmall">
				<ul>
					<li><a href="#point" class="scroll">ポイント</a></li>
					<li><a href="#price" class="scroll">料金</a></li>
					<li><a href="#info" class="scroll">サロン情報</a></li>
					<li><span>クチコミ</span></li>
				</ul>
			</div>
			<?php endif; ?>

			<div class="paragraph salonReview" id="review">
				<div class="salonContentTitle">みんなのクチコミ</div>
				<div class="contentInner">
				<?php if(is_amp()): ?>
					<ul class="review">
						<?php
						$count = count($review);
						?>
						<?php for($i=0; $i<$count; $i++): ?>
						<li>
							<div class="avatar"><amp-img src="<?php echo $review[$i]['avatar']; ?>" width="60" height="60"></amp-img></div>
							<div class="comment"><?php echo $review[$i]['comment']; ?></div>
						</li>
						<?php endfor; ?>
					</ul>
				<?php else: ?>
					<ul class="review">
						<?php
						$count = count($review);
						$init = 3;
						?>
						<?php for($i=0; $i<min($count, $init); $i++): ?>
						<li>
							<div class="avatar"><img src="<?php echo $review[$i]['avatar']; ?>"></div>
							<div class="comment"><?php echo $review[$i]['comment']; ?></div>
						</li>
						<?php endfor; ?>
					</ul>
					<?php if($count > $init): ?>
					<div class="viewMore"><span>もっとみる</span></div>
					<ul class="review reviewMore even">
						<?php for($i=$init; $i<$count; $i++): ?>
						<li>
							<div class="avatar"><img src="<?php echo $review[$i]['avatar']; ?>"></div>
							<div class="comment"><?php echo $review[$i]['comment']; ?></div>
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
						<div class="numberOfPeople">当サイトから<span class="num"><strong><?php echo $number; ?></strong>名</span>がキレイになりました！</div>
						<ul>
							<li class="official">
								<a href="<?php echo $officialsite; ?>" target="_blank">
									<?php if(is_amp()): ?>
									<amp-img src="/assets/images/btn_officialsite.png" alt="公式サイトを見る" width="204" height="45"></amp-img>
									<?php else: ?>
									<img src="/assets/images/btn_officialsite.png" alt="公式サイトを見る">
									<?php endif; ?>
								</a>
							</li>
							<?php if($experience ): ?>
								<li class="detail">
									<a href="<?php echo $experience; ?>">
										<?php if(is_amp()): ?>
										<amp-img src="/assets/images/btn_experience.png" alt="体験談を見る" width="120" height="45"></amp-img>
										<?php else: ?>
										<img src="/assets/images/btn_experience.png" alt="体験談を見る">
										<?php endif; ?>
									</a>
								</li>
							<?php endif; ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<?php
if(!is_amp()){
	get_footer();
}
?>
