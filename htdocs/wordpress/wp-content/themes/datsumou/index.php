<?php
$status = [
	'id' => 'home',
];
?>
<?php get_header(); ?>
<div class="mainContents">
	<section class="contentBlock">
		<div style="background-color: #ededed; height: 0; padding-top: 60%"></div>

		<?php /*
		<div class="diagnosisChart">
			<div class="questionsContainer">
				<ul class="questions">
					<li class="question active" data-question='1'>
						<div class="headline">Q1.○○ですか？</div>
						<div class="choices">
							<div class="answer" data-answer='1'>A</div>
							<div class="answer" data-answer='2'>B</div>
						</div>
					</li>
					<li class="question" data-question='2'>
						<div class="headline">Q2.○○ですか？</div>
						<div class="choices">
							<div class="answer" data-answer='1'>A</div>
							<div class="answer" data-answer='2'>B</div>
						</div>
					</li>
					<li class="question" data-question='3'>
						<div class="headline">Q3.○○ですか？</div>
						<div class="choices">
							<div class="answer" data-answer='1'>A</div>
							<div class="answer" data-answer='2'>B</div>
						</div>
					</li>
					<li class="question" data-question='4'>
						<div class="headline">Q4.○○ですか？</div>
						<div class="choices">
							<div class="answer" data-answer='1'>A</div>
							<div class="answer" data-answer='2'>B</div>
						</div>
					</li>
				</ul>
			</div>
			<div class="resultContainer">
				結果です。
				<div class="result resultA">結果A</div>
				<div class="result resultB">結果B</div>
				<div class="result resultC">結果C</div>
			</div>
		</div>
		*/ ?>
	</section>
	<?php $salonPosts = get_field('ranking_top', 'option'); ?>
	<?php get_template_part('ranking'); ?>
</div>

<?php get_footer(); ?>
