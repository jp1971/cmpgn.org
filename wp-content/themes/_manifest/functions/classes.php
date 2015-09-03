<?php
/**
 * Require Manifest classes on init
 */

namespace Campaign\Parent;

add_action( 'init', function () {

	require_once __DIR__ . '/../classes/TimberPost.php';

} );