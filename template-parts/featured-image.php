<?php

if (has_post_thumbnail()) : ?>

  <figure class="featured-image">
    <?php the_post_thumbnail('large'); ?>
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