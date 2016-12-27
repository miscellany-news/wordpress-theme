<?php get_header(); ?>

<main class="main-content">

  <section class="front-section">

    <?php
    $args = array('posts_per_page' => 4, 'offset' => 0, 'category_name' => 'features');

    $loop = new WP_Query( $args );
    $count = 0;
    ?>

    <?php while ($loop->have_posts()) : $loop->the_post(); ?>

    <?php
    $count++;
    $class_prefix = "front";

    if($count == 1) {
      $class_prefix = "front-lg";
    }
    ?>

    <article class="<?php echo $class_prefix; ?>-article">
      <a class="<?php echo $class_prefix; ?>-image">
        <?php the_post_thumbnail('large')?>
      </a>

      <div class="<?php echo $class_prefix; ?>-content">
        <h1 class="<?php echo $class_prefix; ?>-title">
          <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="<?php echo $class_prefix; ?>-title-link">
            <?php echo miscellanynews_get_title('short');?>
          </a>
        </h1>

        <p class="<?php echo $class_prefix; ?>-author">By <?php miscellanynews_get_author_link(); ?></p>

        <p class="<?php echo $class_prefix; ?>-excerpt"><?php miscellanynews_the_excerpt_limit(15); ?></p>
      </div>
    </article>

  <?php endwhile; wp_reset_postdata(); ?>

  </section>

  <section class="front-section">

    <h1 class="section-title">Features&nbsp;&raquo;</h1>

    <?php
    $args = array('posts_per_page' => 3, 'offset' => 1, 'category_name' => 'features');

    $loop = new WP_Query( $args );

    while ($loop->have_posts()) : $loop->the_post(); ?>

    <article class="front-article">

      <a class="front-image">
        <?php the_post_thumbnail('medium')?>
      </a>

      <div class="front-content">
        <h1 class="front-title">
          <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="front-title-link">
            <?php echo miscellanynews_get_title('short');?>
          </a>
        </h1>

        <p class="front-author">By <?php miscellanynews_get_author_link(); ?></p>

        <p class="front-excerpt"><?php miscellanynews_the_excerpt_limit(15); ?></p>
      </div>

    </article>

  <?php endwhile; wp_reset_postdata(); ?>

  </section>

</main>

<?php get_footer(); ?>
