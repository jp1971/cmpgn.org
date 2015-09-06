<?php

namespace Athletics\Athletics;

class Enqueue {

	/**
	 * @var string $version
	 */
	public $version = '';

	/**
	 * @var string $url
	 */
	public $url = '';

	/**
	 * @var string $css
	 */
	public $css = 'min.css';

	/**
	 * @var string $js
	 */
	public $js = 'min.js';

	/**
	 * @var string $namespace
	 */
	public $namespace = null;

	/**
	 * Public constructor
	 */
	public function __construct( $namespace ) {

		$this->namespace = $namespace;

		$this->url = get_stylesheet_directory_uri();

		if ( $this->is_development() ) {
			$this->version = time();
			$this->css = 'css';
			$this->js = 'js';
		} else {
			$theme = wp_get_theme();
			$this->version = $theme->get( 'Version' );
		}

		add_action( 'admin_enqueue_scripts', array( $this, 'admin_styles' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'site_styles' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'site_scripts' ) );
		// Uncomment to enqueue print styles
		// add_action( 'wp_enqueue_scripts', array( $this, 'print_styles' ) );

	}

	/**
	 * Is development environment?
	 *
	 * @return boolean
	 */
	public function is_development() {

		if ( defined( 'MNFST_TM_STMP' ) && MNFST_TM_STMP ) {

			return true;

		}

		return false;

	}

	/**
	 * Admin Styles
	 */
	public function admin_styles() {

		wp_enqueue_style(
			"{$this->namespace}-admin",
			"{$this->url}/assets/css/admin.{$this->css}",
			false,
			$this->version,
			'screen'
		);

	}

	/**
	 * Admin Scripts
	 */
	public function admin_scripts() {

		wp_enqueue_script(
			"{$this->namespace}-admin",
			"{$this->url}/js/app/admin.js",
			array(
				'jquery',
			),
			$this->version,
			true
		);

	}

	/**
	 * Site Styles
	 */
	public function site_styles() {

		wp_enqueue_style(
			"{$this->namespace}-style",
			"{$this->url}/assets/css/{$this->namespace}.{$this->css}",
			false,
			$this->version,
			'screen, print'
		);

	}

	/**
	 * Site Scripts
	 */
	public function site_scripts() {

		wp_enqueue_script(
			'requirejs',
			"{$this->url}/assets/js/require.js",
			false,
			'2.1.17',
			true
		);

		wp_enqueue_script(
			"{$this->namespace}-site",
			"{$this->url}/assets/js/site.{$this->js}",
			array(
				'jquery',
				'underscore',
				'requirejs',
			),
			$this->version,
			true
		);

	}

	/**
	 * Print Styles
	 */
	public function print_styles() {

		wp_enqueue_style(
			"{$this->namespace}-print",
			"{$this->url}/assets/css/{$this->namespace}-print.css",
			false,
			$this->version,
			'print'
		);

	}

}
new Enqueue( 'cmpgn' );