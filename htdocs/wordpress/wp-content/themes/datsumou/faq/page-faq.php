<?php
/*
Template Name: よくあるご質問
*/
?>
<?php
$status = [
	'id' => 'faq',
	'description' => 'よくあるご質問をご紹介します。',
];
?>
<?php get_header(); ?>

		<div class="contents">
			<div class="breadcrumb">
				<ul>
					<li><a href="/">HOME</a></li><li>よくあるご質問</li>
				</ul>
			</div>

			<div class="textHeader">
				<div class="textHeader__inner">
					<h1 class="textHeader__page">よくあるご質問</h1>
					<!-- <h1 class="textHeader__desc">パターン作成ご依頼時のお取引の流れを説明します。</h1> -->
				</div>
			</div>


			<div class="mainContents">

				<div class="faq">
					<div class="contentInner">
						<ul class="anchorLink">
							<li><a href="#faqOemodm"><span class="icon icon-arrowT"></span>OEM・ODM事業について</a></li>
							<li><a href="#faqPattern"><span class="icon icon-arrowT"></span>パターン作成事業について</a></li>
							<!-- <li><a href="#faqOthers"><span class="icon icon-arrowT"></span>その他</a></li> -->
						</ul>
					</div>
				</div>

				<div class="faq contentBlock" id="faqOemodm">
					<div class="contentInner">
						<h2 class="subTitle">OEM・ODM事業について</h2>
						<?php get_template_part('faq/oem-odm'); ?>
					</div>
				</div>

				<div class="faq contentBlock" id="faqPattern">
					<div class="contentInner">
						<h2 class="subTitle">パターン作成事業について</h2>
						<?php get_template_part('faq/pattern'); ?>
					</div>
				</div>

				<!-- <div class="faq contentBlock" id="faqOthers">
					<div class="contentInner">
						<h2 class="subTitle">その他</h2>
						<ul class="faqSet">
							<li>
								<div class="faqSet__question"><h3 class="faqSet__questionTitle">デザイン画以外での依頼は可能ですか？</h3></div>
								<div class="faqSet__answer"><div class="faqSet__answerInner">はい。イメージ写真や見本サンプルからのアレンジなど、イメージをお伝え頂ければどんな物からでもパターン作成が可能です。</div></div>
							</li>
							<li>
								<div class="faqSet__question"><h3 class="faqSet__questionTitle">トワルチェックの方法は？</h3></div>
								<div class="faqSet__answer"><div class="faqSet__answerInner">原則シーチングで半身のトワルを作成し、お打合せ(トワルチェック)させて頂きます。トワルの必要無い物は即パターン作成に移ります。</div></div>
							</li>
						</ul>
					</div>
				</div> -->
			</div>

		</div>

<?php get_footer(); ?>
