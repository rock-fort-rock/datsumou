<?php
$status = [
	'id' => 'home',
	'description' => '',
];
?>
<?php get_header(); ?>




<?php
// print_r(get_field('ranking', 'option'));

// $salonArg = array(
// 	'post_type' => 'salon',
// 	'posts_per_page'   => -1,
// );
// $salonPosts = get_posts($salonArg);

$salonPosts = get_field('ranking_top', 'option');
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

	array_push($salonArray, $salonTemp);
}
// print_r($salonArray);
?>

<div class="mainContents">
	<section class="contentBlock">
		<div style="background-color: #ededed; height: 0; padding-top: 60%"></div>
	</section>

	<?php $salonNum = 1; foreach($salonArray as $value): ?>
	<section class="contentBlock">
		<header class="salonHeader">
			<?php if($salonNum == 1): ?>
			<img src="/assets/images/icon_ranking1.png" alt="人気サロン第1位" class="rankIcon best3">
			<?php elseif($salonNum == 2): ?>
			<img src="/assets/images/icon_ranking2.png" alt="人気サロン第2位" class="rankIcon best3">
			<?php elseif($salonNum == 3): ?>
			<img src="/assets/images/icon_ranking3.png" alt="人気サロン第3位" class="rankIcon best3">
			<?php else: ?>
			<img src="/assets/images/icon_ranking.png" class="rankIcon others">
			<?php endif; ?>

			<h2 class="salonName"><?php echo $value['title']; ?></h2>
		</header>
		<div class="salonBody">
			<div class="salonInfo">
				<div class="leftBlock">
					<?php if($value['bannerUrl']): ?>
					<div class="paragraph salonInfoBanner">
						<a href="<?php echo $value['bannerUrl']; ?>"><img src="<?php echo $value['bannerImage']; ?>"></a>
					</div>
					<?php endif; ?>
					<div class="paragraph salonInfoAssess">
						<canvas class="radarChart" data-total="<?php echo $value['assessTotal']; ?>" data-price="<?php echo $value['assessPrice']; ?>" data-service="<?php echo $value['assessService']; ?>" data-reserve="<?php echo $value['assessReserve']; ?>" data-care="<?php echo $value['assessCare']; ?>"></canvas>
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
								for($i=0; $i<$n; $i++): ?>
								<?php endfor; ?>

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
					<ul class="review">
						<?php foreach($value['review'] as $review): ?>
						<li>
							<div class="avatar"><img src="<?php echo $review['avatar']; ?>"></div>
							<div class="comment"><?php echo $review['comment']; ?></div>
						</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>

			<div class="paragraph">
				<div class="contentInner">
					<div class="ctaBlock">
						<div class="numberOfPeople">当サイトから<span class="num"><strong><?php echo $value['number']; ?></strong>名</span>がキレイになりました！</div>
						<ul>
							<li class="official"><a href="<?php echo $value['officialsite']; ?>"><img src="/assets/images/btn_officialsite.png" alt="公式サイトを見る"></a></li>
							<li class="detail"><a href="#"><img src="/assets/images/btn_detail.png" alt="詳細を見る"></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php $salonNum++; ?>
	<?php endforeach; ?>

	<!-- <section class="contentBlock">
		<header class="salonHeader">
			<img src="/assets/images/icon_ranking1.png" alt="人気サロン第1位" class="rankIcon best3">
			<h2 class="salonName">コロリー</h2>
		</header>
		<div class="salonBody">
			<div class="salonInfo">
				<div class="leftBlock">
					<div class="paragraph salonInfoBanner">
						<a href="#"><img src="/assets/images/banner_coloree.jpg"></a>
					</div>
					<div class="paragraph salonInfoAssess">
						<canvas class="radarChart" data-total="5" data-price="4" data-service="5" data-reserve="5" data-care="3"></canvas>
					</div>
					<div class="paragraph exceptSmall">
						<h3 class="salonContentTitle">料金</h3>
						<div class="contentInner">テキストが入ります。テキストが入ります。テキストが入ります。</div>
					</div>
					<div class="paragraph exceptSmall">
						<h3 class="salonContentTitle">キャンペーン</h3>
						<div class="contentInner">テキストが入ります。テキストが入ります。テキストが入ります。</div>
					</div>
				</div>
				<div class="rightBlock">
					<div class="salonInfoPoint">
						<div class="pointFrame">
							<ul>
								<li>ポイント1</li>
								<li>医療脱毛だからツルツルに♪</li>
								<li>あいうえおかきくけこさしす</li>
							</ul>
							
						</div>
					</div>
					<div class="paragraph">
						<div class="contentInner">
							<p>キレイな素肌で前向きになれたら、<br>毎日がもっとカラフルに輝きだす。</p>
							<p>
							▼美容脱毛サロン『coloree』の特徴<br>
							１）全身美容脱毛46部位が月々6,500円（税別）<br>
							２　VIO含め全身まるごと46部位脱毛<br>
							３）さらに安心♪未消化分全額返金保証あり<br>
							４）予約の取りやすさ業界トップクラス<br>
							５）経験豊富なスタッフを中心にお手入れ<br>
							６）プライバシーに配慮した女性専用の完全個室<br>
							７）使用ローションは、保湿効果も期待できて肌に潤いをプラス<br>
							８）もちろん、無理な勧誘は一切なし</p>
						</div>
					</div>
					<div class="paragraph onlySmall">
						<h3 class="salonContentTitle">料金</h3>
						<div class="contentInner">テキストが入ります。テキストが入ります。テキストが入ります。</div>
					</div>
					<div class="paragraph onlySmall">
						<h3 class="salonContentTitle">キャンペーン</h3>
						<div class="contentInner">テキストが入ります。テキストが入ります。テキストが入ります。</div>
					</div>
					<div class="paragraph salonInfoOverview">
						<div class="salonContentTitle">サロン情報</div>
						<div class="contentInner">
							<table>
								<tr>
									<th>クチコミ</th><th>回数</th><th>部位数</th><th>学割</th>
								</tr>
								<tr>
									<td><span class="rating">★</span><span class="rating">★</span><span class="rating">★</span><span class="rating">★</span><span class="rating">★</span></td><td>5回</td><td>25箇所</td><td>〇</td>
								</tr>
								<tr>
									<th>未成年</th><th>乗り換え割</th><th>医療・美容</th><th></th>
								</tr>
								<tr>
									<td class="review">〇</td><td>なし</td><td>美容</td><td></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>

			<div class="paragraph salonReview">
				<div class="salonContentTitle">みんなのクチコミ</div>
				<div class="contentInner">
					<ul class="review">
						<li>
							<div class="avatar"><img src="/assets/images/avatar01.png"></div>
							<div class="comment">ああああああ</div>
						</li>
						<li>
							<div class="avatar"><img src="/assets/images/avatar02.png"></div>
							<div class="comment">あ<br>あ<br>あ<br>あ<br>あ</div>
						</li>
						<li>
							<div class="avatar"><img src="/assets/images/avatar03.png"></div>
							<div class="comment">ああああああ</div>
						</li>
					</ul>
				</div>
			</div>

			<div class="paragraph">
				<div class="contentInner">
					<div class="ctaBlock">
						<div class="numberOfPeople">当サイトから<span class="num"><strong>123</strong>名</span>がキレイになりました！</div>
						<ul>
							<li class="official"><a href="#"><img src="/assets/images/btn_officialsite.png" alt="公式サイトを見る"></a></li>
							<li class="detail"><a href="#"><img src="/assets/images/btn_detail.png" alt="詳細を見る"></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="contentBlock">
		<header class="salonHeader">
			<img src="/assets/images/icon_ranking.png" class="rankIcon others">
			<h2 class="salonName">コロリー</h2>
		</header>
		<div class="salonBody">
			<div class="salonInfo">
				<div class="leftBlock">
					<div class="paragraph salonInfoBanner">
						<a href="#"><img src="/assets/images/banner_coloree.jpg"></a>
					</div>
					<div class="paragraph salonInfoAssess">
						<canvas class="radarChart" data-total="5" data-price="4" data-service="5" data-reserve="5" data-care="3"></canvas>
					</div>
					<div class="paragraph exceptSmall">
						<h3 class="salonContentTitle">料金</h3>
						<div class="contentInner">テキストが入ります。テキストが入ります。テキストが入ります。</div>
					</div>
					<div class="paragraph exceptSmall">
						<h3 class="salonContentTitle">キャンペーン</h3>
						<div class="contentInner">テキストが入ります。テキストが入ります。テキストが入ります。</div>
					</div>
				</div>
				<div class="rightBlock">
					<div class="salonInfoPoint">
						<div class="pointFrame">
							<ul>
								<li>ポイント1</li>
								<li>医療脱毛だからツルツルに♪</li>
								<li>あいうえおかきくけこさしす</li>
							</ul>
							
						</div>
					</div>
					<div class="paragraph">
						<div class="contentInner">
							<p>キレイな素肌で前向きになれたら、<br>毎日がもっとカラフルに輝きだす。</p>
							<p>
							▼美容脱毛サロン『coloree』の特徴<br>
							１）全身美容脱毛46部位が月々6,500円（税別）<br>
							２　VIO含め全身まるごと46部位脱毛<br>
							３）さらに安心♪未消化分全額返金保証あり<br>
							４）予約の取りやすさ業界トップクラス<br>
							５）経験豊富なスタッフを中心にお手入れ<br>
							６）プライバシーに配慮した女性専用の完全個室<br>
							７）使用ローションは、保湿効果も期待できて肌に潤いをプラス<br>
							８）もちろん、無理な勧誘は一切なし</p>
						</div>
					</div>
					<div class="paragraph onlySmall">
						<h3 class="salonContentTitle">料金</h3>
						<div class="contentInner">テキストが入ります。テキストが入ります。テキストが入ります。</div>
					</div>
					<div class="paragraph onlySmall">
						<h3 class="salonContentTitle">キャンペーン</h3>
						<div class="contentInner">テキストが入ります。テキストが入ります。テキストが入ります。</div>
					</div>
					<div class="paragraph salonInfoOverview">
						<div class="salonContentTitle">サロン情報</div>
						<div class="contentInner">
							<table>
								<tr>
									<th>クチコミ</th><th>回数</th><th>部位数</th><th>学割</th>
								</tr>
								<tr>
									<td><span class="rating">★</span><span class="rating">★</span><span class="rating">★</span><span class="rating">★</span><span class="rating">★</span></td><td>5回</td><td>25箇所</td><td>〇</td>
								</tr>
								<tr>
									<th>未成年</th><th>乗り換え割</th><th>医療・美容</th><th></th>
								</tr>
								<tr>
									<td class="review">〇</td><td>なし</td><td>美容</td><td></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>

			<div class="paragraph salonReview">
				<div class="salonContentTitle">みんなのクチコミ</div>
				<div class="contentInner">
					<ul class="review">
						<li>
							<div class="avatar"><img src="/assets/images/avatar01.png"></div>
							<div class="comment">ああああああ</div>
						</li>
						<li>
							<div class="avatar"><img src="/assets/images/avatar02.png"></div>
							<div class="comment">あ<br>あ<br>あ<br>あ<br>あ</div>
						</li>
						<li>
							<div class="avatar"><img src="/assets/images/avatar03.png"></div>
							<div class="comment">ああああああ</div>
						</li>
					</ul>
				</div>
			</div>

			<div class="paragraph">
				<div class="contentInner">
					<div class="ctaBlock">
						<div class="numberOfPeople">当サイトから<span class="num"><strong>123</strong>名</span>がキレイになりました！</div>
						<ul>
							<li class="official"><a href="#"><img src="/assets/images/btn_officialsite.png" alt="公式サイトを見る"></a></li>
							<li class="detail"><a href="#"><img src="/assets/images/btn_detail.png" alt="詳細を見る"></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section> -->
</div>

<?php get_footer(); ?>
