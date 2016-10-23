<?php
/**
* Template part for displaying post or page content
*/
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <?php if( get_the_title() ) : ?>
    <header>
      <h1><?php the_title();?></h1>
    </header>
  <?php endif;?>
  <?php
  get_template_part( 'template-parts/featured-image', get_post_format() );
  ?>
  <div class="post-content">
    <?php
    the_content();
    ?>
    <?php
    wp_link_pages( array(
      'before' => '<nav class="link-pages">',
      'after'  => '</nav>',
    ));
    ?>
  </div>


</article>
