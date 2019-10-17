<div class="wrap">
	<h1>マニュアル</h1>
	<div class="card">
		<h2>アップデートに関して</h2>
		<p><span style="color: #f00;">wordpress本体・プラグインともにアップデートは行わないようにしてください。</span><br>※必要な場合は検証作業の後に行います。</p>

	</div>
	<div class="card">
		<h2>目次</h2>
		<p><a href="admin.php?page=manual_column">コラムについて</a></p>
		<p><a href="admin.php?page=manual_salon">サロンについて</a></p>
		<p><a href="admin.php?page=manual_redirect">リダイレクトについて</a></p>
	</div>

	<div class="card">
		<h2>CSVダウンロード</h2>
		<input style="margin-right:15px;" type="button" value="新コラム" onclick="location.href='<?php bloginfo('template_directory'); ?>/admin/download_post.php'">

		<input style="margin-right:15px;" type="button" value="旧コラム" onclick="location.href='<?php bloginfo('template_directory'); ?>/admin/download_column.php'">
	</div>
</div>
