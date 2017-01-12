</div> <!-- .content-container -->

<!-- Site footer -->
<footer class="site-footer">
  <a href="#" class="footer-home-link"><img src="<?php echo get_template_directory_uri() . '/img/logo-black-svg.svg'?>" class="footer-logo"></a>

  <div class="footer-navigation">

    <nav class="foot-nav-section foot-sections-nav">
      <h3 class="foot-nav-title">Sections</h3>
      <?php
      wp_nav_menu( array(
        'theme_location' => 'site-sections',
        'container' => '',
        'menu_class' => 'foot-nav-menu',
        'menu_id' => 'sections-menu'
      ));
      ?>
    </nav>

    <nav class="foot-nav-section foot-blogs-nav">
      <h3 class="foot-nav-title">Blogs</h3>
      <?php
      wp_nav_menu( array(
        'theme_location' => 'site-blogs',
        'container' => '',
        'menu_class' => 'foot-nav-menu',
        'menu_id' => 'blogs-menu'
      ));
      ?>
    </nav>

  </div>

  <div class="foot-copyright">
    <nav class="copyright-navigation">
      <?php
      wp_nav_menu( array(
        'theme_location' => 'copyright-menu',
        'container' => '',
        'menu_class' => 'copyright-menu',
        'menu_id' => 'copyright-menu'
      ));
      ?>
    </nav>
  </div>
</footer>
</div> <!-- .site-container -->
<?php wp_footer(); ?>

</body>
</html>
