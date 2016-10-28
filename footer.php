<footer class="main-footer container">
  <div class="float-left">
    &copy; <?php bloginfo("name"); echo " " . date('Y'); ?>
  </div>
  <div class="float-right">
    <?php wp_nav_menu( array(
    'theme_location' => 'footer-menu-small',
    'container' => 'nav',
    'menu_id' => 'footer-menu-small',
    'container_class' => 'footer-menu-small'
  )); ?>
</div>
<div class="clear"></div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
