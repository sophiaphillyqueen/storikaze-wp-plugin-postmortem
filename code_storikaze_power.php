<?php

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
      if ( current_user_can($attro) ) { $goesok = true; }
    }
  }
  if ( $loesok )
  {
    $attra = explode(":",$atts["xcp"]);
    foreach ( $attra as $attro )
    {
      if ( current_user_can($attro) ) { $goesok = false; }
    }
  }
  if ( $goesok ) { return $content; }
  return "";
}
endif;
add_shortcode( 'storikaze_power', 'storikaze_tag_power' );

?>