<?php
/**
* Template part for displaying post or page content
*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header>
    <?php if( get_the_title() ) : ?>
      <h1><a href="<?php the_permalink();?>" rel="bookmark"><?php the_title();?></a></h1>
    <?php else : ?>
      <p><a href="<?php the_permalink();?>" rel="bookmark">Permalink</a></p>
    <?php endif;?>
		
    <p>By: 
			<?php
			if ( function_exists( 'coauthors_posts_links' ) ) {
				coauthors_posts_links();
			} else {
				the_author_link();
			}?>
		</p>
    <p>Posted On: <time datetime="<?php the_date('Y-m-d');?>"><?php the_time('F j, Y');?></time></p>

  </header>

<?php

if (has_post_thumbnail()) : ?>

<figure>
<?php
the_post_thumbnail();

$media_credit = get_media_credit(get_post_thumbnail_id($post));

if($media_credit != " " || $media_credit != "") :
?>
<span class="media-credit">
<?php the_media_credit(get_post_thumbnail_id($post)); ?>
</span>
<?php
endif;

$thumbnail_caption = get_post(get_post_thumbnail_id())->post_excerpt;

if ($thumbnail_caption) : ?>
<figcaption>
<?php echo $thumbnail_caption; ?>
</figcaption>
<?php endif;?>
</figure>
<?php
endif;

the_content();

wp_link_pages( array(
'before' => '<nav class="link-pages">',
'after'  => '</nav>',
));
?>

</article>
