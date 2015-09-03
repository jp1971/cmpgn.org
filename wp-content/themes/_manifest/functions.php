<?php

/**
 * The main functions file for the Manifest theme
 */

/**
 * Require custom theme functions
 */

require_once( __DIR__ . '/functions/classes.php' );

require_once( __DIR__ . '/functions/custom-post-types.php' );

require_once( __DIR__ . '/functions/enqueue.php' );

require_once( __DIR__ . '/functions/excerpt.php' );

if ( defined( 'MNFST_DEV' ) && MNFST_DEV ) {

	require_once( __DIR__ . '/functions/flush-permalinks.php');

}

require_once( __DIR__ . '/functions/images.php' );

require_once( __DIR__ . '/functions/privacy.php' );

require_once( __DIR__ . '/functions/utilities.php' );