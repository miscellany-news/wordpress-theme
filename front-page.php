<?php get_header(); ?>
<main class="main-content front-main">

  <section class="featured-section">
    <?php
    $args = array('posts_per_page' => 1, 'offset' => 0, 'tag' => 'slider');
    $loop = new WP_Query( $args );

    while ($loop->have_posts()) : $loop->the_post();
      get_template_part('template-parts/front', 'large');
    endwhile; wp_reset_postdata();
    ?>
    <?php
    $args = array('posts_per_page' => 3, 'offset' => 1, 'tag' => 'slider');
    $loop = new WP_Query( $args );

    while ($loop->have_posts()) : $loop->the_post();
      get_template_part('template-parts/front', 'medium');
    endwhile; wp_reset_postdata();
    ?>
  </section>

</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
