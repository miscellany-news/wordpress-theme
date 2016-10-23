<?php
/* Include the header.php file */
get_header();
?>
<main class="container">
  <div class="row">
    <div class="col-md-8 archive-page">
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
        get_template_part( 'template-parts/content-short', get_post_format() );

      endwhile;

      else :
        /* This page doesn't exist */
        get_template_part( 'template-parts/content', 'none' );
      endif;
      ?>
    </div>
    <aside class="col-md-4">
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
