<footer class="main-footer container">
  <div class="copyright">
    &copy; <?php bloginfo("name"); echo " " . date('Y'); ?>
  </div>
  <div class="footer-menu-small">
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
