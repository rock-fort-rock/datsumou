<?php
$status = [
	'id' => 'home',
];
$template = new AMP_Post_Template( $post );
?>
<?php $template->load_parts( array( 'header' ) ); ?>
<div class="mainContents">
	<?php $salonPosts = get_field('ranking_top', 'option'); ?>
	<?php get_template_part('ranking'); ?>
</div>

<?php $template->load_parts( array( 'footer' ) ); ?>
