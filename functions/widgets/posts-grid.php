<?php
/**
* Adds Foo_Widget widget.
*/
class Posts_Grid extends WP_Widget {
 
  /**
   * Register the widget
   */
  public function __construct() {
    parent::__construct( 'posts-grid', 'Posts Grid', array( 'description' => __( 'A grid of posts', 'text_domain' ), ));
  }
  
  /**
   * Output the content of the widget
   */
  public function widget($args, $instance) {
    
    // Variables
    extract($args);
    $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
    $category = isset($instance['category']) ? $instance['category'] : '';
    $postcount = empty($instance['postcount']) ? '5' : $instance['postcount'];
    $shorttitle = $instance['shorttitle'] ? '1' : '0';
    $background = $instance['background'] ? '1' : '0';
    $border = $instance['border'] ? '1' : '0';
    
    echo $before_widget;
    
    
    
    // Build Arguments for WP_Query
    $args = array('posts_per_page' => $postcount, 'cat' => $category);
    $widget_loop = new WP_Query($args); 
    
    ?>
    
    <div class="widget widget-posts-grid <?php if($border) echo 'widget-border '; if($background) echo 'widget-background'; ?>">
      <?php
      // Display Title
      if (!empty($title)) echo $before_title . esc_attr($title) . $after_title;?>
      <ul>
        <?php
        while ($widget_loop->have_posts()) : $widget_loop->the_post(); // The loop ?>
        <li>
          <h1 class="title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
            <?php 
            $theshorttitle = get_post_meta(get_the_ID(), 'Short Title', true);
            if($shorttitle && $theshorttitle) :
              echo $theshorttitle;
              else :
                the_title();
              endif; ?>
            </a></h1>
            <p class="meta">By 
              <?php
              if ( function_exists( 'coauthors_posts_links' ) ) {
                coauthors_posts_links();
              } else {
                the_author_link();
              }?>
            </p>
            <?php the_excerpt_limit(15) ?>
      
          </li>
      
        <?php endwhile; wp_reset_postdata(); ?>
      </ul>
    </div>
    <?php
    echo $after_widget;
  }
  
  /**
   * Create the options form in the dashboard
   */
  public function form($instance) {
    $defaults = array('title' => '', 'category' => '', 'postcount' => '5');
    $instance = wp_parse_args((array) $instance, $defaults);
    ?>
    
    <!-- Title -->
    <p>
      <label for="<?php echo $this->get_field_id('title'); ?>">Title</label> 
      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $instance['title']; ?>">
    </p>
    
    <!-- Category -->
    <p>
      <label for="<?php echo $this->get_field_id('category'); ?>">Select a Category</label>
      <select id="<?php echo $this->get_field_id('category'); ?>" class="widefat" name="<?php echo $this->get_field_name('category'); ?>">
        <option value="0" <?php if (!$instance['category']) echo 'selected="selected"'; ?>>All</option>
        <?php
        $categories = get_categories(array('type' => 'post'));
        foreach($categories as $cat) {
          echo '<option value="' . $cat->cat_ID . '"';
          if ($cat->cat_ID == $instance['category']) { echo ' selected="selected"'; }
          echo '>' . $cat->cat_name . ' (' . $cat->category_count . ')';
          echo '</option>';
        }
        ?>
      </select>
   </p>
    
    <!-- Post Count -->
    <p>
      <label for="<?php echo $this->get_field_id('postcount'); ?>">Number of Posts</label> 
      <input class="widefat" id="<?php echo $this->get_field_id( 'postcount' ); ?>" name="<?php echo $this->get_field_name( 'postcount' ); ?>" type="text" value="<?php echo $instance['postcount']; ?>">
      <small>How many posts do you want displayed?</small>
    </p>
    
    <!-- Use Short Titles Custom Fields -->
    <p><label for"<?php echo $this->get_field_id('shorttitle');?>">
      <input type="checkbox" id="<?php echo $this->get_field_id('shorttitle');?>" name="<?php echo $this->get_field_name('shorttitle'); ?>" <?php checked( $instance['shorttitle'] ); ?>>
      Use short title</label>
      <br>
      <small>When checked, the theme will look for a Short Title custom field on the posts</small>
    </p>
    
    <!-- Border -->
    <p><label for"<?php echo $this->get_field_id('border');?>">
      <input type="checkbox" id="<?php echo $this->get_field_id('border');?>" name="<?php echo $this->get_field_name('border'); ?>" <?php checked( $instance['border'] ); ?>>
      Show border</label>
      <br>
      <small>Displays a border around the widget</small>
    </p>
    
    <!-- Background -->
    <p><label for"<?php echo $this->get_field_id('background');?>">
      <input type="checkbox" id="<?php echo $this->get_field_id('background');?>" name="<?php echo $this->get_field_name('background'); ?>" <?php checked( $instance['background'] ); ?>>
      Show background</label>
      <br>
      <small>Fills the widget with a background color</small>
    </p>
    
    <?php 
  }
  
  /**
   * Process options from form on save
   */
  public function update($new_instance, $old_instance) {
    $instance = $old_instance;
    $instance['title'] = sanitize_text_field($new_instance['title']);
    $instance['category'] = absint($new_instance['category']);
    $instance['postcount'] = absint($new_instance['postcount']);
    $instance['shorttitle'] = $new_instance['shorttitle'] ? 1 : 0;
    $instance['background'] = $new_instance['background'] ? 1 : 0;
    $instance['border'] = $new_instance['border'] ? 1 : 0;
    return $instance;
  }
  
 
}

add_action( 'widgets_init', function() { register_widget( 'Posts_Grid' ); } );?>