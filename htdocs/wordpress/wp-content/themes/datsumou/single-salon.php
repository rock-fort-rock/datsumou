<?php
$status = [
	'id' => 'salonDetail',
	'description' => '',
];
?>
<?php get_header(); ?>

<div class="mainContents">
	<section class="contentBlock">
		<header class="salonHeader">
			<img src="/assets/images/icon_ranking1.png" alt="人気サロン第1位" class="rankIcon best3">
			<h2 class="salonName"><?php the_title(); ?></h2>
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
</div>

<?php get_footer(); ?>