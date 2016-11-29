<?php

require_once('front-page-inc.php');

/**
 * Returns the text for the specified title type. Options are 'tiny', 'short', 'normal'. 
 * Defaults to normal.
 */
function miscellanynews_get_title($length = 'normal') {
  if ($length == 'short' and $short = get_post_meta(get_the_ID(), 'short_title', true))
    return $short;
  else if ($length == 'tiny' and $tiny = get_post_meta(get_the_ID(), 'short_title', true))
    return $tiny;
  else
    return get_the_title();
}

function miscellanynews_get_featured_list($category, $params=array()) { ?>
    <section class="featured-section featured-list">
      <?php
      // Defaults
      if (!isset($params['image'])) { $params['image'] = false; }
      if (!isset($params['offset'])) { $params['offset'] = 0; }
      if (!isset($params['count'])) { $params['count'] = 4; }
      if (!isset($params['sticky'])) { $params['sticky'] = false; }
      if (!isset($params['heading'])) { $params['heading'] = ""; }
      if (!isset($params['featured'])) { $params['featured'] = false; }
      
      $image = $params['image'];
      $offset = $params['offset'];
      $count = $params['count'];
      $sticky = $params['sticky'];
      $heading = $params['heading'];
      $large = $params['large'];
      
      $args = array('posts_per_page' => $count, 'offset' => $offset, 'cat' => $category);
      
      if($options['miscellanynews_featured_sticky']) {
        $args = array_merge($args, array('post__in'  => get_option( 'sticky_posts' ), 'ignore_sticky_posts' => 1));
      } 
      ?>
      
      <h2 class="section-heading">
        <?php if(empty($heading)) : ?>
          <a href="<?php echo get_category_link($category); ?>"><?php echo get_cat_name($category); ?></a>
        <?php else : ?>
          <?php echo($heading); ?>
        <?php endif;?>
      </h2>
      
      <?php
      
      if($large) :
        $args_l = $args;
        $args_l['posts_per_page'] = 1;
        
        $args['offset']++;
        $args['posts_per_page']--;
        
        $loop_l = new WP_Query( $args_l );
        
        while ($loop_l->have_posts()) : $loop_l->the_post(); // The loop ?>
          <article class="post featured-article featured-list-article featured-list-article-large">
          <a href="<?php the_permalink(); ?>" class="featured-image featured-list-image featured-list-image-large"><?php the_post_thumbnail('featured-image-wide')?></a>
        <h3 class="post-title featured-post-title featured-large-post-title">
              <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
                <?php echo miscellanynews_get_title(); ?>
              </a>
            </h3>
          <p class="excerpt featured-excerpt featured-large-excerpt">
            <?php the_excerpt_limit(10); ?>
          </p>
         
          <p class="post-author featured-post-author featured-large-post-author">
            By <?php miscellanynews_get_author_link(); ?>
          </p>
          
        </article>
      <?php endwhile; wp_reset_postdata();
      
      endif; // End if($large)
      
      $the_loop = new WP_Query( $args );?>

      <?php
      while ($the_loop->have_posts()) : $the_loop->the_post(); // The loop ?>
        <article class="featured-list-article">
          
          <?php if($image) : ?>
            <a href="<?php the_permalink(); ?>" class="featured-image featured-list-image">
              <?php the_post_thumbnail('medium')?>
            </a>
          <?php endif; ?>
        
          <h3 class="post-title featured-post-title featured-list-title">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark" class="title">
              <?php echo miscellanynews_get_title('short');?>
            </a>
          </h3>
  
          <p class="post-author featured-post-author featured-list-author">
            By 
            <?php miscellanynews_get_author_link(); ?>
          </p>
          <div class="clear"></div>
          
        </article>
      <?php endwhile; wp_reset_postdata(); ?>
    </section>
<?php
}

/**
 * Function to print the author link. If the "author" custom field is set
 * then that will be used with no link. If the "Co-Authors Plus" plugin is
 * enabled then it will use that function to get the authors link.
 * Otherwise, it will use the built in the_authors_link() function.
 */
function miscellanynews_get_author_link() {
  // Get the "author" custom field
  $custom_author = get_post_meta(get_the_ID(), 'author', true);
  
  if($custom_author) {
    echo $custom_author; // Has "author" custom field
  } elseif (function_exists('coauthors_posts_links')) {
    coauthors_posts_links(); // "Co-Authors Plus" plugin
  } else {
    the_author_link();
  }
}

/**
 * Gets the excerpt with an arbitrary length.
 * 
 * Max length = default (55 words)
 */
function miscellanynews_the_excerpt_limit($limit, $read_more = false) {
  echo wp_trim_words(get_the_excerpt(), $limit, '&hellip;');
  if($read_more) {
    echo '&nbsp;<a href="'. esc_url( get_permalink() ) . '">'  . 'Read more &raquo;</a>';
  }
}