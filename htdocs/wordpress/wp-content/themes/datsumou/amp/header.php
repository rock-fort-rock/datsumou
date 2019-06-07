<?php global $status; ?>
<!doctype html>
<html amp <?php echo AMP_HTML_Utils::build_attributes_string( $this->get( 'html_tag_attributes' ) ); // WPCS: XSS ok. ?>>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
	<?php do_action( 'amp_post_template_head', $this ); ?>
	<style amp-custom>
	<?php if(is_singular('ampstory')): ?>
		amp-story {font-family: "Hiragino Kaku Gothic Pro", "ヒラギノ角ゴ Pro W3",sans-serif;color: #fff;}amp-story-grid-layer{padding:0;}amp-story-grid-layer.top{align-content: start;}amp-story-grid-layer.center{align-content: center;}amp-story-grid-layer.bottom{align-content: end;}amp-story-grid-layer h2{margin-bottom: 5px;}.layerInner{position: relative;padding:20px;}
		amp-story-grid-layer.top .layerInner{padding-bottom: 50px;}
		amp-story-grid-layer.top .layerInner::before{content:'';position:absolute;width:100%;height:100%;top:0;left:0;background:linear-gradient(rgba(0,0,0,0.5) 60%,transparent 100%);z-index:-1;}
		amp-story-grid-layer.bottom .layerInner{padding-top: 50px;}
		amp-story-grid-layer.bottom .layerInner::before{content:'';position:absolute;width:100%;height:100%;top:0;left:0;background:linear-gradient(transparent 0%,rgba(0,0,0,0.5) 60%);z-index:-1;}
		amp-story-grid-layer.center .layerInner{padding-top: 50px;padding-bottom: 50px;}
		amp-story-grid-layer.center .layerInner::before{content:'';position:absolute;width:100%;height:100%;top:0;left:0;
		background:linear-gradient(transparent 0%,rgba(0,0,0,0.5) 30%, rgba(0,0,0,0.5) 70%, transparent 100%);z-index:-1;}
	<?php else: ?>
		<?php include $_SERVER['DOCUMENT_ROOT'].'/assets/css/amp.css'; ?>
	<?php endif; ?>
	</style>
	<!-- AMP Analytics -->
	<script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>
	<script async custom-element="amp-twitter" src="https://cdn.ampproject.org/v0/amp-twitter-0.1.js"></script>
	<script async custom-element="amp-iframe" src="https://cdn.ampproject.org/v0/amp-iframe-0.1.js"></script>
	<script async custom-element="amp-instagram" src="https://cdn.ampproject.org/v0/amp-instagram-0.1.js"></script>
	<?php if(is_singular('ampstory')): ?>
	<script async src="https://cdn.ampproject.org/v0/amp-story-1.0.js" custom-element="amp-story"></script>
	<?php endif; ?>
</head>

<body class="amp-mode <?php echo esc_attr( $this->get( 'body_class' ) ); ?>" id="<?php echo $status['id']; ?>">
	<!-- Google Tag Manager -->
	<amp-analytics config="https://www.googletagmanager.com/amp.json?id=GTM-MZ3ZZPM&gtm.url=SOURCE_URL" data-credentials="include"></amp-analytics>
	<?php if(!is_singular('ampstory')): ?>
	<header class="gHeader">
		<?php $ele = (is_home())?'h1':'div'; ?><<?php echo $ele; ?> class="gHeaderLogo"><a href="/"><amp-img src="/assets/images/logo.png" width="175" height="47" alt="ツルツル！全身脱毛診断メーカー"></amp-img></a></<?php echo $ele; ?>>
	</header>
	<div class="contents">
	<?php endif; ?>
