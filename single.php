<?php get_header();  ?>

<!-- Main content -->
<main class="site-main">
  <?php while ( have_posts() ) : the_post(); ?>

    <!-- Post -->
    <article id="post-<?php the_ID(); ?>" <?php post_class('post-single'); ?>>

      <!-- Post header -->
      <header class="post-header">

        <!-- List of entry categories -->
        <?php foreach(get_the_category() as $category) : ?>
          <div class="post-category"><a href="<?php echo get_category_link($category->term_id); ?>"><?php echo $category->name; ?></a></div>
        <?php endforeach; ?>

        <!-- Post title -->
        <?php if( get_the_title() ) : ?>
          <h1 class="post-title"><a href="<?php urlencode(the_permalink());?>" rel="bookmark"><?php the_title();?></a></h1>
        <?php endif;?>

        <!-- Post author and published date -->
        <div class="post-meta">
          <?php
          $archive_year  = get_the_time('Y');
          $archive_month = get_the_time('m');
          $archive_day   = get_the_time('d');
          ?>
          By <span class="post-author"><?php miscellanynews_get_author_link(); ?></span> on <time datetime="<?php the_date('Y-m-d');?>" class="post-date"><a href="<?php echo get_day_link( $archive_year, $archive_month, $archive_day); ?>"><?php the_time('F j, Y');?></a></time>

        </div>

      </header>

      <!-- Featured image -->
      <?php
      get_template_part( 'template-parts/featured-image', get_post_format() );
      ?>

      <!-- Post content -->
      <?php the_content();?>

      <!-- Post pagination -->
      <?php wp_link_pages(array( 'before' => '<nav class="link-pages">', 'after'  => '</nav>')); ?>

    </article>

    <?php
    // If comments are open or we have at least one comment, load up the comment template.
    if ( comments_open() || get_comments_number() ) { comments_template(); } ?>

  <?php endwhile; // end loop ?>
</main>

<?php get_footer(); ?>
