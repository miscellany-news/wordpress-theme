<article class="front-article fm-article">

  <p class="front-category fs-category">
    <?php the_category(', '); ?>
  </p>

  <h3 class="front-title fm-title">
    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="front-title-link fm-title-link">
      <?php the_title();?>
    </a>
  </h3>

  <a class="front-image fm-image" href="<?php the_permalink(); ?>">
    <?php the_post_thumbnail('small')?>
  </a>

  <p class="front-author fm-author">By <?php miscellanynews_get_author_link(); ?></p>

  <p class="front-excerpt fm-excerpt"><?php miscellanynews_the_excerpt_limit(10); ?></p>

</article>
