<?php get_header(); ?>

<!-- Main content -->
<main class="main-content">
  <?php if ( have_posts() ) : ?>

    <div class="archive-list">

    <?php
    while ( have_posts() ) : the_post();

      get_template_part( 'template-parts/content' );

    endwhile; // End loop

    ?>
    </div>

    <div class="archive-pagination pagination-center">
      <?php the_posts_pagination(); ?>
    </div>
  <?php
  else: // No content found
    get_template_part( 'template-parts/content', 'none' );

  endif;
  ?>


</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
