<?php


/**
 * Add meta boxes for title length custom fields (metadata)
 */
function miscellanynews_add_meta_boxes() {
  add_meta_box('custom-author', "Custom Author Byline", "miscellanynews_custom_author_html", "post", "side", "low");
}
add_action( 'add_meta_boxes', 'miscellanynews_add_meta_boxes' );

/*
 * Generate html for custom author
 */
function miscellanynews_custom_author_html($post) {
	wp_nonce_field( '_miscellanynews_meta_box_nonce', 'miscellanynews_meta_box_nonce' ); ?>

  <p>
    <input type="text" name="author" value="<?php echo get_post_meta(get_the_ID(), 'author', true ); ?>">
    <br>
    <label for="author">Add a custom author name (other than your own) to override giving yourself credit for this post.</label>
  </p>

  <?php
}

/**
 * Save new values from the custom meta boxes
 */
function miscellanynews_meta_box_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! isset( $_POST['miscellanynews_meta_box_nonce'] ) || ! wp_verify_nonce( $_POST['miscellanynews_meta_box_nonce'], '_miscellanynews_meta_box_nonce' ) ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;
	if ( isset( $_POST['author'] ) )
		update_post_meta( $post_id, 'author', esc_attr( $_POST['author'] ) );
}
add_action( 'save_post', 'miscellanynews_meta_box_save' );
?>
