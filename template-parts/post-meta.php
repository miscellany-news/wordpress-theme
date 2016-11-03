<div class="meta">
  <div class="meta-item meta-written-by">
    <span class="meta-heading">Written By</span>
    <?php
    if ( function_exists( 'coauthors_posts_links' ) ) {
      coauthors_posts_links();
    } else {
      the_author_link();
    }?>
  </div>
  
  <div class="meta-item meta-posted-on">
    <span class="meta-heading">Posted On</span>
    <time datetime="<?php the_date('Y-m-d');?>"><?php the_time('F j, Y');?></time>
  </div>
  
  <div class="meta-item meta-posted-in">
    <span class="meta-heading">Posted In</span>
    <?php
    the_category(', ');
    ?>
  </div>
  <div class="meta-item meta-share">
    <span class="meta-heading">Share</span>
    Share icons
  </div>

</div>