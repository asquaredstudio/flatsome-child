<?php
namespace FlatsomeChildTheme;

/**
 * Handles basic theme functions and additions
 * such as loading dependencies, adding SVG support, etc.
 */
class Core {
	/**
	 * ChildTheme constructor
	 */
	function __construct() {
		add_action( 'init', [ $this, 'themeInit' ] );
		add_action( 'admin_init', [ $this, 'adminInit' ] );
	}


	/**
	 * @param $hook
	 */
	function adminScriptsStyles( $hook ) {
		//		if ( 'tools_page_your-slug' != $hook ) {
		//			return;
		//		}
		$assets[] = [
			'name'         => 'admin',
			'type'         => 'script',
			'loc'          => '/assets/js/admin.js',
			'dependencies' => [ 'jquery' ],
			'in_footer'    => true
		];

		$this->loadAssets( $assets );
	}

	/**
	 * Loops through the asset array and correctly processes them
	 *
	 * @param $assets
	 */
	private function loadAssets( $assets ) {
		foreach ( $assets as $asset ) {
			switch ( $asset['type'] ) {
				case 'script' :
					$version = date( "ymd-Gis", filemtime( get_stylesheet_directory() . $asset['loc'] ) );
					wp_enqueue_script( $asset['name'], get_stylesheet_directory_uri() . $asset['loc'], $asset['dependencies'], $version, $asset['in_footer'] );
					break;
				case 'style' :
					break;
			}
		}
	}

	/**
	 * Init only for the admin
	 */
	function adminInit() {
		add_action( 'admin_enqueue_scripts', [ $this, 'adminScriptsStyles' ] );
	}

	/**
	 * Initial theme actions
	 */
	function themeInit() {
		add_action( 'wp_enqueue_scripts', [ $this, 'frontEndScriptsStyles' ] );
	}

	
	/**
	 * Load styles / scripts
	 */
	function frontEndScriptsStyles() {
		$assets[] = [
			'name'         => 'frontend',
			'type'         => 'script',
			'loc'          => '/assets/js/frontend.js',
			'dependencies' => [ 'jquery' ],
			'in_footer'    => true
		];

		$this->loadAssets( $assets );
	}
}