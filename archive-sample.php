<?php
/**
 * Template for archive
 */

remove_action( 'genesis_entry_content', 'genesis_do_post_image', 8 );
remove_action( 'genesis_entry_content', 'genesis_do_post_content' );
add_action( 'genesis_entry_content', 'swp_acf_icon' );
function swp_acf_icon () {
	echo $x = $x+1; echo '<br />';
	echo get_the_ID() . '<br />';
	echo get_the_title () . '<br />';
	echo get_the_date () . '<br />';
	echo get_post_meta( get_the_ID(), 'alt_content', TRUE );

	$get_this = get_post_meta( get_the_ID(), 'icon', TRUE );
	$size = "medium";
	$target = "";

	// check if field is image
	if( wp_attachment_is_image( $get_this ) ) {
		
		$this_image = wp_get_attachment_image( $get_this, $size );
		
		// validate target
		if( $target == "_blank" ) {
			$targ = "target='".$target."'";
		} else {
			$targ = "";
		}
		
		if( $link ) {
			
			// check if link is for itself
			if( $link == "_self" ) {
				$link = wp_get_attachment_image_src( $get_this, 'FULL' )[0];
			}
			
			$a_link = "<a href='".$link."' ".$targ.">".$this_image."</a>";
		} else {
			$a_link = $this_image;
		}
		
		echo $a_link;
	}

}

genesis();