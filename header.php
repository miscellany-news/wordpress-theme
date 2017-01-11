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

    <div class="toolbar">
      <div class="toolbar-container">
        Toolbar
      </div>
    </div>

    <div class="header-container">
      <!-- The Miscellany News logo -->
      <h1 class="site-name">
        <a class="site-title" href="<?php echo esc_url( home_url( '/' ) );?>">The Miscellany News</a>
      </h1>
      <p class="site-subheading">
        Since 1866 | <b>Wednesday,</b> January 11, 2017
      </p>
    </div>

    <nav class="hn">
      <div class="hn-container">
        <!--<div class="hn-search-overlay" id="hn-search-overlay"></div>
        <div class="hn-search-container">
          <a href="#" class="hn-search" id="hn-search"></a>
          <?php get_search_form(); ?>
        </div>-->
        <?php
        wp_nav_menu( array(
          'theme_location' => 'site-sections',
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
