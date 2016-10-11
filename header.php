<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

	<header class="header-main">
		<div class="aux-menu">
			<div class="container">
				<?php wp_nav_menu( array(
				'theme_location' => 'auxiliary-menu',
				'container' => 'nav',
				'menu_id' => 'aux-nav-1',
				'container_class' => 'aux-navigation'
				)); ?>
				<?php get_search_form() ?>
			</div>
			<span class="clear"></span>
		</div>
		<div class="container header-image">
			<a class="header-logo" href="<?php echo esc_url( home_url( '/' ) );?>">
				<img src="<?php echo get_template_directory_uri() . '/images/logo.svg'?>">
			</a>
			<span class="under-logo">
				Since 1866 | <em>Wednesday,</em> October 24, 2016 | <em>Sunny</em> 73°/46°
			</span>
		</div>
	</header>
	<nav class="navigation main-navigation sections-navigation">
		<a href="#main-nav-1" id="sections-button">Sections</a>
		<?php 
		wp_nav_menu( array(
			'theme_location' => 'primary-menu',
			'container' => '',
			'menu_id' => 'main-nav-1'
			)); ?>
	</nav>