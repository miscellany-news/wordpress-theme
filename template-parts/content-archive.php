<?php
/**
* Template part for displaying an archive
*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(array('archive-post', 'row')); ?>>

  <!-- Featured image -->
  <?php if ( has_post_thumbnail() ) : ?>
    <a class="archive-featured" href="<?php the_permalink(); ?>">
      <?php the_post_thumbnail('large', array('class' => 'post-featured-image')); ?>
    </a>
  <?php endif; ?>
  <div class="archive-content">
    <h3 class="archive-title"><a href="<?php the_permalink();?>" rel="bookmark" class="archive-link"><?php the_title();?></a></h3>
    <p class="archive-author">By <?php miscellanynews_get_author_link(); ?></p>
    <p class="archive-excerpt">
      <?php miscellanynews_the_excerpt_limit(30); ?>
    </p>
  </div>

</article>
