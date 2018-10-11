<?php
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

//全DNSプリフェッチ削除
function remove_dns_prefetch( $hints, $relation_type ) {
    if ( 'dns-prefetch' === $relation_type ) {
        return array_diff( wp_dependencies_unique_hosts(), $hints );
    }
    return $hints;
}
add_filter( 'wp_resource_hints', 'remove_dns_prefetch', 10, 2 );
// add_filter( 'emoji_svg_url', '__return_false' );//絵文字だけの

function my_scripts() {
  wp_enqueue_style( 'style', home_url().'/assets/css/style.css', array(), '1.5');

  //add_action( 'wp_enqueue_scripts', '' );した時点で同梱のjqueryが読み込まれるので削除　不要になった？
  // wp_deregister_script('jquery');

  // wp_deregister_script('window._se_plugin_version');

  wp_enqueue_script('script', home_url().'/assets/js/bundle.js', array(), '1.5', true );

  // if(is_page('contact')){
  //   //mw wp formがjqueryを読み込み済み
  //   wp_enqueue_script( 'ajaxzip3-script', 'https://ajaxzip3.github.io/ajaxzip3.js', array( 'jquery' ), null, true );
  // }
}
add_action( 'wp_enqueue_scripts', 'my_scripts' );


//フッターでCSSを読み込む場合
// function prefix_add_footer_styles() {
//     wp_enqueue_style('googlefonts', 'https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700', array(), null);
// };
// add_action( 'get_footer', 'prefix_add_footer_styles' );


//JavaScript を非同期にする
// function add_async_to_script( $tag, $handle ) {
//      return str_replace( ' src', ' async="async" src', $tag );
// }
// add_filter( 'script_loader_tag', 'add_async_to_script', 10, 2 );



// 管理者以外wordpress updateを非表示
if (!current_user_can('administrator')) {
	add_filter('pre_site_transient_update_core', create_function('$a', 'return null;'));
}

// 管理者以外不必要なメニューを非表示
if (!current_user_can('administrator')){
	function remove_menus(){
		global $menu;
    // var_dump($menu);
    unset($menu[26]); // MW WP Form
		$restricted = array(__('固定ページ'),__('コメント'),__('ツール'), __('設定'),  __('プロフィール'));
		end ($menu);
		while (prev($menu)){
			$value = explode(' ',$menu[key($menu)][0]);
			if (in_array($value[0] != NULL?$value[0]:"" , $restricted)){
				unset($menu[key($menu)]);
			}
		}
	}
	add_action('admin_menu', 'remove_menus');
}


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
    'supports' => array('title','editor','thumbnail')
  );
  register_post_type('salon', $args);
}



if( function_exists('acf_add_options_page') ) {
  acf_add_options_page(array(
    'page_title'  => 'オプション設定',
    'menu_title'  => 'オプション設定',
    'menu_slug'   => 'theme-options',
    'capability'  => 'edit_posts',
    'parent_slug' => '',
    'position'  => 7,
    'redirect'  => false,
  ));

  acf_add_options_page(array(
    'page_title'  => 'サロンランキング',
    'menu_title'  => 'サロンランキング',
    'menu_slug'   => 'theme-options-ranking',
    'capability'  => 'edit_posts',
    'parent_slug' => '',
    'position'  => 6,
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



// 表示件数set
add_filter('pre_get_posts', 'custom_posts_query');
function custom_posts_query() {
  global $wp_query;
  if(!is_admin()){
    if(is_post_type_archive('news')){
      $wp_query -> query_vars['posts_per_page'] = -1;
    }else{
      $wp_query -> query_vars['posts_per_page'] = -1;
    }
  }
}





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




//ニュース本文へtextButton追加のショートコード
function text_button($array) {
  extract($array);
  $code = '<a href="'.$link.'" class="textButton">'.$text.'</a>';
  return $code;

  // $ebis = ' class="ebis_button_trigger" data-cid="n7KN2LH2" data-pid="'.$id.'" data-o1id="'.$id.'" data-o2id="" data-o3id="" data-o4id="" data-o5id="" data-m1id="" data-a1id=""';
  // $code = '<a href="'. $url . '" target="_blank" onclick="ga(\'send\', \'event\', \'entry\', \'sportsentry\', \'entry-page\');"' . $ebis . '>';
  // $code .= '<img src="/series/images/sportsentry.jpg">';
  // $code .= '</a>';
  return $code;
}
add_shortcode('button', 'text_button');


//マニュアルページ作成
// function original_page() {
// add_menu_page('マニュアル', 'マニュアル', 1, 'original_page', 'original_menu');
// }
// add_action('admin_menu', 'original_page');

// function original_menu() {include 'manual.php';}
?>
