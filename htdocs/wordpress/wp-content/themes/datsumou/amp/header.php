<?php global $status; ?>
<!doctype html>
<html amp <?php echo AMP_HTML_Utils::build_attributes_string( $this->get( 'html_tag_attributes' ) ); // WPCS: XSS ok. ?>>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
	<?php do_action( 'amp_post_template_head', $this ); ?>
	<style amp-custom>
		<?php include $_SERVER['DOCUMENT_ROOT'].'/assets/css/amp.css'; ?>
	</style>
	<!-- AMP Analytics --><script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>
</head>

<body class="amp-mode <?php echo esc_attr( $this->get( 'body_class' ) ); ?>" id="<?php echo $status['id']; ?>">
	<!-- Google Tag Manager -->
	<amp-analytics config="https://www.googletagmanager.com/amp.json?id=GTM-MZ3ZZPM&gtm.url=SOURCE_URL" data-credentials="include"></amp-analytics>
	<header class="gHeader">
		<?php $ele = (is_home())?'h1':'div'; ?><<?php echo $ele; ?> class="gHeaderLogo"><a href="/"><amp-img src="/assets/images/logo.png" width="175" height="47" alt="ツルツル！全身脱毛診断メーカー"></amp-img></a></<?php echo $ele; ?>>
	</header>
	<div class="contents">