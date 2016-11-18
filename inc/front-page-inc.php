<?php

/*
 * Article List
 *
 * Article List has the title, author, and editor in a list
 * 
 */
function miscellanynews_get_article_list($category, $params=array()) { ?>
      <?php
      // Defaults
      if (!isset($params['offset'])) { $params['offset'] = 0; }
      if (!isset($params['count'])) { $params['count'] = 4; }
      if (!isset($params['sticky'])) { $params['sticky'] = false; }
      
      $offset = $params['offset'];
      $count = $params['count'];
      $sticky = $params['sticky'];
      
      $args = array('posts_per_page' => $count, 'offset' => $offset, 'cat' => $category);
      
      if($sticky) {
        $args = array_merge($args, array('post__in'  => get_option( 'sticky_posts' ), 'ignore_sticky_posts' => 1));
      } 

      $the_loop = new WP_Query( $args );


      while ($the_loop->have_posts()) : $the_loop->the_post(); // The loop ?>
        <article class="article article-list">
        
          <h3 class="article-title article-list-title">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="article-title-link">
              <?php echo miscellanynews_get_title('short');?>
            </a>
          </h3>
  
          <p class="article-author article-list-author">By <?php miscellanynews_get_author_link(); ?></p>
          
          <p class="article-excerpt article-list-excerpt"><?php miscellanynews_the_excerpt_limit(15); ?></p>
        </article>
      <?php endwhile; wp_reset_postdata(); ?>
<?php
}


/*
 * Article Large
 *
 * Gets a single large article with image, author, and excerpt
 * 
 */
function miscellanynews_get_article_large($category, $params=array()) { ?>
      <?php
      // Defaults
      if (!isset($params['offset'])) { $params['offset'] = 0; }
      if (!isset($params['sticky'])) { $params['sticky'] = false; }
      
      $offset = $params['offset'];
      $sticky = $params['sticky'];
      
      $args = array('posts_per_page' => 1, 'offset' => $offset, 'cat' => $category);
      
      if($sticky) {
        $args = array_merge($args, array('post__in'  => get_option( 'sticky_posts' ), 'ignore_sticky_posts' => 1));
      } 

      $the_loop = new WP_Query( $args );


      while ($the_loop->have_posts()) : $the_loop->the_post(); // The loop ?>
        <article class="article article-lg">

          <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('large')?>
          </a>
        
          <h3 class="article-title article-lg-title">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="article-title-link">
              <?php echo miscellanynews_get_title('short');?>
            </a>
          </h3>
          
          <p class="article-author article-lg-excerpt">By <?php miscellanynews_get_author_link(); ?></p>

          <p class="article-excerpt article-lg-excerpt"><?php miscellanynews_the_excerpt_limit(30); ?></p>
         
        </article>
      <?php endwhile; wp_reset_postdata(); ?>
<?php
}



/*
 * Article Extra Large
 *
 * Gets a single extra large article with image, author, and excerpt
 * 
 */
function miscellanynews_get_article_x_large($category, $params=array()) { ?>
      <?php
      // Defaults
      if (!isset($params['offset'])) { $params['offset'] = 0; }
      if (!isset($params['sticky'])) { $params['sticky'] = false; }
      
      $offset = $params['offset'];
      $sticky = $params['sticky'];
      
      $args = array('posts_per_page' => 1, 'offset' => $offset, 'cat' => $category);
      
      if($sticky) {
        $args = array_merge($args, array('post__in'  => get_option( 'sticky_posts' ), 'ignore_sticky_posts' => 1));
      } 

      $the_loop = new WP_Query( $args );

      while ($the_loop->have_posts()) : $the_loop->the_post(); // The loop ?>
        <article class="article article-x-lg">
        <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('large')?>
          </a> 
        <h3 class="article-title article-x-lg-title">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="article-title-link">
              <?php echo miscellanynews_get_title('short');?>
            </a>
          </h3>
        
                   
          
          <p class="article-author article-x-lg-author">
            By 
            <?php miscellanynews_get_author_link(); ?>
          </p>

          <p class="article-excerpt article-x-lg-excerpt">
            <?php miscellanynews_the_excerpt_limit(30); ?>
          </p>
          
          
        </article>
      <?php endwhile; wp_reset_postdata(); ?>
<?php
}

?>