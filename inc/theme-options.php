<?php
add_action( 'admin_menu', 'miscellanynews__add_admin_menu' );
add_action( 'admin_init', 'miscellanynews__settings_init' );


function miscellanynews__add_admin_menu(  ) {
  add_submenu_page(
    'themes.php',                   // $parent_slug
    'Custom Theme Options',         // $page_title
    'Theme Options',                // $menu_title
    'manage_options',               // $capability
    'the_miscellany_news',          // $menu_slug
    'miscellanynews_options_page'  // $function to output page
  );
}


function miscellanynews__settings_init(  ) {
  // Add the section so we can add our fields to it
  add_settings_section(
    'miscellanynews_main_section', // $id
    '', // $title
    'miscellanynews_main_section_callback', // $callback
    'miscThemeOptions' // $page
  );
  // Add the field with the names and function to use for our new
 	// settings, put it in our new section
  add_settings_field(
    'miscellanynews_analytics_code',
    __( 'Google Analytics Code', 'the-miscellany-news' ),
    'miscellanynews_analytics_code_render',
    'miscThemeOptions',
    'miscellanynews_main_section'
  );
  // Register our setting so that $_POST handling is done for us and
 	// our callback function just has to echo the <input>
  register_setting( 'miscThemeOptions', 'miscellanynews_settings' );
}


function miscellanynews_analytics_code_render() {
  $options = get_option( 'miscellanynews_settings' );
  ?>

  <fieldset>
    <p><label for="miscellanynews_analytics_code">Put your Google Analytics code here. The code will be placed right before the closing <code>&lt;/head&gt;</code> tag.</label></p>
    <p><textarea cols="50" rows="10" id="miscellanynews_analytics_code" name="miscellanynews_settings[miscellanynews_analytics_code]" class="large-text code"><?php echo $options['miscellanynews_analytics_code']; ?></textarea></p>
  </fieldset>

  <?php
}

function miscellanynews_main_section_callback() {
  echo '<p>Theme options for The Miscellany News custom theme.</p>';
}


function miscellanynews_options_page() {
  echo '<div class="wrap">';
  echo '<h1>Theme Options</h1>';
  echo '<form action="options.php" method="post">';
  settings_fields( 'miscThemeOptions' );
  do_settings_sections( 'miscThemeOptions' );
  submit_button();
  echo '</form>';
  echo '</div>';

}

?>
