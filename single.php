<?php get_header();  ?>

<main class="single">
  <?php 
  // Start the loop.
  while ( have_posts() ) : the_post(); ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?>>
  <header class="post-header">
<div class="share-links">
        <div class="share-box">
        <a href="http://www.facebook.com/sharer/sharer.php?u=<?php print(urlencode(get_permalink())); ?> &title=<?php print(urlencode(the_title())); print(urlencode(" - The Miscellany News")); ?>" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/share-fb.svg" class="share-image"></a>
        <a href="http://twitter.com/intent/tweet?status=<?php print(urlencode(the_title())); print(urlencode(" - The Miscellany News")); ?>+<?php print(urlencode(get_permalink())); ?>" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/share-tw.svg" class="share-image"></a>
        <a href="mailto:?subject=<?php print(urlencode(the_title())); print(urlencode(" - The Miscellany News")); ?>&body=Check out this article from The Miscellany News <?php print(urlencode(the_permalink())); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/share-em.svg" class="share-image"></a>
      </div>
      </div>
    <?php foreach(get_the_category() as $category) : ?>
    <div class="post-category"><a href="<?php echo get_category_link($category->term_id); ?>"><?php echo $category->name; ?></a></div>
    <?php endforeach; ?>

    <?php if( get_the_title() ) : ?>
      <h1 class="post-title"><a href="<?php urlencode(the_permalink());?>" rel="bookmark"><?php the_title();?></a></h1>
    <?php endif;?>
  
    <div class="post-meta">
      <?php 
      $archive_year  = get_the_time('Y'); 
      $archive_month = get_the_time('m'); 
      $archive_day   = get_the_time('d'); 
      ?>
        By <span class="post-author"><?php miscellanynews_get_author_link(); ?></span> on <time datetime="<?php the_date('Y-m-d');?>" class="post-date"><a href="<?php echo get_day_link( $archive_year, $archive_month, $archive_day); ?>"><?php the_time('F j, Y');?></a></time>
      
    </div>
    
     
  </header>
  <div class="post-left">
  <?php
  get_template_part( 'template-parts/featured-image', get_post_format() );
  ?>
  

  
    
    
      

  <div class="post-content">
  <?php
  the_content();

  wp_link_pages(array( 'before' => '<nav class="link-pages">', 'after'  => '</nav>'));
  ?>

  </div>
  
  <div class="single-sidebar">
    <?php if ( is_active_sidebar( 'post-sidebar' ) ) : ?>
      <?php dynamic_sidebar( 'post-sidebar' ); ?>
    <?php endif; ?>
  </div>
  
  </div>

</article>
<?php
    // If comments are open or we have at least one comment, load up the comment template.
    if ( comments_open() || get_comments_number() ) {
      comments_template();
    }
    
  // End of the loop.
  endwhile;
  ?>
</main>

<?php get_footer(); ?>
