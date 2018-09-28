<?php
/*
Template Name: パターン作成事業
*/
?>
<?php
$status = [
	'id' => 'pattern',
	'description' => '服種を問わず、サイズを問わず　幅広いご要望にお応えできるパターンメイキングとグレーディングのノウハウも、ルックモードの強みです。',
	'localPage' => 'top',
];
?>
<?php get_header(); ?>

		<div class="contents">
			<div class="breadcrumb">
				<ul>
					<li><a href="/">HOME</a></li><li>パターン作成事業</li>
				</ul>
			</div>

			<div class="imgHeader">
				<div class="imgHeader__photo"><img src="/images/pattern/header.jpg" alt="パターン作成事業"></div>
				<div class="imgHeader__titleBlock">
					<div class="imgHeader__titleBlockInner">
						<div class="imgHeader__page">パターン作成事業</div>
						<div class="imgHeader__catch">服種を問わず、サイズを問わず</div>
						<h1 class="imgHeader__desc">幅広いご要望にお応えできるパターンメイキングと<br class="visible-pc">グレーディングのノウハウも、ルックモードの強みです。</h1>
					</div>
				</div>
			</div>

			<div class="columnTwo">
				<?php get_template_part('pattern/local-navi'); ?>

				<div class="mainContents">
					<div class="outsourcing contentBlock">
						<div class="contentInner">
							<h2 class="subTitle">アパレルの外注パターン設計 / グレーディング</h2>
							
							<div class="outsourcing__pattern paragraph">
								<div class="outsourcing__image"><a href="/pattern/design/"><img src="/images/pattern/pattern.jpg" alt="パターン設計"></a></div>
								<div class="outsourcing__text">
									<h3 class="sub2Title">パターン設計</h3>
									<div class="outsourcing__desc">デザインイメージと素材イメージから、お客様の要望する着心地を考慮し、丁寧に形にしていきます。</div>
									<a href="/pattern/design/" class="textButton">詳しくみる</a>
								</div>
							</div>

							<div class="outsourcing__grading paragraph">
								<div class="outsourcing__image"><a href="/pattern/grading/"><img src="/images/pattern/grading.jpg" alt="グレーディング"></a></div>
								<div class="outsourcing__text">
									<h3 class="sub2Title">グレーディング</h3>
									<div class="outsourcing__desc">レギュラーサイズはもちろん、イレギュラーサイズ(ラージ、トール、スモール)のグレーディングに経験と自信があります。さまざまな体型の方に、立体的にフィットするようにサイズ展開いたします。</div>
									<a href="/pattern/grading/" class="textButton">詳しくみる</a>
								</div>
							</div>

						</div>
					</div>



				</div>
			</div>

			<?php get_template_part('pattern/footer-link'); ?>
		</div>

<?php get_footer(); ?>
