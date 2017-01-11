<?php get_header(); ?>

<!-- Main content -->
<main class="main-content">

  <?php
  while ( have_posts() ) : the_post();

    // Include the page content template.
    get_template_part( 'template-parts/content', 'page' );

    // If comments are open or we have at least one comment, load up the comment template.
    if ( comments_open() || get_comments_number() ) {
      comments_template();
    }

  endwhile; // End of the loop. ?>
</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
