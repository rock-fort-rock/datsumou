<?php
/*
Template Name: OEM・ODM事業
*/
?>
<?php
$status = [
	'id' => 'oemodm',
	'description' => '信頼のパートナーとして　企画から生産、納品までのトータルなサポート体制を構築し、OEM・ODMの多様なニーズにお応えしています。',
	'localPage' => 'top',
];
?>
<?php get_header(); ?>

		<div class="contents">
			<div class="breadcrumb">
				<ul>
					<li><a href="/">HOME</a></li><li>OEM・ODM事業</li>
				</ul>
			</div>

			<div class="imgHeader">
				<div class="imgHeader__photo"><img src="/images/oemodm/header.jpg" alt="OEM・ODM事業"></div>
				<div class="imgHeader__titleBlock">
					<div class="imgHeader__titleBlockInner">
						<div class="imgHeader__page">OEM・ODM事業</div>
						<div class="imgHeader__catch">信頼のパートナーとして</div>
						<h1 class="imgHeader__desc">企画から生産、納品までのトータルなサポート体制を構築し、<br class="visible-pc">OEM・ODMの多様なニーズにお応えしています。</h1>
					</div>
				</div>
			</div>

			<div class="columnTwo">
				<?php get_template_part('oem-odm/local-navi'); ?>

				<div class="mainContents">
					<div class="contentBlock">
						<div class="contentInner">
							<h2 class="subTitle">OEM・ODM事業の取り組みについて</h2>
							<div class="paragraph">
								<h3 class="sub2Title">基本理念</h3>
								<p>半世紀にわたり培ってきた経験とノウハウを生かし、布帛・ニット・カットソー全般において、ご満足いただける商品を作ります。<br>お客様のご要望によって、フォーマルからカジュアルまで幅広いテイストの商品に対応し、企画から生産、納品までトータルでサポートさせて頂きます。</p>
							</div>
							<div class="paragraph">
								<h3 class="sub2Title">安心の設計品質</h3>
								<p>経験豊かな技術スタッフによるパターン作成・製品チェックを行い、そのブランドの求める品質に到達しているか総合的に判断いたします。<br>長年蓄積してきたノウハウやデータを駆使し、より高い設計品質を追求します。</p>
							</div>
							<div class="paragraph">
								<h3 class="sub2Title">顧客満足度の追及</h3>
								<p>［国内生産］<br>岩手県の自社工場を始めとする全国各地の縫製工場との取り組み、情報交換する事によりMade In JAPAN品質のより良い品質でお届けできるよう縫製技術を高めていきます。</p>
								<p>［海外生産］<br>中国・ベトナムを拠点とした、信頼度の高い厳選した協力工場で生産し、納期、品質管理、コストコントロールを行います。現地工場にも定期的に社員を派遣し、現地スタッフとの打ち合わせや技術指導を行い、品質の向上を図っています。</p>
							</div>
							<div class="paragraph">
								<h3 class="sub2Title">品質検査</h3>
								<p>外観検査、検針はもちろん、ご要望に応じて検査機関への検査依頼などにも対応いたします。</p>
							</div>
						</div>
					</div>


					<div class="factory contentBlock">
						<div class="contentInner">
							<h2 class="subTitle">自社工場</h2>
							<div class="paragraph">
								<div class="factory__desc">
									<h3 class="sub2Title">株式会社　ラボ・オーフナト</h3>
									<p>岩手県大船渡の地で20年以上にわたり、ルックグループの縫製工場としてものづくりを担ってきた(株)ラボ・オーフナト。経験豊かな縫製スタッフにより日本ならではのきめの細やかな商品作りを続けています。<br>現状に満足することなく、日々技術を磨き、また次の世代への技術の継承を行い技術レベルの向上を図っています。私たちはお客様により一層満足して頂ける様、思いをこめて一着一着を丁寧に生産しています。</p>

									<table class="basicTable">
										<tr><th>社名</th><td>株式会社 ラボ・オーフナト</td></tr>
										<tr><th>住所</th><td>岩手県大船渡市大船渡町字地の森36-7<br><a href="https://www.google.com/maps/place/%E6%97%A5%E6%9C%AC,+%E3%80%92022-0002+%E5%B2%A9%E6%89%8B%E7%9C%8C%E5%A4%A7%E8%88%B9%E6%B8%A1%E5%B8%82%E5%A4%A7%E8%88%B9%E6%B8%A1%E7%94%BA%E5%9C%B0%E3%83%8E%E6%A3%AE%EF%BC%93%EF%BC%96%E2%88%92%EF%BC%97/@39.0742661,141.7150129,19z/data=!3m1!4b1!4m2!3m1!1s0x5f88a125c8f84b63:0x37489a3466d7324e?hl=ja" target="_blank" class="emph">大きな地図で見る<span class="icon icon-blank"></span></a></td></tr>
										<tr><th>フルアイテム</th><td>15,000着</td></tr>
									</table>
								</div>

								<?php if( get_field('slide') ): ?>
								<div class="factory__image factory__imagePhoto">
									<div class="swiper-container">
										<ul class="swiper-wrapper">
											<?php while( the_repeater_field('slide') ):; ?>
											<?php
											$imgObj = get_sub_field('slide_image');
											$img = $imgObj['sizes']['medium_large'];
											?>
											<li class="swiper-slide"><img src="<?php echo $img; ?>"></li>
											<?php endwhile; ?>
										</ul>
										<div class="swiper-pagination"></div>
										<div class="swiper-button-prev"></div>
										<div class="swiper-button-next"></div>
									</div>
								</div>
								<?php endif; ?>
							</div>


							<div class="paragraph">
								<div class="factory__desc">
									<h3 class="sub2Title">J∞QUALITY 企業認証取得</h3>
									<p>（株)ラボ・オーフナトは、2015年10月13日に、J∞QUALITY安全・安心・コンプライアンス企業認証及び、縫製企業認証を取得いたしました。「J∞QUALITY」とは、素材の織り、編み、染色、整理、及び、製品の縫製、企画、販売の全てにおいて、安全・安心・コンプライアンス企業認証を取得した企業によって作られた「こだわり」のある純国産の商品を認証する制度で、一般社団法人 日本ファッション産業協議会が主体に行う事業です。</p>
									<a href="https://jquality.jp/" target="_blank" class="textButton textButton--blank">J∞QUALITY ウェブサイト</a>
								</div>

								<div class="factory__image">
									<img src="/images/oemodm/jquality.jpg" class="factory__jqualityCertificate">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<?php get_template_part('oem-odm/footer-link'); ?>
			
		</div>

<?php get_footer(); ?>
