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
<hr class="section-rule">
  <section class="front-section section-news">
    <h2 class="section-title">News</h2>
    <div class="grid">
      <?php
      $args = array('posts_per_page' => 3, 'offset' => 0, 'category_name' => 'news');
      $loop = new WP_Query( $args );
      while ($loop->have_posts()) : $loop->the_post();
        get_template_part('template-parts/front');
      endwhile; wp_reset_postdata();
      ?>
    </div>
  </section>

  <hr class="section-rule">

  <section class="front-section section-features">
    <h2 class="section-title">Features</h2>
    <div class="grid">
      <?php
      $args = array('posts_per_page' => 6, 'offset' => 0, 'category_name' => 'features');
      $loop = new WP_Query( $args );
      while ($loop->have_posts()) : $loop->the_post();
        get_template_part('template-parts/front');
      endwhile; wp_reset_postdata();
      ?>
    </div>
  </section>
<hr class="section-rule">
  <section class="front-section section-arts">
    <h2 class="section-title">Arts</h2>
    <div class="grid">
      <?php
      $args = array('posts_per_page' => 3, 'offset' => 0, 'category_name' => 'arts');
      $loop = new WP_Query( $args );
      while ($loop->have_posts()) : $loop->the_post();
        get_template_part('template-parts/front');
      endwhile; wp_reset_postdata();
      ?>
    </div>
  </section>

<hr class="section-rule">
  <section class="front-section section-sports">
    <h2 class="section-title">Sports</h2>
    <div class="grid">
      <?php
      $args = array('posts_per_page' => 3, 'offset' => 0, 'category_name' => 'sports');
      $loop = new WP_Query( $args );
      while ($loop->have_posts()) : $loop->the_post();
        get_template_part('template-parts/front');
      endwhile; wp_reset_postdata();
      ?>
    </div>
  </section>
<hr class="section-rule">
  <section class="front-section section-opinions">
    <h2 class="section-title">Opinions</h2>
    <div class="grid">
      <?php
      $args = array('posts_per_page' => 3, 'offset' => 0, 'category_name' => 'opinions');
      $loop = new WP_Query( $args );
      while ($loop->have_posts()) : $loop->the_post();
        get_template_part('template-parts/front');
      endwhile; wp_reset_postdata();
      ?>
    </div>
  </section>
  <hr class="section-rule">
  <section class="front-section section-humor">
    <h2 class="section-title">Humor & Satire</h2>
    <div class="grid">
      <?php
      $args = array('posts_per_page' => 3, 'offset' => 0, 'category_name' => 'humor');
      $loop = new WP_Query( $args );
      while ($loop->have_posts()) : $loop->the_post();
        get_template_part('template-parts/front');
      endwhile; wp_reset_postdata();
      ?>
    </div>
  </section>

</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
