<?php
/**
* Template part for displaying an archive
*/
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(array('archive-post', 'row')); ?>>
<div class="column large-3 show-large ">
  <?php 
  if (has_post_thumbnail()) :
    the_post_thumbnail('thumbnail', array( 'class' => 'archive-image' ));
  endif; ?>
  </div>
  <div class="column large-9">
  <?php if( get_the_title() ) : ?>
    <h2 class="archive-post-title"><a href="<?php the_permalink();?>" rel="bookmark"><?php the_title();?></a></h2>
  <?php else : ?>
    <p><a href="<?php the_permalink();?>" rel="bookmark">Permalink</a></p>
  <?php endif;?>
  <div class="archive-meta">
    <span class="archive-authors-links">By 
      <?php miscellanynews_get_author_link(); ?>
      <?php 
      $archive_year  = get_the_time('Y'); 
      $archive_month = get_the_time('m'); 
      $archive_day   = get_the_time('d'); 
      ?>
    </span> | <time datetime="<?php the_date('Y-m-d');?>"><a href="<?php echo get_day_link( $archive_year, $archive_month, $archive_day); ?>"><?php the_time('F j, Y');?></a></time>
  </div>
  <div class="archive-post-content">
    <?php miscellanynews_the_excerpt_limit(30); ?>
  </div>
</div>
</article>