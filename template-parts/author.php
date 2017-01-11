<?php global $curauth; // Use $curauth variable set in author.php ?>

<h2>Posts by <?php echo $curauth->display_name; ?>:</h2>
<p class="author-bio">
  <?php echo $curauth->description; ?>
</p>
