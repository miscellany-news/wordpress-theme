<?php
// Useful functions
function the_excerpt_limit($limit, $read_more = false) {
  echo "<p>";
  echo wp_trim_words(get_the_excerpt(), $limit, '&hellip;');
  if($read_more) {
    echo '&nbsp;<a href="'. esc_url( get_permalink() ) . '">'  . 'Read more &raquo;</a></p>';
  }
}

function themiscellanynews_widgets_init() {
	register_sidebar( array( 
		'id'            => 'primary',
		'name'          => __( 'Primary Sidebar' ),
		'description'   => __( 'Main global sidebar' ),
    'before_widget' => '',
    'after_widget' => '',
	));
  
	register_sidebar( array( 
		'id'            => 'home-main',
		'name'          => __( 'Home Main' ),
		'description'   => __( 'Main home widget area.' ),
    'before_widget' => '',
    'after_widget' => '',
	));
  
	register_sidebar( array( 
		'id'            => 'home-left-1',
		'name'          => __( 'Home Top Left' ),
		'description'   => __( 'A short description of the sidebar.' ),
    'before_widget' => '',
    'after_widget' => '',
	));
	
	register_sidebar( array( 
		'id'            => 'home-middle-1',
		'name'          => __( 'Home Top Middle' ),
		'description'   => __( 'A short description of the sidebar.' ),
    'before_widget' => '',
    'after_widget' => '',
	));
  
	register_sidebar( array( 
		'id'            => 'home-left-2',
		'name'          => __( 'Home Left (2)' ),
		'description'   => __( 'A short description of the sidebar.' ),
    'before_widget' => '',
    'after_widget' => '',
	));
	
	register_sidebar( array( 
		'id'            => 'home-middle-2',
		'name'          => __( 'Home Middle (2)' ),
		'description'   => __( 'A short description of the sidebar.' ),
    'before_widget' => '',
    'after_widget' => '',
	));
	
	register_sidebar( array( 
		'id'            => 'home-right',
		'name'          => __( 'Home Right Column' ),
		'description'   => __( 'A short description of the sidebar.' ),
    'before_widget' => '',
    'after_widget' => '',
	));
}
add_action( 'widgets_init', 'themiscellanynews_widgets_init' );

require_once('widgets/posts-large.php');
require_once('widgets/posts-list.php');
require_once('widgets/posts-grid.php');
require_once('widgets/horizontal-rule.php');
require_once('widgets/featured-list.php');
?>