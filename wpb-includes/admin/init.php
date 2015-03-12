<?php

function load_admin_things() {
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
    wp_enqueue_style('thickbox');
}

add_action( 'admin_enqueue_scripts', 'load_admin_things' );

add_action('admin_menu', 'initial_setting_menu');

function initial_setting_menu() {
  add_menu_page('初期設定', '初期設定', 'manage_options', 'initial_setting_menu', 'banner_options_page', '', 1);
  add_action( 'admin_init', 'register_xeory_setting','admin-head');
}


function register_xeory_setting() {
  register_setting( 'wpb-initialize-group', 'blogname' );
  register_setting( 'wpb-initialize-group', 'blogdescription' );
  register_setting( 'wpb-initialize-group', 'meta_keywords' );
  register_setting( 'wpb-initialize-group', 'banner_url' );
  register_setting( 'wpb-initialize-group', 'banner_image' );
  register_setting( 'wpb-initialize-group', 'blog_public' );
  register_setting( 'wpb-initialize-group', 'permalink_structure' );



  //トップページのメタタグの設定
  //コアから取得

  //Googleツールの設定
  register_setting( 'wpb-initialize-group', 'analytics_tracking_id' );
  register_setting( 'wpb-initialize-group', 'google_publisher' );

  //Facebookとの連携
  register_setting( 'wpb-initialize-group', 'facebook_user_id' );
  register_setting( 'wpb-initialize-group', 'facebook_app_id' );
  register_setting( 'wpb-initialize-group', 'facebook_page_url' );
  register_setting( 'wpb-initialize-group', 'wpb_ogp_image' );

  //その他の設定
  register_setting( 'wpb-initialize-group', 'twitter_id' );

  //.htaccessを更新させる必要がある
  flush_rewrite_rules( true );
}

function banner_options_page() {
?>

<script type="text/javascript">

jQuery('document').ready(function(){
    jQuery('.media-upload').each(function(){
        var rel = jQuery(this).attr("rel");
        jQuery(this).click(function(){
            window.send_to_editor = function(html) {
                html = '<a>' + html + '</a>';
                imgurl = jQuery('img', html).attr('src');
                jQuery('#'+rel).val(imgurl);
                tb_remove();
            }   
            formfield = jQuery('#'+rel).attr('name');
            tb_show(null, 'media-upload.php?post_id=0&type=image&TB_iframe=true');
            return false;
        }); 
    }); 
});
</script>


  <div class="wrap">
    <h2>初期設定</h2>

    <form method="post" action="options.php" enctype="multipart/form-data" encoding="multipart/form-data">
      <?php
        
        settings_fields( 'wpb-initialize-group' );
        do_settings_sections( 'wpb-initialize-group' );
      ?>

<div class="metabox-holder">
<div id="toppage_meta_setting" class="postbox " >
<h3 class='hndle'><span>トップページのメタタグの設定</span></h3>
  <div class="inside">
    <div class="main">
      <p class="setting_description">ここではトップページのタイトルとメタタグの設定を行います。</p>

      <h4>トップページタイトル</h4>
      <p><input type="text" id="blogname" class="regular-text" name="blogname" value="<?php echo get_option('blogname'); ?>"></p>
      <p class="setting_description"><small>トップページのタイトルを入力して下さい。ここに入力した内容が検索エンジンにも表示されるようになります。<br>効果的なタイトルのつけ方を知りたい方は、『<a href="http://bazubu.com/what-is-best-for-wp-title-22931.html" target="_blank">WordPressのタイトルの付け方</a>』をご覧ください。</small></p>

      <h4>トップページの説明（メタディスクリプション）</h4>
      <textarea id="blogdescription" class="regular-text" name="blogdescription" rows="3" cols="60"><?php echo get_option('blogdescription'); ?></textarea>
      <p class="setting_description"><small>トップページの説明文を全角８０文字以内で入力してください。ここに入力した内容が検索エンジンのディスクリプション欄に表示されるようになります。具体的には、『<a href="" target="_blank">メタディスクリプションとは</a>をご覧ください。』</small></p>
      
      <h4>メタキーワード</h4>
      <input type="text" id="meta_keywords" class="regular-text" name="meta_keywords" value="<?php echo get_option('meta_keywords'); ?>">
      <p class="setting_description"><small>トップページで対策したいキーワードを入力して下さい。メタキーワードは現在SEOには影響力はありませんが、キーワードに対する理解を深めるためにも、メタキーワードは常に意識しておきましょう。</small></p>

    </div>
  </div>
</div>
</div>

<div class="metabox-holder">
<div id="google_tools" class="postbox " >
<h3 class='hndle'><span>Googleツールの設定</span></h3>
  <div class="inside">
    <div class="main">
      <p class="setting_description">Googleアナリティクス・Googleウェブマスターツールの設定を行います。サイトの効果計測やメンテナンスに必要なので必ず設定しましょう。設定の前に、それぞれのアカウントを取得しておきましょう。</p>

      <h4>Googleアナリティクスの設定</h4>
      <input type="text" name="analytics_tracking_id" id="analytics_tracking_id" class="cmb_textarea_code" value="<?php echo get_option('analytics_tracking_id'); ?>" placeholder="UA-00000000-0" />
      <p class="setting_description"><small>GoogleアナリティクスのトラッキングIDを入力して下さい。</small></p>

    </div>
  </div>
</div>
</div>

<div class="metabox-holder">
<div id="facebook_connection" class="postbox " >
<h3 class='hndle'><span>Facebookとの連携</span></h3>
  <div class="inside">
    <div class="main">
      <h4>FacebookユーザーIDの入力</h4>
      <input type="text" id="facebook_user_id" class="regular-text" name="facebook_user_id" value="<?php echo get_option('facebook_user_id'); ?>">
      <p class="setting_description"><small>FacebookのユーザーIDを入力してください。</small></p>

      <h4>FacebookアプリケーションIDの入力</h4>
      <input type="text" id="facebook_app_id" class="regular-text" name="facebook_app_id" value="<?php echo get_option('facebook_app_id'); ?>">
      <p class="setting_description"><small>FacebookのアプリケーションIDを入力して下さい。</small></p>

      <h4>Facebookページurl</h4>
      <input type="text" id="facebook_page_url" class="regular-text" name="facebook_page_url" value="<?php echo get_option('facebook_page_url'); ?>">


      <h4>デフォルト画像の設定</h4>
      <input type="text" id="wpb_ogp_image" name="wpb_ogp_image" class="regular-text" value="<?php echo get_option('wpb_ogp_image');?>" /><a class="media-upload" href="JavaScript:void(0);" rel="wpb_ogp_image"><input class="cmb_upload_button button" type="button" value="画像をアップロードする" /></a>
      <p class="setting_description"><small>サイトがシェアされた時に表示させたい画像を選択してアップロードボタンを押してください。サイトのトップページや、その他アイキャッチ画像が設定されていないページがシェアされた時には、ここのアップロードした画像が、Facebook上で表示されるようになります。画像のサイズは、1200 px x 630 pxが最も綺麗に表示されます。</small></p>

    </div>
  </div>
</div>
</div>

<div class="metabox-holder">
<div id="google_connection" class="postbox " >
<h3 class='hndle'><span>Googleとの連携</span></h3>
  <div class="inside">
    <div class="main">
      <h4>パブリッシャー</h4>
      <input type="text" id="google_publisher" class="regular-text" name="google_publisher" value="<?php echo get_option('google_publisher'); ?>">
         <p class="setting_description"><small>Google+にログインし左上にあるメニューを[ホーム → ページ]の順にクリックします。<br>
          該当するページをクリックして、その際にアドレスバーに表示されている下記の数字部分をご入力ください。<br>
          https://plus.google.com/b/000000000000000000000/dashboard/overview/</small></p>
    </div>
  </div>
</div>
</div>

<div class="metabox-holder">
<div id="twitter_connection" class="postbox " >
<h3 class='hndle'><span>Twitterとの連携</span></h3>
  <div class="inside">
    <div class="main">
    <h4>twitter ID</h4>
      <input type="text" id="twitter_id" class="regular-text" name="twitter_id" value="<?php echo get_option('twitter_id'); ?>">
        <p class="setting_description"><small>ヘッダー部と記事下のソーシャルボタンにTwitterのボタンが追加されます。<br>ご自身のtwitterページにアクセスし、アドレスバーに表示されている下記のアンダーライン部分のみご入力ください。<br>https://twitter.com/<u>xxxxxxx</u><br>
      また、TwitterCardにも利用されます。<br>
      TwitterCardについて詳しく知りたい方は<a href="https://dev.twitter.com/ja/cards/overview" target="_blank">公式ドキュメント(日本語）</a>をご覧ください。
      </small></p>

    </div>
  </div>
</div>
</div>

<div class="metabox-holder">
<div id="others" class="postbox " >
<h3 class='hndle'><span>その他の設定</span></h3>
  <div class="inside">
    <div class="main">


<h4>検索エンジンでの表示</h4>
<label for="blog_public"><input name="blog_public" type="checkbox" id="blog_public" value="0" <?php checked(get_option('blog_public'), 0);?> />
  検索エンジンがサイトをインデックスしないようにする</label>


<script type="text/javascript">
//<![CDATA[
jQuery(document).ready(function() {
  jQuery('.permalink-structure input:radio').change(function() {
    if ( 'custom' == this.value )
      return;
    jQuery('#permalink_structure').val( this.value );
  });
  jQuery('#permalink_structure').focus(function() {
    jQuery("#custom_selection").attr('checked', 'checked');
  });
});
//]]>
</script>

<?php

$permalink_structure = get_option('permalink_structure');
$prefix = $blog_prefix = '';
$structures = array(
  0 => '',
  1 => $prefix . '/%year%/%monthnum%/%day%/%postname%/',
  2 => $prefix . '/%year%/%monthnum%/%postname%/',
  3 => $prefix . '/' . _x( 'archives', 'sample permalink base' ) . '/%post_id%',
  4 => $prefix . '/%postname%/',
);

?>

      <h4><?php _e('Common Settings'); ?></h4>
      <table class="form-table permalink-structure">
        <tr>
          <th><label><input name="selection" type="radio" value="" <?php checked('', $permalink_structure); ?> /> <?php _e('Default'); ?></label></th>
          <td><code><?php echo home_url(); ?>/?p=123</code></td>
        </tr>
        <tr>
          <th><label><input name="selection" type="radio" value="<?php echo esc_attr($structures[1]); ?>" <?php checked($structures[1], $permalink_structure); ?> /> <?php _e('Day and name'); ?></label></th>
          <td><code><?php echo home_url() . $blog_prefix . $prefix . '/' . date('Y') . '/' . date('m') . '/' . date('d') . '/' . _x( 'sample-post', 'sample permalink structure' ) . '/'; ?></code></td>
        </tr>
        <tr>
          <th><label><input name="selection" type="radio" value="<?php echo esc_attr($structures[2]); ?>" <?php checked($structures[2], $permalink_structure); ?> /> <?php _e('Month and name'); ?></label></th>
          <td><code><?php echo home_url() . $blog_prefix . $prefix . '/' . date('Y') . '/' . date('m') . '/' . _x( 'sample-post', 'sample permalink structure' ) . '/'; ?></code></td>
        </tr>
        <tr>
          <th><label><input name="selection" type="radio" value="<?php echo esc_attr($structures[3]); ?>" <?php checked($structures[3], $permalink_structure); ?> /> <?php _e('Numeric'); ?></label></th>
          <td><code><?php echo home_url() . $blog_prefix . $prefix . '/' . _x( 'archives', 'sample permalink base' ) . '/123'; ?></code></td>
        </tr>
        <tr>
          <th><label><input name="selection" type="radio" value="<?php echo esc_attr($structures[4]); ?>" <?php checked($structures[4], $permalink_structure); ?> /> <?php _e('Post name'); ?></label></th>
          <td><code><?php echo home_url() . $blog_prefix . $prefix . '/' . _x( 'sample-post', 'sample permalink structure' ) . '/'; ?></code></td>
        </tr>
        <tr>
          <th>
            <label><input name="selection" id="custom_selection" type="radio" value="custom" <?php checked( !in_array($permalink_structure, $structures) ); ?> />
            <?php _e('Custom Structure'); ?>
            </label>
          </th>
          <td>
            <code><?php echo home_url() . $blog_prefix; ?></code>
            <input name="permalink_structure" id="permalink_structure" type="text" value="<?php echo esc_attr($permalink_structure); ?>" class="regular-text code" />
          </td>
        </tr>
      </table>




    </div>
  </div>
</div>
</div>

      <?php submit_button(); ?>
    </form>
  </div>

<?php
}


// 投稿画面の項目を非表示にする
function remove_default_post_screen_metaboxes() {
 if (!current_user_can('level_10')) { // level10以下のユーザーの場合メニューをremoveする
 remove_meta_box( 'postcustom','post','normal' ); // カスタムフィールド
 remove_meta_box( 'postexcerpt','post','normal' ); // 抜粋
 remove_meta_box( 'commentstatusdiv','post','normal' ); // ディスカッション
 remove_meta_box( 'commentsdiv','post','normal' ); // コメント
 remove_meta_box( 'trackbacksdiv','post','normal' ); // トラックバック
 remove_meta_box( 'authordiv','post','normal' ); // 作成者
 //remove_meta_box( 'slugdiv','post','normal' ); // スラッグ
 remove_meta_box( 'revisionsdiv','post','normal' ); // リビジョン
 }
 }
add_action('admin_menu','remove_default_post_screen_metaboxes');







?>
