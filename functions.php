<?php
@ini_set( 'upload_max_size' , '64M' );

/**
 * Register support for theme features
 */
function miscellanynews_setup() {
  // Let WordPress manage the document title. Don't hard code <title> tag.
  add_theme_support( 'title-tag' );

  // Use html5 markup
  add_theme_support( 'html5', array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
  ) );

  // Add theme support for featured images
  add_theme_support( 'post-thumbnails' );

  // Add custom image sizes
  add_image_size( 'feat-x-large', 1536, 1024, true );
  add_image_size( 'feat-large', 768, 512, true );
  add_image_size( 'feat-medium', 384, 256, true );
  add_image_size( 'feat-small', 192, 128, true );

  if ( ! isset( $content_width ) ) $content_width = 1024;
}
add_action( 'after_setup_theme', 'miscellanynews_setup' );

/*
 * Add menu support
 */
function miscellanynews_register_menu() {
  register_nav_menu( 'site-sections', 'Sections Navigation' );
  register_nav_menu( 'site-blogs', 'Blogs Navigation' );
  register_nav_menu( 'site-navigation', 'Main Navigation' );
  register_nav_menu( 'copyright-menu', 'Copyright Navigation' );
  register_nav_menu( 'site-social', 'Social Media Navigation' );
  register_nav_menu( 'site-other', 'Footer Navigation' );
}
add_action( 'init', 'miscellanynews_register_menu' );

/**
 * Enqueue scripts and styles.
 */
function miscellanynews_scripts() {
    /* Add main Stylesheet */
  wp_enqueue_style('core', get_stylesheet_uri(), array(), time());
  wp_enqueue_script('menu', get_template_directory_uri() . '/js/menu.js');
  wp_enqueue_script('article-slider', get_template_directory_uri() . '/js/article-slider.js', array(), time());
}
add_action("wp_enqueue_scripts", "miscellanynews_scripts");

/*
 * Remove some bloat from the <head> tag
 */
function miscellanynews_cleanup_head() {
  remove_action( 'wp_head', 'rsd_link' ); // EditURI link
  remove_action( 'wp_head', 'feed_links_extra', 3 ); // Category feed links
  remove_action( 'wp_head', 'feed_links', 2 ); // Post and comment feed links
  remove_action( 'wp_head', 'wlwmanifest_link' ); // Windows Live Writer
  remove_action( 'wp_head', 'index_rel_link' ); // Index link
  remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // Previous link
  remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // Start link
  remove_action( 'wp_head', 'rel_canonical', 10, 0 ); // Canonical
  remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 ); // Shortlink
  remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 ); // Links for adjacent posts
  //remove_action( 'wp_head', 'wp_generator' ); // WP version

  // all actions related to emojis
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
  add_filter( 'emoji_svg_url', '__return_false' ); // DNS Prefetch

  // filter to remove TinyMCE emojis
  add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}
function disable_emojicons_tinymce( $plugins ) {
  if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
  } else {
    return array();
  }
}
function miscellanynews_start_cleanup() {
  add_action('init', 'miscellanynews_cleanup_head'); // Initialize the cleanup
}
add_action('after_setup_theme','miscellanynews_start_cleanup');

/**
 * Register sidebars
 */
function miscellanynews_widgets_init() {
	register_sidebar( array(
		'id'            => 'primary',
		'name'          => 'Primary Sidebar',
		'description'   => 'Main global sidebar',
    'before_widget' => '<div class="widget">',
    'after_widget' => '</div>',
  ));
  
  register_sidebar( array(
		'id'            => 'above-opinions',
		'name'          => 'Above Opinions Sidebar',
		'description'   => 'The portion of sidebar above opinions section',
    'before_widget' => '<div class="widget">',
    'after_widget' => '</div>',
	));

  register_sidebar ( array(
    'id'            => 'front-ad-area',
    'name'          => 'Front Page Ad Area',
    'description'   => 'This area is displayed under the featured "slider" posts on the front page, but above the sections',
    'before_widget' => '<div class="widget">',
    'after_widget' => '</div>',
  ));

  register_sidebar ( array(
    'id'            => 'post-ad-area',
    'name'          => 'Article Ad Area',
    'description'   => 'This area is displayed underneath the post content on a post page.',
    'before_widget' => '<div class="widget">',
    'after_widget' => '</div>',
  ));
}
add_action( 'widgets_init', 'miscellanynews_widgets_init' );

/**
 * Custom login page header
 */
function miscellanynews_login_head() {
  echo "
    <style>
    body.login #login h1 a {
      background: url('". get_theme_file_uri( 'img/logo-icon.png' ) ."') no-repeat scroll center top transparent;
      background-size: 90px 90px;
      border-radius: 10px;
      height: 90px;
      width: 90px;
      outline: none;
      border: none;
      box-shadow: none;
    }
    </style>";
}
add_action("login_head", "miscellanynews_login_head");
function miscellanynews_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'miscellanynews_login_logo_url' );

/**
 * Removes bloat ("Tag: ...") from archive title
 */
add_filter( 'get_the_archive_title', function ($title) {
  if ( is_category() ) {
    $title = single_cat_title( '', false );
  } elseif ( is_tag() ) {
    $title = single_tag_title( '', false );
  } elseif ( is_author() ) {
    $title = '<span class="vcard">' . get_the_author() . '</span>' ;
  }
  return $title;
});

/**
 * Template Tags (custom theme functions that output small html
 */
require_once('inc/template-tags.php');

/**
 * Customizer
 */
require_once('inc/customizer.php');
