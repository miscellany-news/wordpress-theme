<?php
/**
* Template part for displaying an archive
*/
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('archive'); ?>>

  <?php if( get_the_title() ) : ?>
    <h1><a href="<?php the_permalink();?>" rel="bookmark"><?php the_title();?></a></h1>
  <?php else : ?>
    <p><a href="<?php the_permalink();?>" rel="bookmark">Permalink</a></p>
  <?php endif;?>
  <span class="authors-links">By 
    <?php
    if ( function_exists( 'coauthors_posts_links' ) ) {
      coauthors_posts_links();
    } else {
      the_author_link();
    }?>
    <?php 
    $archive_year  = get_the_time('Y'); 
    $archive_month = get_the_time('m'); 
    $archive_day   = get_the_time('d'); 
    ?>
  </span> on <time datetime="<?php the_date('Y-m-d');?>"><a href="<?php echo get_day_link( $archive_year, $archive_month, $archive_day); ?>"><?php the_time('F j, Y');?></a></time>
  <?php the_excerpt_limit(40); ?>

</article>
