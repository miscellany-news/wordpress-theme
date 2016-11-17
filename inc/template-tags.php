<?php
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

function miscellanynews_get_category_list($category) { ?>
    <section class="category-list">
      <?php 
      $category_link = get_category_link($category);
      $the_loop = new WP_Query(array('posts_per_page' => 4, 'offset' => 0, 'cat' => $category));?>
      <h2 class="section-heading">
        <a href="<?php echo $category_link; ?>"><?php echo get_cat_name($category); ?></a>
      </h2>
      <?php
      while ($the_loop->have_posts()) : $the_loop->the_post(); // The loop 
        get_template_part('template-parts/front-category');
      endwhile; wp_reset_postdata(); ?>
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
function the_excerpt_limit($limit, $read_more = false) {
  echo '<p class="excerpt">';
  echo wp_trim_words(get_the_excerpt(), $limit, '&hellip;');
  if($read_more) {
    echo '&nbsp;<a href="'. esc_url( get_permalink() ) . '">'  . 'Read more &raquo;</a>';
  }
  echo '</p>';
}