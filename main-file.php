<?php
/**
 * Plugin Name: Storikaze Wordpress Plugin
 * Plugin URI: https://github.com/sophiaphillyqueen/storikaze-wp-plugin
 * Description: Gets WordPress to act as a Webserial fiction manager rather than a blog
 * Version: 0.0.2
 * Author: Sophia Elizabeth Shapira
 * Author URI: https://github.com/sophiaphillyqueen
 * License: GPL2+
 */


// For the sake of logical-instantanaety, Storikaze only retrieves
// the date once per run.
$storikaze_time_now = current_time('mysql');



// WordPress was originally written for blogs - and therefore
// sorts the entries so that the most recent one appears first.
// However, that is not what we want in webfiction - so this
// code will change the order so that the oldest post appears
// first.
if ( ! function_exists( 'storikaze_fix_sort_order_in_qry' ) ) :
function storikaze_fix_sort_order_in_qry ( $query )
{
	
	// We do not want the order reversed on the admin panels -
	// only the actual public web-site.
	if ( is_admin() ) { return; }
	
	// We also do not want it reversing the order on the feeds.
	if ( is_feed() ) { return; }
	
	$query->set('order','ASC');
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
	
	
	// Of course, if the page is being displayed in preview mode,
	// we want anything to show up. (This part of code may change
	// if there is a way to have a preview with a particular
	// point in time specified.)
	if ( is_preview() ) { return $content; }
	
	
	foreach ( $atts as $thenom => $theval )
	{
		
		if ( $thenom == "from" )
		{
			if ( $timecode < strtotime($theval) ) { return ""; }
		}
		
		// The "to" attribute specifies a time at which the text
		// disappears (such as the "story still in progress" note
		// at the end of the TOC -- but only once you know at what
		// time the very last installation of the story will be
		// added).
		if ( $thenom == "to" )
		{
			if ( $timecode > strtotime($theval) ) { return ""; }
		}
	}
	
	return $content;
}
endif;
add_shortcode( 'storikaze_at', 'storikaze_tag_at' );

// Even though it is primarily for debugging purposes, I need to
// be able to know what time Storikaze has it as.
if ( ! function_exists( 'storikaze_tag_now' ) ) :
function storikaze_tag_now ( $atts )
{
  return $GLOBALS["storikaze_time_now"];
}
endif;
add_shortcode( 'storikaze_now', 'storikaze_tag_now' );


// Now we will create the function to set up the story-element-appearnce
// array --- and use it.
// The first argument of the function is the array of the story text
// gimmick.
// The second argument of the function is the priority-level (2 for the
// plug-in's defaults - 1 for an override from the theme) and the third
// is an array that is to be the contents of the story-elemant-appearance
// variable.
if ( ! function_exists( 'storikaze_tex_gim_set' ) ) :
function storikaze_tex_gim_set ( $trgnom, $priorty, $valua )
{
  // Do NOT register anything that isn't an array.
  if ( ! is_array($valua) ) { return; }
  
  // If the target array doesn't exist as an array, create it now.
  if ( ! is_array($GLOBALS["storikaze_tex_gim_r"]) )
  {
    $GLOBALS["storikaze_tex_gim_r"] = array();
  }
  
  // If the gimmick does not currently exist, let us set it
  // and be done with this function.
  if ( ! is_array($GLOBALS["storikaze_tex_gim_r"][$trgnom]) )
  {
    $GLOBALS["storikaze_tex_gim_r"][$trgnom] = array($priorty,$valua);
    return;
  }
  
  // Now, if something already is there, we change it only if the
  // current priority level is higher (i.e. a smaller number) than
  // the old one.
  $curray = $GLOBALS["storikaze_tex_gim_r"][$trgnom];
  if ( $curray[0] > $priorty )
  {
    $GLOBALS["storikaze_tex_gim_r"][$trgnom] = array($priorty,$valua);
    return;
  }
}
endif;
storikaze_tex_gim_set("segbreak",2,array("slval" => "\n\n\n<hr />\n\n"));

if ( ! function_exists( 'storikaze_tag_segbreak' ) ) :
function storikaze_tag_segbreak ( $atts )
{
  if ( !is_array($GLOBALS["storikaze_tex_gim_r"]) ) { return ""; }
  if ( !is_array($GLOBALS["storikaze_tex_gim_r"]["segbreak"]) ) { return ""; }
  $refera = $GLOBALS["storikaze_tex_gim_r"]["segbreak"];
  if ( !is_array($refera[1]) ) { return ""; }
  $referb = $refera[1];
  return ( $referb["slval"] );
}
endif;
add_shortcode( 'storikaze_segbreak', 'storikaze_tag_segbreak' );


?>