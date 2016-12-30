<!-- Main Navigation -->
<nav class="site-nav" id="site-nav">
  <span class="nav-section">Sections</span>
  <?php
  wp_nav_menu( array(
    'theme_location' => 'site-sections',
    'container' => '',
    'menu_class' => 'site-menu',
    'link_before' => '<span>',
    'link_after' => '</span>',
    'menu_id' => 'site-sections-menu'
  )); ?>

  <span class="nav-section">Blogs</span>
  <?php
  wp_nav_menu( array(
    'theme_location' => 'site-blogs',
    'container' => '',
    'menu_class' => 'site-menu',
    'link_before' => '<span>',
    'link_after' => '</span>',
    'menu_id' => 'site-blogs-menu'
  )); ?>
</nav>

<!-- Site footer -->
<footer class="site-footer">
  <!--&copy; <?php bloginfo("name"); echo " " . date('Y'); ?>-->
</footer>
</div> <!-- .site-container -->
<?php wp_footer(); ?>

</body>
</html>
