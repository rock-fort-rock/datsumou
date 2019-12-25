<?php
if(!is_amp()){
	get_header();
}
?>
<div class="mainContents">
	<?php get_template_part('categoryNavi'); ?>
	<section class="contentBlock">
		<div class="contentInner">
			<h1 class="pageTitle"><?php the_title(); ?></h1>
			<?php the_post(); the_content(); ?>
		</div>
	</section>
</div>

<?php
if(!is_amp()){
	get_footer();
}
?>
