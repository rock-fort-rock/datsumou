<?php
$status = [
	'id' => 'column',
];
?>
<?php get_header(); ?>

<div class="mainContents">
	<section class="contentBlock">
		<h1 class="archiveTitle">記事一覧</h1>

		<div class="categorySelectWrapper">
			<div class="categorySelect">
				<select>
					<option>カテゴリ</option>
					<option>カテゴリ１</option>
					<option>カテゴリ２</option>
				</select>
			</div>
		</div>

		<article class="entry">
			<div class="contentInner">
				<a href="#">
					<div class="imageBlock">
						<img src="/assets/images/eyecatch.jpg">
					</div>
					<div class="textBlock">
						<div class="entryAttribute">
							<div class="date">2018年10月1日</div>
							<ul class="category"><li>カテゴリ１</li><li>カテゴリ２</li></ul>
							<div class="author">ライターA</div>
						</div>
						<h2 class="entryTitle">美容脱毛サロン『coloree』</h2>
						<div class="entryLede exceptSmall">
							<p>▼美容脱毛サロン『coloree』の特徴<br>
							１）全身美容脱毛46部位が月々6,500円（税別）<br>
							２　VIO含め全身まるごと46部位脱毛<br>
							３）さらに安心♪未消化分全額返金保証あり</p>
						</div>
					</div>
				</a>
			</div>
		</article>

		<article class="entry">
			<div class="contentInner">
				<a href="#">
					<div class="imageBlock">
						<img src="/assets/images/eyecatch.jpg">
					</div>
					<div class="textBlock">
						<div class="entryAttribute">
							<div class="date">2018年10月1日</div>
							<ul class="category"><li>カテゴリ１</li><li>カテゴリ２</li></ul>
							<div class="author">ライターA</div>
						</div>
						<div class="entryAuthor">ライター</div>
						<h2 class="entryTitle">美容脱毛サロン『coloree』美容脱毛サロン『coloree』</h2>
						<div class="entryLede exceptSmall">
							<p>▼美容脱毛サロン『coloree』の特徴<br>
							１）全身美容脱毛46部位が月々6,500円（税別）<br>
							２　VIO含め全身まるごと46部位脱毛<br>
							３）さらに安心♪未消化分全額返金保証あり</p>
						</div>
					</div>
				</a>
			</div>
		</article>

		<article class="entry">
			<div class="contentInner">
				<a href="#">
					<div class="imageBlock">
						<img src="/assets/images/eyecatch.jpg">
					</div>
					<div class="textBlock">
						<div class="entryAttribute">
							<div class="date">2018年10月1日</div>
							<ul class="category"><li>カテゴリ１</li><li>カテゴリ２</li></ul>
							<div class="author">ライターA</div>
						</div>
						<h2 class="entryTitle">美容脱毛サロン『coloree』</h2>
						<div class="entryLede exceptSmall">
							<p>▼美容脱毛サロン『coloree』の特徴<br>
							１）全身美容脱毛46部位が月々6,500円（税別）<br>
							２　VIO含め全身まるごと46部位脱毛<br>
							３）さらに安心♪未消化分全額返金保証あり</p>
						</div>
					</div>
				</a>
			</div>
		</article>

		<div class="paginationWrapper">
			<nav class="navigation pagination" role="navigation">
				<h2 class="screen-reader-text">PAGE NAVI</h2>
				<div class="nav-links">
					<span aria-current="page" class="page-numbers current">1</span>
					<a class="page-numbers" href="http://localhost:8013/column/page/2/">2</a>
					<a class="page-numbers" href="http://localhost:8013/column/page/3/">3</a>
					<span class="page-numbers dots">…</span>
					<a class="page-numbers" href="http://localhost:8013/column/page/7/">7</a>
					<a class="next page-numbers" href="http://localhost:8013/column/page/2/">&raquo;</a>
				</div>
			</nav>
		</div>


		<?php the_posts_pagination( array(
			'screen_reader_text' => 'PAGE NAVI',
			'mid_size' => 2,
			'prev_text' => __( '&laquo;', 'textdomain' ),
			'next_text' => __( '&raquo;', 'textdomain' ),
		) ); ?>
	</section>
</div>

<?php get_footer(); ?>