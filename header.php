<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

  <header>
    <h1><a href="<?php echo esc_url( home_url( '/' ) );?>"><?php bloginfo("name"); ?></a></h1>
    <p class="tagline">
      <?php
      echo get_bloginfo('description');
      ?>
    </p>
  </header>

  <?php wp_nav_menu( array(
    'theme_location' => 'primary-menu',
    'container' => 'nav',
    'container_class' => 'main-navigation'
  )); ?>
