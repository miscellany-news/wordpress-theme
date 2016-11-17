<?php

/**
 * Register support for theme features
 */
if ( ! function_exists( 'miscellanynews_setup' ) ) :
  function miscellanynews_setup() {

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

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

    // Add support for custom background color and images
    add_theme_support( 'custom-background', array(
 	    'default-color' => 'FFFFFF',
    ));

    // Add theme support for featured images
    add_theme_support( 'post-thumbnails' );
    
    // Add custom image sizes
    add_image_size( 'featured-image-wide', 2048, 1000, true );
    add_image_size( 'featured-image-large', 2048, 1363, true );

  }
endif;
add_action( 'after_setup_theme', 'miscellanynews_setup' );

/*
 * Add menu support
 */
function miscellanynews_register_menu() {
  register_nav_menu( 'primary-menu', 'Primary Menu' );
	register_nav_menu( 'auxiliary-menu', 'Auxiliary Menu' );
  register_nav_menu( 'footer-menu-small', 'Small Footer Menu');
}
add_action( 'init', 'miscellanynews_register_menu' );

/**
 * Enqueue scripts and styles.
 */
function miscellanynews_scripts() {
  /* Add main Stylesheet */
	wp_enqueue_style("core", get_stylesheet_uri() );
	wp_enqueue_script("menu", get_template_directory_uri() . '/js/menu.js');
}
add_action("wp_enqueue_scripts", "miscellanynews_scripts");

require_once('inc/options.php');
require_once('inc/remove-bloat.php');
require_once('inc/class-tgm-plugin-activation.php');
require_once('inc/recommend-plugins.php');
require_once('inc/custom-login-page.php');
require_once('inc/add-widgets.php');

/**
 * Function to print the author link. If the "author" custom field is set
 * then that will be used with no link. If the "Co-Authors Plus" plugin is
 * enabled then it will use that function to get the authors link.
 * Otherwise, it will use the built in the_authors_link() function.
 */
function miscellanynews_get_author_link() {
  // Get the "author" custom field
  $custom_author = get_post_meta(get_the_ID(), 'author', true);
  
  if($custom_author) {
    echo $custom_author; // Has "author" custom field
  } elseif (function_exists('coauthors_posts_links')) {
    coauthors_posts_links(); // "Co-Authors Plus" plugin
  } else {
    the_author_link();
  }
}

function miscellanynews_get_category_list($category) { ?>
    <section class="category-list">
      <?php 
      $category_link = get_category_link($category);
      $the_loop = new WP_Query(array('posts_per_page' => 4, 'offset' => 0, 'cat' => $category));?>
      <h2 class="section-heading">
        <a href="<?php echo $category_link; ?>"><?php echo get_cat_name($category); ?></a>
      </h2>
      <?php
      while ($the_loop->have_posts()) : $the_loop->the_post(); // The loop 
        get_template_part('template-parts/front-category');
      endwhile; wp_reset_postdata(); ?>
    </section>
<?php
}
?>
