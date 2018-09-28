<?php
global $status;
?>
<div class="footerLink<?php if($status['localPage'] != 'top')echo ' visible-sp'; ?>">
	<div class="footerLink__inner">
		<ul class="footerLink__main">
			<li>
				<a href="/oem-odm/equipment/">
					<div class="footerLink__mainImage"><img src="/images/oemodm/btn_equipment.jpg" alt="設備・スタッフ"></div>
					<div class="footerLink__mainDesc">
						<div class="footerLink__mainTitle">設備・スタッフ</div>
						<p>ルックモードの主な設備、縫製仕様、スタッフを紹介します。</p>
					</div>
				</a>
			</li>
			<li>
				<a href="/oem-odm/flow/">
					<div class="footerLink__mainImage"><img src="/images/oemodm/btn_flow.jpg" alt="お取引の流れ"></div>
					<div class="footerLink__mainDesc">
						<div class="footerLink__mainTitle">お取引の流れ</div>
						<p>OEM・ODMご依頼時のお取引の流れを説明します。</p>
					</div>
				</a>
			</li>
			<li>
				<a href="/oem-odm/client/">
					<div class="footerLink__mainImage"><img src="/images/oemodm/btn_client.jpg" alt="主要お取引先"></div>
					<div class="footerLink__mainDesc">
						<div class="footerLink__mainTitle">主要お取引先</div>
						<p>主なお取引先様を紹介します。</p>
					</div>
				</a>
			</li>
		</ul>
		<ul class="footerLink__sub">
			<li>
				<a href="/oem-odm/faq/" class="textButton textButton--icon textButton--shadow"><span class="icon icon-question"></span>よくあるご質問</a>
			</li>
			<li>
				<a href="/contact/" class="textButton textButton--icon textButton--shadow"><span class="icon icon-mail"></span>お問い合わせ</a>
			</li>
			<li class="visible-sp">
				<a href="/oem-odm/" class="textButton textButton--shadow">OEM・ODM事業 TOP</a>
			</li>
		</ul>
	</div>
</div>