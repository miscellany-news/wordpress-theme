<?php get_header();  ?>

<!-- Main content -->
<main class="site-main page-single">
  <?php while ( have_posts() ) : the_post(); ?>

    <!-- Post -->
    <article id="post-<?php the_ID(); ?>" <?php post_class('post-single'); ?>>

      <!-- Post header -->
      <header class="post-header">

        <!-- Post title -->
        <?php if( get_the_title() ) : ?>
          <h1 class="post-title"><a href="<?php urlencode(the_permalink());?>" rel="bookmark" class="post-title-link"><?php the_title();?></a></h1>
        <?php endif;?>

        <!-- Featured image -->
        <?php
        if ( has_post_thumbnail() ) {
          echo '<figure class="post-featured-image-figure">';
        	the_post_thumbnail('large', array('class' => 'post-featured-image'));
          echo '<figcaption class="post-featured-image-figcaption">';
          echo get_post(get_post_thumbnail_id())->post_excerpt;
          echo '</figcaption>';
          echo '</figure>';
        }
        ?>

        <!-- Post author and published date -->
        <div class="post-meta">
          <?php
          $archive_year  = get_the_time('Y');
          $archive_month = get_the_time('m');
          $archive_day   = get_the_time('d');
          ?>
          By
          <span class="post-author">
            <?php miscellanynews_get_author_link(); ?>
          </span>
          &#8226;
          <time datetime="<?php the_date('Y-m-d');?>" class="post-date">
            <a href="<?php echo get_day_link( $archive_year, $archive_month, $archive_day); ?>">
              <?php the_time('F j, Y');?>
            </a>
          </time>
          &#8226;
          <span class="post-category">
            <?php foreach(get_the_category() as $category) : ?>
            <a href="<?php echo get_category_link($category->term_id); ?>" class="post-category-link"><?php echo $category->name; ?></a><span class="pcl-comma">,</span>
            <?php endforeach; ?>
          </span>

        </div>

      </header>

      <!-- Post content -->
      <div class="post-content">
        <?php the_content();?>
      </div>

      <!-- Post pagination -->
      <?php wp_link_pages(array( 'before' => '<nav class="link-pages">', 'after'  => '</nav>')); ?>

    </article>

    <?php
    // If comments are open or we have at least one comment, load up the comment template.
    if ( comments_open() || get_comments_number() ) { comments_template(); } ?>

  <?php endwhile; // end loop ?>
</main>

<?php get_footer(); ?>
