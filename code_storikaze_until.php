<?php

// the [storikaze_until] shortcode is to surround a series of
// MySQL moment-in-time codes separated from each other by
// a forward-slash. The expression will evaluate to the
// amount of time *remaining* till the *earliest* of the
// moments that is still in the future. If none of the
// specified moments are in the future, it will evaluate
// to "--".
//
// The reason for implementing this shortcode is so that
// the Table of Contents can more easily contain an
// announcement as to how much wait remains until the next
// update.
//
if ( ! function_exists('storikaze_tag_until') ) :
function storikaze_tag_until ( $atts, $content = null ) {
	$allofem = explode("/",$content);
	$waiting = true;
	$timecode = strtotime($GLOBALS["storikaze_time_now"]);
	foreach ( $allofem as $eachofem )
	{
		$eachraw = strtotime($eachofem);
		$sowait = $waiting;
		if ( ! $sowait ) { $sowait = ( $eachraw < $reigning ); }
		if ( $sowait ) { $sowait = ( $eachraw > $timecode ); }
		if ( $sowait )
		{
		  $reigning = $eachraw;
		  $waiting = false;
		  $difren = human_time_diff($eachraw,$timecode);
		}
	}
	if ( $waiting ) { return "--"; }
	return $difren;
}
endif;
add_shortcode( 'storikaze_until', 'storikaze_tag_until' );

?>