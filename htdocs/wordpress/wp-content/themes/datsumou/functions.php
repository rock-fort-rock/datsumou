<?php
/*2019.10.16*/
/*-----------------------------------------------------
コラムスラッグ連番（20191016001,20191016002）は
カテゴリが違っても同一のものは利用不可。

postに移行するため「おすすめ記事」など選択したものは
手動で再設定が必要か？？
-----------------------------------------------------*/


$breakpoint = '780px';

/*-------------------------------------------------------------
wp_head()関連
---------------------------------------------------------------*/
//サイト上のadminバーを非表示
//「ユーザー」->「あなたのプロフィール」->「サイトを見るときにツールバーを表示する」を全ユーザ強制非表示　余計なcssを吐き出さなくなる
add_filter( 'show_admin_bar', '__return_false' );



//title出力
add_theme_support( 'title-tag' );

//ディスクリプション削除
function wp_document_title_parts ( $title ) {
  if ( is_home() ) {
    unset( $title['tagline'] );
  }
  return $title;
}
add_filter( 'document_title_parts', 'wp_document_title_parts', 10, 1 );


function wp_document_title_separator( $separator ) {
  $separator = '|';
  return $separator;
}
add_filter( 'document_title_separator', 'wp_document_title_separator' );

//カスタム
function my_pre_get_document_title( $title ) {
  global $post;
  $parent_id = $post->post_parent;
  $current_title = $post->post_title;
  if($parent_id != 0){
    $parent_title = get_post($parent_id)->post_title;
    $title = $current_title.' | '.$parent_title.' | '.get_bloginfo('name');
  }
  if(is_single()){
    $post_type = get_post_type($post->ID);
    $label = get_post_type_object($post_type)->label;
    $title = $current_title.' | '.$label.' | '.get_bloginfo('name');
  }
  return $title;
}
add_filter( 'pre_get_document_title', 'my_pre_get_document_title' );


//wp_headから不要なものを削除
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles', 10);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head','rest_output_link_wp_head');
remove_action('wp_head','wp_oembed_add_discovery_links');
remove_action('wp_head','wp_oembed_add_host_js');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');

//wordpressのjqueryを読み込まない
// function my_delete_local_jquery() {
//   wp_deregister_script('jquery');
// }
// add_action( 'wp_enqueue_scripts', 'my_delete_local_jquery' );

//全DNSプリフェッチ削除
function remove_dns_prefetch( $hints, $relation_type ) {
    if ( 'dns-prefetch' === $relation_type ) {
        return array_diff( wp_dependencies_unique_hosts(), $hints );
    }
    return $hints;
}
add_filter( 'wp_resource_hints', 'remove_dns_prefetch', 10, 2 );
// add_filter( 'emoji_svg_url', '__return_false' );//絵文字だけの

$pluginCss = [
  'fancybox',
  'pz-linkcard',
  'sb-type-std',
  'sb-type-fb',
  'sb-type-fb-flat',
  'sb-type-ln',
  'sb-type-ln-flat',
  'sb-type-pink',
  'sb-type-rtail',
  'sb-type-drop',
  'sb-type-think',
  'sb-no-br',
];

/**
 * JavaScriptやCSSに付加されるWordPressのバージョン番号(?ver=4.4.2など)を削除します。
 */
function remove_src_wp_ver( $dep ) {
	$dep->default_version = '';
}
add_action( 'wp_default_scripts', 'remove_src_wp_ver' );
add_action( 'wp_default_styles', 'remove_src_wp_ver' );


function my_scripts() {
  wp_enqueue_style( 'googlefonts', 'https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Noto+Sans+JP:wght@400;700&display=swaps', array(), false);
  wp_enqueue_style( 'style', home_url().'/assets/css/style.css', array(), '3.4');
  // wp_enqueue_script('echo', home_url().'/assets/lib/echo.min.js', array(), false, true );
  wp_enqueue_script('layzr', 'https://cdnjs.cloudflare.com/ajax/libs/layzr.js/2.0.2/layzr.min.js', array(), false, true );
  wp_enqueue_script('script', home_url().'/assets/js/bundle.js', array(), '2.7', true );

  //プラグインCSSを「ヘッダ」で読み込まない
  global $pluginCss;
  foreach($pluginCss as $value){
    wp_dequeue_style($value);
  }

  //不要なプラグインCSSを読み込まない
  wp_dequeue_style( 'cld-font-awesome' );
  wp_dequeue_style( 'cld-frontend' );
}
add_action( 'wp_enqueue_scripts', 'my_scripts', 9999 );


function my_noindex() {
  if(is_category()){
    //チェックがない場合（デフォルト）はNoindex
    //All in one seo packの「カテゴリーをnoindexにする」はチェックしない
    $cat_id = get_query_var('cat');
    if(!get_field('category_index','category_'.$cat_id)){
      echo "<meta name='robots' content='noindex,follow' />\n";
    }
  }
}
add_action( 'wp_head', 'my_noindex', 1 );


//AMP用構造化データの追加
function add_header(){
  if (is_single() || is_singular( 'salon' )){
    global $post;
    $author = get_userdata($post->post_author)->data->display_name;
    // the_post();
    $description = htmlspecialchars(get_post_meta($post->ID, '_aioseop_description', true),ENT_QUOTES); //All in One SEO からdescriptionを取得

    if(is_single()){
      $eyecatchId = get_post_thumbnail_id($post->ID);
      $eyecatch = wp_get_attachment_image_src( $eyecatchId, 'large' );
      $eyecatchSrc = $eyecatch[0];
      $eyecatchWidth = $eyecatch[1];
      $eyecatchHeight = $eyecatch[2];
    }
    if(is_singular('salon')){
      $banner = get_field('salon_banner');
      $bannerObj = $banner['salon_banner_image'];
      $eyecatchSrc = $bannerObj['sizes']['medium_large'];
      $imagesize = getimagesize($eyecatchSrc);
      $eyecatchWidth = $imagesize[0];
      $eyecatchHeight = $imagesize[1];
    }

    $type = "BlogPosting";
    if(get_field('review_name') && get_field('review_rating')){
      $type = "Review";
    }

    $script = '<script type="application/ld+json">'."\n";
    $script .= '{'."\n";
    $script .= '  "@context": "http://schema.org",'."\n";
    $script .= '  "@type": "'.$type.'",'."\n";
    $script .= '  "mainEntityOfPage": {'."\n";
    $script .= '      "@type": "WebPage",'."\n";
    $script .= '      "@id": "'.get_the_permalink().'"'."\n";
    $script .= '  },'."\n";
    $script .= '  "headline": "'.get_the_title().'",'."\n";
    $script .= '  "description": "'.$description.'",'."\n";
    $script .= '  "datePublished": "'.get_the_time('Y/m/d').'",'."\n";
    $script .= '  "dateModified": "'.get_the_modified_date('Y/m/d').'",'."\n";
    $script .= '  "image": {'."\n";
    $script .= '      "@type": "ImageObject",'."\n";
    $script .= '      "url": "'.$eyecatchSrc.'",'."\n";
    $script .= '      "width": '.$eyecatchWidth.','."\n";
    $script .= '      "height": '.$eyecatchHeight."\n";
    $script .= '  },'."\n";

    $script .= '  "author": {'."\n";
    $script .= '    "@type": "Person",'."\n";
    $script .= '    "name": "'.$author.'"'."\n";
    $script .= '  },'."\n";

    $script .= '  "publisher": {'."\n";
    $script .= '    "@type": "Organization",'."\n";
    $script .= '    "name": "脱毛診断メーカー運用委員会",'."\n";
    $script .= '    "logo": {'."\n";
    $script .= '      "@type": "ImageObject",'."\n";
    $script .= '      "url": "https://datumow.com/assets/images/logo.png",'."\n";
    $script .= '      "height": 127,'."\n";
    $script .= '      "width": 469'."\n";
    $script .= '    }'."\n";
    $script .= '  }'."\n";

    if(get_field('review_name') && get_field('review_rating')){
      $script .= '  "itemReviewed": {'."\n";
      $script .= '      "@type": "Product",'."\n";
      $script .= '      "name": "'.get_field('review_name').'"'."\n";
      $script .= '  },'."\n";
      $script .= '  "reviewRating": {'."\n";
      $script .= '      "@type": "Rating",'."\n";
      $script .= '      "ratingValue": "'.get_field('review_rating').'",'."\n";
      $script .= '      "bestRating": "10"'."\n";
      $script .= '  }'."\n";
    }

    $script .= '}'."\n";
    $script .= '</script>'."\n";

    echo $script;
  }
}
add_action('wp_head', 'add_header');


//AMP用構造化データの追加
function amp_modify_jsonld( $metadata, $post ) {
  if (is_single() || is_singular( 'column' ) || is_singular( 'salon' )){
    if(get_field('review_name') && get_field('review_rating')){
      $metadata['@type'] = 'Review';
      $metadata['itemReviewed']['@type'] = 'Product';
      $metadata['itemReviewed']['name'] = get_field('review_name');

      $metadata['reviewRating']['@type'] = 'Rating';
      $metadata['reviewRating']['ratingValue'] = get_field('review_rating');
      $metadata['reviewRating']['bestRating'] = '10';
    }
  }
  return $metadata;
}
add_filter( 'amp_post_template_metadata', 'amp_modify_jsonld', 10, 2 );


function my_enqueue_plugin_files(){
  //プラグインCSSをフッタで読み込み
  global $pluginCss;
  foreach($pluginCss as $value){
    wp_enqueue_style($value);
  }
}
add_action('wp_footer', 'my_enqueue_plugin_files');


//フッターでCSSを読み込む場合
// function prefix_add_footer_styles() {
  // wp_enqueue_style( 'style', home_url().'/assets/css/style.css', array(), '1.7');
    //wp_enqueue_style('googlefonts', 'https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700', array(), null);
//};
// add_action( 'get_footer', 'prefix_add_footer_styles' );


//JavaScript を非同期にする
// function add_async_to_script( $tag, $handle ) {
//      return str_replace( ' src', ' async="async" src', $tag );
// }
// add_filter( 'script_loader_tag', 'add_async_to_script', 10, 2 );


//アイキャッチ有効化
// add_theme_support('post-thumbnails');
add_theme_support('post-thumbnails', array(
  'post',
  'column',
  'page',
));

// 管理者以外wordpress updateを非表示
if (!current_user_can('administrator')) {
	add_filter('pre_site_transient_update_core', create_function('$a', 'return null;'));
}

// 管理者以外不必要なメニューを非表示
function remove_menus(){
  global $menu;
  // print_r($menu);

  if (current_user_can('administrator') || current_user_can('editor')){
    // echo '管理者・編集者のみ';
    setOption();
  }else{
    unset($menu[7]);//サロン情報
  }

  if (!current_user_can('administrator')){
    $restricted = array(__('固定ページ'),__('ツール'), __('設定'),  __('プロフィール'));
  }else{
    $restricted = array();
    // $restricted = array(__('投稿'));
  }
  end ($menu);
  while (prev($menu)){
    $value = explode(' ',$menu[key($menu)][0]);
    if (in_array($value[0] != NULL?$value[0]:"" , $restricted)){
      unset($menu[key($menu)]);
    }
  }
}
add_action('admin_menu', 'remove_menus');


// 管理者以外不必要なダッシュボードの内容を非表示
remove_all_actions('wp_dashboard_setup');
if (!current_user_can('administrator')){
	function example_remove_dashboard_widgets() {
		global $wp_meta_boxes;
		//Main column
		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
    // unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);

		//Side Column
		unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
		unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
		unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
		unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
	}
	add_action('wp_dashboard_setup', 'example_remove_dashboard_widgets' );
}




add_action( 'after_setup_theme', 'imagesizeSet' );
function imagesizeSet() {
  // add_image_size( 'visual', 500, 648, true );

	update_option( 'thumbnail_size_w', 120 );
	update_option( 'thumbnail_size_h', 0 );

	update_option( 'medium_size_w', 400 );
	update_option( 'medium_size_h', 0 );

  update_option( 'medium_large_size_w', 800 );
  update_option( 'medium_large_size_h', 0 );

	update_option( 'large_size_w', 1600 );
	update_option( 'large_size_h', 0 );
}


//「投稿」を「コラム」へ
function Change_menulabel() {
	global $menu;
	global $submenu;
	$name = 'コラム';
	$menu[5][0] = $name;
	$submenu['edit.php'][5][0] = $name.'一覧';
	$submenu['edit.php'][10][0] = '新しい'.$name;
}
function Change_objectlabel() {
	global $wp_post_types;
	$name = 'コラム';
	$labels = &$wp_post_types['post']->labels;
	$labels->name = $name;
	$labels->singular_name = $name;
	$labels->add_new = _x('追加', $name);
	$labels->add_new_item = $name.'の新規追加';
	$labels->edit_item = $name.'の編集';
	$labels->new_item = '新規'.$name;
	$labels->view_item = $name.'を表示';
	$labels->search_items = $name.'を検索';
	$labels->not_found = $name.'が見つかりませんでした';
	$labels->not_found_in_trash = 'ゴミ箱に'.$name.'は見つかりませんでした';

  // タグの非表示
  global $wp_taxonomies;
  // print_r($wp_taxonomies['post_tag']->object_type);
  if ( !empty( $wp_taxonomies['post_tag']->object_type ) ) {
    foreach ( $wp_taxonomies['post_tag']->object_type as $i => $object_type ) {
      if ( $object_type == 'post' ) {
        unset( $wp_taxonomies['post_tag']->object_type[$i] );
      }
    }
  }
}
add_action( 'init', 'Change_objectlabel' );
add_action( 'admin_menu', 'Change_menulabel' );


// コラムスラッグ連番付番
//カテゴリが違っても同じ日の投稿は連番がふられるので、001から始まらない場合もあり
function incliment_slug($slug) {
  global $post;
  //新規作成の場合
  if ($post->post_type == 'post' && get_post_status() == 'auto-draft') {
    global $wpdb;
    $args = array(
      'post_type'      => 'post',
      'posts_per_page' => -1,
      'date_query' => array(
          array(
              'year'     => get_the_time('Y'),
              'monthnum' => get_the_time('m'),
              'day'      => get_the_time('d')
          )
      )
    );
    $day_news = new WP_Query( $args );
    $day_news_count = $day_news->found_posts+1;
    // $slug = get_the_time('ymd') . sprintf('%03d', $day_news_count);
    $slug = get_the_time('Ymd') . sprintf('%03d', $day_news_count);
    return $slug;
  }else{
    return $slug;
  }
}
add_filter('editable_slug', 'incliment_slug');

//https://nakagaw.hateblo.jp/entry/2017/10/26/111345
// 数字 + スラッシュ で終わるページの 404 なくす
function custom_rewrite_basic() {
  // add_rewrite_rule('hairremovalsalon/([^/]+)(?:/([0-9]+))?/?$', 'index.php?category_name=hairremovalsalon/$matches[1]&name=$matches[2]', 'top');
  add_rewrite_rule('([^/]+)/([^/]+)/(([0-9]+))+/?$', 'index.php?category_name=$matches[1]/$matches[2]&name=$matches[3]', 'top');
  // if (preg_match('#([^/]+)/([^/]+)(?:/([0-9]+))+/?$#', "hairremovalsalon/musee/191016001/", $matches)) {
  //     echo $matches[0] .' : ' . $matches[1].':' . $matches[2].':' . $matches[3];
  // } else {
  //     echo "マッチしませんでした。";
  // }
}
add_action('init', 'custom_rewrite_basic');


/* カテゴリーURLから「category」を削除　サブカテゴリがうまくいかないのでプラグイン（No Category Base）で対応
---------------------------------------------------------- */
// add_filter('user_trailingslashit', 'remcat_function');
// function remcat_function($link) {
// 	return str_replace("/category/", "/", $link);
// }
// add_action('init', 'remcat_flush_rules');
// function remcat_flush_rules() {
// 	global $wp_rewrite;
// 	$wp_rewrite->flush_rules();
// }
// add_filter('generate_rewrite_rules', 'remcat_rewrite');
// function remcat_rewrite($wp_rewrite) {
// 	$new_rules = array('(.+)/page/(.+)/?' => 'index.php?category_name='.$wp_rewrite->preg_index(1).'&paged='.$wp_rewrite->preg_index(2));
// 	$wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
// }

/* コラムアーカイブページの作成 */
// function post_has_archive( $args, $post_type ) {
// 	if ( 'post' == $post_type ) {
// 		$args['rewrite'] = true;
// 		$args['has_archive'] = 'archive';//columnはカテゴリで使用するのでNG
// 	}
// 	return $args;
// }
// add_filter( 'register_post_type_args', 'post_has_archive', 10, 2 );


/**
custom post type
コラム
**/
// add_action('init', 'cpt_column_init');
// function cpt_column_init()
// {
//   $labels = array(
//     'name' => _x('コラム（OLD）', 'post type general name'),
//     'singular_name' => _x('コラム', 'post type singular name'),
//     'add_new' => _x('コラム追加', 'column'),
//     'add_new_item' => __('新規コラムを追加'),
//     'edit_item' => __('コラムを編集'),
//     'new_item' => __('新しいコラム'),
//     'view_item' => __('コラムを見る'),
//     'search_items' => __('コラムを探す'),
//     'not_found' =>  __('コラムはありません'),
//     'not_found_in_trash' => __('ゴミ箱にコラムはありません'),
//     'parent_item_colon' => ''
//   );
//   $args = array(
//     'labels' => $labels,
//     'public' => true,
//     'show_ui' => true,
//     'query_var' => true,
//     'capability_type' => 'post',
//     'has_archive' => true,
//     'rewrite' => array('slug' => 'column', 'with_front' => false, 'pages' => true, 'feeds' => false),
//     'hierarchical' => false,
//     'menu_position' => 4,
//     'supports' => array('title','editor','thumbnail','author')
//   );
//   register_post_type('column', $args);
//
//   $args = array(
//     'labels' => array(
//       'name' => 'カテゴリ',
//       'singular_name' => 'カテゴリ',
//       'search_items' => 'カテゴリを検索',
//       'popular_items' => 'よく使われているカテゴリ',
//       'all_items' => 'すべてのカテゴリ',
//       'parent_item' => '親カテゴリ',
//       'edit_item' => 'カテゴリの編集',
//       'update_item' => '更新',
//       'add_new_item' => 'カテゴリを追加',
//       'new_item_name' => '新しいカテゴリ'
//     ),
//     'public' => true,
//     'show_ui' => true,
//     'hierarchical' => true,
//     'query_var' => true,
//     'rewrite' => array('slug' => 'column/column_category', 'with_front' => false)
//   );
//   register_taxonomy('column_category', 'column', $args);
// }

/*
columnパーマリンク設定。難しいか。「投稿」にする？記事の移行が大変。
・/column/は活かしたままにしたい！！
・URL階層対応のため「カテゴリ」と「サブカテゴリ」2つタクソノミーを作成。（サブカテゴリの親は選択できないように）一覧ページが難しい。。。
・親カテゴリと子カテゴリ。（サブカテゴリの親は選択できないように）パーマリンク設定に「/%column_category%/」で階層表示してくれる。
・一覧ページ タクソノミー名なしの「/親/子/」でいける？？
https://blog.maromaro.co.jp/archives/2500
*/

// function na_remove_slug( $post_link, $post, $leavename ) {
//   // $terms = get_terms('column_category');
//   // $termSlug = $terms[0]->slug;
//     if ( 'column' != $post->post_type || 'publish' != $post->post_status ) {
//         return $post_link;
//     }
//     $post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );
//     return $post_link;
// }
// add_filter( 'post_type_link', 'na_remove_slug', 10, 3 );

// function na_parse_request( $query ) {
//   // print_r($query->query);
//     if ( ! $query->is_main_query() || 2 != count( $query->query ) || ! isset( $query->query['page'] ) ) {
//         return;
//     }
//     if ( ! empty( $query->query['name'] ) ) {
//       // echo $query->query['name'];
//         $query->set( 'post_type', array( 'post', 'column', 'page' ) );
//     }
// }
// add_action( 'pre_get_posts', 'na_parse_request' );



/**
custom post type
お知らせ
**/
add_action('init', 'cpt_news_init');
function cpt_news_init()
{
  $labels = array(
    'name' => _x('お知らせ', 'post type general name'),
    'singular_name' => _x('お知らせ', 'post type singular name'),
    'add_new' => _x('お知らせ追加', 'news'),
    'add_new_item' => __('新規お知らせを追加'),
    'edit_item' => __('お知らせを編集'),
    'new_item' => __('新しいお知らせ'),
    'view_item' => __('お知らせを見る'),
    'search_items' => __('お知らせを探す'),
    'not_found' =>  __('お知らせはありません'),
    'not_found_in_trash' => __('ゴミ箱にお知らせはありません'),
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'show_ui' => true,
    'query_var' => true,
    'capability_type' => 'post',
    'has_archive' => true,
    'rewrite' => array('slug' => 'news', 'with_front' => false, 'pages' => true, 'feeds' => false),
    'hierarchical' => false,
    'menu_position' => 4,
    'supports' => array('title','editor','thumbnail','author')
  );
  register_post_type('news', $args);

  $args = array(
    'labels' => array(
      'name' => 'カテゴリ',
      'singular_name' => 'カテゴリ',
      'search_items' => 'カテゴリを検索',
      'popular_items' => 'よく使われているカテゴリ',
      'all_items' => 'すべてのカテゴリ',
      'parent_item' => '親カテゴリ',
      'edit_item' => 'カテゴリの編集',
      'update_item' => '更新',
      'add_new_item' => 'カテゴリを追加',
      'new_item_name' => '新しいカテゴリ'
    ),
    'public' => true,
    'show_ui' => true,
    'hierarchical' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'news/news_category', 'with_front' => false)
  );
  register_taxonomy('news_category', 'news', $args);
}

/**
custom post type
サロン情報
**/
add_action('init', 'cpt_salon_init');
function cpt_salon_init()
{
  $labels = array(
    'name' => _x('サロン情報', 'post type general name'),
    'singular_name' => _x('サロン情報', 'post type singular name'),
    'add_new' => _x('新規追加', 'salon'),
    'add_new_item' => __('サロン情報を追加'),
    'edit_item' => __('サロン情報を編集'),
    'new_item' => __('新しいサロン情報'),
    'view_item' => __('サロン情報を見る'),
    'search_items' => __('サロン情報を探す'),
    'not_found' =>  __('サロン情報はありません'),
    'not_found_in_trash' => __('ゴミ箱にサロン情報はありません'),
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'show_ui' => true,
    'query_var' => true,
    'capability_type' => 'post',
    'has_archive' => true,
    'rewrite' => array('slug' => 'salon', 'with_front' => false, 'pages' => true, 'feeds' => false),
    'hierarchical' => false,
    'menu_position' => 5,
    'supports' => array('title','editor','thumbnail','comments')
  );
  register_post_type('salon', $args);
}

/**
custom post type
用語集
**/
add_action('init', 'cpt_glossary_init');
function cpt_glossary_init()
{
  $labels = array(
    'name' => _x('用語集', 'post type general name'),
    'singular_name' => _x('用語集', 'post type singular name'),
    'add_new' => _x('新規追加', 'glossary'),
    'add_new_item' => __('用語集を追加'),
    'edit_item' => __('用語集を編集'),
    'new_item' => __('新しい用語集'),
    'view_item' => __('用語集を見る'),
    'search_items' => __('用語集を探す'),
    'not_found' =>  __('用語集はありません'),
    'not_found_in_trash' => __('ゴミ箱に用語集はありません'),
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'show_ui' => true,
    'query_var' => true,
    'capability_type' => 'post',
    'has_archive' => true,
    'rewrite' => array('slug' => 'glossary', 'with_front' => false, 'pages' => true, 'feeds' => false),
    'hierarchical' => false,
    'menu_position' => 5,
    'supports' => array('title','editor','thumbnail')
  );
  register_post_type('glossary', $args);

  $args = array(
    'labels' => array(
      'name' => '用語集カテゴリ',
      'singular_name' => '用語集カテゴリ',
      'search_items' => '用語集カテゴリを検索',
      'popular_items' => 'よく使われている用語集カテゴリ',
      'all_items' => 'すべての用語集カテゴリ',
      'parent_item' => '親用語集カテゴリ',
      'edit_item' => '用語集カテゴリの編集',
      'update_item' => '更新',
      'add_new_item' => '用語集カテゴリを追加',
      'new_item_name' => '新しい用語集カテゴリ'
    ),
    'public' => true,
    'show_ui' => true,
    'hierarchical' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'glossarycat', 'with_front' => false)
  );
  register_taxonomy('glossarycat', 'glossary', $args);
}

/**
custom post type
AMPストーリー
**/
add_action('init', 'cpt_ampstory_init');
function cpt_ampstory_init()
{
  $labels = array(
    'name' => _x('AMPストーリー', 'post type general name'),
    'singular_name' => _x('AMPストーリー', 'post type singular name'),
    'add_new' => _x('新規追加', 'ampstory'),
    'add_new_item' => __('AMPストーリーを追加'),
    'edit_item' => __('AMPストーリーを編集'),
    'new_item' => __('新しいAMPストーリー'),
    'view_item' => __('AMPストーリーを見る'),
    'search_items' => __('AMPストーリーを探す'),
    'not_found' =>  __('AMPストーリーはありません'),
    'not_found_in_trash' => __('ゴミ箱にAMPストーリーはありません'),
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'show_ui' => true,
    'query_var' => true,
    'capability_type' => 'post',
    'has_archive' => true,
    'rewrite' => array('slug' => 'ampstory', 'with_front' => false, 'pages' => true, 'feeds' => false),
    'hierarchical' => false,
    'menu_position' => 5,
    'supports' => array('title','editor','thumbnail')
  );
  register_post_type('ampstory', $args);
}

function setOption(){
  if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
      'page_title'  => 'サイト設定',
      'menu_title'  => 'サイト設定',
      'menu_slug'   => 'theme-options',
      'capability'  => 'edit_posts',
      'parent_slug' => '',
      'position'  => 8,
      'redirect'  => false,
    ));
    acf_add_options_sub_page(array( //サブページ
      'page_title'  => 'コラム用定型文',
      'menu_title'  => 'コラム用定型文',
      'menu_slug'   => 'theme-options-template',
      'capability'  => 'edit_posts',
      'parent_slug' => 'theme-options', //親ページのスラッグ
      'position'  => false,
    ));
    acf_add_options_sub_page(array( //サブページ
      'page_title'  => '施術箇所一覧',
      'menu_title'  => '施術箇所一覧',
      'menu_slug'   => 'theme-options-parts',
      'capability'  => 'edit_posts',
      'parent_slug' => 'theme-options', //親ページのスラッグ
      'position'  => false,
    ));
    acf_add_options_sub_page(array( //サブページ
      'page_title'  => 'サロン一覧',
      'menu_title'  => 'サロン一覧',
      'menu_slug'   => 'theme-options-salon',
      'capability'  => 'edit_posts',
      'parent_slug' => 'theme-options', //親ページのスラッグ
      'position'  => false,
    ));

    acf_add_options_page(array(
      'page_title'  => 'サロンランキング',
      'menu_title'  => 'サロンランキング',
      'menu_slug'   => 'theme-options-ranking',
      'capability'  => 'edit_posts',
      'parent_slug' => '',
      'position'  => 8,
      'redirect'  => false,
    ));
    acf_add_options_sub_page(array( //サブページ
      'page_title'  => 'トップページ用',
      'menu_title'  => 'トップページ用',
      'menu_slug'   => 'theme-options-topRank',
      'capability'  => 'edit_posts',
      'parent_slug' => 'theme-options-ranking', //親ページのスラッグ
      'position'  => false,
    ));
  }
}



// 表示件数set
add_filter('pre_get_posts', 'custom_posts_query');
function custom_posts_query() {
  global $wp_query;
  if(!is_admin()){
    if(is_post_type_archive('news') || is_tax('news_category')){
      $wp_query -> query_vars['posts_per_page'] = 10;
    }elseif(is_search()){
      $wp_query -> query_vars['posts_per_page'] = 10;
    }elseif(is_archive() || is_category() || is_post_type_archive('column') || is_tax('column_category')){
        $wp_query -> query_vars['posts_per_page'] = 15;
    }else{
      $wp_query -> query_vars['posts_per_page'] = -1;
    }
  }
}

//検索結果フィルター
function SearchFilter($query) {
  if ($query->is_search) {
    $query->set('post_type', 'post');
  }
return $query;
}
add_filter('pre_get_posts','SearchFilter');

//キーワードハイライト
// function wps_highlight_results($text) {
// 	if(is_search()){
//   	$sr = get_query_var('s');
//   	$keys = explode(" ",$sr);
//   	$text = preg_replace('/('.implode('|', $keys) .')/iu', '<strong>'.$sr.'</strong>', $text);
// 	}
// 	return $text;
// }
// add_filter('the_title', 'wps_highlight_results');



//公開のみサイトに表示（ログイン状態でも「非公開」記事は表示しない） 詳細ページは表示（プレビュー用）
function parse_query_ex() {
    if (!is_admin() && !get_query_var('post_status') && !is_singular()) {
        set_query_var('post_status', 'publish');
    }
}
add_action('parse_query', 'parse_query_ex');





//「ビジュアル」「テキスト」切り替え時のクリーンアップ機能を無効化
add_filter('tiny_mce_before_init', 'tinymce_init');
function tinymce_init( $init ) {
  $init['verify_html'] = false;
  return $init;
}


//固定ページのみ本文に自動で<br><p>が入るのをとめる
// function stopWpautop(){
//   if(is_page()){
//     remove_filter('the_content', 'wpautop');
//   }
// }
// add_action('wp','stopWpautop');




//ショートコード
function setStar($arg) {
  extract ( shortcode_atts ( array (
    'num' => 0,
  ), $arg ) );

  for($i=0; $i<$num; $i++){
    $code .= '<span class="rating">★</span>';
  }
  return $code;
}
add_shortcode('星マーク', 'setStar');

function setList($arg) {
  extract ( shortcode_atts ( array (
    'title' => '',
    'text' => '',
  ), $arg ) );

  $code = '<div class="pointList">';
  if($title){
    $code .= '<div class="pointTitle">'.$title.'</div>';
  }
  $code .= '<ul>';
  $arrayText = explode(",", $text);
  foreach($arrayText as $value){
    $code .= '<li>'.$value.'</li>';
  }
  $code .= '</ul>';
  $code .= '</div>';
  return $code;
}
add_shortcode('リスト', 'setList');

function setRanking($arg) {
  extract ( shortcode_atts ( array (
    'rank' => '',
    'title' => '',
    'catch' => '',
  ), $arg ) );

  $code = '<div class="rankingDeco">';
  $code .= '<div class="crown">'.$rank.'</div>';
  $code .= '<div class="title">'.$title.'<span>'.$catch.'</span></div>';
  $code .= '</div>';
  return $code;
}
add_shortcode('ランキング装飾', 'setRanking');



//口コミ
function getComments($post_id = NULL){
//   $myArray = array(
//     'two'   => 'Blah Blah Blah 2',
//     'three' => 'Blah Blah Blah 3',
//     'one'   => 'Blah Blah Blah 1',
//     'four'  => 'Blah Blah Blah 4',
//     'five'  => 'Blah Blah Blah 5',
// );
// $myArray = array('one' => $myArray['one']) + $myArray;
// print_r($myArray);

  $allCommentsArray = [];
  $args = array(
    //「参考になった」がついているコメント
    array(
      'status' => 'approve',
      'meta_key' => 'cld_like_count',
      'orderby' => 'meta_value_num',
      'order' => 'DESC',
      //'post_id' => $value['ID'],
    ),
    //「参考になった」がついていないコメント
    array(
      'status' => 'approve',
      'meta_key' => 'cld_like_count',
      'meta_compare' => 'NOT EXISTS',
      //'post_id' => $value['ID'],
    ),
  );
  if($post_id !== NULL){
    for($i=0; $i<count($args); $i++){
      $args[$i] += array('post_id' => $post_id);
    }
  }
  // print_r($args);
  $counter = 0;
  foreach($args as $arg){
    foreach(get_comments($arg) as $comment){

      // print_r($comment);
      $temp['ID'] = $comment->comment_ID;
      $temp['valuation'] = get_field('comment_valuation',$comment);
      // $avatar = empty($_SERVER['HTTPS']) ? 'http://' : 'https://';
      // $avatar .= $_SERVER['HTTP_HOST'];
      $avatar = 'https://datumow.com/assets/images/';
      switch (get_field('comment_valuation',$comment)) {
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
      // $temp['avatar'] = get_avatar($comment->user_id, 100, $avatar);//($id, $size, $default, $alt)

      // $temp['avatar'] = '<img src="'.$avatar.'">';
      $temp['avatar'] = '<img src="/assets/images/dummy.gif" data-normal="'.$avatar.'" class="lazy">';

      if(is_amp()){
        $temp['avatar'] = preg_replace('/<img/i', '<amp-img layout="responsive" width="60" height="60"', $temp['avatar']);
      }

      //管理者の投稿は名前非表示
      $temp['author'] = '';
      if($comment->comment_author_email !== 'hashiguchi@rocksteady.in'){
        $temp['author'] = $comment->comment_author . 'さん:';
      }
      $temp['comment'] = $comment->comment_content;
      $temp['age'] = get_field('comment_age',$comment);
      $ageClass = 'age';
      switch (get_field('comment_age',$comment)) {
        case '20':
          $ageClass .= 20;
          $ageStr = '20代以下';
          break;
        case '30':
          $ageClass .= 30;
          $ageStr = '30代';
          break;
        case '40':
          $ageClass .= 40;
          $ageStr = '40代以上';
          break;
      }
      $temp['ageClass'] = $ageClass;
      $temp['ageStr'] = $ageStr;
      $temp['like'] = get_field('cld_like_count',$comment);
      $temp['fixed'] = get_field('comment_fixed',$comment);
      array_push($allCommentsArray, $temp);
    }
  }

  //固定表示を先頭にソート
  foreach($allCommentsArray as $key => $value){
    if($value['fixed'] == 1){
      unset($allCommentsArray[$key]);
      array_unshift($allCommentsArray, $value);
    }
  }


  return $allCommentsArray;
}




function outputComments($value){
  echo '<li class="'.$value['ageClass']. '">';
	echo '<div class="avatar">'.$value['avatar'].'</div>';
	echo '<div class="comment">';
	echo '<div class="valuation">';
	for($i=0; $i<$value['valuation']; $i++){
		echo '<span>★</span>';
	}
	echo '</div>';
	echo '<div class="commentText">';
  echo $value['comment'] . '（' .$value['author'] . $value['ageStr']. '）';
	echo '</div>';

	//do_action( 'cld_like_dislike_output', $comment_text, $comment );
	//直接記述（管理画面の設定は反映されず）


	echo '<div class="cld-like-dislike-wrap cld-template-2">';
  echo '<div class="cld-like-wrap  cld-common-wrap">';
  if(is_amp()){
    echo '<div class="cld-like-trigger cld-like-dislike-trigger cld-prevent">';
  	echo '<span class="button">参考になった</span>';
    echo '</div>';
  }else{
    echo '<a href="javascript:void(0);" class="cld-like-trigger cld-like-dislike-trigger cld-prevent" title="" data-comment-id="'.$value['ID']. '" data-trigger-type="like" data-restriction="cookie" data-ip-check="1" data-user-check="1">';
  	echo '<span class="button">参考になった</span>';
    echo '</a>';
  }

	echo '<span class="cld-like-count-wrap cld-count-wrap">'. $value['like']. '</span>';
	echo '</div>';
	echo '</div>';
  echo '</div>';
	echo '</li>';
}

function outputCategorySelect($self = NULL){
  echo '<select onChange="location.href=value;">';
  echo '<option>カテゴリ選択</option>';
  $parent_terms = get_terms('category', array('parent' => 0) );
  foreach($parent_terms as $parent_value){
    $parentOther_url = '';
    echo '<optgroup label="'.$parent_value->name. '">';
    $parent_id = $parent_value->term_id;
    if(get_field('category_url','category_'.$parent_id)){
      $parentOther_url = get_field('category_url','category_'.$parent_id);
    }
    $parent_url = ($parentOther_url)?get_home_url().$parentOther_url:esc_url( get_category_link( $parent_value->term_id ) );
    // print_r($parent_url);
    $parent_selected = ($self == $parent_url)?' selected':'';
    echo '<option value="'.$parent_url.'"' .$parent_selected. '>'.$parent_value->name.'一覧</option>';
    $parent_id = $parent_value->term_id;
    $child_terms = get_terms( 'category', array('parent' => $parent_id) );
    foreach($child_terms as $child_value){
      $childOther_url = '';
      // print_r($child_value);
      // $child_id = get_query_var('cat');
      $child_id = $child_value->term_id;
      if(get_field('category_url','category_'.$child_id)){
        $childOther_url = get_field('category_url','category_'.$child_id);
      }
      $child_url = ($childOther_url)?get_home_url().$childOther_url:esc_url( get_category_link( $child_value->term_id ) );
      $child_selected = ($self == $child_url)?' selected':'';
      echo '<option value="'.$child_url.'"'.$child_selected.'>'.$child_value->name.'</option>';
    }
    echo '</optgroup>';
  }
  echo '</select>';
}

//マニュアルページ作成
function original_page() {
  add_menu_page('マニュアル', 'マニュアル', 1, 'manual_page', 'manual_menu');
}
add_action('admin_menu', 'original_page');
function manual_menu() {include 'manual/manual.php';}

function add_sub_menu() {
    add_submenu_page('manual/manual_page', 'コラム', 'コラム', 1, 'manual_column', 'manual_submenu_column' );
    add_submenu_page('manual/manual_page', 'サロン', 'サロン', 1, 'manual_salon', 'manual_submenu_salon' );
    add_submenu_page('manual/manual_page', 'リダイレクト', 'リダイレクト', 1, 'manual_redirect', 'manual_submenu_redirect' );
}
add_action( 'admin_menu', 'add_sub_menu' );

function manual_submenu_column() {include 'manual/manual_column.php';}
function manual_submenu_redirect() {include 'manual/manual_redirect.php';}
function manual_submenu_salon() {include 'manual/manual_salon.php';}


/*---------------------------------------------------------------------
AMP設定
-----------------------------------------------------------------------*/

//カスタム投稿タイプ専用のテンプレート適用 ?ampでアクセス
// function custom_post_template( $file, $type, $post ) {
// 	if ( $type === 'single' && $post->post_type === 'salon' ) {
// 		$file = TEMPLATEPATH . '/amp/single-salon.php';
// 	}elseif ( $type === 'page' ) {

// 	}
// 	return $file;
// }
// add_filter( 'amp_post_template_file', 'custom_post_template', 10, 3 );

// function custom_template_include( $template ) {
//   if ( is_home() && is_amp_endpoint() ) {
//     $template = TEMPLATEPATH . '/amp/index.php';
//   }

//   return $template;
// }
// add_filter( 'template_include', 'custom_template_include', 10 );


//コンテンツのHTML文字列からimg要素をamp-img要素に変換
function convertImgToAmpImg($the_content){
    // PHPのパスを解決(相対パスだとライブラリを読み込めないため)
    require_once(dirname(__FILE__) . "/libs/phpQuery-onefile.php");

    // 仮想DOMを構築（phpQueryで走査するため）
    $html = <<<HTML
<html>
<body>{$the_content}</body>
</html>
HTML;

    // DOMを構築
    $dom = phpQuery::newDocument($html);

    // img要素を探し出して、繰り返す
    foreach ($dom->find("img") as $img) {
        // 参照を取る
        $pqImg = pq($img);

        // 属性値をコピーする
        $obj["src"] = $pqImg->attr("src");
        $obj["width"] = $pqImg->attr("width");
        $obj["height"] = $pqImg->attr("height");
        $obj["srcset"] = $pqImg->attr("srcset");
        $obj["alt"] = $pqImg->attr("alt");
        $obj["class"] = $pqImg->attr("class");
        // sizes属性は表示崩れの可能性があるのでコピーしない

        // src 属性がなければ変換しない
        if (empty($obj["src"])) {
            continue;
        }

        ini_set('error_reporting', E_ALL);
        //日本語ドメインNG
        // $obj["src"] = str_replace('https://脱毛診断メーカー.com', 'https://xn--lckwf7cb5558dg0hnt1bzdp.com', $obj["src"]);
        // print_r($obj["src"]);
        $imagesize = getimagesize($obj["src"]);
        // print_r($imagesize);
        // width と height がなければオリジナルサイズを取得
        if (empty($obj["width"]) || empty($obj["height"])){
            $obj["width"] = $imagesize[0];
            $obj["height"] = $imagesize[1];
            //imagesize取得できなければ強制
            if(empty($imagesize)){
              $obj["width"] = 640;
              $obj["height"] = 480;
            }
        }

        // 属性をコピーする
        $attrStr = [];
        foreach ($obj as $key => $value) {
            if (!empty($value)) {
                $attrStr[] = "$key=\"$value\"";
            }
        }

        // w:375pxより大きいものはlayout属性を追加する（レスポンシブに）
        if($obj["width"] > 375){
        	$attrStr[] = 'layout="responsive"';
        }

        // img要素をamp-img要素に置き換える
        // コピーした属性値をくっつける
        $pqImg->replaceWith("<amp-img " . join(" ", $attrStr) . " />");
    }

    // contentの内容を返す
    return $dom->find("body")->html();
}


//twitterカードのAMP対応
function embed_amp( $content, $url ) {
  preg_match( '/twitter.com/', $content, $matche );
  $urlArray = explode('/', $url);
  $tweetid = end($urlArray);
  if( $matche ) {
    if( is_amp() ) {
        return '<amp-twitter width=486 height=657 layout="responsive" data-tweetid="' . $tweetid . '" data-cards="hidden"></amp-twitter>';
    }else{
      return $content;
    }
  }
}
add_filter( 'embed_oembed_html', 'embed_amp', 10, 2 );

//AMP用にコンテンツを変換する
function convert_content_to_amp_sample($the_content){
  if( is_amp() ) {
    // iframeをamp-iframeに置換する
    $pattern = '/<iframe/i';
    $append = '<amp-iframe layout="responsive" sandbox="allow-scripts allow-same-origin"';
    $the_content = preg_replace($pattern, $append, $the_content);

    $pattern = 'type="text/html"';
    $the_content = str_ireplace($pattern, '', $the_content);

    $pattern = '/<\/iframe>/i';
    $append = '</amp-iframe>';
    $the_content = preg_replace($pattern, $append, $the_content);

    // Instagramをamp-instagramに置換する
    // $pattern = '/<blockquote class="instagram-media".+?"https:\/\/www.instagram.com\/p\/(.+?)\/".+?<\/blockquote>/is';
    // $append = '<p><amp-instagram layout="responsive" data-shortcode="$1" width="592" height="592" ></amp-instagram></p>';
    // $the_content = preg_replace($pattern, $append, $the_content);

    $pattern = '/<blockquote class="instagram-media".+?"https:\/\/www.instagram.com\/p\/(.+?)\/.+?<\/blockquote>/is';
    $append = '<p><amp-instagram layout="responsive" data-shortcode="$1" width="592" height="592"></amp-instagram></p>';
    $the_content = preg_replace($pattern, $append, $the_content);

    $pattern = '<script async src="//www.instagram.com/embed.js"></script>';
    $the_content = str_replace($pattern, '', $the_content);


    return $the_content;
  }else{
    return $content;
  }
}



//「logo」フィールドの値は必須です。対応
add_filter( 'amp_post_template_metadata', 'amp_set_site_logo', 10, 2);
function amp_set_site_logo( $metadata, $post ) {
    $metadata['publisher']['logo'] = array(
        '@type' => 'ImageObject',
        'url' => 'https://datumow.com/assets/images/logo.png',
        'height' => 60,
        'width' => 222
        );
    return $metadata;
}



function is_amp(){
	$is_amp = false;
    if(function_exists('is_amp_endpoint') && is_amp_endpoint()) {
        $is_amp = true;
    }
    return $is_amp;
}




//コンテンツのHTML文字列からimg要素をカスタム 遅延読み込み（echo.js）対応
function customImg($the_content){
    // PHPのパスを解決(相対パスだとライブラリを読み込めないため)
    require_once(dirname(__FILE__) . "/libs/phpQuery-onefile.php");

    // 仮想DOMを構築（phpQueryで走査するため）
    $html = <<<HTML
<html>
<body>{$the_content}</body>
</html>
HTML;

    // DOMを構築
    $dom = phpQuery::newDocument($html);

    // img要素を探し出して、繰り返す
    foreach ($dom->find("img") as $img) {
        // 参照を取る
        $pqImg = pq($img);

        // 属性値をコピーする
        $obj["src"] = $pqImg->attr("src");
        $obj["width"] = $pqImg->attr("width");
        $obj["height"] = $pqImg->attr("height");
        $obj["srcset"] = $pqImg->attr("srcset");
        $obj["alt"] = $pqImg->attr("alt");
        $obj["class"] = $pqImg->attr("class") . ' lazy';
        // sizes属性は表示崩れの可能性があるのでコピーしない

        // src 属性がなければ変換しない
        if (empty($obj["src"])) {
            continue;
        }

        ini_set('error_reporting', E_ALL);
        //日本語ドメインNG
        // $obj["src"] = str_replace('https://脱毛診断メーカー.com', 'https://xn--lckwf7cb5558dg0hnt1bzdp.com', $obj["src"]);
        // print_r($obj["src"]);

        // 属性をコピーする
        $attrStr = [];
        // $attrStr[] = 'data-echo="' . $obj["src"]. '"';
        $attrStr[] = 'data-normal="' . $obj["src"]. '"';
        if($obj["srcset"]){
          $attrStr[] = 'data-srcset="' . $obj["srcset"]. '"';
        }
        foreach ($obj as $key => $value) {
            if (!empty($value)) {
              if($key == 'src'){
                $attrStr[] = "$key=\"/assets/images/dummy.gif\"";
              }elseif($key == 'srcset'){
                $attrStr[] = "$key=\"/assets/images/dummy.gif\"";
              }else{
                $attrStr[] = "$key=\"$value\"";
              }
            }
        }


        // コピーした属性値をくっつける
        $pqImg->replaceWith("<img " . join(" ", $attrStr) . " />");
    }

    // contentの内容を返す
    return $dom->find("body")->html();
}

?>
