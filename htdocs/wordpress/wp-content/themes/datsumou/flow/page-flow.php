<?php
/*
Template Name: お取引の流れ
*/
?>
<?php
$status = [
	'id' => 'flow',
	'description' => 'お取引の流れを説明します。',
];
?>
<?php get_header(); ?>

		<div class="contents">
			<div class="breadcrumb">
				<ul>
					<li><a href="/">HOME</a></li><li>お取引の流れ</li>
				</ul>
			</div>

			<div class="textHeader">
				<div class="textHeader__inner">
					<h1 class="textHeader__page">お取引の流れ</h1>
					<!-- <h1 class="textHeader__desc">パターン作成ご依頼時のお取引の流れを説明します。</h1> -->
				</div>
			</div>

			<div class="columnTwo">
				<?php get_template_part('flow/local-navi'); ?>
				<div class="mainContents">
					<div class="contentBlock">
						<div class="contentInner">
							<ul class="panelList">
								<li>
									<a href="/flow/oem-odm/">
										<img src="/images/oemodm/flow_sample.jpg">
										<div class="panelList__text">
											<div class="panelList__title">OEM・ODM</div>
											<div class="panelList__desc">OEM・ODMご依頼時のお取引の流れを説明します。</div>
										</div>
									</a>
								</li>
								<li>
									<a href="/flow/pattern/">
										<img src="/images/pattern/flow_toile.jpg">
										<div class="panelList__text">
											<div class="panelList__title">パターン作成</div>
											<div class="panelList__desc">パターン・グレーディングご依頼時のお取引の流れを説明します。</div>
										</div>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>

		</div>

<?php get_footer(); ?>
