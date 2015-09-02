<?php
/**
 * Print admin styles in header
 */

namespace Athletics\Manifest;

add_action( 'admin_print_styles', function () {

	wp_enqueue_style(
		'manifest_admin_styles', //$handle
		get_template_directory_uri() . '/css/admin.css', //$src
		false, //$deps (dependencies)
		'1.0', //$ver
		'screen' //$media
	);

});