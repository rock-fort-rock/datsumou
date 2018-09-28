<?php
/*
Template Name: パターン作成事業->よくあるご質問
*/
?>
<?php
$status = [
	'id' => 'pattern',
	'description' => 'パターン作成事業に関するよくあるご質問をご紹介します。',
	'localPage' => 'faq',
];
?>
<?php get_header(); ?>

		<div class="contents">
			<div class="breadcrumb">
				<ul>
					<li><a href="/">HOME</a></li><li><a href="/pattern/">パターン作成事業</a></li><li>よくあるご質問</li>
				</ul>
			</div>

			<div class="textHeader">
				<div class="textHeader__inner">
					<h1 class="textHeader__page">よくあるご質問 / パターン作成</h1>
					<!-- <h1 class="textHeader__desc">OEM・ODMご依頼時のよくあるご質問</h1> -->
				</div>
			</div>

			<div class="columnTwo">
				<?php get_template_part('pattern/local-navi'); ?>
				<div class="mainContents">
					<div class="faq contentBlock">
						<div class="contentInner">
							<?php get_template_part('faq/pattern'); ?>
						</div>
					</div>
				</div>
			</div>
			<?php get_template_part('pattern/footer-link'); ?>
		</div>

<?php get_footer(); ?>
