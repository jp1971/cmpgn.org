<?php
/**
 * Remove Options if MNFST_DEV isn't defined as true
 */

namespace Athletics\Manifest;

if ( ! defined( 'MNFST_DEV' ) || ( defined( 'MNFST_DEV' ) && true !== MNFST_DEV ) ) {

	add_action( 'admin_menu', function () {

		remove_submenu_page( 'options-general.php', 'manifest_settings' );
		remove_menu_page( 'edit.php?post_type=acf' );

	});
	
}