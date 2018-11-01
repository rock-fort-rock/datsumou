<?php
/**
 * Page view template.
 *
 * @package AMP
 */

/**
 * Context.
 *
 * @var AMP_Post_Template $this
 */
?>
<?php
$page = get_post( get_the_ID() );
$slug = $page->post_name;
$page_template = get_page_template_slug();
//管理画面から各ページでAMP有効にする必要あり
if($slug == 'ranking' || $page_template == 'page-ranking.php'){
	$status = [
		'id' => 'ranking',
	];
}
?>

<?php $this->load_parts( array( 'header' ) ); ?>

<?php
if($slug == 'privacy'){
	get_template_part('page-privacy');
}elseif($slug == 'company'){
	get_template_part('page-company');
}elseif($slug == 'research'){
	get_template_part('page-research');
}elseif($slug == 'ranking' || $page_template == 'page-ranking.php'){
	get_template_part('page-ranking');
}
?>

<?php $this->load_parts( array( 'footer' ) ); ?>
