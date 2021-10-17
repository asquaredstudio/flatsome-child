<?php
/**
 * Default Child Theme
 *
 * IMPORTANT: DO NOT EDIT THIS FILE!!!!!!
 * TO MAKE EDITS PLEASE USE: "/includes/Custom.Class.php"
 */
namespace FlatsomeChildTheme;

/**
 * Quick Class Auto Loader
 */
spl_autoload_register( function ( $class ) {
	$dir  = plugin_dir_path( __FILE__ ) . 'classes/';
	$file = str_replace( '\\', '/', $class ) . '.Class.php';
	$file = str_replace( __NAMESPACE__ . '/', '', $file);
	$path = $dir . $file;

	if ( file_exists( $path ) ) {
		require_once $path;
	}
} );


// Load our theme
$childTheme = ChildTheme::getInstance();