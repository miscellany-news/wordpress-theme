<?php
/**
 * Template part for displaying post or page content
 */
 ?>

 <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
   <header>
     <h1><a href="<?php the_permalink();?>" rel="bookmark"><?php the_title();?></a></h1>
     <p>By: <?php the_author_link(); ?></p>
     <p>Posted On: <time datetime="<?php the_date('Y-m-d');?>"><?php the_time('F j, Y');?></time></p>
   </header>

  <?php
    // check if the post has a Post Thumbnail assigned to it.
    if ( has_post_thumbnail() ) : ?>

    <figure>
      <?php
      the_post_thumbnail();

      $thumbnail_caption = get_post(get_post_thumbnail_id())->post_excerpt;

      if ($thumbnail_caption) : ?>
        <figcaption>
          <?php echo $thumbnail_caption; ?>
        </figcaption>
      <?php endif;?>
    </figure>

    <?php
    endif;

    the_content();

    wp_link_pages( array(
      'before' => '<nav class="link-pages">',
      'after'  => '</nav>',
    ));
  ?>

 </article>
