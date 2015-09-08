<?php

/**

 * Encore Child Theme functions and definitions.

 *

 * Sets up the theme and provides some helper functions, which are used in the

 * theme as custom template tags. Others are attached to action and filter

 * hooks in WordPress to change core functionality.

 *

 * When using a child theme (see http://codex.wordpress.org/Theme_Development

 * and http://codex.wordpress.org/Child_Themes), you can override certain

 * functions (those wrapped in a function_exists() call) by defining them first

 * in your child theme's functions.php file. The child theme's functions.php

 * file is included before the parent theme's file, so the child theme

 * functions would be used.

 *

 * Functions that are not pluggable (not wrapped in function_exists()) are

 * instead attached to a filter or action hook.

 *

 * For more information on hooks, actions, and filters,

 * see http://codex.wordpress.org/Plugin_API

 */



function encorechild_enqueue_assets() {

	wp_enqueue_style( 'encore-parent-style', get_template_directory_uri() . '/style.css' );

	wp_style_add_data( 'encore-parent-style', 'rtl', 'replace' );

}

add_action( 'wp_enqueue_scripts', 'encorechild_enqueue_assets' );

function encore_audiotheme_upcoming_gigs_query(){
	$args = array(
		'order'          => 'desc',
		'posts_per_page' => 15,
		'meta_query'     => array(
			array(
				'key'     => '_audiotheme_gig_datetime',
				'value'   => date('2000-01-01'),
				'compare' => '>=',
				'type'    => 'DATETIME',
			),
		),
	);
	return new Audiotheme_Gig_Query( apply_filters( 'encore_upcoming_gigs_query_args', $args ) );
	//echo $GLOBALS['wp_query']->request; 

}

