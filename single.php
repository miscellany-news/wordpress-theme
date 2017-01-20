<?php get_header();  ?>

<!-- Main content -->
<main class="main-content page-single">
  <?php while ( have_posts() ) : the_post(); ?>

    <!-- Post -->
    <article id="post-<?php the_ID(); ?>" <?php post_class('post-single'); ?>>

      <!-- Post header -->
      <header class="post-header">

        <!-- Post title -->
        <?php if( get_the_title() ) : ?>
          <h2 class="post-title"><a href="<?php urlencode(the_permalink());?>" rel="bookmark" class="post-title-link"><?php the_title();?></a></h2>
        <?php endif;?>

        <!-- Post author and published date -->
        <div class="post-meta">
          <?php
          $archive_year  = get_the_time('Y');
          $archive_month = get_the_time('m');
          $archive_day   = get_the_time('d');
          ?>
          <p><span class="post-author">By <?php miscellanynews_get_author_link(); ?></span></p>
          <p class="meta-small">Posted on <time datetime="<?php the_date('Y-m-d');?>" class="post-date"><a href="<?php echo get_day_link( $archive_year, $archive_month, $archive_day); ?>"><?php the_time('F j, Y');?></a></time> in <span class="post-category"><?php the_category(', '); ?></span></p>

        </div>

      </header>

      <!-- Featured image -->
      <?php
      if ( has_post_thumbnail() ) {
        echo '<figure class="post-featured-image-figure">';
        echo '<a href="' . get_the_post_thumbnail_url() . '">';
        the_post_thumbnail('large', array('class' => 'post-featured-image'));
        echo '</a>';
        echo '<figcaption class="wp-caption-text">';
        echo get_post(get_post_thumbnail_id())->post_excerpt;
        echo '</figcaption>';
        echo '</figure>';
      }
      ?>

      <!-- Post content -->
      <div class="post-content">
        <?php the_content();?>
      </div>

      <?php if ( is_active_sidebar( 'post-ad-area' ) ) : ?>
        <section class="post-ad-area">
        	<?php dynamic_sidebar( 'post-ad-area' ); ?>
        </section>
      <?php endif; ?>

      <!-- Post pagination -->
      <?php wp_link_pages(array( 'before' => '<nav class="link-pages">', 'after'  => '</nav>')); ?>

    </article>

    <?php
    // If comments are open or we have at least one comment, load up the comment template.
    if ( comments_open() || get_comments_number() ) { comments_template(); } ?>

  <?php endwhile; // end loop ?>
</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
