<?php
/**
 * The template for displaying doc detail pages
 */

$caps = get_option( 'docs_read' );

if ( $caps == null ) {

	// Default role for reading docs is Editor.
	$caps = 'edit_others_posts';

}

if ( current_user_can( $caps ) ) {

	$context = Timber::get_context();
	$context['wp_content'] = content_url();
	$post = new TimberPost();
	$context['post'] = $post;

	Timber::render( 'single-doc.twig', $context );

} else {

	wp_safe_redirect( home_url() );

}