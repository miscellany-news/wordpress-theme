<?php get_header(); ?>
<?php 
$options = get_option( 'miscellanynews_settings' );

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
    
<main class="container">
  <section class="featured bottom-border top">
    <?php
    $the_loop = new WP_Query(array('posts_per_page' => 1, 'offset' => 0, 'cat' => $options['miscellanynews_featured_category'])); 
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
          if ( function_exists( 'coauthors_posts_links' ) ) {
            coauthors_posts_links();
          } else {
            the_author_link();
          }?>
        </p>
        <?php the_excerpt_limit(30) ?>
      </div>
      
    </article>
  <?php endwhile; wp_reset_postdata(); ?>
</section>
      
<section class="featured-list bottom-border">
  <?php 
  $the_loop = new WP_Query(array('posts_per_page' => 4, 'offset' => 1, 'cat' => $options['miscellanynews_featured_category'])); 
  ?>
  <?php
  while ($the_loop->have_posts()) : $the_loop->the_post(); // The loop ?>
  <article>
    <a href="<?php the_permalink(); ?>">
    
      <?php the_post_thumbnail('featured-image-large')?>
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
      if ( function_exists( 'coauthors_posts_links' ) ) {
        coauthors_posts_links();
      } else {
        the_author_link();
      }?>
    </p>
    <?php the_excerpt_limit(20) ?>
  </article>
      
<?php endwhile; wp_reset_postdata(); ?>
</section>

<div class="row top">
  <div class="column medium-8">
    <div class="row">
      <section class="column large-6 category-list">
        <?php 
        $the_loop = new WP_Query(array('posts_per_page' => 4, 'offset' => 0, 'cat' => $main_1));
        ?>
        <h2 class="section-heading">
          <?php echo get_cat_name($main_1); ?>
        </h2>
        <?php
        while ($the_loop->have_posts()) : $the_loop->the_post(); // The loop 
          get_template_part('template-parts/front-category');
        endwhile; wp_reset_postdata(); ?>
      </section>
      <section class="column large-6 category-list">
        <?php 
        $the_loop = new WP_Query(array('posts_per_page' => 4, 'offset' => 0, 'cat' => $main_2));?>
        <h2 class="section-heading">
          <?php echo get_cat_name($main_2); ?>
        </h2>
        <?php
        while ($the_loop->have_posts()) : $the_loop->the_post(); // The loop 
          get_template_part('template-parts/front-category');
        endwhile; wp_reset_postdata(); ?>
      </section>
    </div>
    <div class="row">
      <section class="column large-6 category-list">
        <?php 
        $the_loop = new WP_Query(array('posts_per_page' => 4, 'offset' => 0, 'cat' => $main_3));
        ?>
        <h2 class="section-heading">
          <?php echo get_cat_name($main_3); ?>
        </h2>
        <?php
        while ($the_loop->have_posts()) : $the_loop->the_post(); // The loop 
          get_template_part('template-parts/front-category');
        endwhile; wp_reset_postdata(); ?>
      </section>
      <section class="column large-6 category-list">
        <?php 
        $the_loop = new WP_Query(array('posts_per_page' => 4, 'offset' => 0, 'cat' => $main_4));?>
        <h2 class="section-heading">
          <?php echo get_cat_name($main_4); ?>
        </h2>
        <?php
        while ($the_loop->have_posts()) : $the_loop->the_post(); // The loop 
          get_template_part('template-parts/front-category');
        endwhile; wp_reset_postdata(); ?>
      </section>
    </div>
  </div>
<aside class="column medium-4 primary-sidebar">
  <?php 
  if(is_active_sidebar('primary')) : 
    dynamic_sidebar('primary'); 
  endif; ?>
</aside>
</main>
<?php get_footer(); ?>
