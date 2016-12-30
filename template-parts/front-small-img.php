<article class="front-article small-article">

  <a class="front-image fs-image fsi-image" href="<?php the_permalink(); ?>">
    <?php the_post_thumbnail('thumbnail')?>
  </a>
  
  <div class="front-content fs-content fsi-content">

    <p class="front-category fs-category fsi-category">
      <?php
      $categories = get_the_category();

      if ( ! empty( $categories ) ) {
        echo esc_html( $categories[0]->name );
      }
      ?>
    </p>
    <h1 class="front-title fs-title fsi-title">
      <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="front-title-link fs-title-link fsi-title-link">
        <?php the_title();?>
      </a>
    </h1>

    <p class="front-author fs-author fsi-author">By <?php miscellanynews_get_author_link(); ?></p>

    <p class="front-excerpt fs-excerpt fsi-excerpt"><?php miscellanynews_the_excerpt_limit(15); ?></p>

  </div>

</article>
