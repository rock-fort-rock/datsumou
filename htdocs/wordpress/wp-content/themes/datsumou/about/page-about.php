<?php
/*
Template Name: ルックモードについて
*/
?>
<?php
$status = [
	'id' => 'about',
	'description' => 'お客さま満足を生むために　たゆむことなく技術を磨き、品質にこだわりながら、ルックグループや数多くのお客さまブランドの生産をお手伝いしています。',
];
?>
<?php get_header(); ?>

		<div class="contents">
			<div class="breadcrumb">
				<ul>
					<li><a href="/">HOME</a></li><li>ルックモードについて</li>
				</ul>
			</div>

			<div class="imgHeader">
				<div class="imgHeader__photo"><img src="/images/about/header.jpg" alt="ルックモードについて"></div>
				<div class="imgHeader__titleBlock">
					<div class="imgHeader__titleBlockInner">
						<div class="imgHeader__page">ルックモードについて</div>
						<div class="imgHeader__catch">お客さま満足を生むために</div>
						<h1 class="imgHeader__desc">たゆむことなく技術を磨き、品質にこだわりながら、<br class="visible-pc">ルックグループや数多くのお客さまブランドの生産をお手伝いしています。</h1>
					</div>
				</div>
			</div>

			<div class="mainContents">
				<div class="groupBrand contentBlock">
					<div class="contentInner">
						<div class="groupBrand__titleBlock">
							<h2 class="subTitle">ルックグループブランドの<br class="visible-pc">生産及び生産管理</h2>
							<img src="/images/about/lookgroup_logo.png" alt="LOOK Group">
						</div>
						<div class="groupBrand__contentBlock">
							<p>ルックグループが企画する製品を布帛・ニット・カットソー全般において、<br class="visible-pc">原料・縫製資材の調達から、パターン作成、縫製、仕上げ、検査までを一貫生産しています。<br>スケジュール提案や生産地の決定を行い、納期管理、品質の向上、コストコントロ－ルなどの生産管理を行っています。</p>
							<?php if( get_field('about_brand') ): ?>
							<ul class="groupBrand__logos">
								<?php while( the_repeater_field('about_brand') ):; ?>
								<?php
								$imgObj = get_sub_field('about_brand_logo');
								$img = $imgObj['sizes']['medium'];
								$link = get_sub_field('about_brand_link');
								?>
								<li><?php if($link)echo '<a href="'.$link.'" target="_blank">'; ?><img src="<?php echo $img; ?>"><?php if($link)echo '</a>'; ?></li>
								<?php endwhile; ?>
							</ul>
							<?php endif; ?>
						</div>
					</div>
				</div>

				<div class="induction induction--lower">
					<div class="oem-odmBlock contentBlock">
						<div class="contentInner">
							<div class="induction__textBlock">
								<h2 class="subTitle">OEM・ODM事業</h2>
								<p>半世紀にわたり培ってきた経験とノウハウを生かし、布帛・ニット・カットソー全般において、ご満足いただける商品を作ります。<br>
								「株式会社レリアン」をはじめ数多くのお客様とお取引させて頂いており、ご要望によって、フォーマルからカジュアルまで幅広いテイストの商品に対応し、企画から生産、納品までトータルでサポートさせて頂きます。</p>
								<a href="/oem-odm/" class="textButton">詳しくみる</a>
							</div>
							<div class="induction__photoBlock">
								<a href="/oem-odm/"><img src="/images/home/oemodm.jpg" alt="OEM・ODM事業"></a>
							</div>
						</div>
					</div>

					<div class="patternBlock contentBlock">
						<div class="contentInner">
							<div class="induction__textBlock">
								<h2 class="subTitle">パターン作成事業</h2>
								<p>ルックグループで培った技術をもとに、他OEM先のパターンを作成しています。各年代に合わせた着心地の良いパターン、素材に合わせた縫いやすいパターンを作成いたします。<br>工業用パターン作成後のサイズグレーディングにおきましては、レギュラーサイズはもちろん、イレギュラーサイズ(ラージ、トール、スモール)のグレーディングに経験と自信があります。さまざまな体型の方に、立体的にフィットする様にサイズ展開いたします。</p>
								<a href="/pattern/" class="textButton">詳しくみる</a>
							</div>
							<div class="induction__photoBlock">
								<a href="/pattern/"><img src="/images/home/pattern.jpg" alt="パターン作成事業"></a>
							</div>
						</div>
					</div>
				</div>

				<div class="otherBusiness contentBlock">
					<div class="contentInner">
						<h2 class="subTitle">その他の事業</h2>
						<h3 class="sub2Title">And Curtain Call（アンド・カーテンコール）ブランド事業</h3>
						<div class="otherBusiness__imageBlock">
							<img src="/images/about/andcurtaincall.jpg" class="acc">
							<img src="/images/about/logo_andcurtaincall.png" class="accLogo">
						</div>
						<div class="groupBrand__desc">
							<p>酒井 景都がデザインする“And Curtain Call”（アンド・カーテンコール）を企画・生産しています。</p>
							<p>“And Curtain Call”（アンド・カーテンコール）<br>素晴らしい舞台の別れを惜しむような降り注ぐ拍手。<br>何カ月もの時間をかけ、稽古をして作り上げた一つの舞台をイメージしたブランド、酒井 景都が作る世界観と、青木計が描く繊細なテキスタイルや刺繍、レースが特徴。</p>
							<a href="http://www.e-look.jp/shop/andcurtaincall" target="_blank" class="textButton textButton--blank">オンラインストア</a>
						</div>
					</div>
				</div>

				<div class="access">
					<a href="access" class="textButton textButton--icon"><span class="icon icon-marker"></span>アクセス</a>
				</div>
			</div>

		</div>

<?php get_footer(); ?>
