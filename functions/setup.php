<?php
/**
 * Register support for theme features
 */
if ( ! function_exists( 'themiscellanynews_setup' ) ) :
  function themiscellanynews_setup() {

    /* Add default posts and comments RSS feed links to head. */
    add_theme_support( 'automatic-feed-links' );

    /*
  	 * Let WordPress manage the document title.
  	 * By adding theme support, we declare that this theme does not use a
  	 * hard-coded <title> tag in the document head, and expect WordPress to
  	 * provide it for us.
  	 */
    add_theme_support( 'title-tag' );

    /*
	   * Switch default core markup for search form, comment form, and comments
  	 * to output valid HTML5.
  	 */
  	add_theme_support( 'html5', array(
  		'search-form',
  		'comment-form',
  		'comment-list',
  		'gallery',
  		'caption',
  	) );

    /*
     * Add support for custom background color and images
     */
    add_theme_support( 'custom-background', array(
 	    'default-color' => 'FFFFFF',
    ));

    /*
     * Add theme support for featured images
     */
    add_theme_support( 'post-thumbnails' );

  }
endif;
add_action( 'after_setup_theme', 'themiscellanynews_setup' );

/*
 * Add menu support
 */
function themiscellanynews_register_menu() {
  register_nav_menu( 'primary-menu', 'Primary Menu' );
	register_nav_menu( 'auxiliary-menu', 'Auxiliary Menu' );
}
add_action( 'init', 'themiscellanynews_register_menu' );

/**
 * Enqueue scripts and styles.
 */
function themiscellanynews_scripts() {

  /* Add main Stylesheet */
	wp_enqueue_style("core", get_stylesheet_uri() );

}
add_action("wp_enqueue_scripts", "themiscellanynews_scripts");
?>
