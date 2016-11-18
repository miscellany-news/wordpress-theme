<?php
/* Include the header.php file */
get_header();
?>
<main class="container">
  <div class="row">
    <div class="column medium-8 archive-page">
     <?php if ( have_posts() ) : ?>

			<?php
			// Start the loop.
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			// End the loop.
			endwhile;

			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'twentysixteen' ),
				'next_text'          => __( 'Next page', 'twentysixteen' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>',
			) );

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
    </div>
    <aside class="column medium-4 top">
      <?php
      get_sidebar();
      ?>
    </aside>

  </div>
  <?php
  /*
   * Show pagination for the posts
   */
  the_posts_pagination();
  ?>
</main>

<?php
/* Include the footer.php file */
get_footer();
?>
