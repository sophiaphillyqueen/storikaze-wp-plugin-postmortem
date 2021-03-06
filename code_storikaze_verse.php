<?php

if ( ! function_exists('storikaze_tag_verse') ) :
function storikaze_tag_verse ( $atts, $content = null ) {
  $ret = "";
  
  $ret .= '<em>';
  
  $cn_a = preg_replace(
    array(
      '~<br />~',
      '~<p>~'
    ), array(
      "<br />&nbsp; &nbsp; ",
      "<p>&nbsp; &nbsp; "
    ),
    $content
  );
  $content = $cn_a;
  
  $ret .= "&nbsp; &nbsp; ";
  $ret .= $content;
  $ret .= '</em>';
  $ret .= "</p><p>";
  
  return $ret;
}
endif;
add_shortcode( 'storikaze_verse', 'storikaze_tag_verse' );

?>