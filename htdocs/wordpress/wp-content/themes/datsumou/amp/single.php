<?php
/**
 * Single view template.
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
global $status;
$post = get_post( get_the_ID() );
$post_type = $post->post_type;
if($post_type == 'salon'){
	$status = [
		'id' => 'salonDetail',
	];
}elseif($post_type == 'column'){
	$status = [
		'id' => 'columnDetail',
	];
}elseif($post_type == 'news'){
	$status = [
		'id' => 'newsDetail',
	];
}
?>

<?php $this->load_parts( array( 'header' ) ); ?>

<?php
if($post_type == 'salon'){
	get_template_part('single-salon');
}elseif($post_type == 'column'){
	get_template_part('single-column');
}elseif($post_type == 'news'){
	get_template_part('single-news');
}elseif($post_type == 'ampstory'){
	get_template_part('single-ampstory');
}
?>

<?php
if($post_type !== 'ampstory'){
	$this->load_parts( array( 'footer' ) );
}
?>
