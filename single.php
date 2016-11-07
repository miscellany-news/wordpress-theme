<?php

/* Include the header.php file */
get_header();
?>
<main class="container">
  <?php
  if ( have_posts() ) :

    /* Start the Loop */
    while ( have_posts() ) : the_post();
    ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <header class="post-header">
        <?php if( get_the_title() ) : ?>
          <h1><a href="<?php the_permalink();?>" rel="bookmark"><?php the_title();?></a></h1>
        <?php else : ?>
          <p><a href="<?php the_permalink();?>" rel="bookmark">Permalink</a></p>
        <?php endif;?>
    
    
  
      </header>
      <div class="post-main">
        <aside class="post-left">
          <?php
          get_template_part('template-parts/post-meta', get_post_format());
          ?>
        </aside>
        <div class="post-right">
      
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
          </div>
        </div>
      </div>
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
</main>

<?php
/* Include the footer.php file */
get_footer();

?>
