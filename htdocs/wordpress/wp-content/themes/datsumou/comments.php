<?php
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
*/
if ( post_password_required() ) {
	return;
}
?>

<?php
/*
■インセンティブ
口コミを投稿することでキャンペーンに応募したことに　どこかでアナウンスが必要
*/
?>
<div id="comments" class="commentsArea">
	<?php

	$comments_args = array(
		'fields' => array(
			'author' =>
				'<p class="comment-form-author">' . '<label for="author">お名前（ニックネーム）</label> ' . '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
			'email'  =>
				'<p class="comment-form-email"><label for="email">' . __( 'Email' ) . ( $req ? ' <span class="caption">公開されることはありません</span>' : '' ) . '</label> ' . '<input id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>',
			'url' => '',
		),

		'comment_field' =>
			'<p class="comment-form-comment"><!--<label for="comment">口コミ</label>--><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
		'label_submit' => '口コミを投稿する',
		'title_reply' => '<span>口コミを投稿する</span>',
		'comment_notes_before' =>
			'<p class="comment-notes">メールアドレスが公開されることはありません。<br>アバターは「<a href="https://ja.gravatar.com/" target="_blank">Gravatar</a>」から取得されます。Gravatarを使用していない場合は自動で設定されます。<br>すべて必須項目です。</p>',
	);

	if ( have_comments() ) :
		?>

		<?php
		$allCommentsArray = getComments();
		?>

		<ul class="review">
			<?php foreach($allCommentsArray as $value): ?>
				<?php outputComments($value); ?>
			<?php endforeach; ?>
		</ul><!-- .comment-list -->

	<?php if(is_amp()): ?>
	<div class="viewMore"><a href="<?php echo get_the_permalink(); ?>#comment"><span>もっとみる</span></a></div>
	<?php else: ?>
	<div class="viewMore viewTrigger"><span>もっとみる</span></div>
	<?php endif; ?>

	<?php
	endif; // if have_comments();

	if(!is_amp()){
		comment_form($comments_args);
	}
	?>
</div><!-- #comments -->
