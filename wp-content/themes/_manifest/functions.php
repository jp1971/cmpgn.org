<?php

/**
 * The main functions file for the Manifest theme
 */

/**
 * Require custom theme functions
 */

require_once( __DIR__ . '/functions/custom-post-types.php' );

require_once( __DIR__ . '/functions/enqueue.php' );

require_once( __DIR__ . '/functions/excerpt.php' );

if ( defined( 'MNFST_DEV' ) && MNFST_DEV ) {

	require_once( __DIR__ . '/functions/flush-permalinks.php');

}

require_once( __DIR__ . '/functions/images.php' );

require_once( __DIR__ . '/functions/privacy.php' );

require_once( __DIR__ . '/functions/utilities.php' );

/**
 * Require plugins
 */

// Customize ACF path
add_filter( 'acf/settings/path', function ( $path ) {

    // update path
    $path = WPMU_PLUGIN_DIR . '/advanced-custom-fields-pro/';

    // return
    return $path;

});

// Customize ACF dir
add_filter( 'acf/settings/dir', function ( $dir ) {

    // update path
    $dir = WPMU_PLUGIN_DIR . '/advanced-custom-fields-pro/';

    // return
    return $dir;

});

// Require ACF
require_once( WPMU_PLUGIN_DIR . '/advanced-custom-fields-pro/acf.php' );

// Require Timber
require_once( WPMU_PLUGIN_DIR . '/timber-library/timber.php' );