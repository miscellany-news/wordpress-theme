<?php
function themiscellanynews_widgets_init() {
	register_sidebar( array( 
		'id'            => 'primary',
		'name'          => __( 'Primary Sidebar' ),
		'description'   => __( 'Main global sidebar' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>'
	));
	
	register_sidebar( array( 
		'id'            => 'home-left',
		'name'          => __( 'Home Left Column' ),
		'description'   => __( 'A short description of the sidebar.' ),
		'before_widget' => '',
		'after_widget'  => '',
	));
	
	register_sidebar( array( 
		'id'            => 'home-middle',
		'name'          => __( 'Home Middle Column' ),
		'description'   => __( 'A short description of the sidebar.' ),
		'before_widget' => '',
		'after_widget'  => '',
	));
	
	register_sidebar( array( 
		'id'            => 'home-right',
		'name'          => __( 'Home Right Column' ),
		'description'   => __( 'A short description of the sidebar.' ),
		'before_widget' => '',
		'after_widget'  => '',
	));
}
add_action( 'widgets_init', 'themiscellanynews_widgets_init' );

require_once('widgets/posts-large.php');
require_once('widgets/posts-list.php');
require_once('widgets/posts-grid.php');
?>