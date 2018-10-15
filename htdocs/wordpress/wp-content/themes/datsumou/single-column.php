<?php
$status = [
	'id' => 'columnDetail',
];
?>
<?php get_header(); ?>

<div class="mainContents">
	<section class="contentBlock">
		<div class="categorySelectWrapper">
			<div class="categorySelect">
				<select>
					<option>カテゴリ</option>
					<option>カテゴリ１</option>
					<option>カテゴリ２</option>
				</select>
			</div>
		</div>

		<header class="entryHeader">
			<h1 class="entryTitle">記事のタイトルが入ります</h1>
			<div class="entryAttribute">
				<div class="date">2018年10月1日</div>
				<ul class="category"><li><a href="#">カテゴリ１</a></li><li><a href="#">カテゴリ２</a></li></ul>
				<div class="author">ライターA</div>
			</div>
		</header>

		<div class="contentInner">
			<div class="entryEyecatch"><img src="/assets/images/eyecatch.jpg"></div>

			<div class="entryBody">
				<section class="entryBlock">
					<h2 class="cotentTitle">大見出しが入ります。</h2>
					<p>テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>

					<h3>中見出しが入ります。</h2>
					<p>テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>

					<h4>小見出しが入ります。</h2>
					<p>テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>
				</section>
			</div>
		</div>

		<?php //the_post(); the_content(); ?>
	</section>
</div>

<?php get_footer(); ?>