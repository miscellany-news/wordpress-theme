<?php

/* Include the header.php file */
get_header();
?>
<main class="container">
<?php
if ( have_posts() ) :

  /* Start the Loop */
  while ( have_posts() ) : the_post();

    get_template_part( 'template-parts/single-post', get_post_format() );

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
