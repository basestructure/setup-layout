<?php
/*	
	Template Name: Section Inner
	Description: Genesis page template that wraps the site-inner area with a container
*/

add_filter( 'body_class', 'genesis_sample_add_body_class' );
/**
 * Adds landing page body class.
 *
 * @since 1.0.0
 *
 * @param array $classes Original body classes.
 * @return array Modified body classes.
 */
function genesis_sample_add_body_class( $classes ) {

	$classes[] = 'landing-page';
	return $classes;

}

// Removes Skip Links.
remove_action( 'genesis_before_header', 'genesis_skip_links', 5 );

add_action( 'wp_enqueue_scripts', 'genesis_sample_dequeue_skip_links' );
/**
 * Dequeues Skip Links Script.
 *
 * @since 1.0.0
 */
function genesis_sample_dequeue_skip_links() {

	wp_dequeue_script( 'skip-links' );

}


// Adds container warp around site-header
add_action( 'genesis_after_header', 'setup_after_header_bg' );
function setup_after_header_bg() { 
	echo '<section class="section-header" style="background-color:yellow;" >';
}
add_action( 'genesis_before_footer', 'setup_before_footer_bg' );
function setup_before_footer_bg() {
	echo '</section>';
}

// Runs the Genesis loop.
genesis();