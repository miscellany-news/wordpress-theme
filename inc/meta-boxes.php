<?php
/**
 * Add meta boxes for title length custom fields (metadata)
 */
function miscellanynews_add_meta_boxes() {
  add_meta_box('short-titles', "Short Titles", "miscellanynews_short_titles_html", "post", "side", "core");
  add_meta_box('custom-author', "Old Author Field", "miscellanynews_custom_author_html", "post", "side", "low");
}
add_action( 'add_meta_boxes', 'miscellanynews_add_meta_boxes' );
function miscellanynews_short_titles_html($post) {
	wp_nonce_field( '_miscellanynews_meta_box_nonce', 'miscellanynews_meta_box_nonce' ); ?>

	<p>
		<label for="tiny_title">Tiny Title</label><br>
		<input type="text" name="tiny_title" id="tiny_title" value="<?php echo get_post_meta(get_the_ID(), 'tiny_title', true ); ?>">
	</p>	<p>
		<label for="short_title">Short Title</label><br>
		<input type="text" name="short_title" id="short_title" value="<?php echo get_post_meta(get_the_ID(), 'short_title', true ); ?>">
	</p><?php
}
function miscellanynews_custom_author_html($post) {
	wp_nonce_field( '_miscellanynews_meta_box_nonce', 'miscellanynews_meta_box_nonce' ); ?>

	<p>
		<label for="author">Author</label><br>
		<input type="text" name="author" id="author" value="<?php echo get_post_meta(get_the_ID(), 'author', true ); ?>">
		<br><small>This is not where you should put the author. It is used only to show who the author is set to on posts from the pre-2017 website</small>
	</p><?php
}
/**
 * Save new values from the custom meta boxes
 */
function miscellanynews_meta_box_save( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( ! isset( $_POST['miscellanynews_meta_box_nonce'] ) || ! wp_verify_nonce( $_POST['miscellanynews_meta_box_nonce'], '_miscellanynews_meta_box_nonce' ) ) return;
	if ( ! current_user_can( 'edit_post', $post_id ) ) return;
	if ( isset( $_POST['tiny_title'] ) )
		update_post_meta( $post_id, 'tiny_title', esc_attr( $_POST['tiny_title'] ) );
	if ( isset( $_POST['short_title'] ) )
		update_post_meta( $post_id, 'short_title', esc_attr( $_POST['short_title'] ) );
	if ( isset( $_POST['author'] ) )
		update_post_meta( $post_id, 'author', esc_attr( $_POST['author'] ) );
}
add_action( 'save_post', 'miscellanynews_meta_box_save' );
?>