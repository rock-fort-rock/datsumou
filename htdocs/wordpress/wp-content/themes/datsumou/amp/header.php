<?php global $status; ?>
<!doctype html>
<html amp <?php echo AMP_HTML_Utils::build_attributes_string( $this->get( 'html_tag_attributes' ) ); // WPCS: XSS ok. ?>>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
	<?php do_action( 'amp_post_template_head', $this ); ?>
	<style amp-custom>
		<?php //$this->load_parts( array( 'style' ) ); ?>
		<?php //do_action( 'amp_post_template_css', $this ); ?>
		<?php include $_SERVER['DOCUMENT_ROOT'].'/assets/css/amp.css'; ?>
	</style>
</head>

<body class="amp-mode <?php echo esc_attr( $this->get( 'body_class' ) ); ?>" id="<?php echo $status['id']; ?>">
	<header class="gHeader">
		<?php $ele = (is_home())?'h1':'div'; ?><<?php echo $ele; ?> class="gHeaderLogo"><a href="/"><amp-img src="/assets/images/logo.png" width="175" height="47" alt="ツルツル！全身脱毛診断メーカー"></amp-img></a></<?php echo $ele; ?>>
	</header>
	<div class="contents">