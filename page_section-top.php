<?php
/*	
	Template Name: Section Top
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
add_action( 'genesis_before', 'setup_before_section' );
function setup_before_section() { 
	echo '<section class="section-top" style="background-color:yellow;" ><div class="spacein">';
	echo 'This is the section-top area';
	echo '</div></section>';
}

// Runs the Genesis loop.
genesis();