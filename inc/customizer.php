<?php

function miscellanynews_customize_register( $wp_customize ) {
  $wp_customize->add_setting( 'site_subheading', array(
    'default'     => 'Vassar College\'s student newspaper of record since 1866',
  ));

  $wp_customize->add_control( 'site_subheading', array(
    'label' => __( 'Subheading', 'the-miscellany-news' ),
    'section' => 'title_tagline',
    'type' => 'text',
  ));

  $wp_customize->add_setting( 'analytics_code', array(
    'default'     => '',
  ));

  $wp_customize->add_control( 'analytics_code', array(
    'label' => __( 'Analytics Code', 'the-miscellany-news' ),
    'section' => 'title_tagline',
    'description' => __( 'Put your analytics code here. It\'ll be placed right above the closing head tag.' ),
    'type' => 'textarea',
  ));
}

add_action( 'customize_register', 'miscellanynews_customize_register' );
