<article class="front-article article-list">

  <a class="front-list-image">
    <?php the_post_thumbnail('thumbnail')?>
  </a>

  <div class="front-list-content">
    <h1 class="front-list-title">
      <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="front-list-title-link">
        <?php the_title();?>
      </a>
    </h1>

    <p class="front-list-author">By <?php miscellanynews_get_author_link(); ?></p>
  </div>

</article>
