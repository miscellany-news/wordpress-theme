<article class="front-article small-article">

  <div class="front-content fs-content">

    <a class="front-image fs-image" href="<?php the_permalink(); ?>">
      <?php the_post_thumbnail('thumbnail')?>
    </a>

    <p class="front-category fs-category">
      <?php
      $categories = get_the_category();

      if ( ! empty( $categories ) ) {
        echo esc_html( $categories[0]->name );
      }
      ?>
    </p>
    <h1 class="front-title fs-title">
      <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="front-title-link fs-title-link">
        <?php the_title();?>
      </a>
    </h1>


    <p class="front-excerpt fs-excerpt"><?php miscellanynews_the_excerpt_limit(20); ?></p>

    <p class="front-author fs-author">By <?php miscellanynews_get_author_link(); ?></p>

  </div>

</article>
