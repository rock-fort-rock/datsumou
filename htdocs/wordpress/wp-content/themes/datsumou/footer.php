		</div><!--/contents-->
		<footer class="gFooter">
			<div class="gFooterinner">
				<div class="pageTopContainer">
					<a href="#pagetop" class="scroll pageTop"><img src="/assets/images/pagetop.png" alt="top"></a>
				</div>
				<ul class="gFooterNavi">
					<li><a href="/">TOP</a></li>
					<li><a href="/salon/">ランキング</a></li>
					<li><a href="#">SNS</a></li>
				</ul>
				<ul class="snsLink">
					<li><a href="#"><img src="/assets/images/icon_line.png" alt="LINE"></a></li>
					<li><a href="#"><img src="/assets/images/icon_facebook.png" alt="facebook"></a></li>
					<li><a href="#"><img src="/assets/images/icon_twitter.png" alt="Twitter"></a></li>
					<li><a href="#"><img src="/assets/images/icon_instagram.png" alt="Instagram"></a></li>
				</ul>
				<div class="copyright">&copy;ツルツル全身脱毛診断メーカー</div>
			</div>
		</footer>

		<?php
		$footerImgObj = get_field('option_footerBanner', 'option');
		$footerBanner = $footerImgObj[sizes][medium_large];
		$footerBannerLink = get_field('option_footerBannerLink', 'option');
		?>
		<?php if($footerBanner): ?>
		<div class="footerBanner onlySmall"><a href="<?php echo $footerBannerLink; ?>" target="_blank"><img src="<?php echo $footerBanner; ?>"></a></div>
	<?php endif; ?>
		<?php wp_footer(); ?>
	</body>
</html>