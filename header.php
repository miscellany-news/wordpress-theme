<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

  <header class="header-main">
		<a href="#main-nav-1" class="screen-reader-text">Skip to navigation</a>
    <a class="header-logo" href="<?php echo esc_url( home_url( '/' ) );?>">
				<img src="<?php echo get_template_directory_uri() . '/images/logo-text.png'?>">
		</a>
		<a href="#aux-nav-1" class="header-menu">Menu</a>
  </header>

  <?php wp_nav_menu( array(
    'theme_location' => 'primary-menu',
    'container' => 'nav',
		'menu_id' => 'main-nav-1',
    'container_class' => 'main-navigation'
  )); ?>
