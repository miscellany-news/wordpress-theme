<article class="front-article medium-article">

  <a class="front-image fm-image">
    <?php the_post_thumbnail(array(1440,860))?>
  </a>

  <div class="front-content fm-content">
    <h1 class="front-title fm-title">
      <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="front-title-link fm-title-link">
        <?php the_title();?>
      </a>
    </h1>

    <p class="front-author fm-author">By <?php miscellanynews_get_author_link(); ?></p>

    <p class="front-excerpt fm-excerpt"><?php miscellanynews_the_excerpt_limit(20); ?></p>

  </div>

</article>
