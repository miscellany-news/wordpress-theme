<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="page-header">
    <h1 class="page-title"><?php the_title();?></h1>
  </header>
  <div class="page-content">
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