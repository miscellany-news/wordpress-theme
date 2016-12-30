<?php get_header(); ?>

<main class="main-content front-main">

  <div class="main-row">
    <div class="main-left">

      <h2 class="col-full col-title col-big-title">Featured Articles</h2>

      <div class="col-left">
        <?php
        $args = array('posts_per_page' => 1, 'offset' => 1, 'tag' => 'slider');
        $loop = new WP_Query( $args );

        while ($loop->have_posts()) : $loop->the_post();
          get_template_part('template-parts/front', 'medium-img');
        endwhile; wp_reset_postdata();
        ?>
        <?php
        $args = array('posts_per_page' => 2, 'offset' => 2, 'tag' => 'slider');
        $loop = new WP_Query( $args );

        while ($loop->have_posts()) : $loop->the_post();
          get_template_part('template-parts/front', 'small');
        endwhile; wp_reset_postdata();
        ?>
      </div>
      <div class="col-mid">
        <?php
        $args = array('posts_per_page' => 1, 'offset' => 0, 'tag' => 'slider');
        $loop = new WP_Query( $args );

        while ($loop->have_posts()) : $loop->the_post();
          get_template_part('template-parts/front', 'large');
        endwhile; wp_reset_postdata();
        ?>

        <div class="split-wrap">
          <div class="col-split-left">
            <?php
            $args = array('posts_per_page' => 1, 'offset' => 4, 'tag' => 'slider');
            $loop = new WP_Query( $args );

            while ($loop->have_posts()) : $loop->the_post();
              get_template_part('template-parts/front', 'small-img');
            endwhile; wp_reset_postdata();
            ?>
          </div>
          <div class="col-split-right">
            <?php
            $args = array('posts_per_page' => 1, 'offset' => 5, 'tag' => 'slider');
            $loop = new WP_Query( $args );

            while ($loop->have_posts()) : $loop->the_post();
              get_template_part('template-parts/front', 'small-img');
            endwhile; wp_reset_postdata();
            ?>
          </div>
        </div>
      </div>

    </div>

    <div class="main-right">
      <h2 class="col-title">Recent Articles</h2>

      <div class="col-split-left">
        <?php
        $args = array('posts_per_page' => 1, 'offset' => 0);
        $loop = new WP_Query( $args );

        while ($loop->have_posts()) : $loop->the_post();
          get_template_part('template-parts/front', 'small-img');
        endwhile; wp_reset_postdata();
        ?>
      </div>
      <div class="col-split-right">
        <?php
        $args = array('posts_per_page' => 1, 'offset' => 1);
        $loop = new WP_Query( $args );

        while ($loop->have_posts()) : $loop->the_post();
          get_template_part('template-parts/front', 'small-img');
        endwhile; wp_reset_postdata();
        ?>
      </div>
      <div class="col-split-left">
        <?php
        $args = array('posts_per_page' => 3, 'offset' => 3);
        $loop = new WP_Query( $args );

        while ($loop->have_posts()) : $loop->the_post();
          get_template_part('template-parts/front', 'small');
        endwhile; wp_reset_postdata();
        ?>
      </div>
      <div class="col-split-right">
        <?php
        $args = array('posts_per_page' => 3, 'offset' => 6);
        $loop = new WP_Query( $args );

        while ($loop->have_posts()) : $loop->the_post();
          get_template_part('template-parts/front', 'small');
        endwhile; wp_reset_postdata();
        ?>
      </div>

    </div>
  </div> <!-- /.main-row -->

</main>

<?php get_footer(); ?>
