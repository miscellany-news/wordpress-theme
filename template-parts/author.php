<?php
global $curauth; // Use $curauth variable set in author.php

$author_name = $curauth->display_name;
$author_description = $curauth->description;
$author_website = $curauth->website;
$author_email = $curauth->user_email;

?>

<header class="author-page-header">
  <h2 class="author-page-title"><?php echo $curauth->display_name; ?></h2>
  <?php if( $author_description ) : ?>
    <p class="author-description">
      <?php echo $curauth->description; ?>
    </p>
  <?php endif; ?>

<?php if( $author_website || $author_email ) : ?>

  <ul class="author-links">
  <?php if ( $author_website ) : ?>
    <li class="author-website"><a href="<?php echo $author_website; ?>"><?php echo $author_website; ?></a></li>
  <?php endif; ?>
  <?php if ( $author_email ) : ?>
    <li class="author-email"><a href="<?php echo $author_email; ?>"><?php echo $author_email; ?></a></li>
  <?php endif; ?>
  </ul>

<?php endif;?>
</header>
