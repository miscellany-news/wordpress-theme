<?php

require_once('class-tgm-plugin-activation.php');

add_action( 'tgmpa_register', 'miscellanynews_register_required_plugins' );

function miscellanynews_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		array(
			'name'      => 'Disable Emojis',
			'slug'      => 'disable-emojis',
			'required'  => false,
		),
		
		array(
			'name'      => 'Co-Authors Plus',
			'slug'      => 'co-authors-plus',
			'required'  => false,
		),
		
		array(
			'name'      => 'Media Credit',
			'slug'      => 'media-credit',
			'required'  => false,
		),

		array(
			'name'			=> 'Perfect Pullquotes',
			'slug'      => 'perfect-pullquotes',
			'required'  => false,
		),
		
		array(
			'name'			=> 'Search Everything',
			'slug'      => 'search-everything',
			'required'  => false,
		),
		
		array(
			'name'			=> 'Regenerate Thumbnails',
			'slug'      => 'regenerate-thumbnails',
			'required'  => false,
		),

	);

	$config = array(
		'id'           => 'miscellanynews',        // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

	);

	tgmpa( $plugins, $config );
}
