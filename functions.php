<?php
/**
 * nkk functions and definitions
 *
 * @package nkk
 */

if ( ! function_exists( 'write_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function write_setup() {

	/**
	 * Set the content width based on the theme's design and stylesheet.
	 */
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 700;
	}

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Write, use a find and replace
	 * to change 'write' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'write', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 700, 0, false );
	add_image_size( 'write-post-thumbnail-large', 1035, 500, true );
	add_image_size( 'write-post-thumbnail-medium', 482, 300, true );

	// This theme uses wp_nav_menu() in two location.
	register_nav_menus( array(
    // 'nav-sp' => 'スマホナビ',
	) );
	add_theme_support('menus');

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video'
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'header-text' => array( 'site-title', 'site-description' ),
	) );

	// This theme styles the visual editor to resemble the theme style.
	add_theme_support( 'editor-styles' );
	add_editor_style( array( 'css/editor-style.css' ) );
}
endif; // write_setup
add_action( 'after_setup_theme', 'write_setup' );

/**
 * Enqueue scripts and styles.
 */
function get_filemtime($filename){
	$filemtime = @filemtime($filename);
	if($filemtime){
		return date_i18n('YmdHis', $filemtime);
	}else{
		return '1.0.0';
	}
}
function nkk_scripts() {
	wp_deregister_script('jquery-core');
	wp_enqueue_script('jquery-core', "https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js", array(),false,false);
	wp_enqueue_script('script-slick', "https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js", array(),false,false);

	wp_enqueue_style( 'reset', get_template_directory_uri() . '/css/reset.css', array() );
	wp_enqueue_style( 'slick-style', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array() );
	wp_enqueue_style( 'nkk-style', get_stylesheet_uri(), array(), get_filemtime(get_template_directory()."/style.css") );

	if(is_home() || is_front_page()){

		wp_enqueue_style( 'page-top-style', get_template_directory_uri() . '/css/index.css', array(), get_filemtime(get_template_directory()."/css/top.css") );

	}elseif(is_single() || is_archive() || is_category() || is_page() || is_search()){

		if(is_page_template("")) {
		}else{
			wp_enqueue_style( 'post-style', get_template_directory_uri() . '/css/post.css', array(), get_filemtime(get_template_directory()."/css/post.css") );
		}

		if(is_archive() || is_category()){
			wp_enqueue_style( 'post-style', get_template_directory_uri() . '/css/post.css', array(), get_filemtime(get_template_directory()."/css/post.css") );
			// wp_enqueue_style( 'archive-style', get_template_directory_uri() . '/css/archive.css', array(), get_filemtime(get_template_directory()."/css/archive.css") );
		}

		if(is_page()){
			$post_obj = get_queried_object();
			$slug = $post_obj->post_name;

			wp_enqueue_style( "page-${slug}-style", get_template_directory_uri() . "/css/${slug}.css", array(), get_filemtime(get_template_directory()."/css/${slug}.css") );

			global $template;
			$template_name = basename($template);
			$template_name = str_replace('page-', '', $template_name);
			$template_name = str_replace('.php', '', $template_name);
			if($slug !== $template_name && $template_name != 'page'){
				wp_enqueue_style( "template-${template_name}-style", get_template_directory_uri() . "/css/${template_name}.css", array(), '1.0.0' );
			}
		}
	}

}
add_action( 'wp_enqueue_scripts', 'nkk_scripts', 1 );

function nkk_footer_script() {
	// wp_enqueue_script('lazyload-script', get_template_directory_uri().'/js/lazyload.min.js', array());
	// wp_enqueue_script('cookie-script', get_template_directory_uri().'/js/jquery.cookie.min.js', array());
	wp_enqueue_script('nkk-script', get_template_directory_uri().'/js/script.js', array(), get_filemtime(get_template_directory()."/js/script.js"));
}
add_action('wp_footer', 'nkk_footer_script');

add_action('admin_enqueue_scripts', function(){
	// wp_enqueue_style( 'nkk-admin', get_stylesheet_directory_uri().'/css/admin.css' );
	// wp_enqueue_script('nkk-admin', get_stylesheet_directory_uri().'/js/admin.js', array('jquery'));
});

add_action( 'enqueue_block_editor_assets', function(){
	wp_enqueue_script( 'block-script', get_stylesheet_directory_uri().'/js/editor-block.js',array("wp-blocks"), "", true);
});
add_action( 'enqueue_block_assets', function(){
	if(is_admin()){
		wp_enqueue_style( 'block-style', get_stylesheet_directory_uri().'/css/editor-block.css' );
	}
});

/**
 * Add custom classes to the body.
 */
function write_body_classes( $classes ) {

	// $classes[] = 'header-side';
	// $classes[] = 'footer-side';

	global $post;
	if(is_page()){
		$post_obj = get_queried_object();
		$slug = $post_obj->post_name;
		$classes[] = 'page-'.$slug;
	}

	return $classes;
}
add_filter( 'body_class', 'write_body_classes' );

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function write_save_meta_box_data( $post_id ) {

	/*
	 * We need to verify this came from our screen and with proper authorization,
	 * because the save_post action can be triggered at other times.
	 */

	// Check if our nonce is set.
	if ( ! isset( $_POST['write_meta_box_nonce'] ) ) {
		return;
	}

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['write_meta_box_nonce'], 'write_save_meta_box_data' ) ) {
		return;
	}

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// Check the user's permissions.
	if ( ! current_user_can( 'edit_page', $post_id ) ) {
		return;
	}

	/* OK, it's safe for us to save the data now. */

	// Sanitize user input.
	$my_data = write_sanitize_checkbox( $_POST['write_hide_page_title'] );

	// Update the meta field in the database.
	update_post_meta( $post_id, 'write_hide_page_title', $my_data );
}
add_action( 'save_post', 'write_save_meta_box_data' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom widgets for this theme.
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Gutenbergの不要なブロックを非表示にする
 */
function custom_allowed_block_types( $allowed_block_types ) {
  $allowed_block_types = array(
    'core/paragraph', // 段落
    'core/heading', // 見出し
    'core/list', // リスト
		'core/list-item',
		// 'core/quote', //引用
		// 'core/code', //コード
    'core/column',
		// 'core/freeform', //クラシック
		'core/missing', //非サポート
		// 'core/preformatted', //整形済みテキスト
		// 'core/pullquote', //プルクオート
		// 'core/table', //テーブル

    'core/image', // 画像
		'core/gallery', // ギャラリー
    // 'core/audio', // 音声
		// 'core/cover', //カバー
    'core/file', // ファイル
		// 'core/media-text', //メディアとテキスト
    'core/video', // 動画

		'core/button', //ボタン
		'core/buttons', //ボタン
		'core/columns', //カラム
		// 'core/group', //グループ
		// 'core/more', //続き
		// 'core/nextpage', //ページ区切り
		'core/separator', //区切り
		// 'core/spacer', //スペーサー
		// 'core/text-columns', //テキストカラム (非推奨)
		// 'core/site-logo', //サイトロゴ
		// 'core/site-tagline', //サイトのキャッチフレーズ
		// 'core/site-title', //サイトのタイトル
		// 'core/post-template', //投稿テンプレート
		// 'core/query-title', //クエリータイトル
		// 'core/query-pagination', //クエリーのページ送り
		// 'core/query-pagination-next', //次のページネーションのクエリー
		// 'core/query-pagination-numbers', //ページネーション数のクエリー
		// 'core/query-pagination-previous', //前のページネーションのクエリー
		// 'core/post-terms', //投稿タグ

    // 'core/shortcode', //ショートコード
		// 'core/archives', //アーカイブ
		// 'core/calendar', //カレンダー
		// 'core/categories', //カテゴリー
		// 'core/html', //カスタム HTML
		// 'core/latest-comments', //最新のコメント
		// 'core/latest-posts', //最新の投稿
		// 'core/page-list', //固定ページリスト
		// 'core/rss', //RSS
		// 'core/search', //検索
		// 'core/social-links', //ソーシャルアイコン
		// 'core/social-link', //ソーシャルアイコン
		// 'core/tag-cloud', //タグクラウド

		// 'core/query', //クエリーループ
		// 'core/post-title', //投稿タイトル
		// 'core/post-content', //投稿コンテンツ
		// 'core/post-date', //投稿日
		// 'core/post-excerpt', //投稿の抜粋
		// 'core/post-featured-image', //投稿のアイキャッチ画像
		// 'core/loginout', //ログイン / ログアウト

    'core/block', // 再利用ブロック
    'flexible-table-block/table',
    'core/embed',               // 埋め込み
    // 'core-embed/twitter',       // Twitter
    'core-embed/youtube',       // YouTube
    // 'core-embed/facebook',      // Facebook
    // 'core-embed/instagram',     // Instagram
  );
  return $allowed_block_types;
}
add_filter( 'allowed_block_types', 'custom_allowed_block_types' );

/**
 * 前の記事・次の記事のリンクにclassを付与する
 */
// function add_prev_post_link_class($output) {
//   return str_replace('<a href=', '<a class="button -prev --h-opacity" href=', $output); //前の記事リンク
// }
// add_filter( 'previous_post_link', 'add_prev_post_link_class' );
// function add_next_post_link_class($output) {
//   return str_replace('<a href=', '<a class="button -next --h-opacity" href=', $output); //次の記事リンク
// }
// add_filter( 'next_post_link', 'add_next_post_link_class' );

/**
 * 記事一覧の本文抜粋の文字数
 */
function custom_excerpt_length( $length ) {
	return 300;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
remove_filter('the_excerpt', 'wpautop'); // 本文抜粋のpタグ削除

/**
 * the_content　ファイルリンク
 */
function disp_filesize($content) {
	if(!is_single()) return $content; 
	global $post;
	$pattern = "/<a(.*?)href=('|\")([\w\/:%#\$&\?\(\)~\.=\+\-]+?).(pdf|doc|docx|xls|xlsx|rtf)('|\")(.*?)>(.*?)<\/a>/";
// 	echo preg_replace_callback(
	return preg_replace_callback(
			$pattern,
			function ( $matches ) {
					$fileURL = $matches[3].'.'.$matches[4];
					$filePath = str_replace( home_url('/'),ABSPATH,$fileURL );
					$filePath = str_replace( "wp/wp","wp",$filePath );
					$pubSize = size_format( filesize( $filePath ) );
					$date = date('最新：Y年m月d日', filemtime($filePath) + 3600 * get_option('gmt_offset'));
					return '<a'.$matches[1].'href='.$matches[2].$matches[3].'.'.$matches[4].$matches[5].$matches[6].'><span class="txt">'.$matches[7].'</span><span class="size">('.$pubSize.')</span><span class="date">'.$date.'</span></a>';
			},
			$content
	);
}
add_filter('the_content', 'disp_filesize');

/**
 * 記事の最初の画像を取得
 */
function catch_that_image() {
	global $post, $posts;
	$first_img = '';
	$content = $post->post_content;
	$start = mb_strpos($content,'src="') + 5;
	if($start <= 1) return false;
	$end = mb_strpos($content,'"', $start);
	$first_img = mb_substr($content, $start, $end-$start, 'UTF-8');
	if(empty($first_img)) return false;
	return $first_img;
}

/**
 * wp_nav_menuのaにclass追加
 */
function add_additional_class_on_a($classes, $item, $args){
  if (isset($args->add_a_class)) {
    $classes['class'] = $args->add_a_class;
  }
  return $classes;
}
add_filter('nav_menu_link_attributes', 'add_additional_class_on_a', 1, 3);

/**
 * カスタム投稿タイプ追加
 */
function create_post_type() {
	register_post_type( 'service', [
		'labels' => [
			'name' => '取扱業務',
		],
		'public' => true,
		'has_archive' => false,
		'menu_position' => 5,
		'show_in_rest' => true,
	]);
	remove_post_type_support( 'service', 'editor' );
	register_taxonomy(
		'service-cat',
		'service',
		array(
			'hierarchical'          => false,
			'update_count_callback' => '_update_post_term_count',
			'label'                 => 'カテゴリー',
			'public'                => true,
			'has_archive'						=> false,
			'show_in_rest'          => true,
			'rewrite' => array('slug'=>'', 'with_front'=>false,),
		),
	);
	register_post_type( 'lawyer', [
		'labels' => [
			'name' => '弁護士紹介',
		],
		'public' => true,
		'has_archive' => true,
		'menu_position' => 5,
		'show_in_rest' => true,
	]);
	remove_post_type_support( 'faq', 'editor' );

	global $wp_post_types;
  $name = '新着情報';
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
}
add_action( 'init', 'create_post_type' );

add_filter('works-cat_rewrite_rules', '__return_empty_array');
add_filter('faq_rewrite_rules', '__return_empty_array');

function admin_menu_change_label() {
  global $menu;
  global $submenu;
  $name = '新着情報';
  $menu[5][0] = $name;
  $submenu['edit.php'][5][0] = $name.'一覧';
  $submenu['edit.php'][10][0] = '新規'.$name.'投稿';
}
add_action( 'admin_menu', 'admin_menu_change_label' );

/**
 * 投稿アーカイブ設定
 */
function post_has_archive( $args, $post_type ) {
	if ( 'post' == $post_type ) {
		$args['rewrite'] = true;
		$args['has_archive'] = 'information';
	}
	return $args;
}
add_filter( 'register_post_type_args', 'post_has_archive', 10, 2 );

/**
* スラッグの日本語禁止
*/
function auto_post_slug( $slug, $post_ID, $post_status, $post_type ) {
	if ( preg_match( '/(%[0-9a-f]{2})+/', $slug ) ) {
	$slug = utf8_uri_encode( $post_type ) . '-' . $post_ID;
	}
	return $slug;
}
add_filter( 'wp_unique_post_slug', 'auto_post_slug', 10, 4 );

/**
 * パーマリンクカスタム
 */
// function custom_post_type_link( $link, $post ){
//   if ( $post->post_type === 'works' ) {
// 		$term = "";
// 		$post_terms = get_the_terms($post->ID, 'works-cat');
// 		if(!empty($post_terms)){
// 			if(is_array($post_terms)) $post_terms = $post_terms[0];
// 			if($post_terms->slug) $term = $post_terms->slug;
// 		}
// 		return home_url( "/${term}/#" . $post->post_name );
//   } elseif ( $post->post_type === 'faq' ) {
// 		return home_url( "/faq/#" . $post->post_name );
//   } else {
//     return $link;
//   }
// }
// add_filter( 'post_type_link', 'custom_post_type_link', 1, 2 );

/**
 * 管理画面　記事一覧のカスタマイズ
 */
function custom_posts_columns( $column ){
	global $post_type;
	if( $post_type === 'post' ){
		unset($column['slug'], $column['tags'], $column['comments']);
		$column = array(
			'cb' => '<input type="checkbox" />',
			'title' => 'タイトル',
			'categories' => 'カテゴリー',
			'date' => '日付',
			'author' => '作成者',
		);
	}elseif( $post_type === 'service' ){
		$column = array(
			'cb' => '<input type="checkbox" />',
			'title' => 'タイトル',
			'service-cat' => 'カテゴリー',
			'date' => '日付',
		);
	}
	return $column;
}
add_filter( 'manage_posts_columns', 'custom_posts_columns' );
function custom_pages_columns( $column ){
	unset($column['slug'], $column['categories'], $column['tags'], $column['comments']);
	$column = array(
		'cb' => '<input type="checkbox" />',
    'title' => 'タイトル',
    'date' => '日付',
  );
	return $column;
}
add_filter( 'manage_pages_columns', 'custom_pages_columns' );
function add_custom_column_service( $column_name, $id ){
	if( $column_name === 'service-cat' ) {
		$terms = get_the_term_list($id, "service-cat", "<div>", "</div><div>", "</div>");
		echo (!empty($terms)) ? $terms : "";
	}
}
add_action( 'manage_service_posts_custom_column', 'add_custom_column_service', 10, 2 );

// カスタム投稿の管理画面でカテゴリ（ターム）で絞り込み
function add_post_taxonomy_restrict_filter() {
	global $post_type;
	if( $post_type == 'service' ){
		$taxonomy = $post_type.'-cat';
		wp_dropdown_categories([
			'show_option_all' => 'カテゴリー一覧',
			'selected'        => get_query_var( $taxonomy ),
			'name'            => $taxonomy,
			'taxonomy'        => $taxonomy,
			'value_field'     => 'slug',
			'hierarchical'    => 1,
		]);
	}
}
add_action( 'restrict_manage_posts', 'add_post_taxonomy_restrict_filter' );

/*
	特定の固定ページ(リンク集)でエディタを無効化
*/
// add_filter('use_block_editor_for_post',function($use_block_editor,$post){
// 	if($post->post_type==='page'){
// 			if(in_array($post->post_name,['works', 'works_private'])){
// 					remove_post_type_support('page','editor');
// 					remove_post_type_support('page','custom-fields');
// 					return false;
// 			}
// 	}
// 	return $use_block_editor;
// },10,2);

/*
	親ページのスラッグ true or false
*/
function is_parent_slug($slug) {
	global $post;
	$post_data = $post;
	while($post_data->post_parent){
		$post_data = get_post($post_data->post_parent);
		if($post_data->post_name === $slug){
			return true;
		}
	}
}

/*
	ページ存在確認
*/
function get_page_url($pageSlug){
	$page = get_page_by_path($pageSlug);
	if(!$page || !$page->ID) return false;
	if(get_post_status($page->ID) == "publish"){
		return esc_url(get_permalink($page->ID));
	}else{
		return false;
	}
}

/*
	画像URL
*/
function img_url(){
	return get_template_directory_uri()."/img";
}

/*
	隠して出力
*/
function dump($content = ""){
	?><div style="display:none;"><?php var_dump($content); ?></div><?php
}
