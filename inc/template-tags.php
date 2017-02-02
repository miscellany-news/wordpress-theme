<?php
function miscellanynews_filter_manage_posts_custom_column( $column, $post_id ) {
  if ($column == 'miscauthors'){
    global $post;
  	$custom_author = get_post_meta($post->ID, 'author', TRUE);
  	if($custom_author)
  		echo $custom_author;
  	else {
    	$authors = get_coauthors( $post->ID );
    	$count = 1;
    	foreach ( $authors as $author ) {
    		$args = array( 'author_name' => $author->user_nicename );
    		$author_filter_url = add_query_arg( array_map( 'rawurlencode', $args ), admin_url( 'edit.php' ) );
    		echo '<a href="' . esc_url( $author_filter_url ). '">' . esc_html( $author->display_name ). '</a>';
        if($count < count($authors)) {
          echo ', ';
        }
    		$count++;
    	}
    }
  }
}
add_action( 'manage_posts_custom_column', 'miscellanynews_filter_manage_posts_custom_column', 15, 2);

function add_miscauthors_column($columns) {
  $new_columns = array();

	foreach ( $columns as $key => $value ) {
		$new_columns[ $key ] = $value;
		if ( 'title' === $key ) {
			$new_columns['miscauthors'] = __( 'Authors' );
		}
	}
  unset($new_columns['coauthors']);

	return $new_columns;
}
add_filter('manage_posts_columns' , 'add_miscauthors_column', 15, 1 );


/**
 * TEMPLATE TAGS
 * -------------
 */

/**
 * Function to print the author link. If the "author" custom field is set
 * then that will be used with no link. If the "Co-Authors Plus" plugin is
 * enabled then it will use that function to get the authors link.
 * Otherwise, it will use the built in the_authors_link() function.
 */
function miscellanynews_get_author_link( $author_page = false ) {
  // Get the "author" custom field
  $custom_author = get_post_meta(get_the_ID(), 'author', true);

  if($custom_author && !$author_page) {
    echo $custom_author; // Has "author" custom field
  } elseif (function_exists('coauthors_posts_links')) {
    coauthors_posts_links(); // "Co-Authors Plus" plugin
  } else {
    the_author_posts_link();
  }
}

/**
 * Gets the excerpt with an arbitrary length.
 *
 * Max length = default (55 words)
 */
function miscellanynews_the_excerpt_limit($limit, $read_more = false) {
  echo wp_trim_words(get_the_excerpt(), $limit, '&hellip;');
  if($read_more) {
    echo '&nbsp;<a href="'. esc_url( get_permalink() ) . '">'  . 'Read more &raquo;</a>';
  }
}
