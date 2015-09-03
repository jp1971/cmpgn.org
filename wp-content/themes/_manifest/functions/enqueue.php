<?php
/**
 * Print admin styles in header
 */

namespace Campaign\Parent;

add_action( 'admin_print_styles', function () {

	wp_enqueue_style(
		'manifest_admin_styles',
		get_template_directory_uri() . '/css/admin.css',
		false,
		'1.0',
		'screen'
	);

} );