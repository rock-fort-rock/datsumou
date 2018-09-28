<?php
/*
Template Name: パターン作成事業->価格表
*/
?>
<?php
$status = [
	'id' => 'pattern',
	'description' => '代表的な価格表です。ご質問等ございましたらお問い合わせください。',
	'localPage' => 'price',
];
?>
<?php get_header(); ?>

		<div class="contents">
			<div class="breadcrumb">
				<ul>
					<li><a href="/">HOME</a></li><li><a href="/pattern/">パターン作成事業</a></li><li>価格表</li>
				</ul>
			</div>

			<div class="textHeader">
				<div class="textHeader__inner">
					<h1 class="textHeader__page">価格表 / パターン作成</h1>
					<!-- <h1 class="textHeader__desc">OEM・ODMご依頼時のよくある質問</h1> -->
				</div>
			</div>

			<div class="columnTwo">
				<?php get_template_part('pattern/local-navi'); ?>
				<div class="mainContents">
					<div class="centeringContainer">
						<div class="price contentBlock">
							<div class="price__button">
								<a href="/images/pattern/price.pdf" target="_blank">
									<img src="/images/pattern/pricelist.gif" alt="価格表" class="price__button__cover">
									<p>PDF:<?php echo getSize('/images/pattern/price.pdf'); ?>KB<img src="/images/pdf_icon.png"></p>
								</a>
							</div>

							<p>代表的な価格表です。<br>ご質問等ございましたらお問い合わせください。</p>

							<div class="adobeReader visible-pc">
								<div class="adobeReader__inner">
									<a href="http://get.adobe.com/jp/reader/" target="_blank"><img src="/images/acrobat_reader.png"></a>
									<p>PDFファイルをご覧いただくためにはAdobe Reader（無料）が必要です。<br>ダウンロードは<a href="http://get.adobe.com/jp/reader/" target="_blank" class="emph">こちら</a>からどうぞ。</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php get_template_part('pattern/footer-link'); ?>
		</div>

<?php get_footer(); ?>
