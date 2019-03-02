<?php
$status = [
	'id' => 'home',
];
?>
<?php
if(is_amp()){
	// include 'amp/index.php';
}else{
	get_header();
}
?>
<?php //get_header(); ?>
<div class="mainContents">
	<?php if(!is_amp()): ?>
	<section class="contentBlock">
		<!-- <div style="background-color: #ededed; height: 0; padding-top: 60%"></div> -->
		<div class="diagnosisChart">
			<div class="diagnosisChartInner">
				<div class="header">
					<div class="headerStart">
						<img src="/assets/images/home/logo_large.png" class="logo exceptSmall" alt="ツルツル！全身脱毛診断メーカー">
						<img src="/assets/images/home/chart_title.png" class="logo onlySmall" alt="相性バッチリの脱毛サロンを探そう">
						<img src="/assets/images/home/cat.png" class="cat">
					</div>

					<div class="headerResult">
						<img src="/assets/images/home/title_result.png" class="title onlySmall" alt="あなたにぴったりの脱毛サロンは…">
						<img src="/assets/images/home/title_result_pc.png" class="title exceptSmall" alt="あなたにぴったりの脱毛サロンは…">
					</div>
				</div>


				<div class="diagnosisStartContainer diagnosisContainer">
					<div class="textTitle">
						<img src="/assets/images/home/text_zubari.png" alt="あなたにピッタリのサロンをズバリ診断！">
					</div>
					<div class="diagnosisStart">
						<img src="/assets/images/home/button_start.png" alt="脱毛診断スタート">
					</div>
				</div>

				<div class="questionsContainer">
					<div class="question diagnosisContainer" data-question="1">
						<div class="textTitle">
							<img src="/assets/images/home/text_zubari.png" alt="あなたにピッタリのサロンをズバリ診断！">
						</div>
						<div class="headline"><span>今回脱毛したい部分は？</span></div>
						<div class="choices">
							<div class="answer" data-answer="1">部分脱毛</div>
							<div class="answer" data-answer="2">全身脱毛</div>
						</div>
					</div>
					<div class="question diagnosisContainer" data-question="2">
						<div class="textTitle">
							<img src="/assets/images/home/text_q2.png" alt="第2問">
						</div>
						<div class="headline"><span>予算は決めてる？</span></div>
						<div class="choices">
							<div class="answer small" data-answer="1">手ごろな価格で、まずは試してみたい</div>
							<div class="answer small" data-answer="2">時間やお金がかかっても<br>シッカリ効果を出したい</div>
						</div>
					</div>
					<div class="question diagnosisContainer" data-question="3">
						<div class="textTitle">
							<img src="/assets/images/home/text_q3.png" alt="第3問">
						</div>
						<div class="headline"><span>脱毛が完了するまでの時間にこだわりはある？</span></div>
						<div class="choices">
							<div class="answer small" data-answer="1">早く予約が取れることが大事！</div>
							<div class="answer small" data-answer="2">通える回数や効果が大事！</div>
						</div>
					</div>
					<div class="question diagnosisContainer" data-question="4">
						<div class="textTitle">
							<img src="/assets/images/home/text_q4.png" alt="第4問">
						</div>
						<div class="headline"><span>キミにとって"みんなのクチコミ評価"はサロン選びでははずせない？</span></div>
						<div class="choices">
							<div class="answer" data-answer="1">口コミ評価って大事！</div>
							<div class="answer" data-answer="2">口コミよりも実績が大事！</div>
						</div>
					</div>
				</div>

				<div class="loadingContainer diagnosisContainer">
					<div class="textTitle">
						<img src="/assets/images/home/text_loading.png" alt="診断結果を測定中だよ">
					</div>
					<div class="checkedAnswerContainer">
						<div class="checkedAnswer">
							<div class="comment comment1">君の希望は…</div>
							<ul></ul>
							<div class="comment comment2 delay">…だね？</div>
						</div>
					</div>
				</div>

				<div class="resultContainer diagnosisContainer">
					<div class="result resultA">
						<div class="catch">自分に必要な脱毛を知っているあなたには</div>
						<?php echo result_SalonInfo('musee', 'a'); ?>
					</div>
					<div class="result resultB">
						<div class="catch">脱毛サロンの本質を見抜くことの出来るあなたには</div>
						<?php echo result_SalonInfo('musee', 'b'); ?>
					</div>
					<div class="result resultC">
						<div class="catch">確実に脱毛したい！でもお得も大事なあなたには。</div>
						<?php echo result_SalonInfo('musee', 'c'); ?>
					</div>
					<div class="result resultD">
						<div class="catch">お得なのに確実なガッツリ脱毛を目指すあなたに</div>
						<?php echo result_SalonInfo('musee', 'd'); ?>
					</div>
					<div class="result resultE">
						<div class="catch">みんなのクチコミに定評のある<br>有名サロンを望むあなたに</div>
						<?php echo result_SalonInfo('musee', 'e'); ?>
					</div>
					<div class="result resultF">
						<div class="catch">イベントや女子会、デートの日までに<br>間に合わせたいあなたに</div>
						<?php echo result_SalonInfo('musee', 'f'); ?>
					</div>
					<div class="result resultG">
						<div class="catch">みんな得して納得したサロンが気になるあなたに</div>
						<?php echo result_SalonInfo('musee', 'g'); ?>
					</div>
					<div class="result resultH">
						<div class="catch">他の子より毛の太さ、量が気になる<br>モフモフ女子のあなたに</div>
						<?php echo result_SalonInfo('musee', 'h'); ?>
					</div>

					<div class="result resultI">
						<div class="catch">お得で人気なのに予約が取れちゃう<br>最強サロンを探すあなたに</div>
						<?php echo result_SalonInfo('musee', 'i'); ?>
					</div>
					<div class="result resultJ">
						<div class="catch">お得サロンに定期的に通いたいあなたに</div>
						<?php echo result_SalonInfo('ginza-calla', 'j'); ?>
					</div>
					<div class="result resultK">
						<div class="catch">できるだけお得にじっくり<br>人気サロンに通いたいこだわり女子に</div>
						<?php echo result_SalonInfo('musee', 'k'); ?>
					</div>
					<div class="result resultL">
						<div class="catch">お得なのに確実なガッツリ脱毛を目指すあなたに</div>
						<?php echo result_SalonInfo('sasala', 'l'); ?>
					</div>
					<div class="result resultM">
						<div class="catch">みんなのクチコミに定評のある<br>有名サロンを望むあなたに</div>
						<?php echo result_SalonInfo('ginza-calla', 'm'); ?>
					</div>
					<div class="result resultN">
						<div class="catch">イベントや女子会、デートの日までに<br>間に合わせたいあなたに</div>
						<?php echo result_SalonInfo('ginza-calla', 'n'); ?>
					</div>
					<div class="result resultO">
						<div class="catch">みんな得して納得したサロンが気になるあなたに</div>
						<?php echo result_SalonInfo('ginza-calla', 'o'); ?>
					</div>
					<div class="result resultP">
						<div class="catch">他の子より毛の太さ、量が気になる<br>モフモフ女子のあなたに</div>
						<?php echo result_SalonInfo('sasala', 'p'); ?>
					</div>
				</div>



				<div class="moko">
					<img src="/assets/images/home/moko1.png" class="startMoko">
					<img src="/assets/images/home/moko2.png" class="resultMoko">
				</div>

				<div class="illustCopyright"><img src="/assets/images/home/copyright.png"></div>
			</div>
		</div>

	</section>
	<?php endif; ?>

	<?php $salonPosts = get_field('ranking_top', 'option'); ?>
	<?php get_template_part('ranking'); ?>
</div>

<?php get_footer(); ?>
