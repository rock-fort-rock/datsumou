<?php
/*
Template Name: 施術箇所一覧
*/
?>

<?php
if(!is_amp()){
	get_header();
}
?>
<div class="mainContents">
	<section class="contentBlock">
		<div class="contentInner">
			<h1 class="pageTitle">施術箇所一覧</h1>

			<!-- <h2 class="pageHeadline1">当サイトについて</h2> -->

			<div class="treatmentParts">
				<input id="frontTab" type="radio" name="tabItem" checked>
			  <label class="tabItem" for="frontTab">正面</label>
			  <input id="backTab" type="radio" name="tabItem">
			  <label class="tabItem" for="backTab">背面</label>
			  <input id="vioTab" type="radio" name="tabItem">
			  <label class="tabItem" for="vioTab">VIO</label>

				<div class="tabContent frontContent">
				  <img src="/assets/images/treatment/front.jpg" alt="正面" class="illust">
					<ul class="otherBtn">
						<li data-target="backTab">
							<img src="/assets/images/treatment/btn_back.png" alt="背面">
						</li>
						<li data-target="vioTab">
							<img src="/assets/images/treatment/btn_vio.png" alt="VIO">
						</li>
					</ul>
				</div>
				<div class="tabContent backContent">
				  <img src="/assets/images/treatment/back.jpg" alt="背面" class="illust">
					<ul class="otherBtn">
						<li data-target="frontTab">
							<img src="/assets/images/treatment/btn_front.png" alt="正面">
						</li>
						<li data-target="vioTab">
							<img src="/assets/images/treatment/btn_vio.png" alt="VIO">
						</li>
					</ul>
				</div>
				<div class="tabContent vioContent">
				  <img src="/assets/images/treatment/vio.jpg" alt="VIO" class="illust">
					<ul class="otherBtn">
						<li data-target="frontTab">
							<img src="/assets/images/treatment/btn_front.png" alt="正面">
						</li>
						<li data-target="backTab">
							<img src="/assets/images/treatment/btn_back.png" alt="背面">
						</li>
					</ul>
				</div>
			</div>

			<ul class="partsList">
				<li>
					<a href="#" class="inner">
						<img src="/assets/images/treatment/thumb_face.png" alt="顔脱毛" class="thumb">
						<p>
							顔脱毛をすることで、 赤ちゃん のようなプルプルでツルっとした 肌の顔へと変化します。 また、 鼻下や口周り眉毛の処理をす る事で化粧ノリがよくなり、 化粧 崩れを防ぐ事もできます。
						</p>
					</a>
				</li>
				<li>
					<a href="#" class="inner">
						<img src="/assets/images/treatment/thumb_neck.png" alt="首脱毛" class="thumb">
						<p>
							首脱毛により、 首が長く美しく 見えるようになります。 鎖骨も キレイ見えるので、 スリムな印 象を与える事ができるようになり ます♪アップヘアーの方は、 特にオススメですよ♪
						</p>
					</a>
				</li>
				<li>
					<a href="#" class="inner">
						<img src="/assets/images/treatment/thumb_breast.png" alt="胸脱毛" class="thumb">
						<p>
							凹凸があり毛質が細い胸の自 己処理は、 肌トラブルが多いの が特徴です。 自己処理で大事 なバストを傷つける前に、 脱毛 サロンで魅力的なバストを手に 入れましょう。
						</p>
					</a>
				</li>
				<li>
					<a href="#" class="inner">
						<img src="/assets/images/treatment/thumb_back.png" alt="背中脱毛" class="thumb">
						<p>
							自分では気づきにくく、 見えづ らい背中のムダ毛処理は広範 囲でとても大変ですよね。 脱毛 サロンでニキビや肌トラブルのな い 「後ろ姿美人」 を手にいれ ましょう♪
						</p>
					</a>
				</li>

				<li>
					<a href="#" class="inner">
						<img src="/assets/images/treatment/thumb_underarm.png" alt="脇脱毛" class="thumb">
						<p>
							黒ずみや肌のブツブツが見えや すい箇所なので、 毎日お手入 れされている方も多いでしょう。 ワキガ対策と合わせて、 脱毛 サロンで処理し、 毎日の面倒 なお手入れから開放されよう!
						</p>
					</a>
				</li>
				<li>
					<a href="#" class="inner">
						<img src="/assets/images/treatment/thumb_arm.png" alt="腕脱毛" class="thumb">
						<p>
							手の指から肘、 二の腕までの ムダ毛を、 ムラ無くキレイに仕 上げるのは一苦労です。 脱毛 サロンでツルツル ・ スベスベな 腕 (指) を手に入れて、 最大 級にオシャレを楽しんじゃおう♪
						</p>
					</a>
				</li>

				<li>
					<a href="#" class="inner">
						<img src="/assets/images/treatment/thumb_belly.png" alt="お腹脱毛" class="thumb">
						<p>
							下着の試着や病院での問診中 など、 気を許した時にアラワに お腹のムダ毛は、 密かに気に している女性が多いようです。 キレイに処理して、大胆なファッ ションに挑戦してみよう!
						</p>
					</a>
				</li>
				<li>
					<a href="#" class="inner">
						<img src="/assets/images/treatment/thumb_ass.png" alt="お尻脱毛" class="thumb">
						<p>
							生えてる事に気づきにくいお尻 のムダ毛処理は、 自己処理が 難しく、 色素沈着を起こす事も あるので脱毛サロンで、 触り心 地の良いツルすべな美尻を手 に入れてください♪
						</p>
					</a>
				</li>

				<li>
					<a href="#" class="inner">
						<img src="/assets/images/treatment/thumb_vio.png" alt="VIO脱毛" class="thumb">
						<p>
							美的感性の高い女性や海外セ レブの間で流行っている VIO(ハ イジニーナ) 脱毛は、 デリケー トゾーンを衛星に保つためには 必須!ムレの原因となるムダ毛 を根こそぎ排除しちゃおう!!
						</p>
					</a>
				</li>
				<li>
					<a href="#" class="inner">
						<img src="/assets/images/treatment/thumb_thigh.png" alt="太もも脱毛" class="thumb">
						<p>
							移動中の座席やカウンター席な ど、 座っているときに目立ちや すい太もものムダ毛は、 人に よって気質大きく異なるので、 無理して自己処せずに脱毛サロ ンで美脚を目指そう!
						</p>
					</a>
				</li>

				<li>
					<a href="#" class="inner">
						<img src="/assets/images/treatment/thumb_leg.png" alt="足脱毛" class="thumb">
						<p>
							季節を問わず露出するケース の多いひざ下 (すね毛) のム ダ毛を処理する事で、 膝下の 肌トーンが明るくなり、 スラリと 長い美脚を演出する事ができま す。
						</p>
					</a>
				</li>
				<li>
					<a href="#" class="inner">
						<img src="/assets/images/treatment/thumb_all.png" alt="全身脱毛" class="thumb">
						<p>
							まとめて全身のムダ毛処理をし たい!と考えている方にオスス メです。 部位ごとの脱毛と比較 するとコスト抑える事ができ、 施術回数も少ないのでコストパ フォーマンの優れたコースです
						</p>
					</a>
				</li>
			</ul>

		</div>
	</section>
</div>

<?php
if(!is_amp()){
	get_footer();
}
?>
