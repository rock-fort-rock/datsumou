<?php
$status = [
	'id' => 'home',
];
?>
<?php get_header(); ?>
<div class="mainContents">
	<section class="contentBlock">
		<!-- <div style="background-color: #ededed; height: 0; padding-top: 60%"></div> -->
		<div class="diagnosisChart">
			<div class="header statusStart">
				<div class="headerStart">
					<img src="/assets/images/home/logo_large.png" class="logo" alt="ツルツル！全身脱毛診断メーカー">
					<img src="/assets/images/home/cat.png" class="cat">
				</div>

				<div class="headerResult">
					<img src="/assets/images/home/title_result.png" class="title onlySmall" alt="あなたにぴったりの脱毛サロンは…">
					<img src="/assets/images/home/title_result_pc.png" class="title exceptSmall" alt="あなたにぴったりの脱毛サロンは…">
				</div>
			</div>


			<div class="diagnosisStartContainer diagnosisContainer active">
				<div class="textTitle">
					<img src="/assets/images/home/text_zubari.png" alt="あなたにピッタリのサロンをズバリ診断！">
				</div>
				<div class="diagnosisStart">
					<img src="/assets/images/home/button_start.png" alt="脱毛診断スタート">
				</div>
			</div>

			<div class="questionsContainer diagnosisContainer">
				<ul class="questions">
					<li class="question active" data-question="1">
						<div class="textTitle">
							<img src="/assets/images/home/text_zubari.png" alt="あなたにピッタリのサロンをズバリ診断！">
						</div>
						<div class="headline"><span>今回脱毛したい部分は？</span></div>
						<div class="choices">
							<div class="answer" data-answer="1">部分脱毛</div>
							<div class="answer" data-answer="2">全身脱毛</div>
						</div>
					</li>
					<li class="question" data-question="2">
						<div class="textTitle">
							<img src="/assets/images/home/text_q2.png" alt="第2問">
						</div>
						<div class="headline"><span>予算は決めてる？</span></div>
						<div class="choices">
							<div class="answer small" data-answer="1">手ごろな価格で、まずは試してみたい</div>
							<div class="answer small" data-answer="2">時間やお金がかかっても<br>シッカリ効果を出したい</div>
						</div>
					</li>
					<li class="question" data-question="3">
						<div class="textTitle">
							<img src="/assets/images/home/text_q3.png" alt="第3問">
						</div>
						<div class="headline"><span>脱毛が完了するまでの時間にこだわりはある？</span></div>
						<div class="choices">
							<div class="answer small" data-answer="1">早く予約が取れることが大事！</div>
							<div class="answer small" data-answer="2">通える回数や効果が大事！</div>
						</div>
					</li>
					<li class="question" data-question="4">
						<div class="textTitle">
							<img src="/assets/images/home/text_q4.png" alt="第4問">
						</div>
						<div class="headline"><span>キミにとって"みんなのクチコミ評価"はサロン選びでははずせない？</span></div>
						<div class="choices">
							<div class="answer" data-answer="1">口コミ評価って大事！</div>
							<div class="answer" data-answer="2">口コミよりも実績が大事！</div>
						</div>
					</li>
				</ul>
			</div>

			<div class="loadingContainer diagnosisContainer">
				<div class="textTitle">
					<img src="/assets/images/home/text_loading.png" alt="診断結果を測定中だよ">
				</div>
				<div class="checkedAnswerContainer">
					<div class="checkedAnswer">
						<div class="comment">君の希望は…</div>
						<ul></ul>
						<div class="comment">…だね？</div>
					</div>
				</div>
			</div>

			<div class="resultContainer diagnosisContainer">
				<div class="result resultA">
					<div class="catch">自分に必要な脱毛を知っているあなたには</div>
					<!-- <div class="salonInfo">
						<div class="resultSalonHeader">
							<div class="logo"><img src="/assets/images/sample_logo.gif"></div>
							<div class="salonName"><span>ミュゼプラチナム</span>がおすすめ！</div>
						</div>
						<div class="comment">脱毛の老舗のミュゼプラチナムなら、店舗数も業界最大・高速マシンで短期間で脱毛が完了。あなたの望む箇所の脱毛が可能なので、無駄なお金を使う必要もありません！</div>
						<div class="buttons">
							<ul>
								<li class="official"><a href="http://localhost:8013/link/coloree/" target="_blank"><img src="/assets/images/btn_officialsite.png" alt="公式サイトを見る"></a></li>
								<li class="detail"><a href="http://localhost:8013/salon/coloree/"><img src="/assets/images/btn_detail.png" alt="詳細を見る"></a></li>
							</ul>
							<div class="moreRanking"><a href="#"><span>ランキングをみる</span></a></div>
						</div>
					</div> -->
					<?php echo result_SalonInfo('musee', 'a'); ?>
				</div>
				<div class="result resultB">Bタイプ</div>
				<div class="result resultC">Cタイプ</div>
				<div class="result resultD">Dタイプ</div>
				<div class="result resultE">Eタイプ</div>
				<div class="result resultF">Fタイプ</div>
				<div class="result resultG">Gタイプ</div>
				<div class="result resultH">Hタイプ</div>
				<div class="result resultI">Iタイプ</div>
				<div class="result resultJ">Jタイプ</div>
				<div class="result resultK">Kタイプ</div>
				<div class="result resultL">Lタイプ</div>
				<div class="result resultM">Mタイプ</div>
				<div class="result resultN">Nタイプ</div>
				<div class="result resultO">Oタイプ</div>
				<div class="result resultP">Pタイプ</div>
			</div>

			
			
			<div class="moko statusStart">
				<img src="/assets/images/home/moko1.png" class="startMoko">
				<img src="/assets/images/home/moko2.png" class="resultMoko">
			</div>

			<div class="illustCopyright"><img src="/assets/images/home/copyright.png"></div>
		</div>

	</section>
	<?php $salonPosts = get_field('ranking_top', 'option'); ?>
	<?php get_template_part('ranking'); ?>
</div>

<?php get_footer(); ?>
