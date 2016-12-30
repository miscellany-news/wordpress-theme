<article class="front-article">

  <a class="front-image" href="<?php the_permalink(); ?>">
    <?php the_post_thumbnail(array(1440,860))?>
  </a>

  <div class="front-content">

    <h3 class="front-title">
      <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="front-title-link">
        <?php the_title();?>
      </a>
    </h3>

    <p class="front-author">By <?php miscellanynews_get_author_link(); ?></p>

  </div>

</article>
