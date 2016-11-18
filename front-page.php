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

<main class="container container-top front-page">

<div class="row">

<div class="column medium-8">

<div class="row">
<div class="column medium-12 large-8">
<?php miscellanynews_get_article_x_large($featured_category, array('sticky' => true)); ?>
</div>
<div class="column medium-12 large-4">
<?php miscellanynews_get_article_list($featured_category, array('offset' => 1, 'count' => 3, 'sticky' => true)); ?>
</div>

</div>



<hr class="divider">

<div class="row">

<div class="column medium-6">

<?php miscellanynews_get_article_list($featured_category, array('offset' => 5, 'count' => 3, 'sticky' => true)); ?>

</div> <!-- end .medium-3 -->

<div class="column medium-6">
<?php miscellanynews_get_article_large($featured_category, array('offset' => 4, 'sticky' => true)); ?>

</div> <!-- end .medium-3 -->



</div> <!-- end .row -->


</div> <!-- end .large-8 -->

<div class="column medium-4">
<?php if(is_active_sidebar('primary')) dynamic_sidebar('primary');?>
</div> <!-- end .large-4 -->

</div> <!-- end .row -->



</main>

<?php get_footer(); ?>
