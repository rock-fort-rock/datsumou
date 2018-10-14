<?php
$status = [
	'id' => 'columnDetail',
];
?>
<?php get_header(); ?>

<div class="mainContents">
	<section class="contentBlock">
		<h1 class="salonName"><?php the_title(); ?></h1>
		<?php the_post(); the_content(); ?>
	</section>
</div>

<?php get_footer(); ?>