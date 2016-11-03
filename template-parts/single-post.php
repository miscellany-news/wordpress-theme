<?php
/**
* Template part for displaying post or page content
*/
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
