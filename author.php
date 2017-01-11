<?php get_header(); ?>

<main class="main-content">

  <?php if ( function_exists( 'coauthors_posts_links' ) ) :
    global $post;
    $author_id=$post->post_author;
    foreach( get_coauthors() as $curauth ): ?>
      <?php get_template_part( 'template-parts/author'); ?>
    <?php endforeach; ?>
  <?php else : ?>
    <?php $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); ?>
    <?php get_template_part( 'template-parts/author'); ?>
  <?php endif; ?>


  <div class="author_posts">

    <?php
    if ( have_posts() ) : while ( have_posts() ) : the_post();

      get_template_part( 'template-parts/content' );

    endwhile; else: ?>

      <p>No posts by this author.</p>

    <?php endif; ?>

  </div>
</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
