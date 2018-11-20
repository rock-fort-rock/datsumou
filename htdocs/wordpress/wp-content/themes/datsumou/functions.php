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
  wp_enqueue_style( 'style', home_url().'/assets/css/style.css', array(), '1.7');

  //add_action( 'wp_enqueue_scripts', '' );した時点で同梱のjqueryが読み込まれるので削除　不要になった？
  // wp_deregister_script('jquery');

  // wp_deregister_script('window._se_plugin_version');
  // wp_enqueue_script('sakurawebfont', '//webfonts.sakura.ne.jp/js/sakura.js', array(), '', true );
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


//アイキャッチ有効化
add_theme_support('post-thumbnails');

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
    $restricted = array(__('投稿'),__('固定ページ'),__('コメント'),__('ツール'), __('設定'),  __('プロフィール'));
  }else{
    // $restricted = array();
    $restricted = array(__('投稿'),__('コメント'));
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


/**
custom post type
コラム
**/
add_action('init', 'cpt_column_init');
function cpt_column_init()
{
  $labels = array(
    'name' => _x('コラム', 'post type general name'),
    'singular_name' => _x('コラム', 'post type singular name'),
    'add_new' => _x('コラム追加', 'column'),
    'add_new_item' => __('新規コラムを追加'),
    'edit_item' => __('コラムを編集'),
    'new_item' => __('新しいコラム'),
    'view_item' => __('コラムを見る'),
    'search_items' => __('コラムを探す'),
    'not_found' =>  __('コラムはありません'),
    'not_found_in_trash' => __('ゴミ箱にコラムはありません'),
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'show_ui' => true,
    'query_var' => true,
    'capability_type' => 'post',
    'has_archive' => true,
    'rewrite' => array('slug' => 'column', 'with_front' => false, 'pages' => true, 'feeds' => false),
    'hierarchical' => false,
    'menu_position' => 4,
    'supports' => array('title','editor','thumbnail')
  );
  register_post_type('column', $args);

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
    'rewrite' => array('slug' => 'column/column_category', 'with_front' => false)
  );
  register_taxonomy('column_category', 'column', $args);
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


function setOption(){
  if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
      'page_title'  => 'バナー設定',
      'menu_title'  => 'バナー設定',
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
      'position'  => 7,
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
    if(is_post_type_archive('column')){
      $wp_query -> query_vars['posts_per_page'] = 6;
    }elseif(is_tax('column_category')){
      $wp_query -> query_vars['posts_per_page'] = 6;
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

  $code .= '<div class="pointList">';
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


//マニュアルページ作成
function original_page() {
  add_menu_page('マニュアル', 'マニュアル', 1, 'manual_page', 'manual_menu');
}
add_action('admin_menu', 'original_page');
function manual_menu() {include 'manual.php';}

function add_sub_menu() {
    add_submenu_page('manual_page', 'コラム', 'コラム', 1, 'manual_column', 'manual_submenu_column' );
    add_submenu_page('manual_page', 'サロン', 'サロン', 1, 'manual_salon', 'manual_submenu_salon' );
    add_submenu_page('manual_page', 'リダイレクト', 'リダイレクト', 1, 'manual_redirect', 'manual_submenu_redirect' );
}
add_action( 'admin_menu', 'add_sub_menu' );

function manual_submenu_column() {include 'manual_column.php';}
function manual_submenu_redirect() {include 'manual_redirect.php';}
function manual_submenu_salon() {include 'manual_salon.php';}


//診断結果のサロン情報部分
function result_SalonInfo($slug, $type){
  $arg = array('post_type'=>'salon','name'=>$slug);
  $salon = get_posts($arg);
  $id = $salon[0]->ID;
  $title = $salon[0]->post_title;
  $result = get_field('salon_chartResult', $id);
  $logoObj = $result['salon_chartResult_logo'];
  $logo = ($logoObj)?$logoObj['sizes']['medium']:'/assets/images/logo.png';
  $comment = $result['salon_chartResult_comment'];
  $officialsite = get_field('salon_officialsite', $id);
  $detail = get_the_permalink($id);
  $link = '/ranking/'.$type. '/';

  $return = '<div class="salonInfo">';
  $return .= '<div class="resultSalonHeader">';
  $return .= '<div class="logo"><img src="'.$logo.'"></div>';
  $return .= '<div class="salonName"><span>'.$title.'</span>がおすすめ！</div>';
  $return .= '</div>';
  $return .= '<div class="comment">'.$comment.'</div>';
  $return .= '<div class="buttons">';
  $return .= '<ul>';
  $return .= '<li class="official"><a href="'.$officialsite.'" target="_blank"><img src="/assets/images/btn_officialsite.png" alt="公式サイトを見る"></a></li>';
  $return .= '<li class="detail"><a href="'.$detail.'"><img src="/assets/images/btn_detail.png" alt="詳細を見る"></a></li>';
  $return .= '</ul>';
  $return .= '<div class="moreRanking"><a href="'.$link.'"><span>ランキングをみる</span></a></div>';
  $return .= '</div>';
  $return .= '</div>';

  return $return;
}


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


//「logo」フィールドの値は必須です。対応
add_filter( 'amp_post_template_metadata', 'amp_set_site_logo', 10, 2);
function amp_set_site_logo( $metadata, $post ) {
    $metadata['publisher']['logo'] = array(
        '@type' => 'ImageObject',
        'url' => 'https://脱毛診断メーカー.com/assets/images/logo.png',
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


?>
