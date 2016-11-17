<?php

/* Include the header.php file */
get_header();
?>
<main class="container">
  <div class="row top">
    <?php
    // Start the loop.
    while ( have_posts() ) : the_post();
    ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('column medium-8'); ?>>
      <header class="post-header">

        <?php if( get_the_title() ) : ?>
        <h1 class="title"><a href="<?php urlencode(the_permalink());?>" rel="bookmark"><?php the_title();?></a></h1>
        <?php endif;?>

        <div class="share-links">
          <a href="http://www.facebook.com/sharer/sharer.php?u=<?php print(urlencode(get_permalink())); ?> &title=<?php print(urlencode(the_title())); print(urlencode(" - The Miscellany News")); ?>" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/share-fb.svg" class="share-image"></a>
          <a href="http://twitter.com/intent/tweet?status=<?php print(urlencode(the_title())); print(urlencode(" - The Miscellany News")); ?>+<?php print(urlencode(get_permalink())); ?>" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/share-tw.svg" class="share-image"></a>
          <a href="mailto:?subject=<?php print(urlencode(the_title())); print(urlencode(" - The Miscellany News")); ?>&body=Check out this article from The Miscellany News <?php print(urlencode(the_permalink())); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/share-em.svg" class="share-image"></a>
          <!--<a href="http://www.reddit.com/submit?url=<?php print(urlencode(get_permalink())); ?>&title=<?php print(urlencode(the_title())); print(urlencode(" - The Miscellany News")); ?>">Reddit</a>
          -->
        </div>

        <div class="post-meta">
          By 
          <span class="meta-author">
          <?php
          miscellanynews_get_author_link();
          ?>
          </span> on
          <time datetime="<?php the_date('Y-m-d');?>" class="post-date">
          <?php the_time('F j, Y');?>
          </time>
          in 
          <?php
          foreach(get_the_category() as $category) {
          ?>
          <span class="tag"><a href="<?php echo get_category_link($category->term_id); ?>"><?php echo $category->name; ?></a></span>
          <?php
          }
          ?>
        </div>
      </header>

      <?php
      get_template_part( 'template-parts/featured-image', get_post_format() );
      ?>


      <div class="post-content">
        <?php
        the_content();

        wp_link_pages(array( 'before' => '<nav class="link-pages">', 'after'  => '</nav>'));
        ?>
      </div>

    </article>

    <?php

    endwhile;

    // // Previous/next post navigation.
    the_posts_pagination();
    ?>
    <aside class="column medium-4 primary-sidebar">
    <?php 
    if(is_active_sidebar('primary')) : 
    dynamic_sidebar('primary'); 
    endif; ?>
    </aside>
  </div>
</main>

<?php
/* Include the footer.php file */
get_footer();

?>
