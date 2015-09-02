<?php

// Image Settings

namespace Athletics\Manifest;

if ( '1' == get_option( 'manifest_image_settings' ) ) {

	// Set default link type to none
	update_option( 'image_default_link_type', 'none' );

	// Disable thumbnails thereby only allowing full sized images
	add_filter( 'intermediate_image_sizes_advanced', function ( $sizes ) {

		unset( $sizes['thumbnail']);
		unset( $sizes['medium']);
		unset( $sizes['large']);

		return $sizes;

	});

	// Update default thumbnail options
	update_option( 'thumbnail_crop', 0 );
	update_option( 'thumbnail_size_h', 0 );
	update_option( 'thumbnail_size_w', 0 );
	update_option( 'medium_size_h', 0 );
	update_option( 'medium_size_w', 0 );
	update_option( 'large_size_h', 0 );
	update_option( 'large_size_w', 0 );

}