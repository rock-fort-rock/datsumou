<?php
$naviBanner = [];
while(the_repeater_field('option_naviBanner', 'option')){
	$naviImgObj = get_sub_field('option_naviBanner_image');
	$tempNaviBanner['image'] = $naviImgObj['sizes']['medium_large'];
	$tempNaviBanner['imageWidth'] = $naviImgObj['sizes']['medium_large-width'];
	$tempNaviBanner['imageHeight'] = $naviImgObj['sizes']['medium_large-height'];
	$tempNaviBanner['link'] = get_sub_field('option_naviBanner_link');
	array_push($naviBanner, $tempNaviBanner);
	// print_r($naviImgObj);
}
?>
		</div><!--/contents-->
		<footer class="gFooter">
			<div class="gFooterinner">
				<div class="gNavi">
					<div class="gNaviContainer">
						<div class="gNaviSect">
							<div class="gNaviHeadline">目的別検索</div>
							<ul class="gNaviMenu">
								<li><a href="/ranking/price/">とにかく安いサロンを探す</a></li>
								<li><a href="/ranking/reserve/">予約がとりやすいサロンを探す</a></li>
								<li><a href="/ranking/student/">学生おすすめサロンを探す</a></li>
								<li><a href="/ranking/result/">早く結果がでるサロンを探す</a></li>
							</ul>
						</div>
						<div class="gNaviSect">
							<div class="gNaviHeadline">脱毛サロン一覧</div>
							<?php
							$salonArg = array(
								'post_type' => 'salon',
								'posts_per_page'   => -1,
							);
							$salonPosts = get_posts($salonArg);
							// print_r($salonPosts);
							?>
							<ul class="gNaviMenu">
								<?php foreach($salonPosts as $value): ?>
								<li><a href="<?php the_permalink($value->ID); ?>"><?php echo $value->post_title; ?></a></li>
								<?php endforeach; ?>
							</ul>
						</div>
						<?php if($naviBanner): ?>
						<div class="gNaviSect">
							<div class="gNaviHeadline">脱毛サロンお役立ち情報</div>
							<ul class="gNaviBanner">
								<?php foreach($naviBanner as $value): ?>
								<li><a href="<?php echo $value['link']; ?>" target="_blank"><amp-img src="<?php echo $value['image']; ?>" width="<?php echo $value['imageWidth']; ?>" height="<?php echo $value['imageHeight']; ?>" layout="responsive"></amp-img></a></li>
								<?php endforeach; ?>
							</ul>
						</div>
						<?php endif; ?>
						<div class="gNaviSect">
							<div class="gNaviHeadline">脱毛診断メーカー最新の記事</div>
							<?php
							$columnArg = array(
								'post_type' => 'post',
								'posts_per_page'   => 5,
							);
							$columnPosts = get_posts($columnArg);
							// print_r($columnPosts);
							?>
							<ul class="gNaviMenu noneArrow">
								<?php foreach($columnPosts as $value): ?>
								<li><a href="<?php echo get_permalink($value->ID); ?>"><?php echo $value->post_title; ?></a></li>
								<?php endforeach; ?>
							</ul>
							<div class="readMore"><a href="/column/">もっと記事を読む</a></div>
						</div>
						<div class="gNaviSect">
							<div class="gNaviHeadline">当サイトについて</div>
							<ul class="gNaviMenu borderBottom">
								<li><a href="/company/">運営者情報</a></li>
								<li><a href="/research/">調査概要</a></li>
								<li><a href="/privacy/">プライバシーポリシー</a></li>
							</ul>
						</div>
						<div class="gNaviSect">
							<div class="gNaviFooter onlySmall">
								<!-- <ul class="snsLink">
									<li><a href="#"><img src="/assets/images/icon_line.png" alt="LINE"></a></li>
									<li><a href="#"><img src="/assets/images/icon_facebook.png" alt="facebook"></a></li>
									<li><a href="#"><img src="/assets/images/icon_twitter.png" alt="Twitter"></a></li>
									<li><a href="#"><img src="/assets/images/icon_instagram.png" alt="Instagram"></a></li>
								</ul> -->
								<!-- <div class="copyright">©ツルツル全身脱毛診断メーカー</div> -->
							</div>
						</div>
					</div>
					<div class="gNaviBg"></div>
				</div>


				<ul class="gFooterNavi">
					<li><a href="/">TOP</a></li>
					<li><a href="/ranking/">ランキング</a></li>
					<!-- <li><a href="/company/">運営者情報</a></li>
					<li><a href="/research/">調査概要</a></li>
					<li><a href="/privacy/">プライバシーポリシー</a></li> -->
				</ul>
				<!-- <ul class="snsLink">
					<li><a href="#"><img src="/assets/images/icon_line.png" alt="LINE"></a></li>
					<li><a href="#"><img src="/assets/images/icon_facebook.png" alt="facebook"></a></li>
					<li><a href="#"><img src="/assets/images/icon_twitter.png" alt="Twitter"></a></li>
					<li><a href="#"><img src="/assets/images/icon_instagram.png" alt="Instagram"></a></li>
				</ul> -->
				<div class="copyright">&copy;ツルツル全身脱毛診断メーカー</div>
			</div>
		</footer>

		<?php
		$footerImgObj = get_field('option_footerBanner', 'option');
		$footerBanner = $footerImgObj['sizes']['medium_large'];
		$footerBannerLink = get_field('option_footerBannerLink', 'option');
		?>
		<?php if($footerBanner): ?>
		<div class="footerBanner onlySmall">
			<a href="<?php echo $footerBannerLink; ?>" target="_blank"><amp-img src="<?php echo $footerBanner; ?>" width="750" height="93" layout="responsive"></amp-img></a>
		</div>
		<?php endif; ?>
		<?php wp_footer(); ?>
	</body>
</html>
