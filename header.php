<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

  <header class="header-main">
    <a class="header-logo" href="<?php echo esc_url( home_url( '/' ) );?>">
				<img src="<?php echo get_template_directory_uri() . '/images/logo.svg'?>">
		</a>
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