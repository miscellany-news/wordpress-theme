<?php get_header(); ?>

<!-- Main content -->
<main class="main-content">
  <?php if ( have_posts() ) : ?>

    <header class="archive-header">
      <?php
      the_archive_title('<h2 class="archive-page-title">','</h2>');
      the_archive_description('<p class="archive-description">','</p>');
      ?>
    </header>

    <div class="archive-list">

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
  </div>

</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
