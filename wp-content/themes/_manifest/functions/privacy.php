<?php

namespace Athletics\Manifest;

// Remove the WordPress generator tag
remove_action( 'wp_head', 'wp_generator' );

// Disable opens sans
if ( '1' == get_option( 'manifest_disable_open_sans' ) ) {

	add_action( 'admin_enqueue_scripts', function () {

		wp_deregister_style( 'open-sans' );
		wp_register_style( 'open-sans', false );

	});

}

// Require login
if ( '1' == get_option( 'manifest_require_login' ) ) {

	add_action( 'wp_head', function () {

		if ( ! is_user_logged_in() ) {

			auth_redirect();

		}

	});

}