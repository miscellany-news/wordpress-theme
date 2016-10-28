<?php
/**
* Adds Foo_Widget widget.
*/
class Horizontal_Rule extends WP_Widget {
 
  /**
   * Register the widget
   */
  public function __construct() {
    parent::__construct( 'horizontal-rule', 'Horizontal Rule', array( 'description' => __( 'A simple horizontal rule', 'text_domain' ), ));
  }
  
  /**
   * Output the content of the widget
   */
  public function widget($args, $instance) {
    // Variables
    extract($args);
    
    echo $before_widget;
    
    ?>
    <hr class="widget">
    
    <?php
    echo $after_widget;
  }
  
  /**
   * Create the options form in the dashboard
   */
  public function form($instance) {
    $instance = wp_parse_args((array) $instance, $defaults);
    ?>
    
    <p>Just a horizontal rule</p>
    
    <?php 
  }
  
  /**
   * Process options from form on save
   */
  public function update($new_instance, $old_instance) {
    $instance = $old_instance;
    return $instance;
  }
  
 
}

add_action( 'widgets_init', function() { register_widget( 'Horizontal_Rule' ); } );?>