<?php

if ( ! function_exists( 'storikaze_tl01_power' ) ) :
function storikaze_tl01_power ( $thepowr )
{
  // This first line is to prevent accidental elements
  // from spoiling stuff:
  if ( $thepowr == "" ) { return false; }
  
  $theletr = substr($thepowr,0,1);
  $therest = substr($thepowr,1);
  
  if ( $theletr == "+" ) { return storikaze_tl02_power($therest); }
  
  if ( $theletr == "-" ) { return ( ! ( storikaze_tl02_power($therest) ) ); }
  
  return storikaze_tl02_power($thepowr);
}
endif;

if ( ! function_exists( 'storikaze_tl02_power' ) ) :
function storikaze_tl02_power ( $thepowr )
{
  // This first line is to prevent accidental elements
  // from spoiling stuff:
  if ( $thepowr == "" ) { return false; }
  
  $theletr = substr($thepowr,0,1);
  $therest = substr($thepowr,1);
  
  if ( $theletr == "@" ) { return current_user_can($therest); }
  
  if ( $thepowr == "inf__is_mobile" )
  {
    return wp_is_mobile();
  }
  return current_user_can($thepowr);
}
endif;

if ( ! function_exists( 'storikaze_tag_power' ) ) :
function storikaze_tag_power ( $atts, $content = null ) {
  if ( ! is_array($atts) ) { return ""; }
  $goesok = ( $atts["dflt"] == "yes" );
  $loesok = $goesok;
  #$act_plug = current_user_can('activate_plugins');
  if ( ! $loesok )
  {
    $attra = explode(":",$atts["xcp"]);
    foreach ( $attra as $attro )
    {
      if ( storikaze_tl01_power($attro) ) { $goesok = true; }
    }
    $attra = explode(":",$atts["esp"]);
    foreach ( $attra as $attro )
    {
      if ( storikaze_tl01_power($attro) ) { $goesok = false; }
    }
  }
  if ( $loesok )
  {
    $attra = explode(":",$atts["xcp"]);
    foreach ( $attra as $attro )
    {
      if ( storikaze_tl01_power($attro) ) { $goesok = false; }
    }
    $attra = explode(":",$atts["esp"]);
    foreach ( $attra as $attro )
    {
      if ( storikaze_tl01_power($attro) ) { $goesok = true; }
    }
  }
  if ( $goesok ) { return $content; }
  return "";
}
endif;
add_shortcode( 'storikaze_power', 'storikaze_tag_power' );

?>