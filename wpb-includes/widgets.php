<?php

//widgetsを登録
require_once('widgets/recentposts.php');
require_once('widgets/populars.php');
require_once('widgets/ad.php');
require_once('widgets/profile.php');
//require_once('widgets/menu.php');

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function wp_bootstrap_register_sidebars() {


  register_sidebar(array(
  	'id' => 'top',
  	'name' => 'Top Page',
  	'description' => 'Topページに表示するウィジェット',
  	'before_widget' => '<div id="%1$s" class="widget-top widget %2$s">',
  	'after_widget' => '</div>',
  	'before_title' => '<h2 class="widget-title headline">',
  	'after_title' => '</h2>',
  ));

  register_sidebar(array(
  	'id' => 'header',
  	'name' => 'Header',
  	'description' => 'ヘッダーに表示するウィジェット',
  	'before_widget' => '<div id="%1$s" class="widget-header widget %2$s">',
  	'after_widget' => '</div>',
  	'before_title' => '<h4 class="widget-title">',
  	'after_title' => '</h4>',
  ));

  register_sidebar(array(
  	'id' => 'sidebar',
  	'name' => 'Sidebar',
  	'description' => 'サイドバーに表示するウィジェット',
  	'before_widget' => '<div id="%1$s" class="widget-sidebar widget %2$s">',
  	'after_widget' => '</div>',
  	'before_title' => '<h4 class="widget-title">',
  	'after_title' => '</h4>',
  ));


  register_sidebar(array(
    'id' => 'footer',
    'name' => 'Footer',
  	'description' => 'フッターに表示するウィジェット',
    'before_widget' => '<div id="%1$s" class="widget-footer widget col-sm-4 %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widget-title">',
    'after_title' => '</h4>',
  ));

  register_sidebar(array(
    'id' => 'post-bottom',
    'name' => 'Post Bottom',
  	'description' => '記事下部に表示するウィジェット',
    'before_widget' => '<div id="%1$s" class="widget-post-bottom widget  %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widget-title">',
    'after_title' => '</h4>',
  ));
    
    
  /* 
  to add more sidebars or widgetized areas, just copy
  and edit the above sidebar code. In order to call 
  your new sidebar just use the following code:
  
  Just change the name to whatever your new
  sidebar's id is, for example:
  
  To call the sidebar in your template, you can just copy
  the sidebar.php file and rename it to your sidebar's name.
  So using the above example, it would be:
  sidebar-sidebar2.php
  
  */
} // don't remove this bracket!

add_action( 'widgets_init', 'wp_bootstrap_register_sidebars' );

