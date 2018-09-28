<?php
/*
Template Name: お取引の流れ->OEM・ODM
*/
?>
<?php
$status = [
	'id' => 'flow',
	'description' => 'OEM・ODMご依頼時のお取引の流れを説明します。',
	'localPage' => 'oemodm',
];
?>
<?php get_header(); ?>

		<div class="contents">
			<div class="breadcrumb">
				<ul>
					<li><a href="/">HOME</a></li><li><a href="/flow/">お取引の流れ</a></li><li>OEM・ODM</li>
				</ul>
			</div>

			<div class="textHeader">
				<div class="textHeader__inner">
					<h1 class="textHeader__page">お取引の流れ / OEM・ODM</h1>
					<!-- <h1 class="textHeader__desc">パターン作成ご依頼時のお取引の流れを説明します。</h1> -->
				</div>
			</div>

			<div class="columnTwo">
				<?php get_template_part('flow/local-navi'); ?>
				<div class="mainContents">
					<div class="flow contentBlock">
						<div class="contentInner">
							<?php get_template_part('flow/oemodm'); ?>
							<div class="center"><a href="/oem-odm/" class="textButton">OEM・ODM事業の詳細はこちら</a></div>
						</div>
					</div>
				</div>
			</div>

		</div>

<?php get_footer(); ?>
