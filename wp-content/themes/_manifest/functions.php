<?php

/**
 * The main functions file for the Manifest theme
 */

/**
 * Require custom theme functions
 */
require_once( __DIR__ . '/functions/admin.php' );

require_once( __DIR__ . '/functions/classes.php' );

require_once( __DIR__ . '/functions/enqueue.php' );

require_once( __DIR__ . '/functions/excerpt.php' );

if ( defined( 'MNFST_DEV' ) && MNFST_DEV ) {

	require_once( __DIR__ . '/functions/flush-permalinks.php');

}

require_once( __DIR__ . '/functions/images.php' );

require_once( __DIR__ . '/functions/privacy.php' );

require_once( __DIR__ . '/functions/utilities.php' );

/**
 * Third Party Plugins
 */
if ( 1 == get_option( 'manifest_acf_plugin' ) ) {

	// Customize ACF path
	add_filter( 'acf/settings/path', function ( $path ) {

	    // update path
	    $path = get_template_directory() . '/plugins/advanced-custom-fields-pro/';

	    // return
	    return $path;

	});

	// Customize ACF dir
	add_filter( 'acf/settings/dir', function ( $dir ) {

	    // update path
	    $dir = get_template_directory_uri() . '/plugins/advanced-custom-fields-pro/';

	    // return
	    return $dir;

	});

	// Include ACF
	require_once( __DIR__ . '/plugins/advanced-custom-fields-pro/acf.php' );

}

require_once( __DIR__ . '/plugins/timber-library/timber.php' );

/**
 * Native Manifest Plugins
 */
if ( 1 == get_option( 'manifest_cpss_plugin' ) ) {

	require_once( __DIR__ . '/plugins/manifest-compatible-post-sharing-system/manifest-compatible-post-sharing-system.php' );

}

if ( 1 == get_option( 'manifest_docs_plugin' ) ) {

	require_once( __DIR__ . '/plugins/manifest-docs/manifest-docs.php' );

}

if ( 1 == get_option( 'manifest_gallery_plugin' ) ) {

	require_once( __DIR__ . '/plugins/manifest-gallery/manifest-gallery.php' );

}