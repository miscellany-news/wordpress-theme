<article class="front-article large-article">

  <a class="front-image fl-image" href="<?php the_permalink(); ?>">
    <?php the_post_thumbnail(array(1440,860))?>
  </a>

  <div class="front-content fl-content">
    <h1 class="front-title fl-title">
      <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="front-title-link fl-title-link">
        <?php the_title();?>
      </a>
    </h1>

    <p class="front-author fl-author">By <?php miscellanynews_get_author_link(); ?></p>

    <p class="front-excerpt fl-excerpt"><?php miscellanynews_the_excerpt_limit(30); ?></p>

  </div>

</article>
