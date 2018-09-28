<?php
global $status;
?>
<div class="footerLink<?php if($status['localPage'] != 'top')echo ' visible-sp'; ?>">
	<div class="footerLink__inner">
		<ul class="footerLink__main">
			<li class="visible-sp">
				<a href="/pattern/design/">
					<div class="footerLink__mainImage"><img src="/images/pattern/btn_pattern.jpg" alt="パターン設計"></div>
					<div class="footerLink__mainDesc">
						<div class="footerLink__mainTitle">パターン設計</div>
						<p>お客様の要望する着心地を考慮し、丁寧に形にしていきます。</p>
					</div>
				</a>
			</li>
			<li class="visible-sp">
				<a href="/pattern/grading/">
					<div class="footerLink__mainImage"><img src="/images/pattern/btn_grading.jpg" alt="グレーディング"></div>
					<div class="footerLink__mainDesc">
						<div class="footerLink__mainTitle">グレーディング</div>
						<p>さまざまな体型の方に、立体的にフィットするようにサイズ展開致します。</p>
					</div>
				</a>
			</li>
			<li class="footerLink__main__single">
				<a href="/pattern/flow/">
					<div class="footerLink__mainImage"><img src="/images/pattern/btn_flow.jpg" alt="お取引の流れ"></div>
					<div class="footerLink__mainDesc">
						<div class="footerLink__mainTitle">お取引の流れ</div>
						<p>パターン・グレーディングご依頼時のお取引の流れを説明します。</p>
					</div>
				</a>
			</li>
		</ul>
		<ul class="footerLink__sub">
			<li>
				<a href="/pattern/price/" class="textButton textButton--icon textButton--shadow"><span class="icon icon-file"></span>価格表</a>
			</li>
			<li>
				<a href="/pattern/faq/" class="textButton textButton--icon textButton--shadow"><span class="icon icon-question"></span>よくあるご質問</a>
			</li>
			<li>
				<a href="/contact/" class="textButton textButton--icon textButton--shadow"><span class="icon icon-mail"></span>お問い合わせ</a>
			</li>
			<li class="visible-sp">
				<a href="/pattern/" class="textButton textButton--shadow">パターン作成事業 TOP</a>
			</li>
		</ul>
	</div>
</div>