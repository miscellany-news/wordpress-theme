<?php get_header(); ?>

<main class="main-content">

  <section class="front-section section-featured">

    <?php
    $args = array('posts_per_page' => 4, 'offset' => 0, 'category_name' => 'features');

    $loop = new WP_Query( $args );
    $count = 0;

    while ($loop->have_posts()) : $loop->the_post();

    $count++;
    $class_prefix = "front";

    if($count == 1) {
      get_template_part('template-parts/front', 'large');
    } else {
      get_template_part('template-parts/front');
    }

    endwhile; wp_reset_postdata(); ?>

  </section>

  <section class="front-section section-features">

    <h1 class="section-title">Features&nbsp;&raquo;</h1>

    <?php
    $args = array('posts_per_page' => 3, 'offset' => 1, 'category_name' => 'features');

    $loop = new WP_Query( $args );

    while ($loop->have_posts()) : $loop->the_post();

    get_template_part('template-parts/front');

    endwhile; wp_reset_postdata(); ?>

  </section>

</main>

<?php get_footer(); ?>
