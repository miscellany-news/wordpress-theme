<?php
add_action( 'admin_menu', 'miscellanynews_add_admin_menu' );
add_action( 'admin_init', 'miscellanynews_settings_init' );


function miscellanynews_add_admin_menu(  ) {  
  // add_options_page( $page_title, $menu_title, $capability, $menu_slug, $function_to_output_page);
	add_options_page( 'The Miscellany News', 'The Miscellany News', 'manage_options', 'the_miscellany_news', 'miscellanynews_options_page' );
}


function miscellanynews_settings_init(  ) { 
	register_setting( 'miscellanynews_settings_page', 'miscellanynews_settings' );

	add_settings_section(
		'miscellanynews_theme_options_section', 'Main Options', 
		'miscellanynews_settings_section_callback', 
		'miscellanynews_settings_page'
	);

	add_settings_field( 
		'miscellanynews_featured_category', 'Featured category', 
		'miscellanynews_featured_category_render', 
		'miscellanynews_settings_page', 
		'miscellanynews_theme_options_section' 
	);
}

function miscellanynews_featured_category_render(  ) { 

	$options = get_option( 'miscellanynews_settings' );
	?>
  
  <select name="miscellanynews_settings[miscellanynews_featured_category]">
    <option value="0" <?php if (!$options['miscellanynews_featured_category']) echo 'selected="selected"'; ?>>All</option>
    <?php
    $categories = get_categories(array('type' => 'post'));
    foreach($categories as $cat) {
      echo '<option value="' . $cat->cat_ID . '"';
      if ($cat->cat_ID == $options['miscellanynews_featured_category']) { echo ' selected="selected"'; }
      echo '>' . $cat->cat_name . ' (' . $cat->category_count . ')';
      echo '</option>';
    }
    ?>
  </select>
  
	<?php

}


function miscellanynews_settings_section_callback() { 

	echo "This page contains the options for the Miscellany News Theme";

}


function miscellanynews_options_page() { 
	?>
	<form action='options.php' method='post'>

		<h2>The Miscellany News</h2>

		<?php
		settings_fields('miscellanynews_settings_page');
		do_settings_sections('miscellanynews_settings_page');
		submit_button();
		?>

	</form>
	<?php
}

?>