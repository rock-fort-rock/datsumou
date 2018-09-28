<?php
/*
Template Name: お問い合わせ
*/
?>
<?php
$status = [
	'id' => 'others',
	'description' => 'ルックモードへのお問い合わせをご案内するページです。',
];
?>
<?php get_header(); ?>

		<div class="contents">
			<div class="breadcrumb">
				<ul>
					<li><a href="/">HOME</a></li><li>お問い合わせ</li>
				</ul>
			</div>

			<div class="textHeader">
				<div class="textHeader__inner">
					<h2 class="textHeader__page">お問い合わせ</h2>
					<h1 class="textHeader__desc">お電話または、お問い合わせフォームにてご連絡お願いします。</h1>
				</div>
			</div>

			<div class="mainContents">
				<div class="contact contentBlock">
					<div class="contentInner">
						<h2 class="subTitle--center"><span class="icon icon-tel"></span>電話でのお問い合わせ</h2>
						<div class="contactTel">
							<div class="contactTel__tel">TEL : <span class="en phonecall">03-3794-9300</span>（代表）</div>
							<div class="contactTel__cap">受付時間 : 午前11時～午後5時<br class="visible-sp">（※土・日・祝日・夏季休業・年末年始を除く）</div>
						</div>
					</div>
				</div>


				<div class="contact contentBlock">
					<div class="contactForm contentInner">
						<h2 class="subTitle--center"><span class="icon icon-mail"></span>お問い合わせフォーム</h2>
						<?php the_post(); the_content(); ?>
					</div>
				</div>
			</div>

		</div>

<?php get_footer(); ?>
