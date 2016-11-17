<?php get_header(); ?>
<?php

// Get theme options
$options = get_option( 'miscellanynews_settings' );

// Move specific options into their own variables
$featured_category = $options['miscellanynews_featured_category'];
$main_1 = $options['miscellanynews_main_category_1'];
$main_2 = $options['miscellanynews_main_category_2'];
$main_3 = $options['miscellanynews_main_category_3'];
$main_4 = $options['miscellanynews_main_category_4'];

?>
<?php if(is_active_sidebar('home-featured')) : ?>
  <div class="special">
    <?php dynamic_sidebar('home-featured') ?>
  </div>
<?php endif; ?>
    
<main class="container front-page">
  <section class="featured bottom-border top">
    <?php
    // Large featured section loop
    $args = array(
      'posts_per_page' => 1,
      'offset' => 0,
      'cat' => $options['miscellanynews_featured_category']
    );
    
    if($options['miscellanynews_featured_sticky']) {
      $args = array_merge($args, array('post__in'  => get_option( 'sticky_posts' ), 'ignore_sticky_posts' => 1));
    }
    
    $the_loop = new WP_Query( $args ); 
    while ($the_loop->have_posts()) : $the_loop->the_post(); // The loop ?>
    <article class="row">
      <div class="column medium-7 featured-image">
        <a href="<?php the_permalink(); ?>">
          <?php the_post_thumbnail('featured-image-wide')?>
        </a>
      </div>
      <div class="column medium-5">
        <span class="tag">Featured Story</span>
        <h3 class="title">
          <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark" class="title">
            <?php 
            $theshorttitle = get_post_meta(get_the_ID(), 'Short Title', true);
            if($theshorttitle) :
              echo $theshorttitle;
              else : the_title();
            endif; ?>
          </a>
        </h3>
                
        <p class="meta-author">
          By 
          <?php
          miscellanynews_get_author_link();
          ?>
        </p>
        <?php the_excerpt_limit(30) ?>
      </div>
      
    </article>
  <?php endwhile; wp_reset_postdata(); ?>
</section>
<section class="featured-list bottom-border">
  <div class="row">
    <?php
    // Small featured section loop
    $the_loop = new WP_Query(array('posts_per_page' => 4, 'offset' => 1, 'cat' => $options['miscellanynews_featured_category'])); 
    ?>
    <?php
    while ($the_loop->have_posts()) : $the_loop->the_post(); // The loop ?>
    <article class="column small-6 medium-3">
      <a href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail('medium')?>
      </a>
      <h3 class="title">
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark" class="title">
          <?php 
          $theshorttitle = get_post_meta(get_the_ID(), 'Short Title', true);
          if($theshorttitle) :
            echo $theshorttitle;
            else : the_title();
          endif; ?>
        </a>
      </h3>
                
      <p class="meta-author">
        By 
        <?php
        miscellanynews_get_author_link();
        ?>
      </p>
      <?php the_excerpt_limit(20) ?>
    </article>
      
  <?php endwhile; wp_reset_postdata(); ?>
  </div>
</section>
<div class="row top">

  <div class="column small-8 medium-5 border-right">

    <?php miscellanynews_get_category_list($main_1); ?>
    <?php miscellanynews_get_category_list($main_2); ?>
    <?php miscellanynews_get_category_list($main_3); ?>
    <?php miscellanynews_get_category_list($main_4); ?>

  </div>
  <div class="column small-4 medium-3 border-right">
    <?php 
    $category_id = $options['miscellanynews_featured_category'];
    $category_link = get_category_link($category_id);
    $the_loop = new WP_Query(array('posts_per_page' => 4, 'offset' => 5, 'cat' => $category_id)); 
    ?>
    <section class="featured-excerpts">
      <h2 class="section-heading">
        <a href="<?php echo $category_link; ?>"><?php echo get_cat_name($category_id); ?></a>
      </h2>
      <?php
      while ($the_loop->have_posts()) : $the_loop->the_post(); // The loop ?>
      <article>
        <a href="<?php the_permalink(); ?>">
          <?php the_post_thumbnail('featured-image-large')?>
        </a>
        <h3 class="title">
          <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark" class="title">
            <?php echo(miscellanynews_get_title( 'short' )); ?>
          </a>
        </h3>
                
        <p class="meta-author">
          By 
          <?php
          miscellanynews_get_author_link();
          ?>
        </p>
        <?php the_excerpt_limit(20) ?>
      </article>
      <?php endwhile; wp_reset_postdata(); ?>
    </section>
  </div>

  <aside class="column medium-4 primary-sidebar">
    <?php 
    if(is_active_sidebar('primary')) : 
      dynamic_sidebar('primary'); 
    endif; ?>
  </aside>
  </div>
</main>
<?php get_footer(); ?>
