</div> <!-- .content-container -->

<!-- Site footer -->
<footer class="site-footer">
  <div class="footer-top-section">
    <a href="#" class="footer-home-link"><img src="<?php echo get_template_directory_uri() . '/img/logo-black-svg.svg'?>" class="footer-logo"></a>

    <div id="footer-search-form" class="footer-search-form">
      <?php get_search_form(); ?>
    </div>
  </div>

  <div class="footer-navigation" id="footer-navigation">

    <?php if ( has_nav_menu( 'site-sections' ) ) : ?>
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
    <?php endif; ?>

    <?php if ( has_nav_menu( 'site-blogs' ) ) : ?>
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
    <?php endif; ?>

    <?php if ( has_nav_menu( 'site-social' ) ) : ?>
      <nav class="foot-nav-section foot-social-nav">
        <h3 class="foot-nav-title">Connect</h3>
        <?php
        wp_nav_menu( array(
          'theme_location' => 'site-social',
          'container' => '',
          'menu_class' => 'foot-nav-menu',
          'menu_id' => 'social-menu'
        ));
        ?>
      </nav>
    <?php endif; ?>

    <?php if ( has_nav_menu( 'site-other' ) ) : ?>
      <nav class="foot-nav-section foot-other-nav">
        <h3 class="foot-nav-title">Other</h3>
        <?php
        wp_nav_menu( array(
          'theme_location' => 'site-other',
          'container' => '',
          'menu_class' => 'foot-nav-menu',
          'menu_id' => 'other-menu'
        ));
        ?>
      </nav>
    <?php endif; ?>

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
