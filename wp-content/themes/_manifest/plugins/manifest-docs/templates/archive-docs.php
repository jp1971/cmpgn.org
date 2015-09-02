<?php
/**
 * The template for displaying docs archive pages
 */

$caps = get_option( 'docs_read' );

if ( $caps == null ) {

	// Default role for reading docs is Editor.
	$caps = 'edit_others_posts';

}

if ( current_user_can( $caps ) ) {

	$context = Timber::get_context();
	$context['wp_content'] = content_url();
	$args = 'post_type=docs&numberposts=-1&orderby=title&order=asc';
	$context['posts'] = Timber::get_posts( $args );

	Timber::render( 'archive-docs.twig', $context );

} else {

	wp_safe_redirect( home_url() );

}