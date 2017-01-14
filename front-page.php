<?php get_header(); ?>
<main class="main-content front-main">

  <section class="front-section section-featured">
    <h2 class="section-title screen-reader-text">Featured Articles</h2>
    <?php
    $args = array('posts_per_page' => 1, 'offset' => 0, 'tag' => 'slider');
    $loop = new WP_Query( $args );

    while ($loop->have_posts()) : $loop->the_post();
      get_template_part('template-parts/front', 'large');
    endwhile; wp_reset_postdata();
    ?>
    <?php
    $args = array('posts_per_page' => 4, 'offset' => 1, 'tag' => 'slider');
    $loop = new WP_Query( $args );

    while ($loop->have_posts()) : $loop->the_post();
      get_template_part('template-parts/front', 'medium');
    endwhile; wp_reset_postdata();
    ?>
  </section>

  <?php if ( is_active_sidebar( 'front-ad-area' ) ) : ?>
    <section class="front-section front-ad-area">
    	<?php dynamic_sidebar( 'front-ad-area' ); ?>
    </section>
  <?php endif; ?>

  <section class="front-section section-features">
    <?php
    $idObj = get_category_by_slug('features');
    $category_id = $idObj->term_id;
    $category_link = get_category_link( $category_id );
    ?>
    <h2 class="section-title"><a href="<?php echo $category_link; ?>">Features</a></h2>
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

  <section class="front-section section-news">
    <?php
    $idObj = get_category_by_slug('news');
    $category_id = $idObj->term_id;
    $category_link = get_category_link( $category_id );
    ?>
    <h2 class="section-title"><a href="<?php echo $category_link; ?>">News</a></h2>
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

  <section class="front-section section-arts">
    <?php
    $idObj = get_category_by_slug('arts');
    $category_id = $idObj->term_id;
    $category_link = get_category_link( $category_id );
    ?>
    <h2 class="section-title"><a href="<?php echo $category_link; ?>">Arts</a></h2>
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


  <section class="front-section section-sports">

    <?php
    $idObj = get_category_by_slug('sports');
    $category_id = $idObj->term_id;
    $category_link = get_category_link( $category_id );
    ?>
    <h2 class="section-title"><a href="<?php echo $category_link; ?>">Sports</a></h2>
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

  <section class="front-section section-opinions">

    <?php
    $idObj = get_category_by_slug('opinions');
    $category_id = $idObj->term_id;
    $category_link = get_category_link( $category_id );
    ?>
    <h2 class="section-title"><a href="<?php echo $category_link; ?>">Opinions</a></h2>
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

  <section class="front-section section-humor">

    <?php
    $idObj = get_category_by_slug('humor');
    $category_id = $idObj->term_id;
    $category_link = get_category_link( $category_id );
    ?>
    <h2 class="section-title"><a href="<?php echo $category_link; ?>">Humor &amp; Satire</a></h2>
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
