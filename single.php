<?php

/* Include the header.php file */
get_header();
?>
<main class="container">
  <div class="row top">
  <?php
  if ( have_posts() ) :

    /* Start the Loop */
    while ( have_posts() ) : the_post();
    ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('column medium-8'); ?>>
      <header class="post-header">
        
        <?php if( get_the_title() ) : ?>
          <h1 class="title"><a href="<?php the_permalink();?>" rel="bookmark"><?php the_title();?></a></h1>
        <?php endif;?>
        <div class="post-meta">
          By 
          <span class="meta-author">
            <?php
            if ( function_exists( 'coauthors_posts_links' ) ) {
              coauthors_posts_links();
            } else {
              the_author_link();
            }?>
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
    
            wp_link_pages( array(
              'before' => '<nav class="link-pages">',
              'after'  => '</nav>',
            ));
            ?>

    </article>
    
    <?php

  endwhile;

  /*
  * Show pagination for the posts
  */
  the_posts_pagination();

  else :

    /* This page doesn't exist */
    get_template_part( 'template-parts/content', 'none' );

  endif;
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
