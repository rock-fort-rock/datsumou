<?php
$status = [
	'id' => 'column',
];
?>
<?php get_header(); ?>

<div class="mainContents">
	<section class="contentBlock">
		<h1 class="archiveTitle">コラム一覧</h1>

		<?php get_template_part('column-list'); ?>
	</section>
</div>

<?php get_footer(); ?>