<article class="front-article">

  <a class="front-image">
    <?php the_post_thumbnail('medium')?>
  </a>

  <div class="front-content">
    <h1 class="front-title">
      <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="front-title-link">
        <?php the_title();?>
      </a>
    </h1>

    <p class="front-excerpt"><?php miscellanynews_the_excerpt_limit(15); ?></p>

    <p class="front-author">By <?php miscellanynews_get_author_link(); ?></p>
  </div>

  <a href="<?php the_permalink(); ?>" class="link-overlay"></a>
</article>
