<article class="front-article medium-article">

  <a class="front-image fm-image" href="<?php the_permalink(); ?>">
    <?php the_post_thumbnail('small')?>
  </a>

  <div class="front-content fm-content">

    <p class="front-category fs-category">
      <?php
      $categories = get_the_category();

      if ( ! empty( $categories ) ) {
        echo esc_html( $categories[0]->name );
      }
      ?>
    </p>

    <h3 class="front-title fm-title">
      <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="front-title-link fm-title-link">
        <?php the_title();?>
      </a>
    </h3>

    <p class="front-author fm-author">By <?php miscellanynews_get_author_link(); ?></p>

    <p class="front-excerpt fm-excerpt"><?php miscellanynews_the_excerpt_limit(10); ?></p>

  </div>

</article>
