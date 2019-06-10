<?php
if(!is_amp()){
	//強制的にAMPページへ
	$redirect = get_permalink().'amp/';
	header("Location: $redirect");
	exit();
}
?>
<?php if( have_rows('ampstory_page') ): ?>
	<amp-story standalone
		title="<?php the_title(); ?>"
		publisher="全身脱毛診断メーカー"
		publisher-logo-src="/assets/images/home/cat_avatar.png"
		poster-portrait-src="/assets/images/poster-portrait.jpg"
		poster-square-src="/assets/images/poster-square.jpg"
		poster-landscape-src="/assets/images/poster-landscape.jpg"
	>
		<?php	$counter = 0; ?>
		<?php while (have_rows('ampstory_page')): the_row();?>
		<?php
			$id = ($counter == 0)?'cover':'page'.$counter;
			$imgObj = get_sub_field('ampstory_page_image');
			$image = $imgObj['sizes']['medium_large'];
		?>
		<amp-story-page id="<?php echo $id; ?>">
			<amp-story-grid-layer template="fill">
				<amp-img src="<?php echo $image; ?>" width="768" height="1024" layout="responsive"></amp-img>
			</amp-story-grid-layer>
			<amp-story-grid-layer template="vertical" class="<?php the_sub_field('ampstory_page_layout'); ?>">
				<div class="layerInner">
					<h2><?php the_sub_field('ampstory_page_headline'); ?></h2>
					<p><?php the_sub_field('ampstory_page_text'); ?></p>
				</div>
			</amp-story-grid-layer>
		</amp-story-page>
		<?php $counter++; ?>
		<?php endwhile; ?>
		<?php if(get_field('ampstory_column')): ?>
		<amp-story-bookend src="/bookend/?postid=<?php the_field('ampstory_column'); ?>" layout="nodisplay"></amp-story-bookend>
		<?php endif; ?>
	</amp-story>
<?php endif; ?>
</body>
</html>
