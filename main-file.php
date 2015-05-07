<?php
/**
 * Plugin Name: Storikaze Wordpress Plugin
 * Description: Gets WordPress to act as a Webserial fiction manager rather than a blog
 * License: GPL2
 */


// For the sake of logical-instantanaety, Storikaze only retrieves
// the date once per run.
$storikaze_time_now = current_time('mysql');

// And it is important for Storikaze to know whether or not we are
// running in admin mode.
$storikaze_admin_now = false;
if ( ! function_exists( 'storikaze_upon_admin' ) ) :
function storikaze_upon_admin ( )
{
	$GLOBALS["storikaze_admin_now"] = true;
}
endif;
add_action( 'admin_init', 'storikaze_upon_admin' );


// WordPress was originally written for blogs - and therefore
// sorts the entries so that the most recent one appears first.
// However, that is not what we want in webfiction - so this
// code will change the order so that the oldest post appears
// first.
if ( ! function_exists( 'storikaze_fix_sort_order_in_qry' ) ) :
function storikaze_fix_sort_order_in_qry ( $query )
{
	if ( ! $GLOBALS["storikaze_admin_now"] )
	{
		$query->set('order','ASC');
	}
}
endif; // twentyfifteen_setup
add_action( 'pre_get_posts', 'storikaze_fix_sort_order_in_qry' );


// Just as with webcomics, the author of a webserial wants to
// be able to schedule in-advance when a subchapter is added
// to the book. This means two things (1) scheduling when the
// post itself appears in the post-sequence and (2) scheduling
// the Table of Contents to reflect the change as well. For
// actual posts themselves (issue #1) WordPress has it's own
// built-in scheduling feature. But for issue #2, you will need
// a shortcode to enclose sections of text who's visibility is
// scheculed. Introducing the [storikaze_at] shortcode.
if ( ! function_exists( 'storikaze_tag_at' ) ) :
function storikaze_tag_at ( $atts, $content = null ) {
	$timecode = strtotime($GLOBALS["storikaze_time_now"]);
	
	foreach ( $atts as $thenom => $theval )
	{
		
		if ( $thenom = "from" )
		{
			if ( $timecode < strtotime($theval) ) { return ""; }
		}
		
		// The "to" attribute specifies a time at which the text
		// disappears (such as the "story still in progress" note
		// at the end of the TOC -- but only once you know at what
		// time the very last installation of the story will be
		// added).
		if ( $thenom = "to" )
		{
			if ( $timecode > strtotime($theval) ) { return ""; }
		}
	}
	
	return $content;
}
endif;
add_shortcode( 'storikaze_at', 'storikaze_tag_at' );




?>