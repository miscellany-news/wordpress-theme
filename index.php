<?php get_header(); ?>

<!-- Main content -->
<main class="main-content">
  <?php if ( have_posts() ) : ?>

    <?php
    while ( have_posts() ) : the_post();

      get_template_part( 'template-parts/content', 'archive' );

    endwhile; // End loop

    // Previous/next page navigation.
    the_posts_pagination(array('type' => 'list'));

  else: // No content found
    get_template_part( 'template-parts/content', 'none' );

  endif;
  ?>

</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
