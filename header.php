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
      <figure id="hamburger-main" class="hamburger-icon">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
      </figure>
			<a class="header-logo" href="<?php echo esc_url( home_url( '/' ) );?>">
				<img src="<?php echo get_template_directory_uri() . '/images/logo.svg'?>">
			</a>
			<span class="under-logo">
        <?php
        date_default_timezone_set('America/New_York');
        $day = date('l',time());
        $date = date('F j, Y', time());
        ?>
				Since 1866 | <em><?php echo $day; ?>,</em> <?php echo $date; ?>
			</span>
		</div>
	</header>
	<nav class="navigation main-navigation">
		<?php 
		wp_nav_menu( array(
			'theme_location' => 'primary-menu',
			'container' => '',
      'menu_class' => 'menu',
			'menu_id' => 'main-nav-1'
			)); ?>
	</nav>
  <div id="hamburger-page-background"></div>