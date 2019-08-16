aaa
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
		$allCommentsArray = [];
		$args = array(
			//「参考になった」がついているコメント
			array(
				'status' => 'approve',
				'meta_key' => 'cld_like_count',
				'orderby' => 'meta_value_num',
				'order' => 'DESC',
			),
			//「参考になった」がついていないコメント
			array(
				'status' => 'approve',
				'meta_key' => 'cld_like_count',
				'meta_compare' => 'NOT EXISTS',
			),
		);
		foreach($args as $arg){
			foreach(get_comments($arg) as $value){
				// print_r($value);
				$temp['ID'] = $value->comment_ID;
				$temp['valuation'] = get_field('comment_valuation',$value);
				// $avatar = empty($_SERVER['HTTPS']) ? 'http://' : 'https://';
				// $avatar .= $_SERVER['HTTP_HOST'];
				$avatar = 'https://xn--lckwf7cb5558dg0hnt1bzdp.com/assets/images/';
				switch (get_field('comment_valuation',$value)) {
					case 1:
						$avatar .= 'comment_avatar1.jpg';
						break;
					case 2:
						$avatar .= 'comment_avatar2.jpg';
						break;
					case 3:
						$avatar .= 'comment_avatar3.jpg';
						break;
					case 4:
						$avatar .= 'comment_avatar4.jpg';
						break;
					case 5:
						$avatar .= 'comment_avatar5.jpg';
						break;
				}
				$temp['avatar'] = get_avatar($value->user_id, 100, $avatar);//($id, $size, $default, $alt)
				$temp['author'] = $value->comment_author;
				$temp['comment'] = $value->comment_content;
				$temp['age'] = get_field('comment_age',$value);
				$ageClass = 'age';
				switch (get_field('comment_age',$value)) {
					case '20代未満':
						$ageClass .= 20;
						break;
					case '30代':
						$ageClass .= 30;
						break;
					case '40代以上':
						$ageClass .= 40;
						break;
				}
				$temp['ageClass'] = $ageClass;
				$temp['like'] = get_field('cld_like_count',$value);
				array_push($allCommentsArray, $temp);
			}
		}

		// print_r($allCommentsArray);
		?>

		<ul class="review">
			<?php foreach($allCommentsArray as $value): ?>
				<li class="<?php echo $value['ageClass']; ?>">
					<div class="avatar">
						<?php echo $value['avatar']; ?>
					</div>
					<div class="comment">
						<div class="valuation">
							<?php for($i=0; $i<$value['valuation']; $i++){
								echo '<span><img src="/assets/images/rating.png"></span>';
							} ?>
						</div>
						<div class="commentText">
							<?php echo $value['comment']; ?>
							（<?php echo $value['author']; ?>:<?php echo $value['age']; ?>）
						</div>

						<?php
						//do_action( 'cld_like_dislike_output', $comment_text, $comment );
						//直接記述（管理画面の設定は反映されず）
						?>
						<div class="cld-like-dislike-wrap cld-template-2">
					    <div class="cld-like-wrap  cld-common-wrap">
					    	<a href="javascript:void(0);" class="cld-like-trigger cld-like-dislike-trigger cld-prevent" title="" data-comment-id="<?php echo $value['ID']; ?>" data-trigger-type="like" data-restriction="cookie" data-ip-check="1" data-user-check="1">
									<span class="button">参考になった</span>
					      </a>
								<span class="cld-like-count-wrap cld-count-wrap"><?php echo $value['like']; ?></span>
							</div>
						</div>
					</div>

				</li>
			<?php endforeach; ?>
		</ul><!-- .comment-list -->


	<div class="viewMore viewTrigger"><span>もっとみる</span></div>
	<?php
	endif; // if have_comments();

	comment_form($comments_args);
	?>
</div><!-- #comments -->
