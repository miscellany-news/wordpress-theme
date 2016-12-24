<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="hamburger-page-background" class="hamburger-background"></div>
  <!-- Site header -->
  <header class="site-header">

    <!-- Hamburger icon -->
    <figure id="hamburger-main" class="hamburger-icon">
      <div class="line"></div>
      <div class="line"></div>
      <div class="line"></div>
    </figure>

    <!-- Search icon -->
    <a href="#">
      <img src="<?php echo get_template_directory_uri() . '/img/search.svg'?>" class="search-icon" id="search-main">
    </a>

    <!-- The Miscellany News logo -->
    <a class="site-title" href="<?php echo esc_url( home_url( '/' ) );?>">
      <img src="<?php echo get_template_directory_uri() . '/img/logo.svg'?>" class="site-logo">
    </a>

    <!-- Subtitle -->
    <span class="site-subtitle">
      <?php
      date_default_timezone_set('America/New_York');
      $day = date('l',time());
      $date = date('F j, Y', time());
      ?>
      Since 1866 | <em><?php echo $day; ?>,</em> <?php echo $date; ?>
    </span>

    <!-- Main navigation bar -->
    <nav class="site-nav" id="site-nav">
      <span class="nav-section">Sections</span>
      <?php
      wp_nav_menu( array(
        'theme_location' => 'primary-menu',
        'container' => '',
        'menu_class' => 'site-menu',
        'link_before' => '<span>',
        'link_after' => '</span>',
        'menu_id' => 'site-menu'
      )); ?>
    </nav>

  </header>
