<?php
$status = [
	'id' => 'glossaryDetail',
];
?>
<?php
if(!is_amp()){
	get_header();
}
?>
<?php
the_post();
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
				<?php if(is_amp()): ?>
					<?php echo convertImgToAmpImg(apply_filters('the_content',get_the_content())); ?>
				<?php else: ?>
					<?php the_content(); ?>
				<?php endif; ?>
      </div>
      <div class="backButton">
        <a href="/glossary/">戻る</a>
      </div>
		</div>
	</section>
</div>

<?php
if(!is_amp()){
	get_footer();
}
?>
