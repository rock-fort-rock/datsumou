<?php
/*
Template Name: お問い合わせ：完了ページ
*/
?>
<?php
$status = [
	'id' => 'others',
	'description' => 'お問い合わせを受け付けました。',
];
?>
<?php get_header(); ?>

		<div class="contents">
			<div class="breadcrumb">
				<ul>
					<li><a href="/">HOME</a></li><li>お問い合わせ</li>
				</ul>
			</div>

			<div class="textHeader">
				<div class="textHeader__inner">
					<h2 class="textHeader__page">お問い合わせ</h2>
					<!-- <h1 class="textHeader__desc">お電話または、お問い合わせフォームにてご連絡お願いします。</h1> -->
				</div>
			</div>

			<div class="mainContents">
				<div class="contact contentBlock">
					<div class="contentInner">
						<h2 class="subTitle--center">お問い合わせを受け付けました</h2>
						<?php the_post(); the_content(); ?>
						<p>このたびは、お問い合わせいただき、誠にありがとうございます。<br>お送りいただきました内容を確認の上、折り返しご連絡させていただきます。</p>
						<p>当社受付時間 : 午前11時 ～ 午後5時（※土・日・祝日・夏季休業・年末年始を除く）までの間とさせていただきます。<br>内容によっては、回答に時間のかかる場合がございますのでご了承願います。</p>
						<p>また、ご記入いただきましたメールアドレスへ、自動返信の確認メールを送付しています。<br>万が一、自動返信メールが届かない場合は、入力いただいたメールアドレスに間違いがあった可能性がございます。<br>メールアドレスをご確認の上、もう一度フォームよりお問い合わせ頂けますようようお願い申し上げます。</p>
					</div>
				</div>

				<div class="contact contentBlock">
					<div class="contentInner">
						<h2 class="subTitle--center"><span class="icon icon-tel"></span>電話でのお問い合わせ</h2>
						<div class="contactTel">
							<div class="contactTel__tel">TEL : <span class="en phonecall">03-3794-9300</span>（代表）</div>
							<div class="contactTel__cap">受付時間 : 午前11時～午後5時<br class="visible-sp">（※土・日・祝日・夏季休業・年末年始を除く）</div>
						</div>
					</div>
				</div>
			</div>

		</div>

<?php get_footer(); ?>
