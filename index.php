<?php

/* Include the header.php file */
get_header();
?>
<main class="container">
<?php
if ( have_posts() ) :

  /* Start the Loop */
  while ( have_posts() ) : the_post();

    /*
     * Include the Post-Format-specific template for the content.
     * If you want to override this in a child theme, then include a file
     * called content-___.php (where ___ is the Post Format name) and that will
     * be used instead.
     */
    get_template_part( 'template-parts/content', get_post_format() );

  endwhile;

  /*
   * Show pagination for the posts
   */
  the_posts_pagination();

else :

  /* This page doesn't exist */
  get_template_part( 'template-parts/content', 'none' );

endif;
?>
</main>
<?php
/* Include the footer.php file */
get_footer();

?>
