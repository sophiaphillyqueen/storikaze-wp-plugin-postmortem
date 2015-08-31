<?php

// The [storikaze_adc] shortcode: "adc" stands for "ADvertisement Code" --
// can be used for author-controlled placement of ad slots - but also for
// other uses as well.
// The current implementation, though, is merely a place-holder.

if ( ! function_exists( 'storikaze_tag_adc' ) ) :
function storikaze_tag_adc ( $atts, $content = null ) {
	$vioris = new StdClass;
	$vioris->atts = $atts;
	$vioris->txval = "";
	//if ( $GLOBALS["storikaze_foolproof_id"] != get_the_ID() ) { return ""; }
	
	if ( ! is_array($atts) ) { return ""; }
	if ( ! $atts["id"] ) { return ""; }
	$my_a_id = $atts["id"];
	$my_b_id = "x" . $my_a_id;
	if ( $GLOBALS["storikaze_adc_there"][$my_b_id] )
	{
	  return $GLOBALS["storikaze_adc_valus"][$my_b_id];
	}
	
	$korau = $GLOBALS["storikaze_adc_root"];
	if ( is_object($korau) )
	{
	  $korau->invok($vioris);
	}
	
	$GLOBALS["storikaze_adc_there"][$my_b_id] = true;
	$GLOBALS["storikaze_adc_valus"][$my_b_id] = $vioris->txval;
	return $vioris->txval;
}
endif;
add_shortcode( 'storikaze_adc', 'storikaze_tag_adc' );

?>