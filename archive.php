<?php get_header(); ?>

<!-- Main content -->
<main class="site-main">
  <?php if ( have_posts() ) : ?>

    <header class="archive-header">
      <?php
      the_archive_title('<h1 class="archive-title">','</h1>');
      the_archive_description('<p class="archive-description">','</p>');
      ?>
    </header>

    <?php
    while ( have_posts() ) : the_post();

      get_template_part( 'template-parts/content', get_post_format() );

    endwhile; // End loop

    // Previous/next page navigation.
    the_posts_pagination(array('type' => 'list'));

  else: // No content found
    get_template_part( 'template-parts/content', 'none' );

  endif;
  ?>

</main>

<?php get_footer(); ?>
