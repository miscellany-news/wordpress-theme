<footer class="main-footer">
    <?php wp_nav_menu( array(
    'theme_location' => 'footer-small',
    'menu_class' => 'footer-menu-list',
    'container_class' => 'container footer-menu'
    )); ?>
  <div class="footer-copyright">
    <div class="container">
      &copy; <?php bloginfo("name"); echo " " . date('Y'); ?>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
