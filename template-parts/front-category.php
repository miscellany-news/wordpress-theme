  <article>
    <h3 class="title">
      <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark" class="title">
        <?php 
        $theshorttitle = get_post_meta(get_the_ID(), 'Short Title', true);
        if($theshorttitle) :
          echo $theshorttitle;
          else : the_title();
        endif; ?>
      </a>
    </h3>
                
    <p class="meta-author">
      By 
      <?php
      if ( function_exists( 'coauthors_posts_links' ) ) {
        coauthors_posts_links();
      } else {
        the_author_link();
      }?>
    </p>
  </article>