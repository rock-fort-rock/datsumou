<?php
/*
Template Name: パターン作成事業->お取引の流れ
*/
?>
<?php
$status = [
	'id' => 'pattern',
	'description' => 'パターン作成ご依頼時のお取引の流れを説明します。',
	'localPage' => 'flow',
];
?>
<?php get_header(); ?>
		<div class="contents">
			<div class="breadcrumb">
				<ul>
					<li><a href="/">HOME</a></li><li><a href="/pattern/">パターン作成事業</a></li><li>お取引の流れ</li>
				</ul>
			</div>

			<div class="textHeader">
				<div class="textHeader__inner">
					<h2 class="textHeader__page">お取引の流れ / パターン作成</h2>
					<h1 class="textHeader__desc">パターン作成ご依頼時のお取引の流れを説明します。</h1>
				</div>
			</div>

			<div class="columnTwo">
				<?php get_template_part('pattern/local-navi'); ?>
				<div class="mainContents">
					<div class="flow contentBlock">
						<div class="contentInner">
							<?php get_template_part('flow/pattern'); ?>
						</div>
					</div>
				</div>
			</div>
			<?php get_template_part('pattern/footer-link'); ?>
		</div>

<?php get_footer(); ?>