<?php
/*
Template Name: OEM・ODM事業->よくあるご質問
*/
?>
<?php
$status = [
	'id' => 'oemodm',
	'description' => 'OEM・ODM事業に関するよくあるご質問をご紹介します。',
	'localPage' => 'faq',
];
?>
<?php get_header(); ?>

		<div class="contents">
			<div class="breadcrumb">
				<ul>
					<li><a href="/">HOME</a></li><li><a href="/oem-odm/">OEM・ODM事業</a></li><li>よくあるご質問</li>
				</ul>
			</div>

			<div class="textHeader">
				<div class="textHeader__inner">
					<h1 class="textHeader__page">よくあるご質問 / OEM・ODM</h1>
					<!-- <h1 class="textHeader__desc">OEM・ODMご依頼時のよくあるご質問</h1> -->
				</div>
			</div>

			<div class="columnTwo">
				<?php get_template_part('oem-odm/local-navi'); ?>
				<div class="mainContents">
					<div class="faq contentBlock">
						<div class="contentInner">
							<?php get_template_part('faq/oem-odm'); ?>
						</div>
					</div>
				</div>
			</div>
			<?php get_template_part('oem-odm/footer-link'); ?>
		</div>

<?php get_footer(); ?>
