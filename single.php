<?php get_header();  ?>

<main class="container">
  <div class="row">
  <div class="column medium-8 section-post">
  <?php 
  // Start the loop.
  while ( have_posts() ) : the_post();

    // Include the single post content template.
    get_template_part( 'template-parts/content', 'single' );

    // If comments are open or we have at least one comment, load up the comment template.
    if ( comments_open() || get_comments_number() ) {
      comments_template();
    }
    
  // End of the loop.
  endwhile;
  ?>
  </div>
  <div class="column medium-4">
  <aside class="primary-sidebar">
    <?php 
    if(is_active_sidebar('primary')) : 
      dynamic_sidebar('primary'); 
    endif; ?>
  </aside>
  </div>
</main>

<?php get_footer(); ?>
