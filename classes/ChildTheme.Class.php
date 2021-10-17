<?php
namespace FlatsomeChildTheme;

/**
 * Responsible for module loading and general theme oversight
 */
class ChildTheme {
	/**
	 * @var null
	 */
	private static $instance = null;

	/**
	 * @var \FlatsomeChildTheme\Core
	 */
	var $core;

	/**
	 * @var \FlatsomeChildTheme\Custom
	 */
	var $custom;

	/**
	 * ChildTheme constructor
	 */
	function __construct() {
		// Load core functionality
		$this->core = new Core;

		// Load custom functionality
		$this->custom = new Custom;
	}

	/**
	 * @return \FlatsomeChildTheme\ChildTheme|null
	 */
	static function getInstance() {
		if ( self::$instance == null ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

}