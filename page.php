<?php get_header(); ?>

<main class="container">
<div class="row top">
<div class="column medium-8">

<?php
// Start the loop.
while ( have_posts() ) : the_post();

// Include the page content template.
get_template_part( 'template-parts/content', 'page' );

// If comments are open or we have at least one comment, load up the comment template.
if ( comments_open() || get_comments_number() ) {
comments_template();
}

// End of the loop.
endwhile;
?>

</div>
<aside class="column medium-4">
<?php
get_sidebar();
?>
</aside>
</div>
</main>

<?php
/* Include the footer.php file */
get_footer();

?>
