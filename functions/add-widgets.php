<?php
// Useful functions
function the_excerpt_limit($limit, $read_more = false) {
  echo '<p class="excerpt">';
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
		'id'            => 'home-featured',
		'name'          => __( 'Home Featured' ),
		'description'   => __( 'The content of this widget area will show up at the very top of the homepage underneath the header. It will take up the full width of the page. The main use of this area should be for special one-time content. Nothing will be displayed if it is empty' ),
    'before_widget' => '',
    'after_widget' => '',
	));
}
add_action( 'widgets_init', 'themiscellanynews_widgets_init' );

require_once('widgets/large-post.php');
?>