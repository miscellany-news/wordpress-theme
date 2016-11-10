<?php

/* Include the header.php file */
get_header();
?>
<main class="container">
  <div class="row top">
    <div class="column medium-8">
      <?php
      if ( have_posts() ) :

        /* Start the Loop */
        while ( have_posts() ) : the_post();
?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          <?php if( get_the_title() ) : ?>
            <header>
              <h1 class="page-title"><?php the_title();?></h1>
            </header>
          <?php endif;?>
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
      ?></div>
      <aside class="column medium-4">
        <?php
        get_sidebar();
        ?>
      </aside>
    </div>
  </main>

  <?php
  /* Include the footer.php file */
  get_footer();

  ?>
