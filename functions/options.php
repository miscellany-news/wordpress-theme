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
	
	for($i = 1; $i <= 4; $i++) {
	  add_settings_field(
	    'miscellanynews_main_category_' . $i, 'Main Category ' . $i,
	    'miscellanynews_main_category_' . $i . '_render',
	    'miscellanynews_settings_page', 
		  'miscellanynews_theme_options_section'
		  );
	}
	
}

function miscellanynews_featured_category_render(  ) { 
  miscellanynews_options_get_category( 'miscellanynews_featured_category' );
}

function miscellanynews_main_category_1_render () { 
  miscellanynews_options_get_category( 'miscellanynews_main_category_1' );
}
function miscellanynews_main_category_2_render () {
  miscellanynews_options_get_category( 'miscellanynews_main_category_2' );
}
function miscellanynews_main_category_3_render () {
  miscellanynews_options_get_category( 'miscellanynews_main_category_3' );
}
function miscellanynews_main_category_4_render () {
  miscellanynews_options_get_category( 'miscellanynews_main_category_4' );
}


function miscellanynews_settings_section_callback() { 
	echo "This page contains the options for the Miscellany News Theme";
}

function miscellanynews_options_get_category( $field_name ) { 

  $options = get_option( 'miscellanynews_settings' ); ?>
  
  <select name="miscellanynews_settings[<?php echo $field_name ?>]">
    <option value="0" <?php if (!$options[$field_name]) echo 'selected="selected"'; ?>>All</option>
    <?php
    $categories = get_categories(array('type' => 'post'));
    foreach($categories as $cat) {
      echo '<option value="' . $cat->cat_ID . '"';
      if ($cat->cat_ID == $options[$field_name]) { echo ' selected="selected"'; }
      echo '>' . $cat->cat_name . ' (' . $cat->category_count . ')';
      echo '</option>';
    }
    ?>
  </select>
  <?php
  
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