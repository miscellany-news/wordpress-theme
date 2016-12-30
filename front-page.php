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
        $args = array('posts_per_page' => 1, 'offset' => 2, 'tag' => 'slider');
        $loop = new WP_Query( $args );

        while ($loop->have_posts()) : $loop->the_post();
          get_template_part('template-parts/front', 'medium');
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
            $args = array('posts_per_page' => 1, 'offset' => 3, 'tag' => 'slider');
            $loop = new WP_Query( $args );

            while ($loop->have_posts()) : $loop->the_post();
              get_template_part('template-parts/front', 'small');
            endwhile; wp_reset_postdata();
            ?>
          </div>
          <div class="col-split-right">
            <?php
            $args = array('posts_per_page' => 1, 'offset' => 4, 'tag' => 'slider');
            $loop = new WP_Query( $args );

            while ($loop->have_posts()) : $loop->the_post();
              get_template_part('template-parts/front', 'small');
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
        $args = array('posts_per_page' => 3, 'offset' => 0);
        $loop = new WP_Query( $args );

        while ($loop->have_posts()) : $loop->the_post();
          get_template_part('template-parts/front', 'small');
        endwhile; wp_reset_postdata();
        ?>
      </div>
      <div class="col-split-right">
        <?php
        $args = array('posts_per_page' => 3, 'offset' => 3);
        $loop = new WP_Query( $args );

        while ($loop->have_posts()) : $loop->the_post();
          get_template_part('template-parts/front', 'small');
        endwhile; wp_reset_postdata();
        ?>
      </div>

    </div>
  </div> <!-- /.main-row -->

  <div class="main-row">
    <div class="main-left">

      <div class="col-small">
        Col small.
      </div>
      <div class="col-big">
        Col big.
      </div>

    </div>

    <div class="main-right">

      <div class="col-split">
        Col split.
      </div>
      <div class="col-split">
        Col split.
      </div>

    </div>
  </div> <!-- /.main-row -->

</main>

<!--
<?php
$args = array('posts_per_page' => 1, 'offset' => 0, 'tag' => 'slider');
$loop = new WP_Query( $args );

while ($loop->have_posts()) : $loop->the_post();
  get_template_part('template-parts/front', 'large');
endwhile; wp_reset_postdata();
?>
-->
<?php get_footer(); ?>
