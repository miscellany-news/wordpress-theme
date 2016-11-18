<?php

if (has_post_thumbnail()) : ?>

  <figure class="featured-image">
    <div class="media-credit-container">
    <?php the_post_thumbnail('large'); ?>
    <?php
    $media_credit = get_media_credit(get_post_thumbnail_id($post));

    if( !empty( $media_credit) ) :
    ?>
      <span class="media-credit">
      Photo by <?php the_media_credit_html(get_post_thumbnail_id($post)); ?>
      </span>
    
    <?php
    endif;?>
  </div>
    <?php

    $thumbnail_caption = get_post(get_post_thumbnail_id())->post_excerpt;

    if ($thumbnail_caption) : ?>
    <figcaption>
      <?php echo $thumbnail_caption; ?>
    </figcaption>
    <?php endif;?>
  </figure>
  
<?php
endif;?>