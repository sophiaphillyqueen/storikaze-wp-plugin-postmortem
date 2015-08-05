<?php

if ( ! function_exists('storikaze_tag_istx') ) :
function storikaze_tag_istx ( $atts, $content = null ) {
  $ret = "";
  
  $ret .= "<table border = \"1\" cellpadding = \"2\"><tr><td>";
  $ret .= do_shortcode($content);
  $ret .= "</td></tr></table>";
  
  return $ret;
}
endif;
add_shortcode( 'storikaze_istx', 'storikaze_tag_istx' );

?>