<?php
// don't load it if you can't comment
if ( post_password_required() ) {
  return;
}

?>
<div class="comments-section">

  <?php if ( have_comments() ) : ?>
    <div class="comments-comments">
      <h3 id="comments-title" class="section-title comments-title"><?php comments_number( 'No Comments', 'One Comment', '% Comments' );?></h3>

      <ol class="comment-list">
        <?php wp_list_comments(); ?>
      </ol>

      <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
      	<nav class="navigation comment-navigation" role="navigation">
        	<div class="comment-nav-prev"><?php previous_comments_link( '&larr; Previous Comments' ); ?></div>
        	<div class="comment-nav-next"><?php next_comments_link( 'More Comments &rarr;' ); ?></div>
      	</nav>
      <?php endif; ?>

      <?php if ( ! comments_open() ) : ?>
      	<p class="no-comments">Comments are closed.</p>
      <?php endif; ?>
    </div>
  <?php endif; ?>

  <div class="comments-reply">
    <?php comment_form(array(
      'title_reply_before' => '<h3 class="section-title reply-title">',
      'title_reply_after' => '</h3>'
    )); ?>
  </div>

</div>
