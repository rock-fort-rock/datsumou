<?php
$status = [
	'id' => 'column',
];
?>
<?php get_header(); ?>

<?php
$term = $wp_query->queried_object;
// print_r($term);
?>

<div class="mainContents">
	<section class="contentBlock">
		<h1 class="archiveTitle"><?php echo $term->name; ?></h1>

		<?php get_template_part('column-list'); ?>
	</section>
</div>

<?php get_footer(); ?>