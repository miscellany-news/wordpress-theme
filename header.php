<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="site-container">
<div id="hamburger-page-background" class="hamburger-background"></div>
  <!-- Site header -->
  <header class="site-header">


    <div class="header-container">
      <!-- The Miscellany News logo -->
      <h1 class="site-name">

        <a class="site-title" href="<?php echo esc_url( home_url( '/' ) );?>">
          <span class="screen-reader-text">The Miscellany News</span>
          <img src="<?php echo get_template_directory_uri() . '/img/logo.svg'?>" class="site-logo">
        </a>
      </h1>
      <p class="site-subheading">
        Vassar College's student newspaper of record since 1866
      </p>
      <a href="#footer-search-form" class="head-search-button"></a>
    </div>

    <nav class="hn">
      <div class="hn-container">
        <a href="#footer-navigation" class="hn-mobile-show" id="hn-mobile-show">Menu</a>
        <?php
        wp_nav_menu( array(
          'theme_location' => 'site-navigation',
          'container' => '',
          'menu_class' => 'hn-menu',
          //'link_before' => '<span>',
          //'link_after' => '</span>',
          'menu_id' => 'hn-menu'
        ));
        ?>
      </div>
    </nav>
  </header>

<div class="content-container">
