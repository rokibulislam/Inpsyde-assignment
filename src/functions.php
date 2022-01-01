<?php
/**
 * Inpsyde Functions
 *
 * @package Inpsyde\Functions
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Get template part implementation for plugin Looks at the theme directory first
 *
 * @param string $slug slug.
 * @param string $name name.
 * @param array  $args args.
 *
 * @return void
 */
function inpsyde_get_template_part( $slug, $name = '', $args = array() ) {

	$defaults = array();

	$args = wp_parse_args( $args, $defaults );

	if ( $args && is_array( $args ) ) {
		extract( $args );
	}

	$template = '';

	$template = locate_template( array( "inpsyde/{$slug}-{$name}.php", "inpsyde/{$slug}.php" ) );

	$template_path = inpsyde_plugin_path() . '/templates';

	if ( ! $template && $name && file_exists( $template_path . "/{$slug}-{$name}.php" ) ) {
		$template = $template_path . "/{$slug}-{$name}.php";
	}

	if ( ! $template && ! $name && file_exists( $template_path . "/{$slug}.php" ) ) {
		$template = $template_path . "/{$slug}.php";
	}

	if ( $template ) {
		include $template;
	}
}

/**
 * Get plugin path
 *
 * @return string
 */
function inpsyde_plugin_path() {
	return untrailingslashit( plugin_dir_path( __FILE__ ) );
}