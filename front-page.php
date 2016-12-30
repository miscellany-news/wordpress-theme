<?php get_header(); ?>

<main class="main-content front-main">

  <section class="front-section section-featured">

    <div class="section-container">
      <?php
      $args = array('posts_per_page' => 5, 'offset' => 1, 'tag' => 'slider');
      $loop = new WP_Query( $args );

      while ($loop->have_posts()) : $loop->the_post();
        get_template_part('template-parts/front');
      endwhile; wp_reset_postdata();
      ?>
    </div>

  </section>

</main>

<?php get_footer(); ?>
