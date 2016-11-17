<?php
/**
 * Register support for theme features
 */
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
  ) );

  // Add theme support for featured images
  add_theme_support( 'post-thumbnails' );
  
  // Add custom image sizes
  add_image_size( 'featured-image-wide', 2048, 1000, true );
  add_image_size( 'featured-image-large', 2048, 1363, true );
}
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
  remove_action( 'wp_head', 'wp_generator' ); // WP version

}
function miscellanynews_start_cleanup() {
  // Initialize the cleanup
  add_action('init', 'miscellanynews_cleanup_head');
}
add_action('after_setup_theme','miscellanynews_start_cleanup');

/**
 * Register sidebars
 */
function miscellanynews_widgets_init() {
	register_sidebar( array( 
		'id'            => 'primary',
		'name'          => __( 'Primary Sidebar' ),
		'description'   => __( 'Main global sidebar' ),
    'before_widget' => '',
    'after_widget' => '',
	));
  
	register_sidebar( array( 
		'id'            => 'home-featured',
		'name'          => __( 'Home Featured' ),
		'description'   => __( 'The content of this widget area will show up at the very top of the homepage underneath the header. It will take up the full width of the page. The main use of this area should be for special one-time content. Nothing will be displayed if it is empty' ),
    'before_widget' => '',
    'after_widget' => '',
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
		background: url('".get_bloginfo('template_url')."/images/logo-icon.png') no-repeat scroll center top transparent;
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

// Add theme options page
require_once('inc/options.php');

// Recommended plugins
require_once('inc/class-tgm-plugin-activation.php');
require_once('inc/recommend-plugins.php');

// Include custom widgets
require_once('inc/widgets/breaking-news.php');

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

/**
 * Gets the excerpt with an arbitrary length.
 * 
 * Max length = default (55 words)
 */
function the_excerpt_limit($limit, $read_more = false) {
  echo '<p class="excerpt">';
  echo wp_trim_words(get_the_excerpt(), $limit, '&hellip;');
  if($read_more) {
    echo '&nbsp;<a href="'. esc_url( get_permalink() ) . '">'  . 'Read more &raquo;</a>';
  }
  echo '</p>';
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