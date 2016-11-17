<?php
get_header();
?>

<main class="container">
  <div class="row top">
    <div class="column medium-8">
      <?php 
      // Start the loop.
      while ( have_posts() ) : the_post();

        // Include the single post content template.
        get_template_part( 'template-parts/content', 'single' );

        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) {
          comments_template();
        }

        // Post navigation
        the_post_navigation();
      
      // End of the loop.
		  endwhile;
      ?>
    </div>
    <aside class="column medium-4 primary-sidebar">
      <?php 
      if(is_active_sidebar('primary')) : 
        dynamic_sidebar('primary'); 
      endif; ?>
    </aside>
  </div>
</main>

<?php
/* Include the footer.php file */
get_footer();

?>
