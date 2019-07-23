<?php
$status = [
	'id' => 'glossaryDetail',
];
?>
<?php get_header(); ?>
<?php
$allTerms = get_terms('glossarycat', array('hide_empty'=> 0));
// print_r($allTerms);
?>
<div class="mainContents">
	<section class="contentBlock">
		<div class="contentInner">
      <h1 class="pageTitle">用語集</h1>

			<ul class="glossaryNavi">
				<?php foreach($allTerms as $value): ?>
					<li>
						<a href="/glossary/#<?php echo $value->slug; ?>"><?php echo $value->name; ?></a>
					</li>
				<?php endforeach; ?>
			</ul>

      <h1 class="glossaryTitle"><?php the_title(); ?></h1>
      <div class="glossaryBody">
        <?php the_post(); the_content(); ?>
      </div>
      <div class="backButton">
        <a href="/glossary/">戻る</a>
      </div>
		</div>
	</section>
</div>

<?php	get_footer(); ?>
