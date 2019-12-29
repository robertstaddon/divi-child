<?php

/**
 * Enqueue the theme stylesheets and custom JavaScript
 */
function divi_child_enqueue_styles() {
 
    $parent_style = 'divi-style';
 
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
    
    wp_enqueue_script( "custom-js", get_stylesheet_directory_uri() . "/scripts.js", array( "jquery" ), "", true );
}
add_action( 'wp_enqueue_scripts', 'divi_child_enqueue_styles' );


/**
 *	This will hide the Divi "Project" post type.
 *	Thanks to georgiee (https://gist.github.com/EngageWP/062edef103469b1177bc#gistcomment-1801080) for his improved solution.
 */
function mytheme_et_project_posttype_args( $args ) {
	return array_merge( $args, array(
		'public'              => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => false,
		'show_in_nav_menus'   => false,
		'show_ui'             => false
	));
}
add_filter( 'et_project_posttype_args', 'mytheme_et_project_posttype_args', 10, 1 );

