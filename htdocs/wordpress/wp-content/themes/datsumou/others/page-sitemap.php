<?php
/*
Template Name: サイトマップ
*/
?>
<?php
$status = [
	'id' => 'others',
	'description' => '',
];

$newsPost = wp_count_posts( 'news' );
?>
<?php get_header(); ?>

		<div class="contents">
			<div class="breadcrumb">
				<ul>
					<li><a href="/">HOME</a></li><li>サイトマップ</li>
				</ul>
			</div>

			<div class="textHeader">
				<div class="textHeader__inner">
					<h1 class="textHeader__page">サイトマップ</h1>
				</div>
			</div>

			<div class="mainContents">
				<div class="sitemap contentBlock">
					<div class="contentInner">

						<div class="sitemap__block">
							<ul>
								<li class="sitemap__topcategory"><a href="/">HOME</a></li>
								<li class="sitemap__topcategory"><a href="/about/">ルックモードについて</a></li>
								<li class="sitemap__topcategory">
									<a href="/oem-odm/">OEM・ODM事業</a>
									<ul class="sitemap__subcategory sitemap__subContents">
										<li><a href="/oem-odm/equipment/">設備・スタッフ</a></li>
										<li><a href="/oem-odm/flow/">お取引の流れ</a></li>
										<li><a href="/oem-odm/client/">主要お取引先</a></li>
										<li><a href="/oem-odm/faq/">よくあるご質問</a></li>
									</ul>
								</li>
								<li class="sitemap__topcategory">
									<a href="/pattern/">パターン作成事業</a>
									<ul class="sitemap__subcategory sitemap__subContents">
										<li><a href="/pattern/design/">パターン設計</a></li>
										<li><a href="/pattern/grading/">グレーディング</a></li>
										<li><a href="/pattern/flow/">お取引の流れ</a></li>
										<li><a href="/pattern/price/">価格表</a></li>
										<li><a href="/pattern/faq/">よくあるご質問</a></li>
									</ul>
								</li>
								<li class="sitemap__topcategory">
									<a href="/flow/">お取引の流れ</a>
									<ul class="sitemap__subcategory sitemap__subContents">
										<li><a href="/flow/oem-odm/">OEM・ODM</a></li>
										<li><a href="/flow/pattern/">パターン作成</a></li>
									</ul>
								</li>
								<li class="sitemap__topcategory"><a href="/faq/">よくあるご質問</a></li>
								<?php if($newsPost->publish >= 1): ?>
								<li class="sitemap__topcategory"><a href="/news/">ニュース</a></li>
								<?php endif; ?>
								<li class="sitemap__topcategory">
									<ul class="sitemap__subcategory">
										<li><a href="/company/">会社概要</a></li>
										<li><a href="/access/">アクセス</a></li>
										<li><a href="/contact/">お問い合わせ</a></li>
										<li><a href="/privacy/">プライバシーポリシー</a></li>
										<li><a href="/terms/">ご利用条件</a></li>
									</ul>
								</li>

							</ul>
						</div>						
					</div>
				</div>
			</div>

		</div>

<?php get_footer(); ?>
