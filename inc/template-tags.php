<?php

/**
 * TEMPLATE TAGS
 * -------------
 */

/**
 * Gets the excerpt with an arbitrary length.
 *
 * Max length = default (55 words)
 */
function miscellanynews_the_excerpt_limit($limit, $read_more = false) {
  echo wp_trim_words(get_the_excerpt(), $limit, '&hellip;');
  if($read_more) {
    echo '&nbsp;<a href="'. esc_url( get_permalink() ) . '">'  . 'Read more &raquo;</a>';
  }
}
