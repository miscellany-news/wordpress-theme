<?php

require_once('functions/options.php');
require_once('functions/setup.php');
require_once('functions/remove-bloat.php');
require_once('functions/class-tgm-plugin-activation.php');
require_once('functions/recommend-plugins.php');
require_once('functions/custom-login-page.php');
require_once('functions/add-widgets.php');


function miscellanynews_get_author_link() {
  $custom_author = get_post_meta(get_the_ID(), 'author', true);
  if($custom_author) {
    echo $custom_author;
  } elseif (function_exists('coauthors_posts_links')) {
    coauthors_posts_links();
  } else {
    the_author_link();
  }
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
?>
