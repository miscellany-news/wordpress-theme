<article class="front-article fn-article">
<div class="fn-wrap">
  <?php if( has_post_thumbnail() ) : ?>
  <a class="front-image fn-image" href="<?php the_permalink(); ?>">
    <?php the_post_thumbnail('feat-small'); ?>
  </a>
  <?php endif; ?>

  <div class="front-content fn-content">

    <h3 class="front-title fn-title">
      <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="front-title-link fn-title-link">
        <?php the_title();?>
      </a>
    </h3>

    <p class="front-author fn-author">By <?php miscellanynews_get_author_link(); ?></p>

  </div>
</div>
</article>
