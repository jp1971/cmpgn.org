<?php
/**
 * Require Manifest classes on init
 */

namespace Athletics\Manifest;

add_action( 'init', function () {

	require_once __DIR__ . '/../classes/Settings.php';
	require_once __DIR__ . '/../classes/TimberPost.php';

});