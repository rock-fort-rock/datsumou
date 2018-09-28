<?php
$status = [
	'id' => 'others',
	'description' => '',
];
?>
<?php get_header(); ?>
		<div class="contents">
			<div class="breadcrumb">
				<ul>
					<li><a href="/">HOME</a></li><li>ニュース</li>
				</ul>
			</div>

			<div class="textHeader">
				<div class="textHeader__inner">
					<h1 class="textHeader__page">ニュース</h1>
				</div>
			</div>

			<div class="mainContents">
				<div class="news contentBlock">
					<div class="contentInner">
						<?php if(have_posts()): ?>
						<dl class="news__list">
						<?php while(have_posts()): the_post(); ?>
							<?php $new = is_new_post(get_the_time('Y-m-d H:i:s')); ?>
							<dt<?php if($new)echo ' class="new"'; ?>><?php the_time('Y年m月d日'); ?></dt>
							<dd><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></dd>
						<?php endwhile; ?>
						</dl>
						<?php else: ?>
						<p style="text-align: center;">記事が存在しません。</p>
						<?php endif; ?>
					</div>
				</div>
			</div>

		</div>
<?php get_footer(); ?>
<?php exit(); ?>


<div id="contents">

<div id="main">
<?php if(have_posts()): ?>
<ul class="newsList">
<?php while(have_posts()): the_post(); ?>
<?php
$imgObj = get_field('news_thumb');
$img = ($imgObj)?$imgObj['sizes']['medium']:'/images/thumb_default.gif';
// $excerpt = (get_field('news_read'))?get_field('news_read'):get_the_excerpt();
$read = get_field('news_read');
$new = is_new_post(get_the_time('Y-m-d H:i:s'));
?>
<li<?php if($new)echo ' class="new"'; ?>>
<a href="<?php the_permalink(); ?>">
<div class="photoBlock"><img src="<?php echo $img; ?>"></div>
<div class="textBlock">
<h2 class="title"><?php the_title(); ?></h2>
<?php if($read): ?><div class="description"><?php echo $read; ?></div><?php endif; ?>
<div class="date"><?php the_time('Y.m.d'); ?></div>
</div>
</a>
</li>
<?php endwhile; ?>
</ul>
<?php endif; ?>
</div>


<div id="breadcrumbs">
<ul>
<li><a href="/">HOME</a></li><li>ニュース</li>
</ul>
</div>

</div><!--/contents-->

<?php get_footer(); ?>