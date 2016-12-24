<?php get_header(); ?>

<!-- Main content -->
<main class="site-main">
  <?php
  if ( have_posts() ) :
    while ( have_posts() ) : the_post();

      get_template_part( 'template-parts/content', get_post_format() );

    endwhile; // End loop

    // Previous/next page navigation.
    the_posts_pagination( array(
      'prev_text'          => __( 'Previous page', 'twentysixteen' ),
      'next_text'          => __( 'Next page', 'twentysixteen' ),
      'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>'
    ));

  else: // No content found
    get_template_part( 'template-parts/content', 'none' );
  endif;
  ?>

  <aside>
    <?php get_sidebar(); ?>
  </aside>

  <?php the_posts_pagination(); // Show posts pagination ?>

</main>

<?php get_footer(); ?>
