<?php get_header(); ?>
<main class="container">
  <?php if(is_active_sidebar('home-featured')) : ?>
    <div class="row top-padding">
      <div class="col-sm-12 home-featured">
        <?php dynamic_sidebar('home-featured') ?>
      </div>
    </div>
  <?php endif; ?>
  
  <div class="row">
    
    <div class="col-md-9">
      <?php 
      $options = get_option( 'miscellanynews_settings' );
      $the_loop = new WP_Query(array('posts_per_page' => 1, 'cat' => $options['miscellanynews_featured_category'])); 
      ?>
      <section class="home-featured">
        <?php
        while ($the_loop->have_posts()) : $the_loop->the_post(); // The loop ?>
        <article>
          <div class="row">
            <div class="col-lg-7">
              <?php the_post_thumbnail('featured-image-large')?>
            </div>
            <div class="col-lg-5">

              <h3 class="title">
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark" class="title">
                  <?php 
                  $theshorttitle = get_post_meta(get_the_ID(), 'Short Title', true);
                  if($theshorttitle) :
                    echo $theshorttitle;
                    else : the_title();
                  endif; ?>
                </a></h3>
                <p class="meta-author">By 
                  <?php
                  if ( function_exists( 'coauthors_posts_links' ) ) {
                    coauthors_posts_links();
                  } else {
                    the_author_link();
                  }?>
                </p>
                <?php the_excerpt_limit(20) ?>
              </div>
            </article>
      
          <?php endwhile; wp_reset_postdata(); ?>
        </section>
      </div>
      
      <div class="col-md-3">
        <?php 
        if(is_active_sidebar('primary')) : 
          dynamic_sidebar('primary'); 
        endif; ?>
      </div>
      
    </div>
  
  </main>
  <?php get_footer(); ?>
