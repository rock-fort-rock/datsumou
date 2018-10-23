<?php
$status = [
	'id' => 'home',
];
?>
<?php get_header(); ?>
<div class="mainContents">
	<section class="contentBlock">
		<div style="background-color: #ededed; height: 0; padding-top: 60%"></div>

		<!-- <div class="diagnosisChart">

			<div class="diagnosisStartContainer active">
				<div class="diagnosisStart">脱毛診断スタート</div>
			</div>

			<div class="questionsContainer">
				<ul class="questions">
					<li class="question active" data-question="1">
						<div class="headline">Q1.今回脱毛したい部分は？</div>
						<div class="choices">
							<div class="answer" data-answer="1">部分脱毛</div>
							<div class="answer" data-answer="2">全身脱毛</div>
						</div>
					</li>
					<li class="question" data-question="2">
						<div class="headline">Q2.予算は決めてる？</div>
						<div class="choices">
							<div class="answer" data-answer="1">手ごろな価格で、まずは試してみたい</div>
							<div class="answer" data-answer="2">時間やお金がかかってもシッカリ効果を出したい</div>
						</div>
					</li>
					<li class="question" data-question="3">
						<div class="headline">Q3.脱毛が完了するまでの時間にこだわりはある？</div>
						<div class="choices">
							<div class="answer" data-answer="1">早く予約が取れることが大事！</div>
							<div class="answer" data-answer="2">通える回数や効果が大事！</div>
						</div>
					</li>
					<li class="question" data-question="4">
						<div class="headline">Q4.キミにとって"みんなのクチコミ評価"はサロン選びでははずせない？</div>
						<div class="choices">
							<div class="answer" data-answer="1">口コミ評価って大事！</div>
							<div class="answer" data-answer="2">口コミよりも実績が大事！</div>
						</div>
					</li>
				</ul>
			</div>

			<div class="loadingContainer">
				診断結果を測定中だよ…
				<ul class="checkedAnswer"></ul>
			</div>

			<div class="resultContainer">
				<div class="result resultA">Aタイプ</div>
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
		</div> -->

	</section>
	<?php $salonPosts = get_field('ranking_top', 'option'); ?>
	<?php get_template_part('ranking'); ?>
</div>

<?php get_footer(); ?>
