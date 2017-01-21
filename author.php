<?php get_header(); ?>

<main class="main-content">

  <?php
  global $coauthors_plus;
  if (isset($coauthors_plus)) {
    $curauth = $coauthors_plus->get_coauthor_by( 'user_nicename', $author_name );
  } else {
    if(isset($_GET['author_name'])) :
      $curauth = get_userdatabylogin($author_name);
    else :
      $curauth = get_userdata(intval($author));
    endif;
  }
  ?>

  <?php get_template_part( 'template-parts/author'); ?>

  <div class="author-posts archive-list">

    <?php
    if ( have_posts() ) :

      while ( have_posts() ) : the_post();
      get_template_part( 'template-parts/content' );
      endwhile;

      // Previous/next page navigation.
      the_posts_pagination(array('type' => 'list'));

    else: ?>

      <p>No posts by this author.</p>

    <?php endif; ?>

  </div>
</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
