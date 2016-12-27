<article class="front-lg-article">
  <a class="front-lg-image">
    <?php the_post_thumbnail('large')?>
  </a>

  <div class="front-lg-content">
    <h1 class="front-lg-title">
      <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="front-lg-title-link">
        <?php the_title();?>
      </a>
    </h1>

    <p class="front-lg-author">By <?php miscellanynews_get_author_link(); ?></p>

    <p class="front-lg-excerpt"><?php miscellanynews_the_excerpt_limit(15); ?></p>
  </div>
</article>
