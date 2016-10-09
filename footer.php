  <footer>
		<div class="aux-menu">
		  <?php wp_nav_menu( array(
		    'theme_location' => 'auxiliary-menu',
		    'container' => 'nav',
				'menu_id' => 'aux-nav-1',
		    'container_class' => 'aux-navigation'
		  )); ?>
			<?php get_search_form() ?>
		</div>
		&copy; <?php bloginfo("name"); echo " " . date('Y'); ?>
	</footer>
  <?php wp_footer(); ?>
</body>
</html>
