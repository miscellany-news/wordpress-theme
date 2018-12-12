<?php get_header(); ?>

<!-- Main content -->
<main class="main-content">
  <?php if ( have_posts() ) : ?>

    <header class="archive-page-header">
      <?php
      the_archive_title('<h2 class="archive-page-title">','</h2>');
      the_archive_description('<p class="archive-description">','</p>');
      ?>
    </header>

    <div class="archive-list">

    <?php
    while ( have_posts() ) : the_post();

      get_template_part( 'template-parts/content' );

    endwhile; // End loop

    ?>
    </div>

    <div class="archive-pagination">
      <?php echo paginate_links() ?>
    </div>
  <?php
  else: // No content found
    get_template_part( 'template-parts/content', 'none' );

  endif;
  ?>


</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
